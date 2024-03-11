<script setup>
import {Head, Link, useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";
const page = usePage();
const user = computed(() => page.props.auth.user)
const props = defineProps(
    {
        premiumAds: Array,
        ads: Object,
    }
)
const filterForm = useForm({
    search: '',
})
const filter = () => filterForm.get(route('search'), {
    preserveState: true,
    preserveScroll: true,
})
</script>
<template>
    <Head>
        <link rel="canonical" href="https://racing-corner.com/">

    </Head>
    <div class="banner">
        <div class="banner_slika">
            <img src="/images/banner1.jpg" alt="Race Car">
            <div class="gradient"></div>
            <div class="bottom_border"></div>
            <div class="search_glavni">
                <form @submit.prevent="filter" class="search_home">
                    <input type="search" v-model="filterForm.search" placeholder="Search...">
                    <button type="submit" class="btn btn-outline-success">SEARCH</button>
                </form>

            </div>
        </div>
    </div>
<!--PREMIUM OGLASI, NE BRISI !!!!-->

<!--    <div>-->
<!--        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" v-if="premiumAds.length > 0">-->
<!--            <div class="carousel-inner">-->
<!--                <div v-for="(group, index) in groups" :key="index"-->
<!--                     :class="['carousel-item', { active: index === activeIndex }]">-->
<!--                    <div class="premium-kartice">-->
<!--                        <span class="traka" id="traka_div_comp"></span>-->
<!--                        <div class="row row-cols-1 row-cols-md-3 g-4">-->
<!--                            <div class="col" v-for="(card, cardIndex) in group" :key="cardIndex">-->
<!--                                <span class="traka" id="traka_div_phone"></span>-->
<!--                                <div class="card">-->
<!--                                    <img :src="card.image" class="card-img-top" alt="Card image">-->
<!--                                    <div class="card-body">-->
<!--                                        <h5 class="card-title">{{ card.brand }}</h5>-->
<!--                                        <h5>CENA: <span class="podatak">{{ card.price }}<span class="podatak">{{-->
<!--                                                card.currency-->
<!--                                            }}</span></span></h5>-->
<!--                                    </div>-->
<!--                                    <Link :href="route('ads.show', { ad: card.id })" class="btn btn-primary">Detaljnije-->
<!--                                    </Link>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <button @click="prev" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"-->
<!--                    data-bs-slide="prev">-->
<!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                <span class="visually-hidden">Prethodno</span>-->
<!--            </button>-->
<!--            <button @click="next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"-->
<!--                    data-bs-slide="next">-->
<!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                <span class="visually-hidden">Sledeće</span>-->
<!--            </button>-->
<!--        </div>-->
<!--    </div>-->

<!--    KRAJ PREMIUM OGLASA, NE BRISI OVO IZNAD-->
    <div class="cta" v-if="!user">
        <div class="main-cta">
            <div class="first-part-cta">
                <h3> <b>Racing-corner trkačka berza</b> </h3>
                <p>Postanite deo naše zajednice, oglasite vaše trkačke automobile, opremu, delove i gume.</p>
                <p>Zašto postaviti oglas baš kod nas?</p>
                <ul class="cool-list">
                    <li><b>Specijalizovana publika</b>
                        <br>
                        <span>Platforma napravljena samo za ljubitelje trka, direktno cilja na njihvou zajednicu</span>
                    </li>
                    <li><b>Lako postavljanje oglasa</b>
                        <br>
                        Naša platforma omogućava jednostavno i brzo postavljanje oglasa, sve što je potrebno je da se registrujete i verifikujete vaš e-mail
                    </li>
                    <li>
                        <b>Brza prodaja</b>
                        <br>
                        Radi specijalizovanog tržišta, vaši proizvodi mogu brzo naći put do novog vlasnika
                    </li>
                </ul>
            </div>
            <div class="second-part-cta">
                <h3><b>Pridružite se sada i budite deo naše zajednice!</b></h3>
                <p>
                    <i>
                        Bez obzira da li prodajete trkački automobil spreman za stazu, trkačke gume, opremu ili delove, Racing-corner trkačka berza je vaša konačna destinacija
                    </i>

                </p>
                <div class="button-cta">
                    <span class="highlight-text">Postavite oglas sada</span>

                    <Link :href="route('login')" class="cta-button">Registracija</Link>
                </div>

            </div>
        </div>
    </div>

    <h2 id="poslednje_dodato" v-if="Object.keys(ads).length != 0">Poslednje dodato</h2>
    <h2 id="poslednje_dodato" v-else>Trenutno nema oglasa </h2>
    <div class="oglasi_home">
        <Link :href="route('ads.show', { ad: ad.id })" class="wrap" v-for="ad in ads" :key="ad.id">
            <div class="slika">
                <a href="">
                    <img :src="ad.image_path[0]" alt="Oglas">
                </a>
                <div class="data">
                    <h4>
                        {{ ad.title }}
                        <span v-if="ad.isSold == 1"
                              style="font-weight: bold;color: red; font-size: 8px; display: inline;">(PRODATO)</span>
                    </h4>
                </div>
                <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
            </div>
        </Link>
    </div>

    <div class="how_to">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item" id="accordion-item1">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                        Kako okačiti oglas
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                     aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <strong>Koraci za kačenje oglasa</strong>
                        <ul>
                            <li>Kreiraj nalog ili se uloguj ukoliko već poseduješ nalog</li>
                            <li>Nakon uspešne registracije, idi na karticu kreiraj oglas</li>
                            <li>Odaberite vrstu oglasa koju želite da okačite</li>
                            <li>Popuni pravilno formu i kreiraj oglas</li>
                            <li>Sav pregled Vaših podataka se nalazi na stranici Profil, koja se otvara klikom na Vaše
                                ime(gore desno).
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item" id="accordion-item2">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                        Naš email kontakt
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                     aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <strong>official@racing-corner.com</strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item" id="accordion-item3">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                        Kako funkcioniše racing-corner
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                     aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <strong>Racing-corner berza</strong>
                        <p>Ova platforma je osmišljena da olakša potražnju i kupovinu trkačke opreme, guma, delova i
                            samih
                            vozila.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="savezi">-->
<!--        <h2>Linkovi ka zvaničnim sportskim savezima</h2>-->
<!--        <a href="https://www.fia.com/" class="zastave" id="fia">-->
<!--            <h4>FIA</h4>-->
<!--        </a>-->
<!--        <a href="http://www.sakss.org.rs/" class="zastave" id="srbija">-->
<!--            <h4>SAKSS</h4>-->
<!--        </a>-->
<!--        <a href="https://haks.hr/" class="zastave" id="hrvatska">-->
<!--            <h4>HAKS</h4>-->
<!--        </a>-->
<!--        <a href="https://amsm.mk/" class="zastave" id="makedonija">-->
<!--            <h4>AMSM</h4>-->
<!--        </a>-->
<!--        <a href="http://akscg.me/" class="zastave" id="crna_gora">-->
<!--            <h4>AKSCG</h4>-->
<!--        </a>-->
<!--        <a href="https://bfas.bg/" class="zastave" id="bugarska">-->
<!--            <h4>БФАС</h4>-->
<!--        </a>-->
<!--    </div>-->
</template>

<script>
export default {
    props: {
        premiumAds: Array,
        ads: Object,
    },
    data() {
        return {
            activeIndex: 0,
            groups: [
                []
            ]
        };
    },
    methods: {
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.groups.length) % this.groups.length;
        },
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.groups.length;
        },
        startAutoChange() {
            setInterval(() => {
                this.activeIndex = (this.activeIndex + 1) % this.groups.length;
            }, 5000);
        },
        addItemToGroup(items) {
            let groupIndex = 0
            for (let i = 0; i < items.length; i++) {
                const item = {
                    id: items[i].id,
                    brand: items[i].title,
                    price: items[i].price,
                    currency: ' €',
                    image: items[i].image_path[0]
                }
                if ((i + 1) % 3 == 0)
                    groupIndex = groupIndex + 1
                if (!this.groups[groupIndex]) {
                    this.groups[groupIndex] = [];
                }
                this.groups[groupIndex].push(item)
            }
        }
    },
    mounted() {
        if (this.premiumAds)
            this.addItemToGroup(this.premiumAds)
        this.startAutoChange();

    }
};

