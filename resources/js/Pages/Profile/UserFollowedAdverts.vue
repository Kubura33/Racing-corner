<script setup>
import {Link} from '@inertiajs/vue3'
defineProps(
    {
        ads : {
            type: Array,
            required: true,
        }
    }
)
</script>
<template>

    <div class="user-followed-adverts-main-container">
        <div class="user-followed-adverts-container">
            <h3 v-if="ads.length>0">Oglasi koje pratite</h3>
            <h3 v-else style="text-align: center">Trenutno ne pratite oglase</h3>
            <div class="user-followed-ads" v-for="ad in ads" :key="`ad-${ad.id}`">
                <div class="followed-ads-info">
                    <h3>{{ad.title}}</h3>
                    <div class="ads-info"><span class="posted-by"><i>Okacio : {{ ad.user.name }} {{ad.user.lastname}} (Korisnicko ime: {{ad.user.username}})</i></span> <span class="price">Cena : {{ad.price}} &euro;</span> </div>
                    <p>{{ad.advertisable.description}}</p>
                </div>
                <div class="user-followed-ads-action-buttons">
                    <Link :href="route('follow-advert', {ad : ad})" method="POST" as="button" class="user-followed-buttons">Otprati</Link>
                    <Link :href="route('ads.show', {ad : ad.id})" class="user-followed-buttons" style="background-color: #bdc3c7 !important; border: 2px solid #bdc3c7; ">Poseti</Link>

                </div>

            </div>

        </div>
    </div>

</template>
<style scoped>
.user-followed-adverts-main-container{
    height: auto; /* 100% of the viewport height */
    width: 100%; /* 100% of the viewport width */
    margin: 0;
    padding: 0;
    box-sizing: content-box;
    display: flex;
    flex-direction: row;
    justify-content: center;
    background-color: #f9f9f9;
    margin-bottom: 50px;
}
.user-followed-adverts-container{
    width: 75%;
    height: auto;
    display: flex;
    flex-direction: column;
    background-color:  #f4f4f4;
    padding-top: 20px;
    gap: 5px;


}
.user-followed-ads{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 1%;
    background-color: #fff; /* Match the container's background color */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;

    width: 100%;
}
.followed-ads-info > p {
    color: #666;
    font-size: 20px;
}
.followed-ads-info h3 {
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
    font-weight: bold;
}
.ads-info{
    display: flex;
    flex-direction: column;
    gap: 5px;
}
.user-followed-ads-action-buttons{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;

}
.followed-ads-info{
    min-width: 90%;
}
.user-followed-buttons {
    display: inline-block;
    padding: 5px 20px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 25px;
    transition: background-color 0.3s, color 0.3s;
    cursor: pointer;
    background-color: #4CAF50;
    color: #fff;
    border: 2px solid #4CAF50;
    min-width: 120px;
}

.user-followed-buttons:hover {
    background-color: #45a049;
    color: #fff;
    border: 2px solid #45a049;
}
.container > h3{
    text-align: center;

}

.followed-ads-info h3:hover {

    color: #3498db;

}
.posted-by{
    font-size: 16px;
    color: #888;
}
.price{
    font-size: 18px;
    font-weight: bold;
    color: #333;
}
@media screen and (max-width: 767px) {
    .user-followed-adverts-container{
        width: 100%;
        align-items: center;
        justify-content: center;
    }
    .user-followed-ads{
        width: 90%;
        flex-direction: column;
    }
    .user-followed-ads-action-buttons{
        flex-direction: row;
        gap: 10px;
    }
}

/* Medium screens (tablets) */
@media screen and (min-width: 768px) and (max-width: 1023px) {
    .followed-ads-info{
        min-width: 60%;
    }
    .followed-ads-info > p {
        font-size: 16px;
    }
    .user-followed-adverts-container{
        width: 95%;
    }

}

/* Large screens (desktops) */
@media screen and (min-width: 1024px) and (max-width: 1439px) {
    .followed-ads-info{
        min-width: 75%;
    }}

</style>
