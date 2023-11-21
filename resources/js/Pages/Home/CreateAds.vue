<template>
    <div class="banner">
    </div>
    <div class="conteiner">
        <div class="select_element">
            <h3>Odaberite vrstu oglasa: </h3>
            <select class="form-select" aria-label=".form-select-sm example" v-model="selectedAdType"
                @change="handleAdTypeChange">
                <option selected disabled>Odaberite vrstu oglasa</option>
                <option value="1">Auto</option>
                <option value="2">Oprema</option>
                <option value="3">Delovi</option>
                <option value="4">Gume</option>
            </select>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                :disabled="!isSecondSelectActive">
                <option selected disabled>Odaberite disciplinu</option>
                <option value="1">Rally</option>
                <option value="2">Kružne trke</option>
                <option value="3">Brdske trke</option>
                <option value="4">Slalom</option>
                <option value="5">Autocross</option>
                <option value="6">Drift</option>
                <option value="7">Karting</option>
            </select>
        </div>
        <div class="input-group input-group-default mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Kratak opis oglasa</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" placeholder="Kratak opis oglasa">
        </div>
        <div class="input-group input-group-default mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Unesite cenu</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" placeholder="Unesite cenu(NNNN format)" v-model="enteredPrice">
            <select class="form-select" v-model="selectedCurrency">
                <option value="EUR">Euro (€)</option>
                <option value="RSD">Dinar (RSD)</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Unesite Kubikazu</span>
            <input type="text" class="form-control" placeholder="Unesite Kubikazu" :disabled="!isSecondSelectActive">
            <span class="input-group-text">ccm</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Klasa/Grupa vozila</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" placeholder="Klasa/Grupa vozila"
                :disabled="!isSecondSelectActive">
        </div>
        <div class="input-group">
            <span class="input-group-text">Ceo propratni tekst oglasa</span>
            <textarea class="form-control" aria-label="With textarea" placeholder="Ceo propratni tekst oglasa"></textarea>
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
    <label class="input-group-text" for="inputGroupFile02">(Max 5 slika)</label>
  </div>
    </div>
</template>
<script setup>
import { ref } from 'vue';

const selectedAdType = ref(null);
const isSecondSelectActive = ref(false);

function handleAdTypeChange() {
    if (selectedAdType.value === '1') { // Da li je izabrana opcija Auto
        isSecondSelectActive.value = true; // Aktivno
    } else {
        isSecondSelectActive.value = false; // Neaktivno
    }
}


const enteredPrice = ref('');
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
  }
}
</script>