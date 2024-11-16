<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Connexion" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Authentification</h5>
            <p class="text-center small">Entrez votre nom d'utilisateur et votre mot de
                passe pour vous connecter</p>
        </div>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Mot de passe" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <!--<div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>-->

            <div class="row mt-4">
                <div class="col-12 text-center">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="width: 100%">
                    Connexion
                </PrimaryButton>
                </div>
            </div>
            <hr>
            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-600"
                    style="text-decoration: none;">
                Mot de passe oublié ?
                </Link>
                <span style="float: right;">Vous n'avez pas de compte ? <Link :href="route('register')" class="text-sm text-gray-600"
                    style="text-decoration: none;">
                S'inscrire
                </Link></span>
            </div>
        </form>
    </GuestLayout>
</template>
