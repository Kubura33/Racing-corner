<template>
    <!---Start of header-->
    <div class="fixed-header">


        <div class="top_header">
            <Link :href="route('home')">
                <h4>
                    Trkačka berza
                </h4>
            </Link>
            <span v-if="!user">
            <b>
                <Link class="nalog" :href="route('login')"> Sign In</Link>
            </b>
        </span>
            <span pan v-else>
            <b class="border-around-username" :class="{'radiate' : !isMenuOpen && notificationCount>0 && !isNotifPage }"
            >
                <span @click="toggleMenu" class="nalog" style="cursor: pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="27" fill="currentColor"
                         class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd"
        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>&nbsp;{{ user.username }}


                </span>
            </b>
            <div :class="{ 'open-menu': isMenuOpen}" class="sub-menu-wrap">
                <div class="sub-menu">
                    <div class="user-info">
                        <h3>{{ user.name }} {{ user.lastname }}</h3>
                        <h5>{{ user.username }}</h5>
                    </div>
                    <hr>
                    <Link :href="route('notification.index')" style="background: none; border: none; padding:0;"
                          :class="{'blink' : isMenuOpen && notificationCount && !isNotifPage}"
                          class="sub-menu-link">
                        <img src="/images/notificationBell.png" alt="">
                        <p>Obavestenja {{ notificationCount ? '(' + notificationCount + ')' : '' }}</p>
                    </Link>
                    <Link :href="route('created-ads')" style="background: none; border: none; padding:0;"
                          class="sub-menu-link">
                        <img src="/images/brOglasa.png" alt="">
                        <p>Vasi oglasi</p>
                    </Link>
                    <Link :href="route('followed-ads')" class="sub-menu-link">
                        <img src="/images/bookmarkThird.png" alt="">
                        <p>Sacuvani oglasi</p>
                    </Link>
                    <Link :href="route('settings')" class="sub-menu-link">
                        <img src="/images/setting.png" alt="">
                        <p>Profil</p>
                    </Link>
                    <hr>
                    <Link :href="route('logout')" method="POST" as="button"
                          style="background: none; border: none; padding:0;" class="sub-menu-link">
                        <img src="/images/logout.png" alt="">
                        <p>Logout</p>
                    </Link>
                </div>
            </div>


        </span>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown"
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

    </div>
    <!--    //End of header-->
    <div id="alert-success" :style="{top: flashTop +'px'}" @click="messages.success = null" v-if="messages.success" class="alert alert-success" role="alert"
    >
        {{ messages.success }}
    </div>
    <div id="alet-error" :style="{top: flashTop +'px'}" @click="messages.error = null" v-if="messages.error" class="alert alert-danger" role="alert"
    >
        {{ messages.error }}
    </div>
    <!--    //Start of main content of the page-->
    <main
        :style="{marginTop : mainMarginTop + 'px'}"
        :class="{ 'ifFlash': messages.success || messages.error, 'ifNotFlash': !messages.success && !messages.error }">
        <slot>

        </slot>
    </main>
    <!--    //End of the main content of the page-->

    <!--    //Start of footer-->

    <footer class="text-center text-lg-start text-white">
        <!-- Grid container -->
        <div class="container p-2 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid <column-->
                    <div class="col-lg-7 col-md-6 mb-2 mb-md-0" style="text-align: center;">
                        <form>
                            <h5>Pišite nam na našu email adresu</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                            <p>official@racing-corner.com</p>
                        </form>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-2 mb-md-0" style="text-align: center;">
                        <h5 class="text-uppercase">Brzi linkovi</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <Link :href="route('cars')" class="text-white">Auto prodaja</Link>
                            </li>
                            <li>
                                <Link :href="route('parts')" class="text-white">Delovi prodaja</Link>
                            </li>
                            <li>
                                <Link :href="route('tires')" class="text-white">Gume prodaja</Link>
                            </li>
                            <li>
                                <Link :href="route('equipment')" class="text-white">Oprema prodaja</Link>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
            <hr class="mb-4"/>
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Register for free</span>
                    <Link :href="route('login')" type="button" class="btn btn-outline-light btn-rounded">
                        Sign up!
                    </Link>
                </p>
            </section>
            <hr class="mb-4"/>
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
                <p><a href="https://www.linkedin.com/in/andrej-vojinovic-2ab27b279/"
                      style="text-decoration: none; color:teal;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                         height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4"/>
                    </svg>
                </a> - <a style="text-decoration: none; color:teal;"
                          href="https://www.linkedin.com/in/igor-kuburovi%C4%87-069503222/">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4"/>
                    </svg>
                </a></p>
            </section>
        </div>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!--  //end of footer-->
