<template>
    <div class="w-full">
        <div class="mr-8 px-8 py-6 rounded shadow bg-white">
            <div class="flex justify-between mb-6">
                <h2>YOUR FUTURE LETTRE</h2>
                <button class="flex space-x-3">
                    <p>FULL SCREEN</p>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"
                        />
                    </svg>
                </button>
            </div>
            <form @submit.prevent="submit" class="flex flex-col">
                <textarea
                    v-model="lettre.description"
                    class="border-2 focus:outline-primary rounded px-4 py-4"
                    rows="8"
                ></textarea>
                <div class="mt-2" v-for="error of $v.description.$errors" :key="error.$uid">
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <h1 class="mt-8">DELIVER IN</h1>
                <div class="w-full mt-4">
                    <div class="w-full">
                        <RadioGroup v-model="lettre.deliver_in">
                            <div class="space-x-3 flex">
                                <RadioGroupOption
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
                        </RadioGroup>
                    </div>
                </div>
                <div class="mt-2" v-for="error of $v.deliver_in.$errors" :key="error.$uid">
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
                        v-model="lettre.email"
                        type="email"
                        placeholder="Please enter your email"
                        class="w-full focus:outline-primary rounded pl-10 py-2 border-2 px-4"
                    />
                </div>
                <div class="mt-2" v-for="error of $v.email.$errors" :key="error.$uid">
                    <div class="error-msg text-sm text-red-500">{{ error.$message }}</div>
                </div>

                <button
                    class="w-full mt-6 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                >SEND TO THE FUTURE</button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { reactive } from 'vue'
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue'
import useVuelidate from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
import axios from 'axios';
import { createToast } from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css';



const dates = [1, 3, 5]


const Year = (year) => {
    return year == 1 ? year + ' Year' : year + ' Years'
}

    ;
const lettre = reactive({
    deliver_in: dates[0],
    description: 'Dear FutureMe, \n',
    email: ''
});

const rules = {
    deliver_in: { required },
    description: { required },
    email: { required, email },
}

const $v = useVuelidate(rules, lettre)


const submit = async () => {

    let result = await $v.value.$validate();

    if (!result) {
        return;
    }

    axios.post('/api/add-lettre', lettre)
        .then(() => {
            success();
        })
        .catch(() => {
            fail();
        });

    resetForm();
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
    $v.value.$reset()
}

</script>
