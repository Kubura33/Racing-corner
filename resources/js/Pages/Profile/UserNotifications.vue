<script setup>
const props = defineProps(
    {
        notifications : {
            type : Object,
            required : true,
        }
    }
)
</script>
<template>
<div class="notification-main-container">

    <div class="notification-container">
        <div class="notification-container-for-read-all">
            <button>Oznaci sve kao procitano</button>
        </div>
        <div class="notification-card" v-for="notification in notifications" :key="notification.data.id">
           <span>Korisnik {{notification.data.followed_by}} je zapratio vas oglas pod naslovom  {{ notification.data.ad}}</span>


        </div>
    </div>

</div>
</template>
<style scoped>
.notification-main-container{
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    color: black;

}
.notification-container{
    width: 1150px;
    height: 100%;
    display: flex;
    flex-direction: column;
    background-color: #f4f4f4;
    padding-top: 50px;

}
.notification-container-for-read-all{
    align-self: end;
    margin-bottom: 20px;
    margin-right: 10px;
}
.notification-card {
    width: 100%;
    background-color: #fff;
    border-radius: 8px;
    padding: 50px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}
</style>
