<template>
  <div class="companies__wrapper">
    <slot></slot>
  </div>
</template>

<style>
  .companies__wrapper{
    padding-top:146px;
  }

  @media screen and (max-width:1280px){
    .companies__wrapper{
      padding-top:108px;
    }
  }

  @media screen and (max-width: 768px){
    .companies__wrapper{
      padding-top:83px;
    }
  }

  @media screen and (max-width: 414px){
    .companies__wrapper{
      padding-top:84px;
    }
  }

  @media screen and (max-width: 360px){
    .companies__wrapper{
      padding-top:56px;
    }
  }
</style>