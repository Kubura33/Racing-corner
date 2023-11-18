<script setup>
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
const form = useForm({
    email : "",
    password: "",
})
const login= () => form.post(route('login'))
</script>

<template>
    <div>
        <form class="login" @submit.prevent="login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" v-model="form.email" aria-describedby="emailHelp" placeholder="Email">
                <InputError v-if="form.errors.email" :message="form.errors.email" />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form.password">


            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
