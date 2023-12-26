<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <form @submit.prevent="submit" action="" style="display: flex; flex-direction: row; align-items: center; justify-content: center; justify-items: center; height: 100vh;">
    <div class="card text-center" style="width: 500px; height: 500px;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
        <div class="card-body px-5">
            <p class="card-text py-2" style="margin-top: 15%;">
                Unesite vas e-mail a mi cemo vam poslati link za resetovanje lozinke.
            </p>
            <div class="form-outline">
                <label class="form-label" for="typeEmail">Email input</label>
                <input v-model="form.email" type="email" id="typeEmail" class="form-control my-3" />

            </div>
            <p>{{status}}</p>
            <p v-if="form.processing">Molimo sacekajte, link se salje na vasu e-mail adresu :)</p>
            <div class="alert alert-danger" v-if="form.errors.email">{{form.errors.email}}</div>
            <button @submit.prevent="submit" class="btn btn-primary w-100" :disabled="form.processing">Reset password</button>

        </div>
    </div>
    </form>
</template>
