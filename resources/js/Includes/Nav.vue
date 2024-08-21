<script setup>
import NavLink from './NavLink.vue';
defineProps({
    title: {
      type: Object
    }
})
</script>
<template>
    <div
        class="w-full h-full py-10 bg-[#181C1F] p-4 shadow-md pointer-events: auto rounded-md"
      >
        <div
          class="container flex items-center justify-between mx-auto my-auto"
        >
          <div
            class="grid w-full md:grid-cols-3 grid-cols-2 lg:grid-cols-5 gap-4"
          >
            <div v-if="$page.props.nav.main" class="w-full flex flex-col" v-for="cat in $page.props.nav.main" :key="cat.id">
              <h3
                class="text-[#EAEAEA] font-inter text-base leading-normal normal-case"
              >
              {{  cat.title }}
              </h3>
              <div class="space-y-6 flex flex-col py-4">
                <NavLink :href="'/segment/' + subcat.slug"  :active="$page.url === '/segment/' + subcat.slug" v-for="subcat in cat.subcategory" :key="subcat.id">
                  {{ subcat.title }}
                </NavLink>

                
              </div>
            </div>
          </div>
        </div>
      </div>
</template>