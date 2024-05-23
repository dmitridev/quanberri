<template>
  <div class="product" :id="props.id">
    <div ref="productImgRef" id="" class="product-img"></div>

    <div class="explain">
      <h3>{{ props.name }}</h3>
      <div class="tags">
        <span :key="tag" v-for="tag in props.tags">
          {{ tag }}
        </span>
      </div>
    </div>
  </div>
</template>
<script setup>
import { defineProps, ref, onMounted } from "vue";
import * as PIXI from "pixi.js";
import DisplacementFilter from "@/assets/images/textures/blob.png";

const productImgRef = ref();
const props = defineProps(["id", "image", "name", "tags"]);
onMounted(async () => {
  const renderer = await PIXI.autoDetectRenderer({ transparent: true });
  productImgRef.value.appendChild(renderer.view.canvas);

  const stage = new PIXI.Container();
  const texture = await PIXI.Assets.load(props.image);

  const image = new PIXI.Sprite(texture);
  let displacementSprite = new PIXI.Sprite(
    new PIXI.Texture(await PIXI.Assets.load(DisplacementFilter))
  );
  displacementSprite.texture.baseTexture.wrapMode = PIXI.WRAP_MODES.REPEAT;
  const displacementFilter = new PIXI.DisplacementFilter(displacementSprite);
  
  image.filters = [displacementFilter];
  console.log(image.filters);
  stage.addChild(image);
  stage.addChild(displacementSprite);

  let animationFrameNumber = 0;

  renderer.view.canvas.addEventListener("mousemove", () => {
    console.log("hover");
    animationFrameNumber = requestAnimationFrame(animate);
  });

  renderer.view.canvas.addEventListener('mouseleave',() =>{
    console.log('leave');
    cancelAnimationFrame(animationFrameNumber);
  });

  const animate = (speed = 5) => {
    displacementSprite.x += speed;
    renderer.render(stage);
    if (displacementSprite.x >= displacementSprite.width) {
      displacementSprite.x = 0;
    }
    if (displacementSprite.y >= displacementSprite.width) {
      displacementSprite.y = 0;
    }
  };

  animate();
});
</script>

<style>
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

.product .product-img {
  width: 100%;
  margin-bottom: 47px;
}

@media screen and (max-width: 768px) {
  .product .explain {
    display: none;
  }

  .product,
  .product .product-img {
    width: 60%;
  }

  .product-list {
    height: 600px !important;
  }
}

@media screen and (max-width: 415px) {
  .product,
  .product .product-img {
    width: 100%;
  }

  .product .product-img {
    border-radius: 50px !important;
    height: 225px;
    object-fit: cover;
  }
}
</style>