</template>
<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed, ref, onMounted, onBeforeUnmount, onUnmounted} from "vue";
import {router} from "@inertiajs/vue3";


const isMenuOpen = ref(false); //Value that checks if menu is open
const page = usePage();
const user = computed(() => page.props.auth.user)
const notificationCount = computed(() => page.props.auth.notificationCount.length)
const messages = computed(() => page.props.messages)
const isOnNotificationPage = ref(false); //Value thats based on if user is on notif page or not

//FUNCTIONS THAT ARE USED TO WORK WITH PROFILE SUB MENU AND DEALING WITH ANIMATION WHEN THERES NOTIFICATIONS
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value
}
const closeSubMenu = (event) => {
    if (isMenuOpen.value && !event.target.closest('.sub-menu-wrap') && !event.target.classList.contains('nalog')) {
        isMenuOpen.value = false;
    }
}

router.on('start', (event) => {
    isOnNotificationPage.value = event.detail.visit.url.toString().includes('/profile/notifications')

})
const isNotifPage = computed(()=> {
    return isOnNotificationPage.value
})
//END OF FUNCTIONS THAT ARE USED TO WORK WITH PROFILE SUB MENU AND DEALING WITH ANIMATION WHEN THERES NOTIFICATIONS

//SCALING THE MAIN BASED ON THE SIZE OF SCREEN
const topOfFlashMessage = ref(0)
const marginTop = ref(0)
const updateMainMarginTop = () => {
    const header = document.querySelector('.fixed-header');
    const  upperHeader = document.querySelector('.top_header')
    if(header){
        const headerHeight = header.offsetHeight
        marginTop.value = headerHeight
    }
    if(upperHeader){
        const upperHeaderHeight = upperHeader.offsetHeight
        topOfFlashMessage.value = upperHeaderHeight
    }
}
window.addEventListener('resize', updateMainMarginTop )
const mainMarginTop = computed(() => {return marginTop.value})
const flashTop = computed(() => {return topOfFlashMessage.value})
//END OF SCALING THE MAIN BASED ON THE SIZE OF SCREEN

onMounted(() => {
    //Function that closes the menu when its clicked on one of its items
    document.addEventListener('click', closeSubMenu)
    document.querySelectorAll('.sub-menu-link').forEach((item) => {
        item.addEventListener('click', function () {
            isMenuOpen.value = false;
        })
    })
    //END OF function that closes the menu when its clicked on one of its items
    updateMainMarginTop()
})
onUnmounted(() => {
    document.removeEventListener('click', closeSubMenu)

})


</script>

<script>
 //Functions that are used to work with drop menus, closing when clicking out of the element and when passing to a different page
document.addEventListener('DOMContentLoaded', function () {
    const navbarCollapse = document.querySelector('.navbar-collapse');
    navbarCollapse.addEventListener('click', function (event) {
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
    document.addEventListener('click', function (event) {
        const target = event.target;
        const isNavLink = target.closest('.nav-link');
        const isDropdownItem = target.closest('.dropdown-item');
        const isOstalo = target.closest('.nav-item.dropdown');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        if (!isNavLink && !isDropdownItem && !isOstalo && navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
        }
    });

    const dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            // Hide the navbar
            document.querySelector('.navbar-collapse').classList.remove('show');
        });
    });
});
 //END OF functions that are used to work with drop menus
</script>
<style scoped>


#alet-error, #alert-success{
    height: 55px;
    width: 400px;
    position: absolute;
    right: 0px;
    top: 54px;
    z-index: 111111;
}

.radiate {
    animation: radiate 1s infinite;
}

@keyframes radiate {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.5;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes blink {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.5;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.blink {
    animation: blink 1s infinite;
}

@media screen and (max-width: 992px) {

}
</style>



