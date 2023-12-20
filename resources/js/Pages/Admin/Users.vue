<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps(
    {
        users : Array
    }
)


</script>
<template >
<div style="padding: 1%;">
    <table class="table table-primary" id="adminTable" v-if="users?.length">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ime</th>
            <th scope="col">Prezime</th>
            <th scope="col">Username</th>
            <th scope="col">Telefon</th>
            <th scope="col">Premium(Da/ne)</th>
            <th scope="col">E-mail</th>
            <th scope="col">Akcija 1</th>
            <th scope="col">Akcija 2</th>
            <th scope="col">Akcija 3</th>





        </tr>
        </thead>
        <tbody>
        <tr  v-for="user in users" :key="user?.id">
            <th scope="row">{{user?.id}}</th>
            <td>{{ user?.name }}</td>
            <td>{{ user?.lastname }}</td>
            <td>{{ user?.username }}</td>
            <td>{{ user?.phone }}</td>
            <td>{{ user?.role === '1' ? 'DA' : 'NE' }}</td>
            <td> {{ user?.email }}</td>
            <td><Link v-if="user" :href="route('users.edit', {user : user?.id})" class="btn btn-warning">Edit</Link></td>
            <td><Link v-if="user" :href="route('users.destroy', {user : user?.id})" method="delete" as="button" class="btn btn-danger">Obrisi nalog</Link></td>
            <td><Link v-if="user"  :href="route('set-user-to-premium', {user : user?.id})" method="put" as="button" class="btn btn-success" preserve-state>Aktiviraj/Deaktiviraj premium</Link></td>


        </tr>
        </tbody>
    </table>
</div>

</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    layout: AdminLayout,

}
</script>

