<template>

  <!--header-->
  <quanberri-header></quanberri-header>


  <quanberri-fixed-menu></quanberri-fixed-menu>

  <quanberri-container>
    <quanberri-main-text-wrapper>
      <quanberri-main-text></quanberri-main-text>
    </quanberri-main-text-wrapper>
  </quanberri-container>

  <quanberri-video-block-wrapper>
    <quanberri-video-block></quanberri-video-block>
  </quanberri-video-block-wrapper>

  <quanberri-container>
    <quanberri-competencies/>
  </quanberri-container>
  
  <quanberri-container>
    <quanberri-projects-list-wrapper>
      <quanberri-project-list></quanberri-project-list>
    </quanberri-projects-list-wrapper>
  </quanberri-container>

  <quanberri-advantages-wrapper>
    <quanberri-advantages></quanberri-advantages>
  </quanberri-advantages-wrapper>

  <quanberri-container>
    <quanberri-companies-wrapper>
      <quanberri-companies></quanberri-companies>
    </quanberri-companies-wrapper>
  </quanberri-container>

  <quanberri-container>
    <quanberri-our-experts-wrapper>
      <quanberri-our-experts-header></quanberri-our-experts-header>
    </quanberri-our-experts-wrapper>
  </quanberri-container>

  <quanberri-our-experts-list-wrapper>
    <quanberri-our-experts></quanberri-our-experts>
  </quanberri-our-experts-list-wrapper>


  <quanberri-footer></quanberri-footer>
</template>

<script setup>
import QuanberriContainer from "@/components/utility/quanberi-container.vue";
import quanberriCompanies from "@/components/companies/quanberri-companies.vue";
import quanberriHeader from "@/components/header/quanberri-header.vue";
import quanberriMainText from "@/components/main-text/quanberri-main-text.vue";
import quanberriOurExperts from "@/components/our-experts/quanberri-our-experts.vue";
import QuanberriProjectList from "@/components/projects-list/quanberri-project-list.vue";
import quanberriVideoBlock from "@/components/video-block/quanberri-video-block.vue";
import quanberriFooter from "@/components/footer/quanberri-footer.vue";
import QuanberriOurExpertsHeader from "@/components/our-experts/quanberri-our-experts-header.vue";
import QuanberriAdvantages from "@/components/advangates/quanberri-advantages.vue";
import quanberriMainTextWrapper from "@/components/main-text/quanberri-main-text-wrapper.vue";
import QuanberriVideoBlockWrapper from "@/components/video-block/quanberri-video-block-wrapper.vue";
import quanberriProjectsListWrapper from "@/components/projects-list/quanberri-projects-list-wrapper.vue";
import quanberriAdvantagesWrapper from "@/components/advangates/quanberri-advantages-wrapper.vue";
import quanberriCompaniesWrapper from "@/components/companies/quanberri-companies-wrapper.vue";
import quanberriOurExpertsWrapper from "@/components/our-experts/quanberri-our-experts-wrapper.vue";
import quanberriOurExpertsListWrapper from "@/components/our-experts/quanberri-our-experts-list-wrapper.vue";
import quanberriFixedMenu from '@/components/fixed-menu/quanberri-fixed-menu.vue';
import quanberriCompetencies from "./components/competitions/quanberri-competencies.vue";
</script>

<style src="@/global.css"></style>
