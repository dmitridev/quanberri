<template>
  <div class="site-menu-container">
    <div class="site-menu-wrapper">
      <div class="icon" @click="window.scrollTo(0, 0)">
        <img src="@/assets/images/fixed-menu/qb-logo-menu.svg" />
      </div>
      <div class="site-menu-button" v-show="!state.isShow">
        <button class="menu-button" @click="showMenu">Меню</button>
      </div>
      <div class="site-menu" ref="siteMenu" v-show="state.isShow">
        <a class="menu-block" href="/#projects"> Проекты </a>
        <a class="menu-block" href="/#our-experts"> Команда </a>
        <a class="menu-block" href="#contacts"> Контакты </a>
        <span class="close-button" @click="closeMenu">&times;</span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from "vue";
const siteMenu = ref();

let state = reactive({ isShow: false });

const showMenu = () => {
  state.isShow = true;
};

const closeMenu = () => {
  state.isShow = false;
};
</script>

<style scoped>
.site-menu-container {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  
  bottom: 30px;
  z-index: 9999;
}

.menu-button {
  border: none;
  background: white;
  border-radius: 16px;
  padding: 12px 23px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.site-menu-wrapper {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 50px;
  backdrop-filter: blur(10px) saturate(200%) invert(20%);
  border-radius: 30px;
  padding-left: 20px;
  padding-right: 25px;
  transition: all 2s;
}

.close-button {
  color: white;
  font-size: 40px;
  cursor: pointer;
}

.site-menu .icon {
  cursor: pointer;
  padding: 10px;
}

.site-menu-wrapper .site-menu {
  border-radius: 8px;
  display: flex;
  justify-content: space-between;
  gap: 50px;
  align-items: center;
  padding: 10px;
}

.site-menu .menu-block {
  display: block;
  padding: 13px 8px;
  width: 87px;
  height: 48px;
  cursor: pointer;
  border-radius: 8px;
  font-size: 14px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: var(--font-color);
  text-decoration: none;
}

.site-menu img {
  width: 100%;
  border-radius: 8px;
}
</style>