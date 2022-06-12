<template>
  <div>
    <router-link to="/" class="btn-small green">Back</router-link>

    <div class="wrapper">
      <!-- <form class="col s12"> -->

      <PageSubheader text="Basic Information" color="blue" />
      <div class="row">
        <div class="input-field col s6">
          <input id="name" type="text" class="validate" v-model="form.name" />
          <label for="name">Name</label>
        </div>

        <div class="input-field col s6">
          <input id="email" type="text" class="validate" v-model="form.email" />
          <label for="email">Email</label>
        </div>

        <div class="row">
          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="active"
              checked
              v-model="form.state"
            />
            <span>active</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="unsubscribed"
              checked
              v-model="form.state"
            />
            <span>unsubscribed</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="junk"
              checked
              v-model="form.state"
            />
            <span>junk</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="bounced"
              checked
              v-model="form.state"
            />
            <span>bounced</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              class="red"
              value="unconfirmed"
              type="radio"
              checked
              v-model="form.state"
            />
            <span>unconfirmed</span>
          </label>
        </div>

        <PageSubheader text="Fields" />

        <div class="row" v-for="(field, index) in form.fields" :key="index">
          <div class="input-field col s6">
            <input
              id="title"
              type="text"
              class="validate"
              v-model="field.title"
            />
            <label for="title">Title</label>
          </div>

          <div class="input-field col s4">
            <select v-model="field.type">
              <option value="" disabled selected>Choose your field type</option>
              <option value="date">Date</option>
              <option value="number">Number</option>
              <option value="string">String</option>
              <option value="boolean">Boolean</option>
            </select>
            <label>Select Field</label>
          </div>
          <div class="input-field col s2">
            <button @click.prevent="addField" class="btn blue">+</button>
          </div>
        </div>

        <div align="center">
          <button @click.prevent="submit" class="btn green">
            Add Subscriber
          </button>
        </div>

        <!-- </form> -->
      </div>
    </div>
  </div>
</template>


<style scoped>
.wrapper {
  margin-top: 35px;
  padding-left: 10px;
}
</style>


<script>
import M from "materialize-css";
import useSubscribers from "../../composables/subscribers";
import lodash from "lodash";
import { reactive } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import PageSubheader from "../../components/pageSubheader.vue";

export default {
  mounted() {
    M.AutoInit();
  },
  components: {
    PageSubheader,
  },
  setup() {
    const form = reactive({
      name: "",
      email: "",
      state: "",
      fields: [
        {
          title: "",
          type: "",
        },
      ],
    });

    const { errors, getSubscriber,storeSubscriber } = useSubscribers();

    const addField = () => {
      form.fields.push({
        title: "",
        type: "",
      });
      M.AutoInit();
    };

    const submit = async () => {
      await storeSubscriber(form);
      //toast
      console.log("errors", errors["list"]);

      let hasErrors = errors["list"] != undefined;

      M.toast({
        html:
          errors["list"] != undefined ? errors["list"][0] : "Subscriber added!",
        classes: hasErrors ? "red" : "green",
      });
    };

    return {
      form,
      addField,
      submit,
      errors,
    };
  },
};
</script>
