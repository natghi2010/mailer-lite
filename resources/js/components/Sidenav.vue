<template>
  <div>
    <SidenavItem link="/" text="Subscribers" />
    <SidenavItem link="/fields" text="Fields" />
    <SidenavItem link="/stats" text="Stats" />
  </div>
</template>


<script>
import SidenavItem from "./SidenavItem.vue";
export default {
  components: {
    SidenavItem,
  },
  mounted() {
    console.log("Sidenav.");
  },
};
</script>

<style scoped>
  div{
      flex:2 !important;
  }
</style>




