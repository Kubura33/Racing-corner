<template>
    <div class="oglasavac_info">
        <h4>Ime i prezime:</h4><span class="span_oglas">{{user.name}} {{user.lastname}}</span>
        <h4>Broj telefona:</h4> <span class="span_oglas">{{user.phone}}</span>
        <h4>Email: </h4><span class="span_oglas">{{ user.email }}</span>
        <h4>Sacuvaj oglas </h4><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="-2500 0 5000 500"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></span>
    </div>
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
        <br> <hr class="hr">
        <h3>Godište: <span>2010</span></h3>
        <br> <hr class="hr">
        <h3>Cena: <span>4300€</span></h3>
        <br> <hr class="hr">
        <h3>Klasa: <span>Yugo sport</span></h3>
        <br> <hr class="hr">
        <h3>Celokupni opis oglas:</h3> <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, aut! Eius modi magni fugiat aliquam, possimus
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
