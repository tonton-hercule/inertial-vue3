<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';

//import "bootstrap/dist/css/bootstrap.min.css";
</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="pagetitle">
      <h1>Tableau de board</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <Link :href="route('dashboard')" class="no-underline">Accueil</Link>
          </li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <Link :href="route('statuts.index')" class="no-underline">
            <div class="card-body">
              <h5 class="card-title">Statuts <span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-eye"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $page.props.statuts }}</h6>
                </div>
              </div>
            </div>
            </Link>

          </div>
        </div><!-- End Sales Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <Link :href="route('publications.index')" class="no-underline">
            <div class="card-body">
              <h5 class="card-title">Parutions <span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-text text-dark"></i>
                </div>
                <div class="ps-3">
                  <h6></h6>
                </div>
              </div>
            </div>
            </Link>

          </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <Link :href="route('roles.index')" class="no-underline">
            <div class="card-body">
              <h5 class="card-title">Rôles <span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-newspaper-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $page.props.roles }}</h6>
                </div>
              </div>
            </div>
            </Link>
          </div>
        </div><!-- End Sales Card -->

      </div>

      <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">
            <Link :href="route('collections.index')" class="no-underline">
            <div class="card-body">
              <h5 class="card-title">Collections<span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-paperclip text-primary"></i>
                </div>
                <div class="ps-3">
                  <h6>0</h6>
                </div>
              </div>
            </div>
            </Link>
          </div>
        </div><!-- End Sales Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <Link :href="route('auteurs.index')" style="text-decoration: none;">
            <div class="card-body">
              <h5 class="card-title">Auteurs <span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bx bxs-user-pin"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $page.props.auteurs }}</h6>
                </div>
              </div>
            </div>
            </Link>

          </div>
        </div><!-- End Sales Card -->
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <Link :href="route('users.index')" class="no-underline">
            <div class="card-body">
              <h5 class="card-title">Utilisateurs <span></span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bx bxs-user-detail"></i>
                </div>
                <div class="ps-3">
                  <h6></h6>
                </div>
              </div>
            </div>
            </Link>

          </div>
        </div><!-- End Sales Card -->

      </div>

    </section>
  </AuthenticatedLayout>
</template>
