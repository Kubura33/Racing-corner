<template>
    <!--<div class="oglasavac_info">
        <h4>{{ ad.user.name }} {{ ad.user.lastname }}</h4>-->
    <!-- <span class="span_oglas">{{user.name}} {{user.lastname}}</span> -->
    <!--<h4>{{ ad.user.phone }}</h4><span class="span_oglas">{{user.phone}}</span>-->
    <!--<h4 id="email_info" style="word-break: break-all;">{{ ad.user.email }} </h4>-->
    <!-- <span class="span_oglas">{{ user.email }}</span>-->
    <!--</div>-->
    <div class="oglasavac_info">
        <div class="information-container">
            <div v-if="!isAdOwner" class="save-icon"
            >{{ bookmarkText }}
                <svg v-if="!isFollowed" @click="follow" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                     class="bi bi-bookmark"
                     viewBox="0 0 17 17">
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"
                        stroke="green" stroke-width="1.5"/>
                </svg>
                <svg @click="follow" v-if="isFollowed" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                     class="bi bi-bookmark-fill" viewBox="0 0 16 16" id="IconChangeColor">
                    <path
                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"
                        id="mainIconPathAttribute" fill="green"></path>
                </svg>
            </div>
            <button id="dugme3" @click="showPhone">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg>
                Kontakt telefon
            </button>
            <div v-if="isPhoneVisible" class="phone-container">

                {{ ad.user.phone }}


            </div>
            <button @click="showEmail" id="dugme4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-envelope-at" viewBox="0 0 16 16">
                    <path
                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                    <path
                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                </svg>
                Email
            </button>

            <div v-if="isPopupVisible" class="email-container">

                {{ ad.user.email }}


            </div>
        </div>
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                <div class="icon_slider"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                <div class="icon_slider"><span class="carousel-control-next-icon" aria-hidden="true"></span></div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="text_oglasa">
        <div style="display: flex;flex-direction: row; justify-content: space-between; align-items: center; ">
            <div>
                <h1 ><span class="model">{{ ad.title }}</span> <span v-if="ad.isSold == 1"
                                                                                                                                                                   style="font-weight: bold;color: red; font-size: 28px;">(PRODATO)</span><span
                    id="mali">{{ ad.advertisable.model }}</span></h1>
            </div>
            <div v-if="!isAdOwner" class="mobile-save-icon"
            >
                <svg style="margin-bottom: 15px;" v-if="!isFollowed" @click="follow" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="green"
                     class="bi bi-bookmark"
                     viewBox="0 0 17 17">
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"
                        stroke="green" stroke-width="1.5"/>
                </svg>
                <svg style="margin-bottom: 15px;" @click="follow" v-if="isFollowed" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                     class="bi bi-bookmark-fill" viewBox="0 0 16 16" id="IconChangeColor">
                    <path
                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"
                        id="mainIconPathAttribute" fill="green"></path>
                </svg>
            </div>
        </div>

        <h3 v-if="ad.advertisable_type == 'vehicle'">Model <span>{{ ad.advertisable.model }}</span></h3>
        <h3 v-else-if="ad.advertisable_type === 'equipment'">Brend <span>{{ ad.advertisable.brand }}</span> | Vrsta
            <span>{{ ad.advertisable.vrsta }}</span>
        </h3>
        <h3 v-else-if="ad.advertisable_type === 'parts' && ad.advertisable.type === 'tires'">Proizvodjac <span>{{
                ad.advertisable.manufacter
            }}</span></h3>

        <hr class="hr"
            v-if="ad.advertisable_type != 'parts' || (ad.advertisable_type == 'parts' ? ad.advertisable.type == 'tires' : 0)">
        <h3 v-if="ad.advertisable_type == 'vehicle'">Kubikaža <span>{{ ad.advertisable.engine_displacement }}</span>
        </h3>
        <h3 v-if="ad.advertisable_type == 'equipment'">Velicina <span>{{ ad.advertisable.size }}</span></h3>
        <h3 v-else-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">DOT <span>{{
                ad.advertisable.dot
            }}</span></h3>


        <hr class="hr"
            v-if="ad.advertisable_type != 'parts' || (ad.advertisable_type == 'parts' ? ad.advertisable.type == 'tires' : 0)">

        <h3 v-if="ad.advertisable_type == 'vehicle'">Godište <span>{{ ad.advertisable.year }}</span></h3>
        <h3 v-if="ad.advertisable_type == 'equipment'">Homologacija <span>{{
                ad.advertisable.homologacija === '1' ? "Da" : "Ne"
            }}</span></h3>
        <p v-if="ad.advertisable_type == 'equipment' && ad.advertisable.homologacija == 1">
            {{ ad.advertisable.homologacija_info }}
        </p>
        <h3 v-else-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">Dimnezije <span>{{
                ad.advertisable.dimensions
            }}</span></h3>

        <hr class="hr">
        <h3>Cena <span>{{ ad.price }} &euro;</span></h3>
        <hr class="hr">
        <h3>Fiksna cena <span>{{ ad.fixed ? "Da" : "Ne" }} </span></h3>
        <hr class="hr">

        <h3 v-if="ad.advertisable_type == 'parts' && ad.advertisable.type == 'tires'">Broj guma
            <span>{{ ad.advertisable.number_of_tires }} </span>
        </h3>

        <h3 v-if="ad.advertisable_type == 'vehicle'">Klasa <span>{{ ad.advertisable.vehicle_class }}</span></h3>
        <h3 v-else-if="ad.advertisable_type == 'parts' || ad.advertisable_type == 'equipment'">Novo <span>{{
                ad.advertisable.isNew ? "Da" : "Ne"
            }}</span></h3>

        <hr class="hr">
        <h3 id="celokupni_opis">Celokupni opis oglasa</h3>
        <p>{{
                ad.advertisable.description
            }}
        </p>
        <div
            style="display: flex;flex-direction: row;align-items: center;justify-items: center;justify-content: center; margin-top: 33px;">

        </div>
    </div>
    <div class="kontakt">
        <button id="dugme1" @click="showPhoneOnMobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-telephone" viewBox="0 0 16 16">
                <path
                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
            </svg>
            Kontakt telefon
        </button>
        <div v-if="isPhoneVisibleOnMobile" class="mobile-phone-container">

            {{ ad.user.phone }}


        </div>
        <button id="dugme2" @click="showEmailOnMobile">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-envelope-at" viewBox="0 0 16 16">
                <path
                    d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                <path
                    d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
            </svg>
            Email
        </button>
        <div v-if="isEmailVisibleOnMobile" class="mobile-email-container">

            {{ ad.user.email }}


        </div>
    </div>
