<template>
    <div class="row">
          <div class="col  s12 m12">
            <div id="workspace" class=" ">
              <div class="card-content black-text">

                  <div class="col m2">
                      <Sidenav/>
                  </div>

                  <div class="col m10 card z-depth-3 mainView">
                    <router-view/>
                  </div>

              </div>
            </div>
          </div>
      </div>
</template>

<script>
import Sidenav from "./Sidenav.vue";
export default {
    components: {
        Sidenav,
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<style scoped>
#workspace{
    margin-top:3.5vh;
    min-height: 80vh;

}
.mainView{
    padding: 30px !important;
}
</style>
