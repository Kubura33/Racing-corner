<template>
    <div class="banner">
    </div>
    <div class="conteiner"
    >
        <form action="" @submit.prevent="create"
              style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top: 10px;">
            <div class="select_element">
                <h3 style="display: inline-block;">Popunite formu za objavljivanje oglasa </h3>
                <InputError :message="form.errors.type"/>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                        :disabled="!isSecondSelectActive"
                        v-model="form.discipline">
                    <option selected disabled>Odaberite disciplinu</option>
                    <option value="1">Rally</option>
                    <option value="2">Kružne trke</option>
                    <option value="3">Brdske trke</option>
                    <option value="4">Slalom</option>
                    <option value="5">Autocross</option>
                    <option value="6">Drift</option>
                    <option value="7">Karting</option>
                </select>
                <InputError :message="form.errors.discipline"/>

            </div>
            <div class="input-group input-group-default mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Kratak opis oglasa</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" placeholder="Kratak opis oglasa"
                       v-model="form.slug">
                <InputError :message="form.errors.slug"/>
            </div>
            <div class="input-group input-group-default mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Unesite cenu</span>
                <input type="number" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" placeholder="Unesite cenu"
                       v-model="form.price">
                <InputError :message="form.errors.price"/>

                <select class="form-select" v-model="selectedCurrency">
                    <option value="EUR">Euro (€)</option>
                    <option value="RSD">Dinar (RSD)</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Unesite Kubikazu</span>
                <input type="number" class="form-control" placeholder="Unesite Kubikazu"
                       v-model="form.engine_displacement">
                <InputError :message="form.errors.engine_displacement"/>

                <span class="input-group-text">ccm</span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Marka vozila</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" placeholder="Unesite marku"
                       v-model="form.vehicle_class">
                <InputError :message="form.errors.vehicle_class"/>

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Klasa/Grupa vozila</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default" placeholder="Klasa/Grupa vozila"
                       v-model="form.vehicle_class">
                <InputError :message="form.errors.vehicle_class"/>
            </div>
            <div class="input-group">
                <span class="input-group-text">Ceo propratni tekst oglasa</span>
                <textarea class="form-control" aria-label="With textarea"
                          placeholder="Ceo propratni tekst oglasa"
                          v-model="form.description"></textarea>
                <InputError :message="form.errors.description"/>

            </div>
            <div class="input-group mb-3">
                <input
                    type="file"
                    class="form-control"
                    id="inputGroupFile02"
                    ref="fileInput"
                    @change="handleFileChange"
                    accept="image/*"
                    multiple
                />
                <label class="input-group-text" for="inputGroupFile02" multiple>(Max 5 slika)</label>
                <InputError :message="form.errors.images"/>

            </div>
            <button class="btn btn-secondary" style="margin-bottom: 10px;height:50px;width: 200px;">Kreiraj oglas
            </button>
        </form>
    </div>
</template>
<script setup>
/* import {ref} from 'vue';
import InputError from "@/Components/InputError.vue";


const selectedCurrency = ref('EUR'); // Početna valuta: Euro

const fileInput = ref(null);

function handleFileChange(event) {
    const files = event.target.files;
    if (files.length < 1) {
        alert('Molimo, izaberite najmanje jednu sliku.');
        fileInput.value.value = ''; // Resetovanje inputa
    } else if (files.length > 5) {
        alert('Možete izabrati najviše 5 slika.');
        fileInput.value.value = ''; // Resetovanje inputa
    } else {
        for (let i = 0; i < event.target.files.length; i++) {
            form.images.push(event.target.files[i]);

        }
    }
}

const create = () => form.post(route('ads.store')) */
</script>
