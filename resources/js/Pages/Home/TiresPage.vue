<template>
    <Head>
        <title>Trkacke gume</title>
        <link rel="canonical" href="https://racing-corner.com/tires">

    </Head>
    <div class="auto-div">
        <button id="filtriraj" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
            aria-expanded="false" aria-controls="collapseWidthExample">
            Filtriraj pretragu
        </button>
        <div class="wrapper">
            <div class="filteri collapse collapse-horizontal" id="collapseWidthExample">
                <h5>Filtriraj pretragu</h5>

                <form @submit.prevent="filter">
                    <div class="box">
                        <div name="search">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                            <input v-model="filterForm.search" type="text" class="input" name="txt"
                                   placeholder="Search">
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Odaberi proizvodjaca
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input v-model="filterForm.disciplines.Yokohama" type="checkbox" id="yokohoma" name="vehicle1" value="Yokohama">
                                    <label for="yokohoma">Yokohama</label><br>
                                    <input v-model="filterForm.disciplines.Continental" type="checkbox" id="continental" name="vehicle2" value="Continental">
                                    <label for="continental">Continental</label><br>
                                    <input v-model="filterForm.disciplines.Michelin" type="checkbox" id="michelin" name="vehicle3" value="Michelin">
                                    <label for="michelin">Michelin</label><br>
                                    <input v-model="filterForm.disciplines.Tigar" type="checkbox" id="tigar" name="vehicle1" value="Tigar">
                                    <label for="tigar">Tigar</label><br>
                                    <input v-model="filterForm.disciplines.Dunlop" type="checkbox" id="dunlop" name="vehicle2" value="Dunlop">
                                    <label for="dunlop">Dunlop</label><br>
                                    <input v-model="filterForm.disciplines.Pirelli" type="checkbox" id="pirelli" name="vehicle2" value="Pirelli">
                                    <label for="pirelli">Pirelli</label><br>
                                    <input v-model="filterForm.disciplines.Nankang" type="checkbox" id="nankang" name="vehicle2" value="Nankang">
                                    <label for="nankang">Nankang</label><br>
                                    <input v-model="filterForm.disciplines.Hankook" type="checkbox" id="Hankook" name="vehicle2" value="Hankook">
                                    <label for="Hankook">Hankook</label><br>
                                    <input v-model="filterForm.disciplines.Avon" type="checkbox" id="Avon" name="vehicle2" value="Avon">
                                    <label for="Avon">Avon</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Odaberi cenu
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="number" id="min-price" name="min-price" value="0" v-model.number="filterForm.priceFrom">
                                    <label for="min-price">Min</label> <br>
                                    <input type="number" id="max-price" name="max-price" v-model.number="filterForm.priceTo">
                                    <label for="max-price">Max</label> <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-secondary" value="Pretraži">
                    <input type="submit" class="btn btn-outline-danger" value="Poništi" @click.prevent="clear">
                </form>
            </div>
            <div class="oglasi">
                <div class="wrap" v-for="ad in ads.data" :key="ad.id" v-if="ads.data.length">
                    <div class="slika">
                        <Link :href="route('ads.show', {ad:ad.id})">
                            <img :src="ad.image_path[0]" alt="Auto gume">
                        </Link>
                        <div class="data">
                            <h4>
                                {{ ad.title }} <span v-if="ad.isSold==1" style="font-weight: bold;color: red; font-size: 8px; display: inline;">(PRODATO)</span>
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
                    </div>
                </div>
                <div v-else style="text-align: center; font-size: 50px; width: 100%; height: 500px; margin-top: 30%;">
                    <h1 style="text-align: center;">Trenutno nema oglasa</h1>
                </div>
                <div v-if="ads.data.length" style="width: 100%; display: flex;  justify-items: center; justify-content: center; align-content: center; align-items: center; margin-top: 10px;" >
                    <Pagination :links="ads.links"/>

                </div>


            </div>
        </div>
    </div>
</template>


<script setup>
import {Head, Link, useForm} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    ads : Object,
    filters : Object
})

const filterForm = useForm({
    priceFrom : props.filters ? props.filters.priceFrom : null,
    priceTo : props.filters ? props.filters.priceTo :  null,
    search : props.filters ? props.filters.search : null,
    disciplines: props.filters?.disciplines ?? {
        Yokohama : false,
        Continental : false,
        Michelin : false,
        Tigar : false,
        Dunlop : false,
        Pirelli : false,
        Nankang : false,
        Hankook: false,
        Avon : false,

    }

})
const filter = () => {
    filterForm.get(route('tires'), {
        preserveState:true,
        preserveScroll: true,
    })


}
const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.search = null
    filterForm.disciplines = {
        Yokohama : false,
        Continental : false,
        Michelin : false,
        Tigar : false,
        Dunlop : false,
        Pirelli : false,
        Nankang : false,
        Hankook: false,
        Avon : false,

    }
    filter()
}


</script>
