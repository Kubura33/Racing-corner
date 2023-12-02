<script setup>
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
const radioType = ref(null);
const form = useForm({
    email : "",
    password: "",
})
const registerForm = useForm({
    name: "",
    lastname: "",
    username: "",
    phone: "",
    email: "",
    password: "",
    password_confirmation: "",
})
const login= () => form.post(route('login'))
const register = () => registerForm.post(route('register'))
</script>

<template>
    <div>
        <form @submit.prevent="radioType" class="login"  style="margin: 20px;">
            <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" @click="radioType=login" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" @click="radioType=register" >Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">E-mail</label>
					<input id="user" type="text" class="input" v-model="form.email">
                    <InputError v-if="form.errors.email" :message="form.errors.email"/>
                </div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" v-model="form.password">

                </div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
                <div class="group">
                    <label for="name" class="label">Name</label>
                    <input id="name" type="text" class="input" v-model="registerForm.name">
                    <InputError v-if="registerForm.errors.name" :message="registerForm.errors.name"/>
                </div>
                <div class="group">
                    <label for="lastname" class="label">Lastname</label>
                    <input id="lastname" type="text" class="input" v-model="registerForm.lastname">
                    <InputError v-if="registerForm.errors.lastname" :message="registerForm.errors.lastname"/>
                </div>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" v-model="registerForm.username">
                    <InputError v-if="registerForm.errors.username" :message="registerForm.errors.username"/>
                </div>
                <div class="group">
                    <label for="user" class="label">Phone</label>
                    <input id="user" type="text" class="input" v-model="registerForm.phone">
                    <InputError v-if="registerForm.errors.phone" :message="registerForm.errors.phone"/>
                </div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" v-model="registerForm.password">
                </div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" v-model="registerForm.password_confirmation">

				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" v-model="registerForm.email">
                    <InputError v-if="registerForm.errors.email" :message="registerForm.errors.email"/>
                </div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" >
				</div>
                <div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>
				<div class="hr"></div>

			</div>
		</div>
	</div>
</div>
        </form>
    </div>
</template>
