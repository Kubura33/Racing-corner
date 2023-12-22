<template>
    <div class="oglasavac_info">
        <h4>{{ ad.user.name }} {{ ad.user.lastname }}</h4>
        <!-- <span class="span_oglas">{{user.name}} {{user.lastname}}</span> -->
        <h4>{{ ad.user.phone }}</h4><!-- <span class="span_oglas">{{user.phone}}</span>-->
        <h4 id="email_info" style="word-break: break-all;">{{ ad.user.email }} </h4>
        <!-- <span class="span_oglas">{{ user.email }}</span>-->
    </div>

    <div class="detalji">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img :src="naslovna" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" v-for="image in ad.image_path">
                    <img :src="image" class="d-block w-100" alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <div class="icon_slider"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <div class="icon_slider"><span class="carousel-control-next-icon" aria-hidden="true"></span></div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="text_oglasa">
        <h1>{{ ad.title }}</h1>
        <h3 v-if="ad.advertisable_type == 'vehicle'">Model: <span>{{ ad.advertisable.model }}</span>    </h3>
        <h3 v-else-if="ad.advertisable_type === 'equipment'">Brend: <span>{{ ad.advertisable.brand }}</span> | Vrsta : <span>{{ad.advertisable.vrsta}}</span></h3>
        <h3 v-else-if="ad.advertisable_type === 'parts' && ad.advertisable.type === 'tires'">Proizvodjac: <span>{{
            ad.advertisable.manufacter }}</span></h3>

        <hr class="hr"
            v-if="ad.advertisable_type != 'parts' || (ad.advertisable_type == 'parts' ? ad.advertisable.type == 'tires' : 0)">
        <h3 v-if="ad.advertisable_type == 'vehicle'">Kubikaža: <span>{{ ad.advertisable.engine_displacement }}</span></h3>
        <h3 v-if="ad.advertisable_type == 'equipment'">Velicina: <span>{{ ad.advertisable.size }}</span></h3>
        <h3 v-else-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">DOT: <span>{{ ad.advertisable.dot
        }}</span></h3>


        <hr class="hr"
            v-if="ad.advertisable_type != 'parts' || (ad.advertisable_type == 'parts' ? ad.advertisable.type == 'tires' : 0)">

        <h3 v-if="ad.advertisable_type == 'vehicle'">Godište: <span>{{ ad.advertisable.year }}</span></h3>
        <h3 v-if="ad.advertisable_type == 'equipment'">Homologacija: <span>{{
            ad.advertisable.homologacija==='1' ? "Da" : "Ne" }}</span></h3>
        <p v-if="ad.advertisable_type == 'equipment' && ad.advertisable.homologacija == 1">
            {{ ad.advertisable.homologacija_info }}
        </p>
        <h3 v-else-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">Dimnezije: <span>{{
            ad.advertisable.dimensions }}</span></h3>

        <hr class="hr">
        <h3>Cena: <span>{{ ad.price }} &euro;</span></h3>
        <hr class="hr">
        <h3>Fiksna cena: <span>{{ ad.fixed ? "Da" : "Ne" }} </span></h3>
        <hr class="hr">

        <h3 v-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">Broj guma:
            <span>{{ ad.advertisable.number_of_tires }} </span></h3>

        <h3 v-if="ad.advertisable_type == 'vehicle'">Klasa: <span>{{ ad.advertisable.vehicle_class }}</span></h3>
        <h3 v-else-if="ad.advertisable_type == 'parts' || ad.advertisable_type == 'equipment'">Novo: <span>{{
            ad.advertisable.isNew ? "Da" : "Ne" }}</span></h3>

        <hr class="hr">
        <h3 id="celokupni_opis">Celokupni opis oglas:</h3>
        <p>{{
            ad.advertisable.description
        }}
        </p>
        <div style="display: flex;flex-direction: row;align-items: center;justify-items: center;justify-content: center; margin-top: 33px;">
            <Link method="post" as="button" :href="route('follow-advert', {ad : ad.id})" class="btn btn-primary">{{checkIfUserLiked()}}</Link>
        </div>
    </div>
</template>
<script setup>
import { usePage, Link } from "@inertiajs/vue3";
const page = usePage()
const user = page.props.auth.user
const props = defineProps({
    ad: Object
})
const naslovna = props.ad.image_path[0]
props.ad.image_path.splice(0, 1)


const checkIfUserLiked = () => {
    for(let i=0;i<props.ad.likes.length;i++){
        if(props.ad.likes[i].id === user.id){
            return "Otprati oglas"
        }
    }
    return "Prati oglas"
}
</script>
