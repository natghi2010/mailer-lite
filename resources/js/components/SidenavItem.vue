<template>
<div>
    <router-link exact-active-class="green white-text" :to="link != undefined ? link : '#'" class="green-text center z-depth-1 col m12"><i class="material-icons left"/>{{text}}</router-link>
</div>

</template>



<style scoped>
    a{
      margin-bottom: 10px;
      padding:10px !important;
    }
</style>

<script>
export default {
    props : ["link","text"]
}
</script>

