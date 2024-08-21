<script setup>
    const model = defineModel({
        type: null,
        required: true
    });

    defineProps({
        placeholder: {
            type: String,
            required: true
        },
        type: {
            type: String, 
            default: 'text'
        },
        message: String
    })
</script>
<template>
    <div class="mb-[22px]">
        <input :type="type" :placeholder="placeholder" v-model="model" 
            :class="{'!ring-red-500' : message}" 
            class="w-full px-5 py-3 text-base transition bg-transparent border rounded-md outline-none border-stroke dark:border-dark-3 text-body-color dark:text-dark-6 placeholder:text-dark-6 focus:border-primary dark:focus:border-primary focus-visible:shadow-none" />
        <small class="text-red-500" v-if="message">{{ message }}</small>
    </div>
</template>