<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
        <Head title="Reset Password" />
    <div style="height: 600px; display: flex; align-items: center; justify-content: center; justify-items: center;">


    <form @submit.prevent="submit" style="width: 500px;">
        <div class="form-group">
            <label for="email">Email address</label>
            <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="lozinka">Nova lozinka</label>
            <input v-model="form.password" type="password" class="form-control" id="lozinka" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="potvrdi">Potvrdite lozinku</label>
            <input type="password" v-model="form.password_confirmation" class="form-control" id="potvrdi" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary" :disabled="form.processing">Submit</button>
    </form>
    </div>

</template>
