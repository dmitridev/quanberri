<template>
  <div class="video-block__wrapper"><slot></slot></div>
</template>

<style>
  .video-block__wrapper{
    padding-top:108px;
  }

  @media screen and (max-width:1280px){
    .video-block__wrapper{
      padding-top:115px;
    }
  }

  @media screen and (max-width:768px){
    .video-block__wrapper{
      padding-top:84px;
    }
  }

  @media screen and (max-width:414px){
    .video-block__wrapper{
      padding-top:84px;
    }
  }

  @media screen and (max-width:360px){
    .video-block__wrapper{
      padding-top:92px;
    }
  }
</style>