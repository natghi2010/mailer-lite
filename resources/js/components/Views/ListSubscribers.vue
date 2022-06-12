<template>
  <div>
    <h5>Subscribers</h5>
    <router-link to="/subscribers/create" class="btn-small green"
      >Add Subscriber
    </router-link>

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>State</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="subscribers.length == 0">
          <td class="center" colspan="4">No Subscribers yet :(</td>
        </tr>
        <tr v-for="subscriber in subscribers" :key="subscriber.id">
          <td>{{ subscriber.name }}</td>
          <td>{{ subscriber.email }}</td>
          <td>{{ subscriber.state }}</td>
          <td>
            <router-link :to="`/subscribers/${subscriber.id}/edit`" class="btn btn-small waves-effect waves-light orange"
              >Edit</router-link
            >
            &nbsp;
            <button
              @click.prevent="removeSubscriber(subscriber.id)"
              class="btn btn-small waves-effect waves-light red"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
import { onMounted } from "@vue/runtime-core";
import useSubscribers from "../../composables/subscribers";
import M from "materialize-css";
export default {
  setup() {
    const { subscribers, getSubscribers, deleteSubscriber } = useSubscribers();

    onMounted(getSubscribers);

    const removeSubscriber = async (id) => {
      if (!confirm("Are you sure you want to delete this subscriber?")) {
        return;
      }

      //  M.toast({html: 'Deleting subscriber...', classes: 'rounded', displayLength: 1500});
      await deleteSubscriber(id);
      M.toast({
        html: "Subscriber deleted successfully",
        classes: "rounded green",
        displayLength: 1500,
      });
    };

    return {
      subscribers,
      deleteSubscriber,
      removeSubscriber,
    };
  },
};
</script>

<style scoped>
table {
  margin-top: 15px;
}
</style>
