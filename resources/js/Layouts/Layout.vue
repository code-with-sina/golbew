<script setup>
    import Header from '../Includes/Header.vue';
    import Footer from '../Includes/Footer.vue';
</script>
<template>
    <main class="p-0 m-0">
        <Header />
            <slot />
        <Footer />
    </main>
</template>