</script>

<style scoped>

.cta{
    margin-top: 70px;
}
.main-cta{
    display: flex;
    flex-direction: row;
    max-width: 1200px;
    padding: 20px;
    margin: 0 auto;
    gap: 15px;
    background: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);


}
.button-cta{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    gap: 20px;
}
ul.cool-list {
    list-style-type: none; /* Remove default bullets */
    padding: 0;
}

ul.cool-list li {
    padding-left: 20px; /* Space for custom bullet */
    margin-bottom: 10px; /* Space between list items */
    position: relative; /* Required for absolute positioning of the pseudo-element */
}

ul.cool-list li::before {
    content: '•'; /* Custom bullet symbol */
    color: #365243; /* Bullet color to match your header */
    position: absolute;
    left: 0;
    top: 0;
}

.cta-button{
    background-color: #3A795A; /* Main color for the button */
    color: white; /* Text color */
    padding: 10px 20px; /* Padding around the text */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners for a modern look */
    cursor: pointer; /* Change mouse cursor to indicate button */
    transition: background-color 0.3s, box-shadow 0.3s; /* Smooth transition for hover effects */
    font-size: 16px; /* Text size */
    font-weight: bold; /* Text weight */
}
.cta-button:hover, .cta-button:focus {
    background-color: #2d6746; /* Darker shade for the hover/focus state */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect for depth */
    outline: none; /* Remove outline on focus for aesthetics */
}
.highlight-text {
    font-family: 'Arial', sans-serif; /* Clean, modern font */
    color: #3A795A; /* Color matching the cool button for consistency */
    font-size: 24px; /* Larger font size for visibility */
    font-weight: bold; /* Bold text for emphasis */
    text-align: center; /* Center the text */
    display: inline-block; /* Only as wide as the content */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
}

