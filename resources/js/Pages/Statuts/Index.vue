<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    statuts: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('statuts.destroy', id));
    }
}

</script>

<template>

    <Head title="Statuts" />

    <Authenticated>
        <div class="pagetitle">
            <h1>Paramètres</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <Link :href="route('dashboard')">Accueil</Link>
                    </li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Statuts</a></li>
                    <li class="breadcrumb-item active">Liste des Statuts </li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div v-if="$page.props.flash.message"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">
                    {{ $page.props.flash.message }}
                </span>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des statuts
                                <Link :href="route('statuts.create')" title="Ajouter"><button style="font-size: 5px;"
                                    type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus-circle"
                                        aria-hidden="true" style="font-size: 10px;"></i></button></Link>
                            </h5>
                            <!-- Bordered Table -->
                            <table class="table table-striped table-hover table-bordered data-tables">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Libelle
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(statut, nbre) in statuts" :key="statut.id"
                                        class="">
                                        <th scope="row"
                                            class="">
                                            {{ nbre+1 }}
                                        </th>
                                        <th scope="row"
                                            class="">
                                            {{ statut.libelle }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ statut.description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route(
                                                    'statuts.edit',
                                                    statut.id
                                                )
                                            " class="btn btn-primary"><i class="bi bi-pencil">Modifier</i></Link>
                                            &nbsp;
                                            <Link class="btn btn-danger" @click="destroy(statut.id)">
                                                Supprimer
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Bordered Table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Authenticated>
</template>
