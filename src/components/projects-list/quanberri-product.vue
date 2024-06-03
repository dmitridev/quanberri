<template>
  <div class="product product-style" :id="props.id" >
    <div class="product-img" >
        <canvas ref="productImgRef" :id="props.id"></canvas>
    </div>
  </div>
</template>
<script setup>
import { defineProps, ref, onMounted } from "vue";
import * as twgl from 'twgl.js';

const productImgRef = ref();
const props = defineProps(["id", "image", "name", "tags",'width','height']);

onMounted(async () => {
const m4 = twgl.m4;
const gl = productImgRef.value.getContext("webgl");
/*
productImgRef.value.width = props.width;
productImgRef.value.height=props.height;
*/

productImgRef.value.style=`max-width:100%;max-height:757px;width:${props.width}px;height:${props.height}px`;

const vs = `
attribute vec4 position;
attribute vec3 displacement;

uniform mat4 u_matrix;
uniform float u_time;
uniform float u_timeToGoBack;

varying vec2 v_texcoord;

void main() {
  v_texcoord = position.xy * .5 + .5;  
  float displaceTime = displacement.z - u_time;
  float lerp = clamp(displaceTime / u_timeToGoBack, 0., 1.);
  vec2 displace = displacement.xy * lerp;

  gl_Position = u_matrix * (position + vec4(displace, 0, 0));
}
`;
const fs = `
precision mediump float;

uniform sampler2D texture;

varying vec2 v_texcoord;

void main() {
  gl_FragColor = texture2D(texture, v_texcoord);
}
`;

const programInfo = twgl.createProgramInfo(gl, [vs, fs]);

// create a grid of points in a -1 to +1 quad
const positions = [];
const displacements = [];
const indices = [];

const res = 100;
for (var y = 0; y < res; ++y) {
  var v = (y / (res - 1)) * 2 - 1;
  for (var x = 0; x < res; ++x) {
    var u = (x / (res - 1)) * 2 - 1;
    
    positions.push(u, v);
    displacements.push(0, 0, 0);
  }  
}

for ( y = 0; y < res - 1; ++y) {
  var off0 = (y + 0) * res;
  var off1 = (y + 1) * res;
  for ( x = 0; x < res - 1; ++x) {
    indices.push(
      off0 + x + 0, off0 + x + 1, off1 + x + 0,
      off1 + x + 0, off0 + x + 1, off1 + x + 1
    );
  }  
}

// create buffers and fills them in.
// (calls gl.createBuffer and gl.bufferData for each array)
const bufferInfo = twgl.createBufferInfoFromArrays(gl, {
  position: { numComponents: 2, data: positions, },
  displacement: { numComponents: 3, data: displacements, },
  indices: indices,
});

// this will be replaced when the image has loaded;
var img = { width: 1, height: 1 };

const tex = twgl.createTexture(gl, {
  src: props.image,
  crossOrigin: '',
}, function(err, texture, source) {
  img = source;                               
});

var currentTime = 0;
var currentMatrix;
const timeToGoBack = 3; // in seconds;
    
function render(time) {
  time *= 0.001;  // convert to seconds
  
  currentTime = time;
  
  twgl.resizeCanvasToDisplaySize(gl.canvas);
  gl.viewport(0, 0, props.width, props.height);
  gl.useProgram(programInfo.program);
  
  //var aspect = img.width / img.height;
  var mat = m4.ortho(0, gl.canvas.clientWidth, gl.canvas.clientHeight, 0, -1, 1);
  mat = m4.translate(mat, [gl.canvas.clientWidth / 2, gl.canvas.clientHeight / 2, 0]);
  mat = m4.scale(mat, [img.width * 0.5, img.height * 0.5, 1]);

  currentMatrix = mat;
  
  // calls gl.bindBuffer, gl.vertexAttribPointer to setup
  // attributes
  twgl.setBuffersAndAttributes(gl, programInfo, bufferInfo);
  
  twgl.setUniforms(programInfo, {
    u_matrix: mat,
    u_texture: tex, 
    u_time: currentTime,
    u_timeToGoBack: timeToGoBack,
  });
  
  gl.drawElements(gl.TRIANGLES, bufferInfo.numElements, gl.UNSIGNED_SHORT, 0);

  requestAnimationFrame(render);
}
requestAnimationFrame(render);

const displace = new Float32Array(3);
    
gl.canvas.addEventListener('mousemove', function(event, target) {
  target = target || event.target;
  const rect = target.getBoundingClientRect();

  const rx = event.clientX - rect.left;
  const ry = event.clientY - rect.top;

  const x = rx * target.width  / target.clientWidth;
  const y = ry * target.height / target.clientHeight;
  
  var rmat = m4.inverse(currentMatrix);
  var s = m4.transformPoint(
    rmat, [x / target.width * 2 - 1, y / target.height * 2 - 1, 0]);
  
  var gx = Math.round((s[0] * .5 + .5) * res);
  var gy = Math.round((s[1] * .5 + .5) * res);
  
  gx = clamp(gx, 5, res - 1);
  gy = clamp(gy, 5, res - 1);
  
  const offset = ((res - gy - 1) * res + gx) * 12;
  
  displace[0] = rand(-.1, .1);
  displace[1] = rand(-.1, .1);
  displace[2] = currentTime + timeToGoBack;
   
  gl.bindBuffer(gl.ARRAY_BUFFER, bufferInfo.attribs.displacement.buffer);
  gl.bufferSubData(gl.ARRAY_BUFFER, offset, displace);
});
    
function rand(min, max) {
  return Math.random() * (max - min) + min;
}

function clamp(v, min, max) {
  return Math.max(min, Math.min(max, v));
}
  
});
</script>

<style>
canvas{
  width:100%;
  height:100%;
}



.product span {
  border: 1px solid var(--font-color);
  border-radius: 10px;
  font-size: 13px;
  padding: 2px 10px;
  margin-right: 5px;
}

.product .explain {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: var(--font-color);
}

.product h3 {
  font-size: var(--our-product__product--font-size);
}

.product .full-sized-canvas {
  width: 100%;
  margin-bottom: 47px;
}

@media screen and (max-width: 768px) {
  .product .explain {
    display: none;
  }
}

@media screen and (max-width: 415px) {
  .product,
  .product .full-sized-canvas {
    width: 100%;
  }

  .product .full-sized-canvas {
    border-radius: 50px !important;
    height: 225px;
    object-fit: cover;
  }
}
</style>