<template>
  <footer>
    <div class="tab container">
      <div class="footer-row">
        <div class="footer-row__logo">
          <img src="@/assets/images/footer/quanberri.svg" />
        </div>
        <div class="footer-row__menu">
          <ul class="footer-menu">
            <li><a href="#">Проекты</a></li>
            <li><a href="#">Компетенции</a></li>
            <li><a href="#">Команда</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-row personal-data">
        <p>Политика обработки персональных данных</p>

        <p>
          По вопросам работы с персональными данными и подписками пишите на
          <a href="mailto:quanberri@gmail.com">quanberri@gmail.com</a>
        </p>
      </div>
      <div class="footer-row">
        <div class="footer-row__copyright">© quanberri, 2024</div>
        <div class="footer-row__links">
          
          <a :href="props.links.dprofile">
            <img src="@/assets/images/footer/drpfile.svg" />
          </a>
          <a :href="props.links.vk"> 
            <img src="@/assets/images/footer/vk.svg" />
          </a>
          <a :href="props.links.bot">
            <img src="@/assets/images/footer/telegram.svg" alt="" />
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>

<style>
.tab.container {
  padding-top: 99px;
  display: flex;
  flex-direction: column;
  gap: 135px;
  padding-bottom: 106px;
}

.footer-row {
  display: flex;
  flex-direction: row wrap;
}

.footer-row__logo img {
  width: 73px;
}

.footer-menu {
  display: flex;
  list-style: none;
}

.footer-menu {
  display: flex;
  gap: 66px;
}

.footer-menu a {
  text-decoration: none;
  color: black;
}

.footer-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.footer-row__links {
  display: flex;
  gap: 36px;
}

.footer-row__links img {
  width: 41px;
}

.footer-row.personal-data {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  font-size: 14px;
  gap: 30px;
  color: gray;
}

.footer-row.personal-data a {
  color: gray;
  text-decoration: none;
}
</style>

<script setup>
import { defineProps } from "vue";
const props = defineProps(['links'])
</script>