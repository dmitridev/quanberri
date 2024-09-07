<template>
    <div class="product" :id="props.id" >
      <div class="product-img" >
        <img :src="props.image" style="width:100%"/>
      </div>
    </div>
  </template>
  <script setup>
  import { defineProps} from "vue";
  
  const props = defineProps(["id", "image", "name", "tags",'width','height']);
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
  
  @media screen and (max-width: 500px) {
    .product,
    .product .full-sized-canvas {
      width: 100%;
    }
  
    .product .full-sized-canvas {
      height: 225px;
      object-fit: cover;
    }
  }
  </style>