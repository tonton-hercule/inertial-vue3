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
                    <li class="breadcrumb-item"><Link :href="route('dashboard')">Accueil</Link></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Statuts</a></li>
                    <li class="breadcrumb-item active">Liste des Statuts </li>
                </ol>
            </nav>
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div v-if="$page.props.flash.message"
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">
                        {{ $page.props.flash.message }}
                    </span>
                </div>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('statuts.create')">
                            <BreezeButton>Ajouter un Statuts</BreezeButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
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
                                    <tr v-for="statut in statuts" :key="statut.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ statut.id }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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
                                            " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Modifier</Link>
                                            &nbsp;
                                            <BreezeButton class="bg-red-700" @click="destroy(statut.id)">
                                                Supprimer
                                            </BreezeButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Authenticated>
</template>
