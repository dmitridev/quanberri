<template>
  <div class="header__wrapper"><slot></slot></div>
</template>

<style>
  .header__wrapper{
    padding-top:80px;
  }

  @media screen and (max-width:1280px){
    .header__wrapper{
      padding-top:64px;
    }
  }

  @media screen and (max-width:768px){
    .header__wrapper{
      padding-top:59px;
    }
  }

  @media screen and (max-width:414px){
    .header__wrapper{
      padding-top:32px;
    }
  }

  @media screen and (max-width:360px){
    .height__wrapper{
      padding-top:85px;
    }
  }

  
</style>