<template>
    <div class="w-full">
        <div class="mr-8 px-8 py-6 rounded bg-white">
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
            <form action class="flex flex-col">
                <textarea class="border-2 rounded px-4 py-4" rows="8">Dear FutureMe,
                </textarea>

                <h1 class="mt-8">DELIVER IN</h1>
                <div class="w-full mt-4">
                    <div class="w-full">
                        <RadioGroup v-model="selected">
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
                                            >{{ date.year }}</RadioGroupLabel>
                                        </div>
                                    </div>
                                </RadioGroupOption>
                            </div>
                        </RadioGroup>
                    </div>
                </div>

                <h1 class="mt-8">YOUR EMAIL ADDRESS</h1>
                <div class="relative mt-6 flex">
                    <span class="absolute flex items-center inset-y-0 left-0 pl-2">
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
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>
                    </span>
                    <input
                        type="email"
                        placeholder="Please enter your email"
                        class="w-full rounded pl-10 py-2 border-2 px-4"
                    />
                </div>

                <button
                    class="w-full mt-8 py-3 text-primary rounded border border-primary hover:text-white hover:bg-primary"
                >SEND TO THE FUTURE !</button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue'
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue'

const dates = [
    {
        year: '1 year'
    },
    {
        year: '3 years'
    },
    {
        year: '5 years'
    }
]

const selected = ref(dates[0])
</script>
