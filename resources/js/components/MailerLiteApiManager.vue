<template>
  <div id="main-body" class="grey lighten-5">
    <Navbar />
    <Workspace />
  </div>
</template>


<script>
import Navbar from "././Navbar.vue";
import Workspace from "././Workspace.vue";

export default {
  components: {
    Navbar,
    Workspace,
  },
  mounted() {
    console.log("Main App.");
  },
};
</script>


<style scoped>
body {
  background-color: #eee;
  font-family: "Courier New", Courier, monospace;
  padding: 20px;
}
#main-body {
  min-height: 100vh;
}
</style>
