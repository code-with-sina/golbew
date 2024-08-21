<script setup>
defineProps({ cat: Object})



</script>
<template>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white" v-if="cat">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Meta Title</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Slug</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Content</th>
                </tr>
            </thead>
            <tbody class="text-gray-700" >
                <tr v-for="item in cat" :key="cat.id" class="bg-gray-200">
                    <td class="w-1/3 text-left py-3 px-4">{{ item.title }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ item.meta_title }}</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ item.slug }}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ item.content }}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>