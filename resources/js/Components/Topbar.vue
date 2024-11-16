<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
</script>

<template>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <Link :href="route('dashboard')" class="logo d-flex align-items-center no-underline"><img
                src="/images/logo-digiweb.png" alt="" />
            <span class="d-none d-lg-block">DGBOOK</span></Link>

            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{$page.props.auth.user.fullname}}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6></h6>
                            <!--<span>Web Designer</span>-->
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Se déconnecter
                            </DropdownLink>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
                <!---->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
</template>
