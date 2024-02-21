<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import {computed, ref} from "vue";
import Compressor from "compressorjs";

const fileInput = ref(null)
const message = ref(0)
const isImageProcessing = ref(false)
const props = defineProps(
    {
        ad: Object,
        isEditting: false,
    }
)
const form = useForm({
    name: props.ad ? props.ad.title : "",
    description: props.ad ? props.ad.advertisable.description : "",
    manufacter: props.ad ? props.ad.advertisable.manufacter : 0,
    price: props.ad ? props.ad.price : "",
    number_of_tires: props.ad ? props.ad.advertisable.number_of_tires : "",
    dot: props.ad ? props.ad.advertisable.dot : "",
    dimensions: props.ad ? props.ad.advertisable.dimensions : "",
    images: [],

    isNew: props.ad ? props.ad.advertisable.isNew : 1,
    fixed: props.ad ? props.ad.advertisable.fixed : 1,
    type: "tires",

})
const openFileInput = () => {
    fileInput.value.click()
}
const handleFileChange = () => {
    const files = fileInput.value.files;
    if (files.length > 5) {
        message.value = 1
    } else {
        for (let i = 0; i < files.length; i++) {
            isImageProcessing.value = true

            if(files[i].size > 8 * 1024 * 1024){
                message.value = 2
                form.images = []
                break;
            }
            if(files[i].size <  1024 * 1024){
                form.images.push(files[i])
            }
            else{
                new Compressor(files[i], {
                    quality: 0.2,
                    success(file) {
                        const myFile = new File([file], file.name, {
                            type : file.type
                        })
                        form.images.push(myFile)
                        isImageProcessing.value =false

                    }
                })
            }


        }
    }
}

const store = () => form.post(route('ads.store'))
const update = () => form.put(route('ads.update', {ad: props.ad.id}))
const ruta = computed(() => {
    if (props.isEditting)
        return update()
    else
        return store()
})
</script>
<template>
    <div class="signupSection_top"
         style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;">


        <div class="signupSection">
            <div class="info">
                <div v-if="!isEditting" class="icon" @click="emitAction">
                    <div class="arrow"></div>
                </div>
                <img src="/images/gume_prodaja.jpeg" alt="" style="width: 100%;height: 100%">
            </div>
            <form @submit.prevent="ruta" class="signupForm" name="signupform">
                <h2>Oglas za gume</h2>
                <ul class="noBullet">
                    <li>
                        <label for="ime"></label>
                        <input type="text" class="inputFields" id="ime" name="ime" v-model="form.name"
                               placeholder="Naslov oglasa"
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
                                style="color: rgb(0, 0, 0); background-color: white; opacity: 0.5;">
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
                        <input type="text" v-model="form.price" class="inputFields" id="cena" name="cena"
                               placeholder="Cena(€)" required/>
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
                        <div class="Neon Neon-theme-dragdropbox" v-if="!isEditting">
                            <input ref="fileInput" name="files[]" accept="image/png, image/jpeg, image/jpg, image/gif"
                                   id="filer_input2" multiple="multiple" type="file" hidden @change="handleFileChange">
                            <div class="Neon-input-dragDrop">
                                <div class="Neon-input-inner">
                                    <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                    <div class="Neon-input-text">
                                        <h3 v-if="form.images.length===0 && !message">*Prva slika je naslovna, max broj slika je 5</h3>
                                        <h3 v-if="message==1" style="color: red">Maksimalan broj slika je 5</h3>
                                        <h3 v-else-if="message == 2" style="color: red">Velicina jedne ili vise slika prelazi 8MB</h3>

                                        <div v-else>
                                            <span v-for="image in form.images">
                                                {{ image.name }}
                                            </span>

                                        </div>
                                        <span
                                            style="display:inline-block; margin: 20px 0"></span>
                                    </div>
                                    <a href="#" class="Neon-input-choose-btn blue" @click.prevent="openFileInput">Odaberi
                                        slike</a>
                                </div>
                            </div>
                        </div>
                        <div v-if="isEditting">
                            Za menjanje slika, obrisite oglas pa kreirajte opet!
                        </div>
                        <InputError v-if="form.errors.images" :message="form.errors.images"/>
                    </li>
                    <li id="center-btn" style="margin-top: 50px;">
                        <input :disabled="form.processing || isImageProcessing"  type="submit" id="join-btn" name="join" alt="Join"
                               :value="isEditting ? 'Edituj oglas' : 'Kreiraj oglas'">
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
