<script setup>
import write from '../../Layouts/Write.vue';
import CategoryData from '../../Components/data/TableData.vue';
import { useForm } from '@inertiajs/vue3';

defineOptions({ layout : write });

const form = useForm({
    title: null,
    meta_title: null,
    content: null
})

const submit = () => {
    form.post(route('createCategory'), {
        onError: () => form.reset("title", "content", "meta_title"),
        onSuccess: () => form.reset("title", "content", "meta_title")
    })
}

</script>
<template>
    <Head :title="` ${$page.props.pageTitle}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.props.pageTitle}`" >
    </Head>

    <h1 class="text-3xl text-black pb-6">Category</h1>

    <div class="w-full mt-6">
        <CategoryData :cat="$page.props.data" />
        <div class="w-full lg:w-5/6 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Create Category
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" @submit.prevent="submit">
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.title"  type="text" required placeholder="Topic" aria-label="Topic">
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Meta Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.meta_title"  type="text" required placeholder="Topic" aria-label="Topic">
                    </div>                            
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">Description</label>
                        <textarea  class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54" v-model="form.content" required > </textarea>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="pt-3 text-gray-600">
            Source: <a class="underline" href="https://tailwindcomponents.com/component/striped-table">https://tailwindcomponents.com/component/striped-table</a>
        </p>
    </div>
</template>