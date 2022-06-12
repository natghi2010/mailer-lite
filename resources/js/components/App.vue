<template>
  <div id="main-body" class="grey lighten-5">
    <Navbar />
    <div class="container">
      <Workspace />
    </div>
  </div>
</template>


<script>
import Navbar from "./Navbar.vue";
import Workspace from "./Workspace.vue";
import M from 'materialize-css'
export default {
  components: {
    Navbar,
    Workspace,
  },
  mounted() {
    M.AutoInit();
  },
};
</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap');
@import 'https://fonts.googleapis.com/icon?family=Material+Icons';

body {
  background-color: #eee;
}
*{
 font-family: 'Nunito', sans-serif !important;
}
#main-body {
  min-height: 100vh;
}
</style>
