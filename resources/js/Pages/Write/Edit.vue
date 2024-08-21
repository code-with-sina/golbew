<script setup>
import write from '../../Layouts/Write.vue';
import Editor from '../../Components/Editor.vue';
import Tags from '../../Components/Tags.vue';
import { useForm } from '@inertiajs/vue3';
defineOptions({ layout : write });
const incoming = defineProps({ subcat: Object, data: Object })
const form = useForm({
    title: incoming.data.title || null,
    meta_title: incoming.data.meta_title || null , 
    subcategory: incoming.data.subcategory_id || null,
    image: incoming.data.image || null,
    content: incoming.data.content || '',
    summary: incoming.data.summary || '',

});

const getImage = (event) => {
    form.image = event.target.files[0];
};

const submit = () => {
    form.post(route("posts.update", incoming.data.id), {
        onError: (errors) =>  console.log(errors),
        onSuccess: () => form.reset("title", "meta_title", "subcategory",  "image", "content", "summary")
    });
}
</script>
<template>
    <Head :title="` ${$page.props.pageTitle}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.props.pageTitle}`" >
    </Head>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-5/6 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Edit Blog
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" @submit.prevent="submit" >
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Post Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.title"  type="text"  placeholder="Topic" aria-label="Topic">
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Post Meta Title</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-14" v-model="form.meta_title" type="text"  placeholder="Meta title" aria-label="Meta Title">
                    </div>
                    <div class="w-full">
                        <div class="inline-block mt-2 w-1/2 pr-1">
                            <label class="hidden block text-sm text-gray-600" for="post_category">Post Category</label>
                            <select v-if="subcat" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded h-14" v-model="form.subcategory"  placeholder="Post Category" >
                                <option v-for="item in subcat"  :key="subcat.id" :value="item.id">{{ item.title }}</option>
                            </select>
                        </div>

                        <div class="inline-block mt-2 -mx-1 pl-3 w-1/2">
                            <label class="hidden block text-sm text-gray-600" for="Featured_image">Featured image</label>
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" type="file"  @change="getImage" placeholder="Featured image" aria-label="Featured_image">
                        </div>
                    </div>
                    
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">Content</label>
                        <Editor v-model="form.content" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54" />
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">Summary</label>
                        <textarea v-model="form.summary" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54" > </textarea>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>