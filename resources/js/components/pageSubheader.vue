<template>
  <div class="row">
    <div class="col s12">
      <span :class="`left white-text badge ${color != undefined ? color : 'green'}`">
        {{text}}
      </span>
      <hr />
    </div>
  </div>
</template>


<script>
export default {
    props: ["text","color"]
}
</script>


