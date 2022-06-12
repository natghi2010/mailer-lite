<template>
 <div class="progress-container">
  <div class="progress">
    <div :class="(color != undefined ? color : 'green') +' indeterminate  lighten-1'"></div>
  </div>
</div>
</template>

<script>
export default {
  props: ["color"],
};
</script>


<style scoped>

.progress-container {
  display: flex !important;
  justify-content: center !important;
}
</style>
