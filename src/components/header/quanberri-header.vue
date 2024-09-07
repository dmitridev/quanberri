<template>
  <quanberri-container>
    <quanberri-header-wrapper>
      <header>
        <img class="quanberri-logo" src="@/assets/images/header/header-logo.svg" />
        <button @click="state.formStart = true" class="button-start-project">Начать проект<img
            class="button-start-project__img" src="@/assets/images/buttons/arrow-top-right-corner.svg" /></button>
      </header>
    </quanberri-header-wrapper>
  </quanberri-container>
  <quanberri-form-for-project-start v-model="state.formStart"></quanberri-form-for-project-start>

</template>

<script setup>
import { reactive } from 'vue';
import quanberriFormForProjectStart from '../form-for-project-start/quanberri-form-for-project-start.vue';
import QuanberriContainer from '../utility/quanberi-container.vue';
import quanberriHeaderWrapper from './quanberri-header-wrapper.vue';
const state = reactive({
  formStart: false
})
</script>

<style scoped lang="scss">
header {
  display: flex;
  justify-content: space-between;
}

header button {
  background: black;
  color: white;
  border: none;

  font-size: 25px;
  letter-spacing: -0.2px;

  display: flex;
  align-items: center;
  gap: 10px;
}

</style>