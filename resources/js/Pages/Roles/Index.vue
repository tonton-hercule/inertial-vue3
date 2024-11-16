<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

const props = defineProps({
    roles: {
        type: Object,
        default: () => ({}),
    },
});
const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('roles.destroy', id));
    }
}

</script>

<template>

    <Head title="Roles utilisateurs" />

    <Authenticated>
        <div class="pagetitle">
            <h1>Paramètres</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><Link :href="route('dashboard')">Accueil</Link></li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none;">Rôles</a></li>
                    <li class="breadcrumb-item active">Liste des rôles </li>
                </ol>
            </nav>
        </div>

        <div class="py-1">
            <div class="mx-auto">
                
                    <FlashMessage></FlashMessage>
                
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('roles.create')">
                            <BreezeButton>Ajouter un rôle</BreezeButton>
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
                                    <tr v-for="role in roles" :key="role.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ role.id }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ role.libelle }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ role.description }}
                                        </td>


                                        <td class="px-6 py-4">
                                            <Link :href="
                                                route(
                                                    'roles.edit',
                                                    role.id
                                                )
                                            " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Modifier</Link>
                                            &nbsp;
                                            <BreezeButton class="bg-red-700" @click="destroy(role.id)">
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
