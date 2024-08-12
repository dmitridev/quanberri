<template>
  <footer>
    <div class="mobile container">
      <div class="info--company-social-networks">
        <div class="social-networks">
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
        <div class="contact-information">
          <a class="info--phone" href="tel:+79499330595">+7 (949) 933-05-95</a>
          <a class="info--email" href="mailto:quanberri@gmail.com">quanberri@gmail.com</a>
          <a href="#">
            <img src="@/assets/images/footer/qb-mobile.svg" />
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.social-networks img {
  width: 41px;
}
</style>

<script setup>
import { defineProps } from "vue";
const props = defineProps(['links'])
</script>