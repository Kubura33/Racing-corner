<template>
    <div class="table-responsive">
        <h3>Pregled vaših oglasa</h3>
  <table class="table">
    <caption style="margin-left: 2%;">Pregled okačenih oglasa</caption>
  <thead>
    <tr>
      <th scope="col">Vrsta oglas</th>
      <th scope="col">Proizvod</th>
      <th scope="col">Broj praćenja</th>
      <th scope="col">Ažuriraj oglas</th>
      <th scope="col">Obriši oglas</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Auto</th>
      <td>Yugo kabrio Batitsuta</td>
      <td>10</td>
      <td><button type="button" class="btn btn-success">Edit</button></td>
      <td><button type="button" class="btn btn-danger" @click="confirmDelete(index)">Obriši</button>
</td>
    </tr>
    <tr>
      <th scope="row">Delovi</th>
      <td>Menjač</td>
      <td>10</td>
      <td><button type="button" class="btn btn-success">Edit</button></td>
      <td><button type="button" class="btn btn-danger" @click="confirmDelete(index)">Obriši</button></td>
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

const confirmDelete = (index) => {
  if (window.confirm('Da li ste sigurni da želite obrisati ovaj oglas?')) {
    items.value.splice(index, 1);
  }
};
</script>
