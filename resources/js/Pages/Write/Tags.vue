<script setup>
import write from '../../Layouts/Write.vue';
    defineOptions({ layout : write });
    defineProps({ data: Object })
</script>
<template>
    <Head :title="` ${$page.props.pageTitle}`">
        <meta head-key="description" name="description" :content="`Hello wworld it is the ${$page.props.pageTitle}`" >
    </Head>

    <h1 class="text-3xl text-black pb-6">{{  $page.props.pageTitle  }}</h1>

    <div class="w-full mt-6">
        <div class="bg-white overflow-auto" v-if="data.length > 0">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Keywords</th>

                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">created</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr v-for="item in data" :key="data.id">
                        <td class="w-1/3 text-left py-3 px-4">{{ item.keywords }}</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ new Date(item.created_at).toLocaleString() }}</a></td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">Action</a></td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <p v-else class="pt-3 text-gray-600">
            There are no keywords yet
        </p>
    </div>
</template>