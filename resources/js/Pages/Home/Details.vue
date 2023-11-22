<template>
    <div class="oglasavac_info">
        <h4>Ime i prezime: <span>{{user.name}} {{user.lastname}}</span></h4>
        <h4>broj telefona: <span>{{user.phone}}</span></h4>
        <h4>email: <span>{{ user.email }}</span></h4>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../../assets/images/oglas1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../../assets/images/oglas2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../../assets/images/oglas3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="text_oglasa">
        <h1>MARKA</h1>
        <h3>Kubikaža: <span>1150ccm</span></h3>
        <br>
        <h3>Godište: <span>2010</span></h3>
        <br>
        <h3>Cena: <span>4300€</span></h3>
        <p>Celokupni opis oglas:
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aut! Eius modi magni fugiat aliquam, possimus
            officiis quis voluptatum officia dicta nostrum! Reiciendis, officia quis repudiandae distinctio quas cupiditate
            explicabo! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolorem ducimus voluptatum animi, odio ipsam sed
            enim rem sequi quibusdam esse minus earum tenetur perspiciatis mollitia ut, minima aperiam laboriosam.
        </p>
    </div>
</template>
<script setup>
import {usePage} from "@inertiajs/vue3";
const page = usePage()
const user = page.props.auth.user
</script>
