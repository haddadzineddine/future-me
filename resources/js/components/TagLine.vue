<template>
    <div class="mr-8 w-full flex flex-col justify-between">
        <div class="my-8 space-y-16">
            <h1 class="text-6xl text-white font-bold">
                Write a letter to the future
            </h1>
            <div class="text-white">
                <p class="text-2xl">
                    "I love this. I've sent myself 5 letters so far and every
                    year it's a surprise. Because I forget so easily. It turns
                    into such a deep reflective process, that I usually weep and
                    laugh while I write."
                </p>
                <p class="mt-8">
                    <i>- Haddad Zineddine</i>
                </p>
            </div>
        </div>
        <div class="flex items-center space-x-2 text-white">
            <img
                class="w-10 h-10 p-1 rounded-full ring-2 ring-blue-300 dark:ring-blue-500"
                :src="zineddine"
                alt="Bordered avatar"
            />
            <span>
                Created by
                <a href="https://zineddine.netlify.com/" class="underline"
                    >HADDAD ZINEDDINE</a
                >
            </span>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                />
            </svg>
        </div>
    </div>
</template>

<script setup>
import zineddine from "../images/zineddine.jpg";
</script>
