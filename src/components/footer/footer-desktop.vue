<template>
  <footer>
    <div class="desktop container">
      <div class="heading-in-footer">
        <p ref="hoverAnimate" class="on-hover-make-animation" @mouseover="onMouseMove" @mouseleave="onMouseLeave">
          Предложить задачу
          Предложить задачу
        </p>
        <img src="@/assets/images/footer/share-task.svg" />
      </div>
      <div class="menu">
        <div class="info">
          <div class="info--email">
            <a href="mailto:quanberri@gmail.com">quanberri@gmail.com</a>
          </div>
          <div class="info--menu">
            <ul class="menu">
              <li><a href="#">Проекты</a></li>
              <li><a href="#">Компетенции</a></li>
              <li><a href="#">Команда</a></li>
              <li><a href="#">Контакты</a></li>
            </ul>
          </div>
        </div>
        <div class="info">
          <div class="info--phone">
            <a href="tel:+79499330595">+7(949) 933-05-95</a>
          </div>
        </div>
        <div class="info">
          <div class="info--links">
            <a class="info--link" href="#">Политика обработки персональных данных</a>
            <p class="info--link">
              По вопросам работы с персональными данными и подписками пишите на
              <a href="mailto:quanberri@gmail.com">quanberri@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
      <div class="info--company-social-networks">
        <p class="text-logo">© quanberri, 2024</p>
        <div class="social-networks">
          <a :href="props.links.dprofile">
            <img src="@/assets/images/footer/drpfile.svg" />
          </a>
          <a :href="props.links.vk"> 
            <img src="@/assets/images/footer/vk.svg" /></a>
          <a :href="props.links.bot">
            <img src="@/assets/images/footer/telegram.svg" alt="" />
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>


<script setup>
import { ref, defineProps } from "vue";
const props = defineProps(['links'])
const hoverAnimate = ref();

function onMouseMove() {
  hoverAnimate.value.scrollTo(0, 200);
}

function onMouseLeave() {
  hoverAnimate.value.scrollTo(0, 0);
}
</script>