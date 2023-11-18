<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: "",
    lastname: "",
    username: "",
    phone: "",
    email: "",
    password: "",
    password_confirmation: "",

})
console.log(form.errors.name)
const register = () => form.post(route('register'))
</script>

<template>
    <div>
        <form @submit.prevent="register" class="login">
            <div class="mb-3">

                <label for="name" class="form-label">Ime</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" v-model="form.name" placeholder="Name">
                <InputError v-if="form.errors.name" :message="form.errors.name"/>                <label for="lastname" class="form-label" >Prezime</label>
                <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" v-model="form.lastname"  placeholder="Lastname">
                <InputError v-if="form.errors.lastname" :message="form.errors.lastname"/>                <label for="korime" class="form-label" >Korisnicko ime</label>
                <input type="text" class="form-control" id="korime" aria-describedby="emailHelp" v-model="form.username"  placeholder="Username">
                <InputError v-if="form.errors.username" :message="form.errors.username"/>                <label for="number" class="form-label">Broj telefona</label>
                <input type="text" class="form-control" id="number" aria-describedby="emailHelp" v-model="form.phone"  placeholder="Phone number">
                <InputError v-if="form.errors.phone" :message="form.errors.phone"/>                <label for="exampleInputEmail1" class="form-label" >Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="form.email"  placeholder="Email">
                <InputError v-if="form.errors.email" :message="form.errors.email"/>            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form.password" >
                <InputError v-if="form.errors.password" :message="form.errors.password"/>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label" >Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation"  placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
