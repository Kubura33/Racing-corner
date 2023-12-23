<template>
    <div class="auto-div">
        <button id="filtriraj" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
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
                    <div class="accordion" id="accordionExample" style="min-height: 500px;">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Odaberi disciplinu
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Rally"
                                           v-model="filterForm.disciplines.Rally">
                                    <label for="vehicle1">Rally</label><br>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Kružne"
                                           v-model="filterForm.disciplines.Kruzne">
                                    <label for="vehicle2">Kružne</label><br>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Brdo"
                                           v-model="filterForm.disciplines.Brdske">
                                    <label for="vehicle3">Brdske</label><br>
                                    <input type="checkbox" id="vehicle4" name="vehicle1" value="Karting"
                                           v-model="filterForm.disciplines.Karting">
                                    <label for="vehicle4">Karting</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Slalom"
                                           v-model="filterForm.disciplines.Slalom">
                                    <label for="vehicle5">Slalom</label><br>
                                    <input type="checkbox" id="vehicle6" name="vehicle3" value="Autocross"
                                           v-model="filterForm.disciplines.Autocross">
                                    <label for="vehicle6">Autocross</label><br>
                                    <input type="checkbox" id="vehicle7" name="vehicle1" value="Drift"
                                           v-model="filterForm.disciplines.Drift">
                                    <label for="vehicle7">Drift</label><br><br>
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
                                    <input type="number" id="min-price" name="min-price" value="" v-model="filterForm.priceFrom">
                                    <label for="min-price">Min</label> <br>
                                    <input type="number" id="max-price"  name="max-price" value="" v-model="filterForm.priceTo">
                                    <label for="max-price">Max</label> <br><br>
                                </div>
                            </div>
                        </div>

                    </div>
                    <input type="submit" class="btn btn-outline-secondary" value="Pretraži">
                    <input type="submit" class="btn btn-outline-secondary" value="Ponisti" @click.prevent="clear" style="margin-left: 10px;">
                </form>
            </div>

            <div class="oglasi">
                <div class="wrap" v-for="ad in premiumAds" :key="ad.id">
                    <div class="premium_ads">
                        <div class="slika">
                            <Link :href="route('ads.show', {ad : ad.id})">
                                <img :src="ad.image_path[0]" alt="">
                                <span class="traka_premium" id="traka_div"></span>
                            </Link>
                            <div class="data">
                                <h4>
                                    {{ ad.title }}
                                </h4>
                            </div>
                            <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
                        </div>
                    </div>
                </div>
                <div class="wrap" v-for="ad in ads" :key="ad.id">
                    <div class="slika">
                        <Link :href="route('ads.show', {ad:ad.id})">
                            <img :src="ad.image_path[0]" alt="">
                        </Link>
                        <div class="data">
                            <h4>
                                {{ ad.title }} <span v-if="ad.isSold==='1'" style="font-weight: bold;color: red;">(PRODATO)</span>
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>
<script setup>
import {Link, useForm} from "@inertiajs/vue3";

const props = defineProps(
    {
        premiumAds: Array,
        ads: Array,
        filters: Object,
    }
)
const filterForm = useForm({
    priceFrom : props.filters ? props.filters.priceFrom : null,
    priceTo : props.filters ? props.filters.priceTo :  null,
    search : props.filters ? props.filters.search :  null,
    disciplines: props.filters?.disciplines ?? {
        Rally: false,
        Kruzne: false,
        Brdske: false,
        Karting: false,
        Slalom: false,
        Autocross: false,
        Drift: false,

    }

})
const filter = () => filterForm.get(route('cars'), {
    preserveState: true,
    preserveScroll: true,
})
const clear = () => {
    filterForm.priceTo = null
    filterForm.priceFrom = null
    filterForm.search = null
    filterForm.disciplines = {
        Rally: false,
        Kruzne: false,
        Brdske: false,
        Karting: false,
        Slalom: false,
        Autocross: false,
        Drift: false,

    }
    filter()
}
</script>
