<template>
  <div class="project-list__wrapper">
    <slot></slot>
  </div>
</template>

<style>

.project-list__wrapper {
  padding-top: 158px;
}

@media screen and (max-width: 1280px) {
  .project-list__wrapper {
    padding-top: 128px;
  }
}

@media screen and (max-width: 768px) {
  .project-list__wrapper {
    padding-top: 74px;
  }
}

@media screen and (max-width: 414px) {
  .project-list__wrapper {
    padding-top: 48px;
  }
}

@media screen and(max-width:360px) {
  .project-list__wrapper {
    padding-top: 49px;
  }
}
</style>