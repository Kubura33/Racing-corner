<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import {computed, ref} from "vue";
const fileInput = ref(null)
const message = ref(null)
const form = useForm({
    name: "",
    description: "",
    manufacter: 0,
    price: 0,
    number_of_tires: 0,
    dot: "",
    dimensions: "",
    images: [],

    isNew: 1,
    fixed: 1,
    type: "tires",

})
const openFileInput = () => {
    fileInput.value.click()
}
const handleFileChange = () => {
    const files = fileInput.value.files;
    if (files.length>5){
        message.value= "Maksimalan broj slika je 5"
    }
    else{
        for(let i=0;i<files.length;i++){
            form.images.push(files[i])
        }
    }
}
const useMessage = computed(() => {
    message ? message.value : null
})
const store = () => form.post(route('ads.store'))
</script>
<template>
    <div class="signupSection_top"
        style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;">


        <div class="signupSection">
            <div class="info">
                <div class="icon" @click="emitAction">
                    <div class="arrow"></div>
                </div>
                <img src="/images/gume_prodaja.jpeg" alt="" style="width: 100%;height: 100%">
            </div>
            <form @submit.prevent="store" class="signupForm" name="signupform">
                <h2>Oglas za gume</h2>
                <ul class="noBullet">
                    <li>
                        <label for="ime"></label>
                        <input type="text" class="inputFields" id="ime" name="ime" v-model="form.name" placeholder="Naslov oglasa"
                               required/>
                        <InputError v-if="form.errors.name" :message="form.errors.name"/>
                    </li>

                    <li>
                        <label for="opis"></label>
                        <resize-textarea class="inputFields" name="opis" id="opis" placeholder="Opis"
                                         v-model="form.description"></resize-textarea>
                        <InputError v-if="form.errors.name" :message="form.errors.name"/>

                    </li>
                    <li>
                        <label for="discipline"></label>
                        <select v-model="form.manufacter" name="discipline" id="discipline" class="inputFields"
                                style="color: white;">
                            <option value="0" selected>-- Izaberite proizvodjaca --</option>
                            <option value="Yokohama">
                                Yokohama
                            </option>
                            <option value="Continental">
                                Continental
                            </option>
                            <option value="Michelin">
                                Michelin
                            </option>
                            <option value="Tigar">
                                Tigar
                            </option>
                            <option value="Dunlop">
                                Dunlop
                            </option>
                            <option value="Continental">
                                Continental
                            </option>
                            <option value="Nankang">
                                Nankang
                            </option>
                            <option value="Hankook">
                                Hankook
                            </option>
                            <option value="Avon">
                                Avon
                            </option>

                        </select>
                        <InputError v-if="form.errors.manufacter" :message="form.errors.manufacter"/>

                    </li>
                    <li>
                        <label for="cena"></label>
                        <input type="text" class="inputFields" id="cena" name="cena" placeholder="Cena(€)" required/>
                        <InputError v-if="form.errors.price" :message="form.errors.price"/>

                    </li>
                    <li>
                        <label for="broj"></label>
                        <input type="number" v-model="form.number_of_tires" class="inputFields" id="cena" name="cena"
                               placeholder="Broj guma" min="1" required/>
                        <InputError v-if="form.errors.number_of_tires" :message="form.errors.number_of_tires"/>

                    </li>
                    <li>
                        <label for="dot"></label>
                        <input type="text" class="inputFields" id="dot" name="dot" v-model="form.dot"
                               placeholder="Dot gume" required/>
                        <InputError v-if="form.errors.dot" :message="form.errors.dot"/>

                    </li>
                    <li>
                        <label for="dimenzije"></label>
                        <input type="text" class="inputFields" id="dimenzije" name="dimenzije" v-model="form.dimensions"
                               placeholder="Dimenzije" required/>
                        <InputError v-if="form.errors.dimensions" :message="form.errors.dimensions"/>

                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Nove? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="used" checked v-model="form.isNew">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="used" v-model="form.isNew">
                        <InputError v-if="form.errors.isNew" :message="form.errors.isNew"/>

                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 10px; margin-bottom: 30px;">
                        <label for="">Fiksna cena? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="fixed" checked v-model="form.fixed">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="fixed" v-model="form.fixed">
                        <InputError v-if="form.errors.fixed" :message="form.errors.fixed"/>

                    </li>
                    <li>
                        <div class="Neon Neon-theme-dragdropbox">
                            <input ref="fileInput" name="files[]" id="filer_input2" multiple="multiple" type="file" hidden @change="handleFileChange">
                            <div class="Neon-input-dragDrop">
                                <div class="Neon-input-inner">
                                    <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                    <div class="Neon-input-text">
                                        <h3 v-if="form.images.length===0 && !message">*Prva slika je naslovna, max broj slika je 5</h3>
                                        <h3 v-if="useMessage" style="color: red">{{ useMessage }}</h3>
                                        <div v-else>
                                            <span v-for="image in form.images">
                                                {{image.name}}
                                            </span>

                                        </div>
                                        <span
                                            style="display:inline-block; margin: 20px 0"></span>
                                    </div>
                                    <a href="#" class="Neon-input-choose-btn blue" @click.prevent="openFileInput">Odaberi slike</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="center-btn" style="margin-top: 50px;">
                        <input type="submit" id="join-btn" name="join" alt="Join" value="Kreiraj oglas">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        emitAction() {
            this.$emit('arrow-clicked');
        }
    }
};
</script>
