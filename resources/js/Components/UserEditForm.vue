<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps(
    {
        user : Object,
        updateRoute : String
    }
)
const editForm = useForm(
    {
        name : props.user.name,
        lastname : props.user.lastname,
        username : props.user.username,
        email : props.user.email,
        phone : props.user.phone,

    }
)
const page = usePage()
const auth = computed(() => page.props.auth.user)
const update = () => editForm.put(route(props.updateRoute, {id : props.user.id}))
</script>
<template>

    <div class="profil-info">
        <h3>Vaši podaci</h3>
        <div class="mb-3">



            <label for="ime" class="form-label">Ime</label>
            <input v-model="editForm.name" class="form-control" id="ime" type="text" placeholder="Ime" aria-label="default input example">
            <label for="prezime" class="form-label">Prezime</label>
            <input v-model="editForm.lastname" class="form-control" type="text" id="prezime" placeholder="Prezime" aria-label="default input example">
            <label for="korime" class="form-label" >Korisnicko ime</label>
            <input v-model="editForm.username" class="form-control" type="text" placeholder="Korisnicko ime" id="korime" aria-label="default input example">
            <label for="phone" class="form-label">Broj telefona</label>
            <input v-model="editForm.phone" class="form-control" type="text" placeholder="Telefon" id="phone" aria-label="default input example">
            <label for="email" class="form-label">Email address</label>
            <input v-model="editForm.email" type="email" class="form-control" id="email" placeholder="name@example.com">

            <div v-show="auth.role!=2">

                <label for="pass1" class="form-label">Stara lozinka</label>
            <input type="password" class="form-control" id="pass1" placeholder="Old password">
            <label for="pass2" class="form-label">Nova lozinka</label>
            <input type="password" class="form-control" id="pass2" placeholder="New password">
            </div>
                <button type="button" class="btn btn-success" style="margin-top: 30px;" @click="update">Update</button>

        </div>

    </div>


</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    layout: AdminLayout
}
</script>
