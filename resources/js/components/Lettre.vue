<template>
    <div class="px-8 h-full w-full my-12 md:my-0 py-8 rounded shadow bg-white">
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
        <form @submit.prevent="submit">
            <textarea
                v-model="lettre.description"
                rows="8"
                class="block p-2 w-full text-sm text-gray-900 rounded border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                placeholder="Leave a comment..."
            ></textarea>
            <div
                class="mt-2"
                v-for="error of $v.description.$errors"
                :key="error.$uid"
            >
                <div class="error-msg text-sm text-red-500">
                    {{ error.$message }}
                </div>
            </div>

            <h1 class="mt-8">DELIVER IN</h1>

            <div class="flex mt-6">
                <div class="relative w-full">
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
                        v-model="lettre.deliver_at"
                    ></flat-pickr>
                </div>
            </div>

            <div
                class="mt-2"
                v-for="error of $v.deliver_at.$errors"
                :key="error.$uid"
            >
                <div class="error-msg text-sm text-red-500">
                    {{ error.$message }}
                </div>
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
            <div
                class="mt-2"
                v-for="error of $v.email.$errors"
                :key="error.$uid"
            >
                <div class="error-msg text-sm text-red-500">
                    {{ error.$message }}
                </div>
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
                    /></svg
                >SEND TO THE FUTURE
            </button>
        </form>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
import axios from "axios";
import { createToast } from "mosha-vue-toastify";
import flatPickr from "vue-flatpickr-component";

import "mosha-vue-toastify/dist/style.css";
import "flatpickr/dist/flatpickr.css";

const isCompleted = ref(true);

const lettre = reactive({
    deliver_at: "",
    description: "Dear FutureMe, \n",
    email: "",
});

const rules = {
    deliver_at: { required },
    description: { required },
    email: { required, email },
};

const $v = useVuelidate(rules, lettre);

const submit = async () => {
    markAsInComplete();
    let result = await $v.value.$validate();

    if (!result) {
        markAsComplete();
        return;
    }

    lettre.deliver_at = moment(lettre.deliver_at).format("L");

    createLettre("/api/add-lettre", lettre);
};

const createLettre = (url, data) => {
    return new Promise((resolve, reject) => {
        axios
            .post(url, data)
            .then((response) => {
                flashMessage(
                    "Success",
                    "Yes! Your letter will be delivered in the future on " +
                        moment(response.data.lettre.deliver_at).format(
                            "MMM Do YY"
                        ) +
                        ", Just confirm your email address !  😍 ",
                    "success"
                );
                reset();
                resolve();
                markAsComplete();
            })
            .catch(() => {
                flashMessage(
                    "Fail",
                    "Oops! Something went wrong , try again later ...",
                    "danger"
                );
                reject();
                markAsComplete();
            });
    });
};

const markAsComplete = () => (isCompleted.value = true);
const markAsInComplete = () => (isCompleted.value = false);

const flashMessage = (title, description, type) => {
    createToast(
        {
            title: title,
            description: description,
        },
        { type: type }
    );
};

const reset = () => {
    lettre.description = "Dear FutureMe, \n";
    lettre.email = "";
    lettre.deliver_at = "";
    $v.value.$reset();
};
</script>
