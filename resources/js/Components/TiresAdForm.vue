<script setup>
import {useForm} from "@inertiajs/vue3";
const form = useForm({
    name : "",
    description: "",
    manufacter: 0,
    price: 0,
    number_of_tires:0,
    isNew : 1,
    fixed: 1,
    type : "tires",

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
                <img src="/images/gume_prodaja.jpeg" alt="" style="width: 100%;height: 100%">
            </div>
            <form  @submit.prevent="store" class="signupForm" name="signupform">
                <h2>Oglas za gume</h2>
                <ul class="noBullet">
                    <li>
                        <label for="ime"></label>
                        <input type="text" class="inputFields" id="ime" name="ime" v-model="form.name" placeholder="Ime"  required/>
                    </li>

                    <li>
                        <label for="opis"></label>
                        <resize-textarea class="inputFields" name="opis" id="opis" placeholder="Opis" v-model="form.description"></resize-textarea>
                    </li>
                    <li>
                        <label for="discipline"></label>
                        <select v-model="form.manufacter" name="discipline" id="discipline" class="inputFields" style="color: white;">
                            <option value="0" selected>-- Izaberite proizvodjaca --</option>
                            <option value="">
                                Rally
                            </option>
                            <option value="">
                                Slalom
                            </option>
                        </select>                </li>
                    <li>
                        <label for="cena"></label>
                        <input type="text" class="inputFields" id="cena" name="cena" placeholder="Cena(€)" required/>
                    </li>
                    <li>
                        <label for="broj"></label>
                        <input type="number" v-model="form.number_of_tires" class="inputFields" id="cena" name="cena" placeholder="Broj guma" min="1" required/>
                    </li>

                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Nove? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="used" checked v-model="form.isNew">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="used" v-model="form.isNew">
                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 10px;">
                        <label for="">Fiksna cena? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="fixed" checked v-model="form.fixed">
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="fixed" v-model="form.fixed">
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
