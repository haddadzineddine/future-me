<template>
    <div class="w-full">
        <div class="px-8 py-6 rounded shadow bg-white">
            <div class="flex mb-6">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 mr-3"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                    />
                </svg>
                <h2>YOUR FUTURE LETTRE</h2>
            </div>
            <form @submit.prevent="submit" class="flex flex-col">
                <textarea
                    v-model="lettre.description"
                    rows="8"
                    class="block p-2 w-full text-sm text-gray-900 rounded border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                    placeholder="Leave a comment..."
                ></textarea>
                <div class="mt-2" v-for="error of $v.description.$errors" :key="error.$uid">
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <h1 v-show="showDate" class="mt-8">DELIVER ON</h1>
                <h1 v-show="!showDate" class="mt-8">DELIVER IN</h1>

                <div class="w-full mt-6">
                    <div class="w-full">
                        <RadioGroup v-model="lettre.deliver_in">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <div class="relative" v-show="showDate">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                                        >
                                            <svg
                                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                        <flat-pickr
                                            placeholder="Select date"
                                            class="border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            v-model="lettre.deliver_on"
                                        ></flat-pickr>
                                    </div>

                                    <RadioGroupOption
                                        class="mr-3"
                                        v-show="!showDate"
                                        as="template"
                                        v-for="date in dates"
                                        :key="date.name"
                                        :value="date"
                                        v-slot="{ active, checked }"
                                    >
                                        <div
                                            :class="[
                                                active
                                                    ? 'ring-2 ring-offset-2  ring-white ring-opacity-60'
                                                    : '',
                                                checked ? 'bg-primary bg-opacity-75 text-white ' : 'bg-white',
                                            ]"
                                            class="flex fle px-6 py-2 rounded shadow-md cursor-pointer focus:outline-none"
                                        >
                                            <div class="text-sm">
                                                <RadioGroupLabel
                                                    as="p"
                                                    :class="checked ? 'text-white' : 'text-gray-900'"
                                                    class="font-medium"
                                                >{{ Year(date) }}</RadioGroupLabel>
                                            </div>
                                        </div>
                                    </RadioGroupOption>
                                </div>

                                <button
                                    @click="toggleDate"
                                    class="text-sm text-primary hover:underline"
                                    type="button"
                                >
                                    <p v-show="!showDate">Choose a date ?</p>
                                    <p v-show="showDate">Choose a duration ?</p>
                                </button>
                            </div>
                        </RadioGroup>
                    </div>
                </div>

                <div
                    v-show="!showDate"
                    class="mt-2"
                    v-for="error of $v.deliver_in.$errors"
                    :key="error.$uid"
                >
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <div
                    v-show="showDate"
                    class="mt-2"
                    v-for="error of $v.deliver_on.$errors"
                    :key="error.$uid"
                >
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <h1 class="mt-8">YOUR EMAIL ADDRESS</h1>
                <div class="relative mt-6 flex">
                    <span class="absolute flex items-center inset-y-0 left-0 pl-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>
                    </span>
                    <input
                        class="block p-2.5 w-full pl-10 py-3 px-4 text-sm text-gray-900 rounded border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                        v-model="lettre.email"
                        type="email"
                        placeholder="Please enter your email"
                    />
                </div>
                <div class="mt-2" v-for="error of $v.email.$errors" :key="error.$uid">
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <button
                    :disabled="!isCompleted"
                    class="w-full mt-8 bg-primary hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-primary rounded"
                >
                    <svg
                        role="status"
                        v-show="!isCompleted"
                        class="inline w-4 h-4 mr-3 text-white animate-spin"
                        viewBox="0 0 100 101"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB"
                        />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor"
                        />
                    </svg>SEND TO THE FUTURE
                </button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { reactive, ref } from 'vue'
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue'
import useVuelidate from '@vuelidate/core'
import { required, email, requiredIf } from '@vuelidate/validators'
import axios from 'axios';
import { createToast } from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css';

import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
const dates = [1, 3, 5]

const isCompleted = ref(true);
const showDate = ref(false);

const Year = (year) => {
    return year == 0 ? year + ' Year' : year + ' Years'
}

    ;
const lettre = reactive({
    deliver_in: dates[0],
    deliver_on: '',
    description: 'Dear FutureMe, \n',
    email: ''
});

const rules = {
    deliver_in: { required: requiredIf(() => !showDate.value) },
    deliver_on: { required: requiredIf(() => showDate.value) },
    description: { required },
    email: { required, email },
}

const $v = useVuelidate(rules, lettre)


const submit = async () => {

    // default choice
    lettre.deliver_at = moment(lettre.deliver_on).format('L');

    if (!showDate.value) {
        lettre.deliver_at = moment().add(lettre.deliver_in, 'years').format('L');
    }


    isCompleted.value = false;

    let result = await $v.value.$validate();

    if (!result) {
        isCompleted.value = true;
        return;
    }


    axios.post('/api/add-lettre', lettre)
        .then(() => {
            success();
            resetForm();
            isCompleted.value = true;
        })
        .catch(() => {
            fail();
            isCompleted.value = true;
        });

}

const success = () => {
    createToast(
        { title: 'Success', description: 'Yes! Your lettre will be devilver on time !' },
        { type: 'success' }
    );
}

const fail = () => {
    createToast(
        { title: 'Fail', description: 'Oops! Something went wrong , try again later.' },
        { type: 'danger' }
    );
}

const resetForm = () => {
    lettre.description = 'Dear FutureMe, \n';
    lettre.email = '';
    lettre.deliver_in = dates[0];
    lettre.deliver_on = '';
    $v.value.$reset()
}



const toggleDate = () => {

    if (showDate.value) {
        lettre.deliver_on = '';
        lettre.deliver_in = dates[0];

    }

    if (!showDate.value) {
        lettre.deliver_in = '';
    }

    showDate.value = !showDate.value;
}
</script>
