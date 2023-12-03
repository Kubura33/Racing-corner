<template>

    <div class="auto-div">
        <button id="filtriraj" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
            aria-expanded="false" aria-controls="collapseWidthExample">
            Filtriraj pretragu
        </button>
        <div class="wrapper">
            <div class="filteri collapse collapse-horizontal" id="collapseWidthExample">
                <h5>Filtriraj pretragu</h5>
                <form action="/action_page.php">
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
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Yokohama">
                                    <label for="vehicle1">Yokohama</label><br>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Continental">
                                    <label for="vehicle2">Continental</label><br>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Michelin">
                                    <label for="vehicle3">Michelin</label><br>
                                    <input type="checkbox" id="vehicle4" name="vehicle1" value="Tigar">
                                    <label for="vehicle4">Tigar</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Dunlop">
                                    <label for="vehicle5">Dunlop</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Pirelli">
                                    <label for="vehicle5">Pirelli</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Nankang">
                                    <label for="vehicle5">Nankang</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Hankook">
                                    <label for="vehicle5">Hankook</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Avon">
                                    <label for="vehicle5">Avon</label><br>
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
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-secondary" value="Pretraži">
                </form>
            </div>
            <div class="oglasi">
                <div class="wrap">
                    <div class="slika">
                        <a href="">
                            <img src="/images/gume.jpg" alt="">
                        </a>
                        <div class="data">
                            <h4>
                                Marka
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">Cena</span>
                    </div>
                </div>
                <div class="wrap">
                    <div class="slika">
                        <a href="">
                            <img src="/images/gume_prodaja.jpeg" alt="">
                        </a>
                        <div class="data">
                            <h4>
                                Marka
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">Cena</span>
                    </div>
                </div>
                <div class="wrap">
                    <div class="slika">
                        <a href="">
                            <img src="/images/gume_prodaja.jpeg" alt="">
                        </a>
                        <div class="data">
                            <h4>
                                Marka
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">Cena</span>
                    </div>
                </div>
                <div class="wrap">
                    <div class="slika">
                        <a href="">
                            <img src="/images/gume.jpg" alt="">
                        </a>
                        <div class="data">
                            <h4>
                                Marka
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">Cena</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    ads : Array
})
</script>
