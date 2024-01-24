<script setup>
import {useForm, Link} from "@inertiajs/vue3";
import {ref, computed, onMounted} from "vue";


const props = defineProps({
    user: {
        type: Object,
        required: true,
    }
})
const editForm = useForm({
    name: props.user.name ?? "",
    lastname: props.user.lastname ?? "",
    username: props.user.username ?? "",
    phone: props.user.phone ?? "",
    followNotifications: props.user.user_setting.receive_follow_notifications === 1 ?? false,
    emailNotifications: props.user.user_setting.receive_notifications_via_email === 1 ?? false,
    websiteNotifications: props.user.user_setting.receive_notifications_via_website === 1 ?? false,
})
const isDisabled = ref(false);
onMounted( () => {
    isDisabled.value = !(props.user.user_setting.receive_follow_notifications === 1)
    if(!isDisabled.value){
        editForm.emailNotifications = props.user.user_setting.receive_notifications_via_email === 1 ?? false
        editForm.websiteNotifications = props.user.user_setting.receive_notifications_via_website === 1 ?? false
    }
})
const disableNotif = () => {
    isDisabled.value = !isDisabled.value
    if (isDisabled.value) {
        editForm.emailNotifications = false
        editForm.websiteNotifications = false
    }
    else {
        editForm.emailNotifications = true
        editForm.websiteNotifications = true
    }
}
const checkIfDisabled = computed(() => {
    return isDisabled.value
})
const checkIfNotificationsAreDisabled = () => {
    if(!editForm.emailNotifications && !editForm.websiteNotifications){
        editForm.followNotifications = false
        isDisabled.value=true
    }
}
const update = () => editForm.patch(route('profile.update'))
</script>

<template>
    <div class="main-container">
        <div class="user-settings-container">
            <h4 style="color: black;">Forma za izmenu podataka</h4>
            <form @submit.prevent="update" class="user-settings-edit-form">
                <div>
                    <label class="user-settings-label" for="name">Ime:</label>
                    <input class="user-settings-input" type="text" id="name" v-model="editForm.name">
                </div>
                <div>
                    <label class="user-settings-label" for="lastname">Prezime:</label>
                    <input class="user-settings-input" type="text" id="lastname" v-model="editForm.lastname">
                </div>
                <div>
                    <label class="user-settings-label" for="phone">Telefon:</label>
                    <input class="user-settings-input" type="text" id="phone" v-model="editForm.phone">
                </div>
                <div>
                    <label class="user-settings-label" for="username">Korisnicko ime:</label>
                    <input class="user-settings-input" type="text" id="username" v-model="editForm.username">
                </div>
                <div>
                    <label class="user-settings-label" for="username">Email:</label>
                    <input class="user-settings-input" type="email" id="username" v-model="user.email" disabled
                           style="cursor: not-allowed">
                </div>
                <div>
                    <label class="user-settings-label">Ukoliko zelite da promenite lozinku kliknite <Link :href="route('change-password')">ovde</Link> </label>
                </div>
                <div class="notifications">
                    <label class="user-settings-label" for="">Primanje obavestenja kada neko zaprati vas oglas i kada
                        oglas koji pratite je
                        prodan</label>
                    <label class="toggle-container">
                        <input type="checkbox" hidden v-model="editForm.followNotifications">
                        <span @click="disableNotif" class="toggle-slider"></span>
                    </label>
                </div>
                <div class="notifications" :class="{'is-disabled' : isDisabled}">
                    <label class="user-settings-label" for="">Primanje obavestenja putem e-maila</label>
                    <label class="toggle-container">
                        <input @change="checkIfNotificationsAreDisabled" type="checkbox" hidden v-model="editForm.emailNotifications" :disabled="isDisabled">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
                <div class="notifications" :class="{'is-disabled' : isDisabled}">
                    <label class="user-settings-label" for="">Primanje obavestenja putem sajta</label>
                    <label class="toggle-container">
                        <input @change="checkIfNotificationsAreDisabled" type="checkbox" hidden v-model="editForm.websiteNotifications" :disabled="isDisabled">
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <input class="user-settings-submit-input" type="submit" value="Sacuvaj podatke">
            </form>
        </div>
    </div>

</template>

<style scoped>
.main-container {
    height: 100vh; /* 100% of the viewport height */
    width: 100vw; /* 100% of the viewport width */
    margin: 0;
    padding: 0;
    box-sizing: content-box;
    display: flex;
    flex-direction: row;
    justify-content: center;
    background-color: #f9f9f9;
}

.user-settings-container {
    width: 1150px;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #f4f4f4;
    gap: 40px;


}

/* BEGGINING OF FORM STYLING */
.user-settings-edit-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 35%;
}

.user-settings-label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333; /* Dark gray text color */
}

.user-settings-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}


.user-settings-input {
    border-color: #3498db;
}

.user-settings-submit-input {
    background-color: #3498db;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}


.user-settings-submit-input:hover {
    background-color: #2980b9;
}

/* END OF FORM STYLING */

/* NOTIFIKACIJE    */
.notifications {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-content: center;
}

.toggle-container {
    position: relative;
    display: inline-block;
    min-width: 54px;
    height: 28px;
}

.toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 34px;
    transition: 0.4s;
}

.toggle-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    border-radius: 50%;
    transition: 0.4s;
}

input:checked + .toggle-slider {
    background-color: #2196F3;
}

input:focus + .toggle-slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked + .toggle-slider:before {
    transform: translateX(26px);
}

.is-disabled {
    opacity: 0.5;
}

@media screen and (max-width: 767px) {
    .user-settings-edit-form {
        width: 70%;
    }
}

@media screen and (min-width: 768px) and (max-width: 1023px) {
    .user-settings-edit-form {
        width: 60%;
    }
}

@media screen and (min-width: 1024px) and (max-width: 1439px) {
    .user-settings-edit-form {
        width: 45%;
    }
}
</style>
