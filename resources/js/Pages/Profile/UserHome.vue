<template>
    <div style="flex-direction: row; gap: 5em;">
        <div class="profil-info">
            <h3>Vaši podaci</h3>
            <div class="mb-3">
                <form action="">

                </form>
                <label for="ime" class="form-label">Ime</label>
                <input class="form-control" id="ime" v-model="editForma.name" type="text" placeholder="Ime"
                       aria-label="default input example">
                <InputError :message="editForma.errors.name" v-if="editForma.errors.name"/>
                <label for="prezime" class="form-label">Prezime</label>
                <input class="form-control" id="prezime" v-model="editForma.lastname" type="text" placeholder="Prezime"
                       aria-label="default input example">
                <InputError :message="editForma.errors.lastname" v-if="editForma.errors.lastname"/>
                <label for="korime" class="form-label">Korisnicko ime</label>
                <input class="form-control" id="korime" v-model="editForma.username" type="text"
                       placeholder="Korisnicko ime" aria-label="default input example">
                <InputError :message="editForma.errors.username" v-if="editForma.errors.username"/>
                <label for="brtel" class="form-label">Broj telefona</label>
                <input class="form-control" id="brtel" v-model="editForma.phone" type="text" placeholder="Broj telefona"
                       aria-label="default input example">
                <InputError :message="editForma.errors.phone" v-if="editForma.errors.phone"/>
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" v-model="editForma.email" id="email"
                       placeholder="name@example.com" disabled>
                <InputError :message="editForma.errors.email" v-if="editForma.errors.email"/>
                <label for="oldPass" class="form-label">Stara lozinka</label>
                <input type="password" v-model="editForma.oldPassword" class="form-control" id="oldPass"
                       placeholder="Old password">
                <label for="newpass" class="form-label">Nova lozinka</label>
                <input type="password" v-model="editForma.newPassword" class="form-control" id="newpass"
                       placeholder="New password">
            </div>
            <button type="button" class="btn btn-success" @click="updejt">Update</button>
        </div>
        <div style="height: 100%; width: 100%;margin-right: 40px;">
            <h3 style="margin-top: 80px; text-align: center">Oglasi koje pratite</h3>
            <div style="border: 3px solid black; height: auto; display: flex; flex-direction: column; overflow: auto;">
                <div v-for="like in user.likes" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between; padding:15px; border-bottom: 2px solid teal;">
                    <Link :href="route('ads.show', {ad : like.id})" style="text-decoration: none; color: #3498db; transition: color 0.3s ease; font-weight: bold;" >
                        {{like.title}}
                    </Link>
                    <Link :href="route('follow-advert', {ad : like.id})" method="post" as="button" class="btn btn-warning">
                        Otprati oglas
                    </Link>

                </div>

            </div>
        </div>
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
                <th scope="row">{{
                        ad.advertisable_type === 'parts' ? (ad.advertisable.type === 'tires' ? 'Gume' : 'Delovi') : serbian(ad.advertisable_type)
                    }}
                </th>
                <td>{{ ad.title }}</td>
                <td style="padding-left: 60px;">{{ad.likes.length}}</td>
                <td>
                    <Link v-if="ad.isSold!= '1'" :href="route('ads.edit', {ad : ad.id})" class="btn btn-success">Edit</Link>
                    <span v-else style="font-weight: bold; color: red;">Oglas je oznacen kao prodat!</span>

                </td>
                <td>
                    <Link v-if="ad.isSold!= '1'" :href="route('advert-has-been-sold', {ad : ad.id})" method="post" as="button" class="btn btn-info">Oznaci kao prodato</Link>
                    <span v-else style="font-weight: bold; color: red;">Oglas je oznacen kao prodat, molimo vas obrisite ga ako vam vise nije od znacaja</span>
                </td>
                <td>
                    <button  class="btn btn-danger"
                          @click.prevent="confirmDelete(ad)">Obriši
                    </button>
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
import {Link, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
const deleteForm = useForm(
    {
        ad:Object
    }
)
const props = defineProps({
    ads: Array,
    user: Object
})

const confirmDelete = (ad) => {
    if (window.confirm('Da li ste sigurni da želite obrisati ovaj oglas?')) {
        deleteForm.ad = ad
        deleteForm.delete(route('ads.destroy', {ad : ad.id}))
    }
    else{
        console.log("Do I work?")
    }
};
const serbian = (val) => {
    switch (val) {
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
    name: props.user ? props.user.name : "",
    lastname: props.user ? props.user.lastname : "",
    username: props.user ? props.user.username : "",
    phone: props.user ? props.user.phone : "",
    email: props.user ? props.user.email : "",
    oldPassword: null,
    newPassword: null,

})
const updejt = () => editForma.patch(route('profile.update'))
</script>
