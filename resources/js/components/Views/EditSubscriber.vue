<template>
  <div>
    <router-link to="/" class="btn-small green">Back</router-link>

    <div class="wrapper">
      <!-- <form class="col s12"> -->

      <PageSubheader text="Basic Information" color="blue" />
      <div class="row">
        <div class="input-field col s6">
          <input
            id="name"
            type="text"
            class="validate valid"
            v-model="subscriber.name"
          />
          <label for="name" class="active">Name</label>
        </div>

        <div class="input-field col s6">
          <input
            id="email"
            type="text"
            class="validate"
            v-model="subscriber.email"
          />
          <label for="email" class="active">Email</label>
        </div>

        <div class="row">
          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="active"
              checked
              v-model="subscriber.state"
            />
            <span>active</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="unsubscribed"
              checked
              v-model="subscriber.state"
            />
            <span>unsubscribed</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="junk"
              checked
              v-model="subscriber.state"
            />
            <span>junk</span>
          </label>

          <label class="col s2">
            <input
              name="group1"
              type="radio"
              value="bounced"
              checked
              v-model="subscriber.state"
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
              v-model="subscriber.state"
            />
            <span>unconfirmed</span>
          </label>
        </div>

        <PageSubheader text="Fields" />

        <div
          class="row"
          v-for="(field, index) in subscriber.fields"
          :key="index"
        >
          <div class="input-field col s6">
            <input
              id="title"
              type="text"
              class="validate"
              v-model="field.title"
            />
            <label for="title" class="active">Title </label>
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
            <!-- Check if its the last loop -->
            <button @click.prevent="remove(field.id)" class="btn red">-</button>
            <button
              v-if="index == subscriber.fields.length - 1"
              @click.prevent="addMore"
              class="btn blue"
            >
              +
            </button>
          </div>
        </div>

        <div align="center">
          <button @click.prevent="update" class="btn green">
            Update Subscriber
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
  props: {
    id: {
      type: String,
      required: true,
    },
  },
  components: {
    PageSubheader,
  },
  setup(props) {
    const {
      errors,
      subscriber,
      getSubscriber,
      updateSubscriber,
      addField,
      deleteField,
    } = useSubscribers(props.id);

    onMounted(() => {
      getSubscriber(props.id);
      M.AutoInit();
    });

    const addMore = () => {
      addField();
    };

    const update = async () => {
      await updateSubscriber(subscriber);

      console.log(errors);

      M.toast({
        html:
          errors["list"].length > 0 ? errors["list"][0] : "Subscriber Updated!",
        classes: "green",
      });
    };

    const remove = async (id) => {
      await deleteField(id);
      M.toast({
        html: "Field removed",
        classes: "red",
      });
    };

    return {
      subscriber,
      getSubscriber,
      update,
      addMore,
      remove,
    };
  },
};
</script>
