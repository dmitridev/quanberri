<template>
  <div class="product" :id="props.id">
    <div ref="productImgRef" id="" class="product-img">

    </div>

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
import DisplacementFilter from '@/assets/images/textures/blob.png';

const productImgRef = ref();
const props = defineProps(["id", "image", "name", "tags"]);
onMounted(async () => {
  const renderer = await PIXI.autoDetectRenderer({ transparent: true })
  productImgRef.value.appendChild(renderer.view.canvas)
  const stage = new PIXI.Container()
  const texture = await PIXI.Assets.load(props.image)

  const image = new PIXI.Sprite(texture)
  let displacementSprite = new PIXI.Sprite(new PIXI.Texture(await PIXI.Assets.load(DisplacementFilter)))
  const displacementFilter = new PIXI.DisplacementFilter(displacementSprite)

  image.filters = [displacementFilter]
  stage.addChild(displacementSprite)
  stage.addChild(image)
  console.log(displacementSprite.width)

  const animate = ((speed = 1000) => {
    requestAnimationFrame(animate)
    displacementSprite.x += speed

    if(displacementSprite.x >= displacementSprite.width){
      displacementSprite.x = 0
    }
    renderer.render(stage)
  })

  animate()
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

@media screen and (max-width:768px) {
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