<template>
    <div class="auto-div">
        <button id="filtriraj" class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
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
                                    Odaberi disciplinu
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Rally">
                                    <label for="vehicle1">Rally</label><br>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Kružne">
                                    <label for="vehicle2">Kružne</label><br>
                                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Brdo">
                                    <label for="vehicle3">Brdske</label><br>
                                    <input type="checkbox" id="vehicle4" name="vehicle1" value="Karting">
                                    <label for="vehicle4">Karting</label><br>
                                    <input type="checkbox" id="vehicle5" name="vehicle2" value="Slalom">
                                    <label for="vehicle5">Slalom</label><br>
                                    <input type="checkbox" id="vehicle6" name="vehicle3" value="Autocross">
                                    <label for="vehicle6">Autocross</label><br>
                                    <input type="checkbox" id="vehicle7" name="vehicle1" value="Drift">
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
                    <div class="premium_ads">
                        <div class="slika">
                            <a href="">
                                <img src="/images/borkovic.jpg" alt="">
                                <span class="traka_premium" id="traka_div"></span>
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
                <div class="wrap">
                    <div class="slika">
                        <a href="">
                            <img src="/images/borkovic.jpg" alt="">
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
                            <img src="/images/drift.jpeg" alt="">
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
                            <img src="/images/drift.jpeg" alt="">
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
                            <img src="/images/wrc_games.jpeg" alt="">
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

</script>
