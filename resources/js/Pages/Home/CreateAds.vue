<template>
    <div id="kartice-div">
      <div class="kartice-div">
        <form action="" @submit.prevent="create" v-if="showImages">
          <div class="row flex-column flex-sm-row">
            <div class="col mb-4" v-for="item in items" :key="item.id" @click="showForm(item.id)">
              <div class="kartica">
                <img :src="item.image" class="card-img-top" :alt="item.alt">
                <div class="naslov-preko">
                  <h3>{{ item.title }}</h3>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form v-else>
          <div>
            <label for="name">Ime:</label>
            <input type="text" id="name" v-model="form.name">
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        showImages: true,
        selectedImageId: null,
        form: {
          name: '',
        },
        items: [
          {
            id: 1,
            image: "resources/assets/images/toyota.jpg",
            alt: "Toyota",
            title: "Auto",
          },
          {
            id: 2,
            image: "delovi.jpeg",
            alt: "Delovi",
            title: "Delovi",
          },
          {
            id: 3,
            image: "../../../resources/assets/images/kaciga.jpg",
            alt: "Kaciga",
            title: "Oprema",
          },
          {
            id: 4,
            image: "../../../assets/images/gume_prodaja.jpeg",
            alt: "Gume",
            title: "Gume",
          },
        ],
      };
    },
    methods: {
      showForm(imageId) {
        this.selectedImageId = imageId;
        this.showImages = false;
        // Možete ovdje dodati logiku za prikazivanje odgovarajuće forme na osnovu odabrane slike
        // Na primjer, na osnovu this.selectedImageId možete odrediti koju formu treba prikazati
      },
      create() {
      },
    },
  };
  </script>
