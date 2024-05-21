<template>
  <div class="product" :id="props.id">
    <img :src="props.image" alt="" />
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

<script setup type="module">
import { defineProps } from "vue";
const props = defineProps(["id", "image", "name", "tags"]);
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

.product img {
  width: 100%;
  margin-bottom: 47px;
}

@media screen and (max-width: 415px) {
  .product,
  .product img {
    width: 100%;
  }

  .product img {
    border-radius: 50px !important;
    height: 225px;
    object-fit: cover;
  }
}

@media screen and (max-width:768px){
  .product .explain{
    display:none;
  }

  .product, .product img{
    width:60%;
  }

  .product-list{
    height:600px!important;
  }
}
</style>