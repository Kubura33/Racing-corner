<template>
    <div class="auto-div">
        <button id="filtriraj" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
            Filtriraj pretragu
        </button>
        <div class="wrapper">
            <div class="filteri collapse collapse-horizontal" id="collapseWidthExample">
                <h5>Filtriraj pretragu</h5>
                <div class="box">
                    <form name="search">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                        <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();"
                            placeholder="Search">
                    </form>
                </div>
                <form action="/action_page.php">
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
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Kombinezon">
                                    <label for="vehicle1">Kombinezon</label><br>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Kaciga">
                                    <label for="vehicle2">Kaciga</label><br>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Pojas">
                                    <label for="vehicle3">Pojas</label><br>
                                    <input type="checkbox" id="vehicle4" name="vehicle1" value="Hans">
                                    <label for="vehicle4">Hans</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Rukavice">
                                    <label for="vehicle5">Rukavice</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Podkapa">
                                    <label for="vehicle5">Podkapa</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Patike">
                                    <label for="vehicle5">Patike</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Sediste">
                                    <label for="vehicle5">Sedista-Kadice</label><br>
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
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Novo-Polovno
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Novo"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Novo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Polovno"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Polovno
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-secondary" value="Pretraži">
                </form>
            </div>
            <div class="oglasi" v-for="ad in ads" :key="ad.id">
                <div class="wrap">
                    <div class="slika">
                        <Link :href="route('ads.show', { ad: ad.id })">
                        <img :src="ad.image_path[0]" alt="">
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
        </div>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    ads: Array,
})
</script>
