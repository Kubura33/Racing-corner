<template>
    <div class="banner">
    </div>
    <div style="text-align: center;">
        <b><h2 id="naslov1">Oglasi Premijum korisnika</h2></b>
    </div>
    <div class="premijum">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href=""><img src="../../../assets/images/borkovic.jpg" class="d-block w-100" alt="..."></a>
      <div class="carousel-caption  d-md-block">
        <h1>Cena</h1>
        <h2>Kratak opis oglasa</h2>
      </div>
    </div>
    <div class="carousel-item">
      <a href=""><img src="../../../assets/images/brdo.jpeg" class="d-block w-100" alt="..."></a>
      <div class="carousel-caption  d-md-block">
        <h1>Cena</h1>
        <h2>Kratak opis oglasa</h2>
      </div>
    </div>
    <div class="carousel-item">
      <a href=""><img src="../../../assets/images/drift.jpeg" class="d-block w-100" alt="..."></a>
      <div class="carousel-caption  d-md-block">
        <h1>Cena</h1>
        <h2>Kratak opis oglasa</h2>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
    <div class="div-oglas">
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">MARKA</h5>
                        <p class="card-text">Opis oglasa u jednoj recenici</p>
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
            <div class="col">
                <div class="card">
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">MARKA</h5>
                        <p class="card-text">Opis oglasa u jednoj recenici</p>
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
            <div class="col">
                <div class="card">
                    <img src="../../../assets/images/borkovic.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">MARKA</h5>
                        <p class="card-text">Opis oglasa u jednoj recenici</p>
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
import {Link} from "@inertiajs/vue3";


</script>
