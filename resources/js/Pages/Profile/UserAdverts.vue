<script setup>
import {Link} from '@inertiajs/vue3'
import {useDateFormatting} from "@/Composables/useDateFormatting.js";

const props = defineProps({
    ads: {
        type: Array,
        required: true
    }
})
const type = (item) => {
    switch(item){
        case 'vehicle':
            return "Automobili"
            break
        case 'equipment':
            return "Oprema"
        case 'parts':
            return "Delovi"
        case 'tires' :
            return "Gume"
    }
}
</script>
<template>
    <div class="main-container">


        <div id="container">
            <h3>Kreirani oglasi</h3>
            <div class="created-ads" v-for="ad in ads" :key="`ad-${ad.id}`">
                <div class="ad-image">
                    <img :src="ad.image_path" alt="">
                </div>
                    <div class="created-ads-basic-info">
                        <Link as="h3" :href="route('ads.show', {ad:ad.id})" class="followed-ad-title">{{ad.title}}</Link>
                        <div class="info-about-ad"><b><span>Broj pracenja: {{ad.likes.length}}</span></b> <b class="created-ad-price">$4500</b>
                            <b>{{ ad.advertisable_type==="parts" ? (ad.advertisable.type === 'tires' ? type("tires") : type(ad.advertisable_type)) : type(ad.advertisable_type) }}</b> <b>Objavljeno
                                : {{ useDateFormatting(ad.created_at) }} </b></div>
                        <p>{{ad.advertisable.description.length>300 ? ad.advertisable.description.slice(0,300) `...` : ad.advertisable.description}}</p>
                        <p v-if="ad.isSold == 1" style="font-size: 25px; color: red; font-style: italic;">Oglas je oznacen kao prodat i bice obrisan za 7 dana</p>
                    </div>

                <div class="actions" v-if="ad.isSold !=1">
                    <Link :href="route('advert-has-been-sold', {ad: ad.id})" class="action-1" id="sell" method="POST" as="button">Prodaj</Link>
                    <Link :href="route('ads.edit', {ad: ad.id})" id="edit" class="btn btn-warning">Izmeni</Link>
                    <Link :href="route('ads.destroy', {ad : ad.id})" id="delete" method="delete" as="button" class="btn btn-danger">Obrisi</Link>
                </div>
                <div v-else class="ad-has-been-sold">

                </div>

            </div>


        </div>
    </div>
</template>
<style scoped>
.main-container {
    height: auto; /* 100% of the viewport height */
    width: 100%; /* 100% of the viewport width */
    margin: 0;
    padding: 0;
    box-sizing: content-box;
    display: flex;
    flex-direction: row;
    justify-content: center;

}

#container {
    width: 75%;
    height: auto;
    background-color: #f9f9f9;
    padding: 10px;

}

#container > h3 {
    text-align: center;
    margin-top: 25px;
}

.created-ads-basic-info {
    display: flex;
    flex-direction: column;
    width: 80%;
}
.created-ads-basic-info > p {
    margin-left: 7px;
}
.created-ads {
    width: 100%;
    display: flex;
    flex-direction: row;
    gap: 30px;
    align-content: center;
    justify-content: center;
    margin-top: 20px;
    border-radius: 10px;
    border: 2px solid; /* Dark gray border */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Subtle gray box shadow */
    /* Gradient background with gray tones */
    background: transparent;
    color: rgb(31, 43, 89); /* Text color, assuming white text for better visibility */


}

.ad-image {

    position: relative;
    overflow: hidden;
    min-width: 290px;
    max-width: 300px;
    height: auto;

    border-right: 1px solid black;
}

.ad-image img {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    object-fit: cover;
}

.info-about-ad {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-top: -7px;
    margin-bottom: 5px;
    font-size: 15px;
    padding: 5px;
}

.actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-self: flex-end;
    margin-bottom: 30px;
    margin-right: 10px;
    justify-content: center;
    padding-top: 2%;
    height: 100%;
}
.actions > button {
    width: 100%;
}
.ad-has-been-sold{
    display: flex;
    flex-direction: column;
   margin-top: 30px;
    width: 350px;

}
.actions .action-1, .action-2 {
    width: 150px;
    padding: 5px 10px;
    background-color: #3498db; /* A shade of blue */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.followed-ad-title {

    cursor: pointer;
    transition: color 0.3s ease;
    font-weight: bold;
}

.followed-ad-title:hover {
    color: #3498db;
}

.created-ad-price {
    color: #00c8b4;
    font-weight: 700;
}
@media screen and (max-width: 767px) {
    #container
    {
        width: 100%;
    }
    .created-ads{
        flex-direction: column;
        gap: 5px;
    }
    .ad-image{
        min-width: 100%;
        height: 300px;
    }
    .ad-image > img {
        max-width: 100%;
        min-width: 100%;
        height: 100%;
    }
    .created-ads-basic-info{
        width: 100%;
    }
    .created-ads-basic-info > p {
        text-align: center;
    }
    .followed-ad-title{
        text-align: center;
    }
    .actions{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-self: normal;
        justify-content: center;
        width: 100%;
    }
    #edit, #sell, #delete{
        width: 40%;
    }
    .info-about-ad{
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
   }

/* Medium screens (tablets) */
@media screen and (min-width: 768px) and (max-width: 1023px) {
#container
{
    width: 100%;
}
    .created-ads{
        flex-direction: column;
    }
    .ad-image{
        min-width: 100%;
        height: 300px;
    }
    .ad-image > img {
        max-width: 100%;
        min-width: 100%;
        height: 100%;
    }
    .created-ads-basic-info{
        width: 100%;
    }
    .created-ads-basic-info > p {
        text-align: center;
    }
    .followed-ad-title{
        text-align: center;
    }
    .actions{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-self: normal;
        justify-content: center;
        width: 100%;
    }
    .actions > button{
        width: 200px;
    }
}
@media screen and (min-width: 1024px) and (max-width: 1439px) {
    #container
    {
        width: 100%;
    }}


</style>
