<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
import "bootstrap/dist/css/bootstrap.min.css";
</script>

<template>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flexx flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <div>
                                    <Link href="/">
                                    <ApplicationLogo class="logo d-flex align-items-center w-auto" />
                                    </Link>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">                                    
                                    <div class="">
                                        <slot />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>
