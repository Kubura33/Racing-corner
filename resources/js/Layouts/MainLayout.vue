<template>
    <!---Start of header-->
    <div class="top_header">
        <h4>
            Trkačka berza
        </h4>
        <span v-if="!user">
    <b> <Link class="nalog" :href="route('login')"> Sign In</Link></b>
    </span>
        <span v-else>
            <b >
                <Link class="nalog" :href="route('profile.index')">
                    {{user.username}}
                </Link>

            </b>
            <b>
                <Link class="nalog" method="POST" as="button" :href="route('logout')">Logout</Link>
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
                        <Link class="nav-link" :href="route('cars')">Automobili</Link>
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
    <div @click="messages.success=null" v-if="messages.success" class="alert alert-success" role="alert">
        {{ messages.success}}
    </div>
    <div @click="messages.error=null" v-if="messages.error" class="alert alert-danger" role="alert">
        {{ messages.error}}
    </div>
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
            </div>



            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Pišite nam na našu email adresu</h5>
                    <p>official@racing-corner.com</p>
                </form>
            </div>
        </div>

        <div class=" border-top" style="text-align: center; padding-top: 5%;">
            <p> <a href="https://www.linkedin.com/in/andrej-vojinovic-2ab27b279/" style="text-decoration: none; color:teal;">Andrej Vojinovic</a> - <a style="text-decoration: none; color:teal;" href="https://www.linkedin.com/in/igor-kuburovic-069503222/">Igor Kuburovic </a>&copy;2023</p>
        </div>
    </footer>
    <!--  //end of footer-->

</template>
<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user)
const messages = computed( () => page.props.messages)
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbarCollapse = document.querySelector('.navbar-collapse');
        navbarCollapse.addEventListener('click', function(event) {
            const target = event.target;
            const isNavLink = target.closest('.nav-link');

            if (isNavLink) {
                const isDropdownItem = target.closest('.dropdown-item');
                const isOstalo = target.closest('.nav-item.dropdown');

                if (!isDropdownItem && !isOstalo && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            }
        });

        document.addEventListener('click', function(event) {
            const target = event.target;
            const isNavbarToggler = target.closest('.navbar-toggler');
            const isNavbarCollapse = target.closest('.navbar-collapse');
            const isOstalo = target.closest('.nav-item.dropdown');

            if ((!isNavbarToggler && !isNavbarCollapse && navbarCollapse.classList.contains('show')) || (!isOstalo && navbarCollapse.classList.contains('show'))) {
                navbarCollapse.classList.remove('show');
            }
        });
    });
</script>



