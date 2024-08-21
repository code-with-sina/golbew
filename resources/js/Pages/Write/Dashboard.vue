<script setup>
import write from '../../Layouts/Write.vue';
    defineOptions({ layout : write });
    defineProps({ data: Object })

</script>

<template>

    <Head :title="` ${$page.props.pageTitle}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.props.pageTitle}`" >
    </Head>
    <h1 class="text-3xl text-black pb-6"> {{ $page.props.pageTitle }}</h1>
    <div class="w-full mt-6">
        <div class="bg-white overflow-auto" v-if="data.length > 0">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Summary</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr v-for="item in data" :key="data.id">
                        <td class="w-1/3 text-left py-3 px-4">{{ item.title}}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ item.summary }}</td>
                        <td class="text-left py-3 px-4">{{ item.status }}</td>
                        <td class="text-left py-3 px-4"><Link class="hover:text-blue-500 mx-2" as="button" :href="'edit/' + item.id">Edit</Link> <Link class="hover:text-blue-500" as="button" :href="route('makeUnPublish')" method="post" :data="{ status: 'unpublished', id: item.id }">Demote</Link></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <p v-else class="pt-3 text-gray-600">
            There is no Published Post yet!
        </p>
    </div>
</template>