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

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Odaberi vrstu
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input v-model="filterForm.vrsta.Kombinezon" type="checkbox" id="kombinezon"
                                           name="vehicle1" value="Kombinezon">
                                    <label for="kombinezon">Kombinezon</label><br>
                                    <input v-model="filterForm.vrsta.Kaciga" type="checkbox" id="kaciga" name="vehicle2"
                                           value="Kaciga">
                                    <label for="kaciga">Kaciga</label><br>
                                    <input v-model="filterForm.vrsta.Pojas" type="checkbox" id="pojas" name="vehicle3"
                                           value="Pojas">
                                    <label for="pojas">Pojas</label><br>
                                    <input v-model="filterForm.vrsta.Hans" type="checkbox" id="Hans" name="vehicle1"
                                           value="Hans">
                                    <label for="Hans">Hans</label><br>
                                    <input v-model="filterForm.vrsta.Rukavice" type="checkbox" id="Rukavice"
                                           name="vehicle2" value="Rukavice">
                                    <label for="Rukavice">Rukavice</label><br>
                                    <input v-model="filterForm.vrsta.Podkapa" type="checkbox" id="podkapa"
                                           name="vehicle2" value="Podkapa">
                                    <label for="podkapa">Podkapa</label><br>
                                    <input v-model="filterForm.vrsta.Patike" type="checkbox" id="patike" name="vehicle2"
                                           value="Patike">
                                    <label for="patike">Patike</label><br>
                                    <input v-model="filterForm.vrsta.Sediste" type="checkbox" id="sediste"
                                           name="vehicle2" value="Sediste">
                                    <label for="sediste">Sedista-Kadice</label><br>
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
                                    <input type="number" id="min-price" name="min-price" value="0">
                                    <label for="min-price">Min</label> <br>
                                    <input type="number" id="max-price" name="max-price" value="1000000">
                                    <label for="max-price">Max</label> <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Velicina
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input v-model="filterForm.size.S" class="form-check-input" type="checkbox" name="S"
                                               id="S">
                                        <label class="form-check-label" for="S">
                                            S
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input v-model="filterForm.size.M"  class="form-check-input" type="checkbox" name="M"
                                               id="M">
                                        <label class="form-check-label" for="M">
                                            M
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input v-model="filterForm.size.L"  class="form-check-input" type="checkbox" name="L"
                                               id="L">
                                        <label class="form-check-label" for="L">
                                            L
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input v-model="filterForm.size.XL"  class="form-check-input" type="checkbox" name="XL"
                                               id="XL">
                                        <label class="form-check-label" for="XL">
                                            XL
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input v-model="filterForm.size.XXL"  class="form-check-input" type="checkbox" name="XXL"
                                               id="XXL">
                                        <label class="form-check-label" for="XXL">
                                            XXL
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input v-model="filterForm.size.XXXL"  class="form-check-input" type="checkbox" name="XXXL"
                                               id="XXXL">
                                        <label class="form-check-label" for="XXXL">
                                            XXXL
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-secondary" value="Pretraži">
                    <input type="submit" class="btn btn-outline-secondary" value="Ponisti" @click.prevent="clear"
                           style="margin-left: 10px;"></form>
            </div>
            <div class="oglasi" v-for="ad in ads" :key="ad.id">
                <div class="wrap">
                    <div class="slika">
                        <Link :href="route('ads.show', { ad: ad.id })">
                            <img :src="ad.image_path[0]" alt="">
                        </Link>
                        <div class="data">
                            <h4>
                                {{ ad.title }}<span v-if="ad.isSold==1" style="font-weight: bold;color: red; font-size: 8px;">(PRODATO)</span>
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

const props = defineProps({
    ads: Array,
    filters: Object
})

const filterForm = useForm({
    priceFrom: props.filters ? props.filters.priceFrom : null,
    priceTo: props.filters ? props.filters.priceTo : null,
    search : props.filters ? props.filters.search : null,
    vrsta: props.filters?.vrsta ?? {
        Kombinezon: false,
        Kaciga: false,
        Pojas: false,
        Hans: false,
        Rukavice: false,
        Podkapa: false,
        Patike: false,
        Sediste: false,

    },
    size: props.filters?.size ?? {
        S: false,
        M: false,
        L: false,
        XL: false,
        XXL: false,
        XXXL: false,
    }

})
const filter = () => {
    filterForm.get(route('equipment'), {
        preserveState: true,
        preserveScroll: true,
    })


}
const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.search = null
    filterForm.vrsta = {
        Kombinezon: false,
        Kaciga: false,
        Pojas: false,
        Hans: false,
        Rukavice: false,
        Podkapa: false,
        Patike: false,
        Sediste: false,

    }
    filterForm.size = {
        S: false,
        M: false,
        L: false,
        XL: false,
        XXL: false,
        XXXL: false,
    }
    filter()
}
</script>
