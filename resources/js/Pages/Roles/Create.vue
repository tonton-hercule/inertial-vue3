<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    roles: {
        type: Object,
        default: () => ({}),
    },
});


const form = useForm({
    libelle: '',
    description: ''
    
});

const submit = () => {
    form.post(route("roles.store"));
};
</script>

<template>
    <Head title="Ajouter un role" />

    <BreezeAuthenticatedLayout>
        <div class="pagetitle">
            <h1>Paramètres</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><NavLink :href="route('dashboard')">Accueil</NavLink></li>
                    <li class="breadcrumb-item"><NavLink :href="route('roles.index')" style="text-decoration: none;">Rôles</NavLink></li>
                    <li class="breadcrumb-item active">Ajouter un rôle </li>
                </ol>
            </nav>
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Libelle</label
                                >
                                <input
                                    type="text"
                                    v-model="form.libelle"
                                    name="libelle"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                    required
                                />
                                <div
                                    v-if="form.errors.libelle"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.libelle }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="slug"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Description</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.description"
                                    name="description"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.description"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Valider
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>