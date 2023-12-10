<script setup>

import UserEditForm from "@/Components/UserEditForm.vue";
defineProps(
    {
        user : Object
    }
)
const string = "users.update"
</script>
<template>
<UserEditForm :user="user" :route="string"></UserEditForm>



</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    layout: AdminLayout
}
</script>
