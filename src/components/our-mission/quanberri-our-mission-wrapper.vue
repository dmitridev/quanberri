<template>
  <div class="our-mission__wrapper"><slot></slot></div>
</template>


<style>
.our-mission__wrapper {
  padding-top: 134px;
}

@media screen and (max-width: 1280px) {
  .our-mission__wrapper {
    padding-top: 115px;
  }
}

@media screen and (max-width: 768px) {
  .our-mission__wrapper {
    padding-top: 106px;
  }
}

@media screen and (max-width: 414px) {
  .our-mission__wrapper {
    padding-top: 43px;
  }
}

@media screen and(max-width:360px) {
  .our-mission__wrapper {
    padding-top: 41px;
  }
}
</style>