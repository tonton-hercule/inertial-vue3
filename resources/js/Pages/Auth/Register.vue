<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    nom: '',
    prenoms: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit" style="width: 100%;">
            
            <div>
                <InputLabel for="name" value="Nom" />
                <TextInput id="nom" type="text" class="mt-1 block w-full" v-model="form.nom" required autofocus autocomplete="nom" />
                <InputError class="mt-2" :message="form.errors.nom" />
            </div>

            <div class="mt-4">
                <InputLabel for="name" value="Prénoms" />
                <TextInput id="prenoms" type="text" class="mt-1 block w-full" v-model="form.prenoms" required autofocus autocomplete="prenoms" />
                <InputError class="mt-2" :message="form.errors.prenoms" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="email" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Mot de passe" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmer mot de passe" />
                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="password_confirmation" />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center" style="width: 100%">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    S'inscrire
                </PrimaryButton>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="text-sm text-gray-600">
                    Vous avez un compte ?
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
