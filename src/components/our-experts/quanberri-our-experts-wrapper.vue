<template>
  <div class="our-experts__wrapper" id="our-experts">
    <slot></slot>
  </div>
</template>

<style>
  .our-experts__wrapper{
    padding-top:162px;
  }

  @media screen and (max-width:1280px) {
    .our-experts__wrapper{
      padding-top:76px;
    }
  }

  @media screen and (max-width:768px){
    .our-experts__wrapper{
      padding-top:83px;
    }
  }

  @media screen and (max-width:768px){
    .our-experts__wrapper{
      padding-top:39px;
    }
  }

  @media screen and (max-width:414px) {
    .our-experts__wrapper{
      padding-top:57px;
    }
  }

  @media screen and (max-width: 360px) {
    .our-experts__wrapper{
      padding-top:85px;
    }
  }
</style>