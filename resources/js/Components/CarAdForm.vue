<script setup>
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    vehicle_model : "",
    vehicle_class: "",
    engine_displacement: "",
    description: "",
    price: 0,
    discipline: 0,
    fixed:null,
})
const store = form.post(route('ads.store'))
</script>

<template>
    <div style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;padding: 100px;">


    <div class="signupSection">
        <div class="info">
            <div class="icon" @click="emitAction">
                <div class="arrow"></div>
            </div>
            <img src="/images/toyota.jpg" alt="" style="width: 100%;height: 100%">
        </div>
        <form  @submit.prevent="store" class="signupForm" name="signupform">
            <h2>Oglas za automobile</h2>
            <ul class="noBullet">
                <li>
                    <label for="model"></label>
                    <input v-model="form.vehicle_model" type="text" class="inputFields" id="model" name="model" placeholder="Model" required/>
                </li>
                <li>
                    <label for="klasa"></label>
                    <input v-model="form.vehicle_class" type="text" class="inputFields" id="klasa" name="klasa" placeholder="Klasa"  required/>
                </li>
                <li>
                    <label for="kubikaza"></label>
                    <input v-model="form.engine_displacement" type="text" class="inputFields" id="kubikaza" name="kubikaza" placeholder="Kubikaza    " required/>
                </li>
                <li>
                    <label for="opis"></label>
                    <resize-textarea v-model="form.description" class="inputFields" name="opis" id="opis" placeholder="Opis"></resize-textarea>
                </li>
                <li>
                    <label for="cena"></label>
                    <input v-model="form.price" type="text" class="inputFields" id="cena" name="cena" placeholder="Cena(€)"  required/>
                </li>
                <li>
                    <label for="discipline"></label>
                    <select v-model="form.discipline" name="discipline" id="discipline" class="inputFields" style="color: white;">
                        <option value="0" selected>-- Izaberite disciplinu --</option>
                        <option value="">
                            Rally
                        </option>
                        <option value="">
                            Slalom
                        </option>
                    </select>                </li>

                <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem;">
                    <label for="">Fiksna cena? </label>
                    <label for="da">Da</label>
                    <input v-model="form.fixed" type="radio" id="da" value="1" name="fixed" checked>
                    <label for="ne">Ne</label>
                    <input v-model="form.fixed" type="radio" id="ne" value="0" name="fixed">
                </li>

                <li>
                    OVDE DODATI INPUT ZA SLIKE

                </li>
                <li id="center-btn">
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
        },
    }
};
</script>
