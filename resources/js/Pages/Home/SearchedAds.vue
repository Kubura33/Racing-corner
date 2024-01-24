<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    ads : {
        type:Array,
        required:true
    },
    search : {
        type: String,
        required: true,
    }
})
</script>
<template>
    <div class="search_results">
        <h3 >
            Rezultati pretrage za "{{search.search}}"
        </h3>
        <div class="searched_ads">

    <div class="wrap" v-for="ad in ads" :key="ad.id" v-if="ads.length>0">
        <div class="slika">
            <Link :href="route('ads.show', {ad:ad.id})">
                <img :src="ad.image_path[0]" alt="Trkački auto">
            </Link>
            <div class="data">
                <h4>
                    {{ ad.title }} <span v-if="ad.isSold==='1'" style="font-weight: bold;color: red; display: inline;">(PRODATO)</span>
                </h4>
            </div>
            <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
        </div>
    </div>
    <div v-else style="text-align: center; font-size: 50px; width: 100%; height: 500px; margin-top: 30%;">
        <h1 style="text-align: center;">Trenutno nema oglasa</h1>
    </div>
        </div>
    </div>
</template>
<style scoped>
.search_results{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.searched_ads{
    width: 75%;
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns, each taking up 1 fraction of available space */
    gap: 10px;
}
.wrap{
    width: 75%;
    margin: 0 auto;
}
h3{
    text-align: center;
}
@media screen and (max-width: 767px) {
    .searched_ads{
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .wrap{
        width: 95%;
    }
}

</style>
