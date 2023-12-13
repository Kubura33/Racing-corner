<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import {computed, ref} from "vue";
const fileInput = ref(null)
const message = ref(null)
const form = useForm({
    name: "",
    description : "",
    price: 0,
    isNew : 1,
    fixed: 1,
    brand: "",
    type: "equipment",
    size : 0,
    homologacija: 0,
    homologacija_info : "",
    images: [],

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
const store = () => form.post(route('ads.store'))
const useMessage = computed(() => {
    message ? message.value : null
})
</script>
<template>
    <div style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;padding: 100px;">


        <div class="signupSection">
            <div class="info">
                <div class="icon" @click="emitAction">
                    <div class="arrow"></div>
                </div>
                <img src="/images/kaciga.jpg" alt="" style="width: 100%;height: 100%">
            </div>
            <form  @submit.prevent="store" class="signupForm" name="signupform">
                <h2>Oglas za opremu</h2>
                <ul class="noBullet">
                    <li>
                        <label for="name"></label>
                        <input v-model="form.name" type="text" class="inputFields" id="name" name="name" placeholder="Naslov oglasa"  />
                        <InputError v-if="form.errors.name" :message="form.errors.name" />
                    </li>

                    <li>
                        <label for="opis"></label>
                        <resize-textarea v-model="form.description" class="inputFields" name="opis" id="opis" placeholder="Opis"></resize-textarea>
                        <InputError v-if="form.errors.description" :message="form.errors.description" />
                    </li>
                    <li>
                        <label for="brand"></label>
                        <input type="text" v-model="form.brand" class="inputFields" id="brand" name="brand" placeholder="Brend/Model"  required/>
                        <InputError v-if="form.errors.brand" :message="form.errors.brand" />
                    </li>
                    <li>
                        <label for="cena"></label>
                        <input type="text" v-model="form.price" class="inputFields" id="cena" name="cena" placeholder="Cena(€)"  required/>
                        <InputError v-if="form.errors.price" :message="form.errors.price" />
                    </li>
                    <select v-model="form.size" name="discipline" id="discipline" class="inputFields"
                            style="color: white;">homologacija
                        <option value="0" selected>-- Izaberite Velicinu --</option>
                        <option value="S">
                            S
                        </option>
                        <option value="M">
                            M
                        </option>
                        <option value="L">
                            L
                        </option>
                        <option value="XL">
                            XL
                        </option>
                        <option value="XXL">
                            XXL
                        </option>
                        <option value="XXXL">
                            XXXL
                        </option>
                    </select>

                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Novo? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" v-model="form.isNew" name="used" checked>
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="used" v-model="form.isNew">
                        <InputError v-if="form.errors.isNew" :message="form.errors.isNew" />
                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Fiksna cena? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="fixed" checked v-model="form.fixed">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="fixed" v-model="form.fixed">
                        <InputError v-if="form.errors.fixed" :message="form.errors.fixed" />
                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px; margin-bottom: 30px;">
                        <label for="">Homologacija? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="homologacija" checked v-model="form.homologacija">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="homologacija" v-model="form.homologacija">
                        <InputError v-if="form.errors.homologacija" :message="form.errors.homologacija" />
                    </li>
                    <Transition>
                    <li v-show="form.homologacija==1" style="margin-bottom: 30px;">
                        <label for="homologacija_info"></label>
                        <input type="text" v-model="form.homologacija_info" class="inputFields" id="homologacija_info" name="homologacija_info" placeholder="Informacije o homologaciji" />
                        <InputError v-if="form.errors.homologacija_info" :message="form.errors.homologacija_info" />
                    </li>
                        </Transition>
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

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 1s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
