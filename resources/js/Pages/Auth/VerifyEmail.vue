<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
        <div style="height: 700px; display: flex;flex-direction: column; gap: 2rem; align-items: center;justify-content: center;justify-items: center">
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Molimo vas da verifikujete svoj email!
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            Novi verifikacioni link je poslat na vasu email adresu koju ste uneli prilikom registracije.
        </div>

        <form @submit.prevent="submit">
            <div style="display: flex;flex-direction: column;gap: 2em;">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="btn btn-danger"
                    >Log Out</Link
                >
            </div>
        </form>
    </div>
</template>
