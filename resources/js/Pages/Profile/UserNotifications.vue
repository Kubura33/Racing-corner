<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps(
    {
        notifications: {
            type: Object,
            required: true,
        }
    }
)
</script>
<template>
    <div class="notification-main-container">

        <div class="notification-container">
            <div class="notification-container-for-read-all">
                <Link :href="route('notification.destroy')" method="delete" as="button" class="notification-button">
                    Oznaci sve kao procitano
                </Link>
            </div>
            <div class="notification-card" :class="{'read-notification' : notification.read_at}"
                 v-for="notification in notifications" :key="notification.data.id">
                <span class="notification-text">Korisnik {{ notification.data.followed_by }} je zapratio vas oglas pod naslovom  {{ notification.data.ad }}</span>
                <div class="button-container">
                    <Link :href="route('notification.mark-as-read', {notification : notification.id})" method="post"
                          as="button" v-if="!notification.read_at" class="notification-button">Oznaci kao procitano
                    </Link>
                </div>

            </div>
        </div>

    </div>
</template>
<style scoped>
.notification-main-container {
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    color: black;

}

.notification-container {
    width: 1150px;
    height: 100%;
    display: flex;
    flex-direction: column;
    background-color: #f4f4f4;
    padding-top: 50px;
    padding-left: 10px;
    padding-right: 10px;
    gap: 15px;

}

.notification-container-for-read-all {
    align-self: end;
    margin-bottom: 20px;
    margin-right: 10px;
}

.notification-card {
    width: 100%;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    justify-items: baseline;

}

.notification-button {
    background-color: #4CAF50; /* Green color, you can change it to your preferred color */
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.notification-text {
    padding-top: 10px;
}

.read-notification {
    opacity: 0.5;
}

@media screen and (max-width: 767px) {
    .notification-container {
        width: 70%;

    }

    .notification-card {
        flex-direction: column;
        gap: 10px;
    }

    .button-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }
}
</style>
