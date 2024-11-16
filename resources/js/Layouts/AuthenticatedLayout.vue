<script setup>
import { ref } from 'vue';
import SidebarVue from '@/Components/Sidebar.vue';
import TopbarVue from '@/Components/Topbar.vue';
import FooterAdminVue from '@/Components/FooterAdmin.vue';

const showingNavigationDropdown = ref(false);

</script>

<template>
    <SidebarVue />
    <TopbarVue />
    <main id="main" class="main">
        <slot />
    </main>
        <FooterAdminVue /> 
</template>
