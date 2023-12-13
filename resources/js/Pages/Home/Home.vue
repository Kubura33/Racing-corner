<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps(
    {
        premiumAds: Array,
        ads : Array,
    }
)

</script>
<template>

    <div class="banner">
        <div class="banner_slika">
            <img src="/images/banner2.jpg" alt="">
                <h2>
                    “The only way to define your limits is by going beyond them.”
                </h2>
        </div>
    </div>


        <div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" v-if="premiumAds.length>0">
            <div class="carousel-inner">
                <div v-for="(group, index) in groups" :key="index" :class="['carousel-item', { active: index === activeIndex }]">
                    <div class="premium-kartice">
                        <span class="traka" id="traka_div_comp"></span>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col" v-for="(card, cardIndex) in group" :key="cardIndex">
                                <span class="traka" id="traka_div_phone"></span>
                                <div class="card">
                                    <img :src="card.image" class="card-img-top" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ card.brand }}</h5>
                                        <h5>CENA: <span class="podatak">{{ card.price }}<span class="podatak">{{ card.currency }}</span></span></h5>
                                    </div>
                                    <Link :href="route('ads.show', {ad : card.id})" class="btn btn-primary">Detaljnije</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <button @click="prev" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Prethodno</span>
            </button>
            <button @click="next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sledeće</span>
            </button>
        </div>
    </div>
    <h2 id="poslednje_dodato" v-if="ads">Poslednje dodato</h2>
    <h2 id="poslednje_dodato" v-else>Trenutno nema oglasa</h2>
    <div class="oglasi_home">
                <Link :href="route('ads.show', {ad:ad.id})" class="wrap" v-for="ad in ads" :key="ad.id">
                    <div class="slika">
                        <a href="">
                            <img :src="ad.image_path[0]" alt="">
                        </a>
                        <div class="data">
                            <h4>
                                {{ ad.title }}
                            </h4>
                        </div>
                        <span class="cena_traka" id="traka_cena">{{ ad.price }} &euro;</span>
                    </div>
                </Link>

            </div>
            <div class="savezi">
                <h2>Linkovi ka zvaničnim sportskim savezima</h2>
                <a href="https://www.fia.com/" class="zastave" id="fia"><h4>FIA</h4></a>
                <a href="http://www.sakss.org.rs/" class="zastave" id="srbija"><h4>SAKSS</h4></a>
                <a href="https://haks.hr/" class="zastave" id="hrvatska"><h4>HAKS</h4></a>
                <a href="https://amsm.mk/" class="zastave" id="makedonija"><h4>AMSM</h4></a>
                <a href="http://akscg.me/" class="zastave" id="crna_gora"><h4>AKSCG</h4></a>
                <a href="https://bfas.bg/" class="zastave" id="bugarska"><h4>БФАС</h4></a>
            </div>
</template>

<script>
export default {
    props :{
        premiumAds : Array,
        ads : Array,
    } ,
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
        addItemToGroup(items){
            let groupIndex = 0
            for(let i=0;i<items.length;i++){
                const item = { id: items[i].id, brand : items[i].title , price: items[i].price, currency : ' €', image: items[i].image_path[0]}
                if((i+1)%3==0)
                    groupIndex=groupIndex+1
                this.groups[groupIndex].push(item)
            }
        }
    },
    mounted() {
        if(this.premiumAds)
            this.addItemToGroup(this.premiumAds)
        this.startAutoChange();
        console.log(this.premiumAds)
        console.log(this.ads)
    }
};
</script>
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
