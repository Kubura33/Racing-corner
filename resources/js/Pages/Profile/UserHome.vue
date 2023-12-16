<template>
  <div class="profil-info">
    <h3>Vaši podaci</h3>
    <div class="mb-3">
        <form action="">

        </form>
      <label for="ime" class="form-label">Ime</label>
      <input class="form-control" id="ime" v-model="editForma.name" type="text" placeholder="Ime" aria-label="default input example">
        <InputError :message="editForma.errors.name" v-if="editForma.errors.name"/>
      <label for="prezime" class="form-label">Prezime</label>
      <input class="form-control" id="prezime" v-model="editForma.lastname" type="text" placeholder="Prezime" aria-label="default input example">
        <InputError :message="editForma.errors.lastname" v-if="editForma.errors.lastname"/>
      <label for="korime" class="form-label">Korisnicko ime</label>
      <input class="form-control" id="korime" v-model="editForma.username" type="text" placeholder="Korisnicko ime" aria-label="default input example">
        <InputError :message="editForma.errors.username" v-if="editForma.errors.username"/>
      <label for="brtel" class="form-label">Broj telefona</label>
        <input class="form-control" id="brtel" v-model="editForma.phone" type="text" placeholder="Broj telefona" aria-label="default input example">
        <InputError :message="editForma.errors.phone" v-if="editForma.errors.phone"/>
        <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" v-model="editForma.email" id="email" placeholder="name@example.com">
        <InputError :message="editForma.errors.email" v-if="editForma.errors.email"/>
        <label for="oldPass" class="form-label">Stara lozinka</label>
      <input type="password" v-model="editForma.oldPassword" class="form-control" id="oldPass" placeholder="Old password">
      <label for="newpass" class="form-label">Nova lozinka</label>
      <input type="password" v-model="editForma.newPassword" class="form-control" id="newpass" placeholder="New password">
    </div>
    <button type="button" class="btn btn-success" @click="updejt">Update</button>
  </div>
  <div>

  </div>
  <hr>
  <div class="table-responsive">
    <h3>Pregled vaših oglasa</h3>
    <table class="table">
      <caption style="margin-left: 2%;">Pregled okačenih oglasa</caption>
      <thead>
        <tr>
          <th scope="col">Vrsta oglas</th>
          <th scope="col">Naslov</th>
          <th scope="col">Broj praćenja</th>
          <th scope="col">Ažuriraj oglas</th>
          <th scope="col">Status oglasa</th>
          <th scope="col">Obriši oglas</th>

        </tr>
      </thead>
      <tbody>
        <tr v-for="ad in ads" :key="ad.id">
          <th scope="row">{{ ad.advertisable_type==='parts' ? (ad.advertisable.type==='tires' ? 'Gume' : false) :  serbian(ad.advertisable_type) }}</th>
          <td>{{ ad.title }}</td>
          <td>TREBA DA DODAM!!!</td>
          <td><Link :href="route('ads.edit', {ad : ad.id})" class="btn btn-success">Edit</Link></td>
          <td><button type="button" class="btn btn-info">Aktivan</button></td>
          <td><Link :href="route('ads.destroy', {ad : ad.id})" as="button" method="delete" class="btn btn-danger" @click="confirmDelete(index)">Obriši</Link>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue';
import {Link, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    ads : Array,
    user : Object
})
console.log(props.ads)
const confirmDelete = (index) => {
  if (window.confirm('Da li ste sigurni da želite obrisati ovaj oglas?')) {
    items.value.splice(index, 1);
  }
};
const serbian = (val) => {
    switch (val){
        case 'vehicle' :
            return 'Automobil'
            break
        case 'equipment':
            return 'Oprema'
            break
        case 'parts':
            return 'Delovi'
            break
    }
}
const editForma = useForm({
    name : props.user ? props.user.name : "",
    lastname : props.user ? props.user.lastname : "",
    username : props.user ? props.user.username : "",
    phone : props.user ? props.user.phone : "",
    email : props.user ? props.user.email : "",
    oldPassword : null,
    newPassword: null,

})
const updejt = () => editForma.patch(route('profile.update'))
</script>
