<script setup>
import write from '../../Layouts/Write.vue';
import { useForm } from '@inertiajs/vue3';
import SubCategoryData from '../../Components/data/TableData.vue';
defineOptions({ layout : write });
defineProps({
    cats: Object,
    data: Object
});

const form = useForm({
    cat: null,
    title: null,
    meta_title: null,
    slug: null,
    content: null
});


const submit = () => {
    form.post(route('createSubCategory'), {
        onError: () => form.reset("title", "content", "meta_title"),
        onSuccess: () => form.reset("title", "content", "meta_title")
    });
}

</script>
<template>
    <Head :title="` ${$page.props.pageTitle}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.props.pageTitle}`" >
    </Head>
    <h1 class="text-3xl text-black pb-6">Subcategory</h1>
    <div class="w-full mt-6">
        <SubCategoryData :cat="data" />
        <div class="w-full lg:w-5/6 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Create SubCategory
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" @submit.prevent="submit">
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class="hidden block text-sm text-gray-600" for="post_category">Post Category</label>
                        <select v-if="cats"  class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded h-14" v-model="form.cat"  required="" placeholder="Post Category" >
                           
                            <option  v-for="item in cats"  :key="cats.id" :value="item.id" >{{ item.title }}</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.title"  type="text" required="" placeholder="Title" aria-label="Topic">
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Meta Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.meta_title"  type="text" required="" placeholder="Meta Title" aria-label="Topic">
                    </div>
                            
                
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">Description</label>
                        <textarea  class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54" v-model="form.content" > </textarea>
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