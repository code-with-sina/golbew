<script setup>
    defineProps({
        active: {
            type:  Boolean
        }
    })

</script>
<template>
<Link
        preserve-scroll
        class="text-[#AFB5C0] font-inter  text-base leading-normal normal-case"
        :class="{'font-bold': active }"
    > 
    <slot />
</Link>

</template>