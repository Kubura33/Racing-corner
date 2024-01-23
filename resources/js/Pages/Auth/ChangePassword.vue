<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const updatePasswordForm = useForm({
    current_password : '',
    password: '',
    password_confirmation: "",
})
const submit = () => updatePasswordForm.put(route('password.update'))
</script>
<template>
    <div style="height: 600px; display: flex; align-items: center; justify-content: center; justify-items: center;">
    <form @submit.prevent="submit" style="width: 500px;">

        <div class="form-group">
            <label for="lozinka">Stara lozinka</label>
            <input type="password" v-model="updatePasswordForm.current_password" class="form-control" id="lozinka" placeholder="Password">
            <InputError v-if="updatePasswordForm.errors.current_password" :message="updatePasswordForm.errors.current_password"/>
        </div>
        <div class="form-group">
            <label for="nova_lozinka">Nova lozinka</label>
            <input type="password" v-model="updatePasswordForm.password" class="form-control" id="nova_lozinka" placeholder="Password">
            <InputError v-if="updatePasswordForm.errors.password" :message="updatePasswordForm.errors.password"/>

        </div>
        <div class="form-group">
            <label for="potvrdi">Potrvdite novu lozinka</label>
            <input type="password" v-model="updatePasswordForm.password_confirmation" class="form-control" id="potvrdi" placeholder="Password">
            <InputError v-if="updatePasswordForm.errors.password_confirmation" :message="updatePasswordForm.errors.password_confirmation"/>

        </div>
        <div style="margin-top: 15px; display: flex;flex-direction: row;align-items: center;justify-content: center;">
            <button type="submit" class="btn btn-primary" style="width: 200px;" :disabled="updatePasswordForm.processing">Submit</button>
        </div>

    </form>
    </div>
</template>

