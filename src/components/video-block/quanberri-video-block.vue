<template>
    <div class="video-container">
      <video
        src="@/assets/videos/main.mp4"
        loop
        autoplay
        muted
        poster="@/assets/images/video-block/video-preloader.png"
      ></video>
    </div>
</template>

<style scoped>
video {
  object-fit: cover;
  width: 100%;
}

.video-container{
  max-width:1355px;
  margin:0 auto;
}
</style>