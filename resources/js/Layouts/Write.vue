<script setup>
    // import '../../css/dashboard/styles.css';
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { ref } from 'vue';


    const isOpen = ref(false);
    const isMobileMenuOpen = ref(false);

    const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
    };

    const closeDropdown = () => {
    isOpen.value = false;
    };

    const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
    };


</script>
<template>

<div class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <Link :href="route('home')" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Ratefy </Link>
            <Link  :href="route('createblog')" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Create Blog
            </Link>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <Link :href="route('dashboard')" class="flex items-center active-nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Published
            </Link>
            <Link :href="route('unpublished')"class="flex items-center  text-white py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Unpubliched
            </Link>
            <Link :href="route('category')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Category
            </Link>
            <Link :href="route('subcategory')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Sub Category
            </Link>
            <Link :href="route('tags')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tags
            </Link>
            <Link :href="route('subscribers')" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Subscribers
            </Link>
        </nav>
        <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
           Logout Out
        </Link>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2">
                <span v-if="$page.props.auth.user">Welcome <b>{{ $page.props.auth.user.name }}</b> </span>
            </div>
            <div class="relative w-1/2 flex justify-end">
            <button @click="toggleDropdown" class="relative z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img :src="'/favicon/apple-touch-icon.png'" alt="User Avatar">
            </button>
            <button v-if="isOpen" @click="closeDropdown" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div v-if="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <Link href="#" class="block px-4 py-2 account-link hover:text-white">Profile</Link>
                <Link href="#" class="block px-4 py-2 account-link hover:text-white">Notification</Link>
                <Link  v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button" class="block px-4 py-2 account-link hover:text-white">Sign Out</Link>
            </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
            <Link :href="route('home')" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Ratefy</Link>
            <button @click="toggleMobileMenu" class="text-white text-3xl focus:outline-none">
                <i v-if="!isMobileMenuOpen" class="fas fa-bars"></i>
                <i v-else class="fas fa-times"></i>
            </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isMobileMenuOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <Link :href="route('dashboard')" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Published
            </Link>
            <Link :href="route('dashboard')" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Unpubliched
            </Link>
            <Link :href="route('unpublished')" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-table mr-3"></i>
                Category
            </Link>
            <Link :href="route('subcategory')" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Sub Category
            </Link>
            <Link :href="route('tags')" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tags
            </Link>
            <Link :href="route('subscribers')" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Subscribers
            </Link>
            
            <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </Link>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
            </button>
            </nav>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <slot />

            </main>
    
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="#" class="underline">Ratefy Blog</a>.
            </footer>
        </div>
        
    </div>
</div>    
   
</template>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
.bg-sidebar {
  background: #3d68ff;
}
.cta-btn {
  color: #3d68ff;
}
.active-nav-link {
  background: #1947ee;
}
.nav-item:hover {
  background: #1947ee;
}
.account-link:hover {
  background: #3d68ff;
}
</style>
