<script setup>
import { Inertia } from '@inertiajs/inertia';
</script>

<template>
    <div v-if="$page.props.success.message">
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{$page.props.success.message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</template>