@media screen and (max-width: 767px) {
    .cta{
        margin-bottom: 50px;
    }
    .main-cta{
        display: flex;
        flex-direction: column;

    }
    .cta-button{
        width: 50%;
        text-align: center;
    }
}
</style>

<!--   <div class="div-oglas">
       <div class="row">
           <div class="col col-md-4 mb-3">
               <div class="card">
                   <img src="/images/borkovic.jpg" class="card-img-top" alt="...">
                   <div class="card-body">
                       <h5 class="card-title">MARKA</h5>
                   </div>
                   <ul class="list-group list-group-flush">
                       <li class="list-group-item">KUBIKAZA: <span class="podatak">1150ccm</span></li>
                       <li class="list-group-item">KLASA: <span class="podatak">Sport</span> </li>
                       <li class="list-group-item">CENA: <span class="podatak">230<span class="podatak">valuta</span></span></li>
                   </ul>
                   <div class="card-body">
                       <Link :href="route('details')" class="btn btn-primary">Detaljnije</Link>
                   </div>
               </div>
           </div>
           <div class="col col-12 col-md-4 mb-3">
               <div class="card">
                   <img src="/images/borkovic.jpg" class="card-img-top" alt="...">
                   <div class="card-body">
                       <h5 class="card-title">MARKA</h5>
                   </div>
                   <ul class="list-group list-group-flush">
                       <li class="list-group-item">KUBIKAZA: <span class="podatak">1150ccm</span></li>
                       <li class="list-group-item">KLASA: <span class="podatak">Sport</span> </li>
                       <li class="list-group-item">CENA: <span class="podatak">230<span class="podatak">valuta</span></span></li>
                   </ul>
                   <div class="card-body">
                       <a href="#" class="btn btn-primary">Detaljnije</a>
                   </div>
               </div>
           </div>
           <div class="col col-12 col-md-4 mb-3">
               <div class="card">
                   <img src="/images/borkovic.jpg" class="card-img-top" alt="...">
                   <div class="card-body">
                       <h5 class="card-title">MARKA</h5>
                   </div>
                   <ul class="list-group list-group-flush">
                       <li class="list-group-item">KUBIKAZA: <span class="podatak">1150ccm</span></li>
                       <li class="list-group-item">KLASA: <span class="podatak">Sport</span> </li>
                       <li class="list-group-item">CENA: <span class="podatak">230<span class="podatak">valuta</span></span></li>
                   </ul>
                   <div class="card-body">
                       <a href="#" class="btn btn-primary">Detaljnije</a>
                   </div>
               </div>
           </div>
       </div>
   </div> -->
