<template>
    <div class="oglasavac_info">
        <h4>Ime i prezime</h4><!-- <span class="span_oglas">{{user.name}} {{user.lastname}}</span> -->
        <h4>Broj telefona</h4><!-- <span class="span_oglas">{{user.phone}}</span>-->
        <h4>Email </h4><!-- <span class="span_oglas">{{ user.email }}</span>-->
    </div>
    <div class="detalji">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/oglas1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/oglas2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/wrc_games.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/wrc_images.jpg" class="d-block w-100" alt="...">
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
    <div class="oglasavac_info_telefon">
        <h4>Ime i prezime</h4><!-- <span class="span_oglas">{{user.name}} {{user.lastname}}</span> -->
        <h4>Broj telefona</h4><!-- <span class="span_oglas">{{user.phone}}</span>-->
        <h4 id="email_info">Email </h4><!-- <span class="span_oglas">{{ user.email }}</span>-->
    </div>

    <div class="text_oglasa">
        <h1>MARKA</h1>
        <h3>Kubikaža: <span>1150ccm</span></h3>
        <hr class="hr">
        <h3>Godište: <span>2010</span></h3>
        <hr class="hr">
        <h3>Cena: <span>4300€</span></h3>
        <hr class="hr">
        <h3>Klasa: <span>Yugo sport</span></h3>
        <hr class="hr">
        <h3 id="celokupni_opis">Celokupni opis oglas:</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aut! Eius modi magni fugiat aliquam, possimus
            officiis quis voluptatum officia dicta nostrum! Reiciendis, officia quis repudiandae distinctio quas cupiditate
            explicabo! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos dolorem ducimus voluptatum animi, odio
            ipsam sed
            enim rem sequi quibusdam esse minus earum tenetur perspiciatis mollitia ut, minima aperiam laboriosam.
        </p>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
const page = usePage()
const user = page.props.auth.user
</script>
