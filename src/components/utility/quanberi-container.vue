<template>
  <div class="container">
    <slot></slot>
  </div>
</template>

<style>
:root {
  --margin-size: 340px;
}
.container {
  max-width: 1200px;
  width: calc(100% - var(--margin-size));
  margin: 0 auto;
}

@media screen and (max-width: 1280px) {
  :root {
    --margin-size: 207px;
  }
}

@media screen and (max-width: 768px) {
  :root {
    --margin-size: 106px;
  }
}

@media screen and (max-width: 500px) {
  :root {
    --margin-size: 52px;
  }
}

@media screen and (max-width: 361px) {
  :root {
    --margin-size: 44px;
  }
}
</style>