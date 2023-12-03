<script setup>
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: "",
    description : "",
    price: 0,
    isNew : 1,
    fixed: 1,
    brand: "",
    type: "equipment"
})
const store = () => form.post(route('ads.store'))

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
                        <label for="ime"></label>
                        <input v-model="form.name" type="text" class="inputFields" id="ime" name="ime" placeholder="Ime"  />
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
