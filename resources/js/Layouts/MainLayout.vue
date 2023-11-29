<template>
    <!---Start of header-->
    <div class="top_header">
        <h4>
            Trkačka berza
        </h4>
        <span v-if="!user">
    <b><Link class="nalog" :href="route('register')"> Kreiraj nalog</Link></b>
    <b> <Link class="nalog" :href="route('login')"> Uloguj se </Link></b>
    </span>
        <span v-else>
            <b class="nalog">
                {{user.username}}
            </b>
            <b>
                <Link class="nalog" :href="route('logout')">Logout</Link>
            </b>

        </span>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link" aria-current="page" :href="route('home')">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('equipment')">Automobili</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('ads.create')">Kreiraj oglas</Link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Ostalo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <Link class="dropdown-item" :href="route('tires')">Gume</Link>
                            </li>
                            <li>
                                <Link class="dropdown-item" :href="route('parts')">Delovi</Link>
                            </li>
                            <li>
                                <Link class="dropdown-item" :href="route('equipment')">Oprema</Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('about')">O nama</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--    //End of header-->

    <!--    //Start of main content of the page-->
    <main>
        <slot>

        </slot>
    </main>
    <!--    //End of the main content of the page-->

    <!--    //Start of footer-->
    <footer class="py-5">
        <div class="row" style="text-align:center">
            <div class="col- col-md-2 mb-3" id="col">
                <h5>Ponuda</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Kruzne trke</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Brdske trke</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Rally trke</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Autocross</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Drift</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Karting</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Slalom</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">SAKSS</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">AMSS</a></li>
                </ul>
            </div>

            

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Pisite nam na nasu email adresu</h5>
                    <p>nsadn@nasda.com</p>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy;2023</p>
        </div>
    </footer>
    <!--  //end of footer-->

</template>
<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user)
</script>