</template>
<script setup>
import {usePage, Link, useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

const page = usePage();
const user = page.props.auth.user;
const props = defineProps({
    ad: Object,
});
const naslovna = props.ad.image_path[0];
const isFollowed = ref(false);
const bookmarkText = ref("Zaprati oglas")
const isAdOwner = ref(user.id===props.ad.user.id)

props.ad.image_path.splice(0, 1);
const followForm = useForm({
    ad: props.ad.id
})
const checkIfUserLiked = () => {
    for (let i = 0; i < props.ad.likes.length; i++) {
        if (props.ad.likes[i].id === user.id) {
            isFollowed.value = true
            bookmarkText.value = "Otprati oglas"
        }
    }
};
const isPopupVisible = ref(false)
const isPhoneVisible = ref(false)
const isPhoneVisibleOnMobile = ref(false)
const isEmailVisibleOnMobile = ref(false)
const showEmail = () => {
    isPopupVisible.value = !isPopupVisible.value
}
const showPhone = () => {
    isPhoneVisible.value = !isPhoneVisible.value
}
const showPhoneOnMobile = () => {
    isPhoneVisibleOnMobile.value = !isPhoneVisibleOnMobile.value
    isEmailVisibleOnMobile.value = false
}
const showEmailOnMobile = () => {
    isEmailVisibleOnMobile.value = !isEmailVisibleOnMobile.value
    isPhoneVisibleOnMobile.value = false
}
const follow =  () => {
    isFollowed.value = !isFollowed.value
    followForm.post(route('follow-advert'))

}
onMounted(()=> {
    checkIfUserLiked()

})
</script>
<style scoped>
.email-container {
    padding: 10px;
    text-align: center;
    margin-top: 5px;
    width: 70%;
    margin-left: 15px;
    border: 2px solid #3498db; /* Cool border color */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Subtle box shadow */

    /* Add some additional styles to make it visually appealing */
    background-color: #ecf0f1; /* Light background color */
    color: #2c3e50; /* Text color */
    font-size: 16px; /* Font size */
    font-weight: bold; /* Bold text */
    transition: transform 0.3s ease-in-out; /* Smooth transition on hover */

    /* Add hover effect */
    cursor: pointer;
}

.email-container:hover {
    transform: scale(1.05); /* Scale up on hover */
}

.information-container {
    display: flex;
    flex-direction: column;
    justify-items: center;
    align-items: center;
    justify-content: center;
}
.information-container > .save-icon > svg {
    cursor: pointer;
}
.phone-container {
    padding: 10px;
    text-align: center;
    margin-top: 5px;
    width: 70%;
    margin-left: 15px;
    border: 2px solid #e74c3c; /* Different border color */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(231, 76, 60, 0.7); /* Different shadow color */
    background-color: #f2dede; /* Different background color */
    color: #c0392b; /* Different text color */
    font-size: 16px;
    font-weight: bold;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.phone-container:hover {
    transform: scale(1.05);
}

.mobile-phone-container {
    position: absolute;
    bottom: 100%;
    padding: 10px;
    text-align: center;
    width: 90%;
    border: 2px solid #e74c3c; /* Different border color */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(231, 76, 60, 0.7); /* Different shadow color */
    background-color: #f2dede; /* Different background color */
    color: #c0392b; /* Different text color */
    font-size: 16px;
    font-weight: bold;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.mobile-email-container {
    position: absolute;
    bottom: 100%;
    padding: 10px;
    text-align: center;
    width: 90%;
    border: 2px solid #3498db; /* Cool border color */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Subtle box shadow */

    /* Add some additional styles to make it visually appealing */
    background-color: #ecf0f1; /* Light background color */
    color: #2c3e50; /* Text color */
    font-size: 16px; /* Font size */
    font-weight: bold; /* Bold text */
    transition: transform 0.3s ease-in-out; /* Smooth transition on hover */

    /* Add hover effect */
    cursor: pointer;
}
@media only screen and (max-width: 767px){
    .information-container{
        display: none;
    }
    .mobile-save-icon{
        display: inline-block !important;
    }
}
.mobile-save-icon{
    display: none;
}
</style>
