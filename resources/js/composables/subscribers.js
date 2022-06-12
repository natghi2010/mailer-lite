import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';


export default function useSubscribers() {
    const subscribers = ref([]);
    const subscriber = ref([]);
    const router = useRouter();
    var errors = ref([]);

    const getSubscriber = async (id) => {
        let response = await axios.get('/api/v1/subscribers/' + id);
        subscriber.value = response.data;
    }

    const getSubscriberFields = async (id) => {
        let response = await axios.get('/api/v1/subscribers/' + id + '/fields');
        console.log("response", response.data);
        subscriber.value.fields = response.data;
    }

    const getSubscribers = async () => {
        let response = await axios.get('/api/v1/subscribers');
        subscribers.value = response.data;
    }

    const deleteSubscriber = async (id) => {
        await axios.delete('/api/v1/subscribers/' + id);
        await getSubscribers();
    }



    const deleteField = async (id) => {
        try {
            await axios.delete('/api/v1/fields/' + id);
            await getSubscriberFields(subscriber.value.id);
        } catch (error) {
            errors["list"].push("Something went wrong. Please try again later.");
        }
    }


    const storeSubscriber = async (data) => {
        errors["list"] = [];
        try {
            await axios.post('/api/v1/subscribers/', data);
            router.push({ name: 'subscribers.index' })
        } catch (error) {
            if (error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors["list"].push(error.response.data.errors[key]);
                }
            } else {
                errors["list"].push("Something went wrong. Please try again later.");
            }

        }
    };

    const updateSubscriber = async (id,data) => {
        errors["list"] = [];
        try {
            await axios.put('/api/v1/subscribers/' + id, data);
        } catch (error) {
            if (error.response.status === 422) {
                for (const key in error.response.data.errors) {
                    errors["list"].push(error.response.data.errors[key]);
                }
            } else {
                errors["list"].push("Something went wrong. Please try again later.");
            }

        }
    }

    const addField = () => {
        subscriber.value.fields.push({
            title: "",
            type: ""
        });
    }

    return {
        subscriber,
        subscribers,
        getSubscriber,
        getSubscribers,
        updateSubscriber,
        deleteSubscriber,
        deleteField,
        storeSubscriber,
        addField,
        errors
    }
}
