<template>

    <div class="banner">
        <div class="banner_slika">
            <img src="../../../assets/images/banner2.jpg" alt="">
            <div class="div_slika">

            </div>
        </div>
    </div>



    <div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div v-for="(group, index) in groups" :key="index" :class="['carousel-item', { active: index === activeIndex }]">
                    <div class="premium-kartice">
                        <span class="traka" id="traka_div"></span>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col" v-for="(card, cardIndex) in group" :key="cardIndex">
                                <div class="card">
                                    <img :src="card.image" class="card-img-top" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ card.brand }}</h5>
                                        <h5>CENA: <span class="podatak">{{ card.price }}<span class="podatak">{{ card.currency }}</span></span></h5>
                                    </div>
                                    <a href="#" class="btn btn-primary">Detaljnije</a>
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

    <div class="div-oglas">
        <div class="row">
            <div class="col col-md-4 mb-3">
                <div class="card">
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
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
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
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
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
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
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";


</script>
<script>
export default {
    data() {
        return {
            activeIndex: 0,
            groups: [
                [
                    { brand: 'Marka 1', price: 230, currency: 'valuta', image: '/images/drift.jpeg' },
                    { brand: 'Marka 2', price: 230, currency: 'valuta', image: '/images/drift.jpeg' },
                    { brand: 'Marka 3', price: 230, currency: 'valuta', image: '/images/drift.jpeg' }
                ],
                [
                    { brand: 'Marka', price: 230, currency: 'valuta', image: '/images/drift.jpeg' },
                    { brand: 'Marka', price: 230, currency: 'valuta', image: '/images/drift.jpeg' },
                    { brand: 'Marka', price: 230, currency: 'valuta', image: '/images/drift.jpeg' }
                ]
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
        }
    },
    mounted() {
        this.startAutoChange();
    }
};
</script>
