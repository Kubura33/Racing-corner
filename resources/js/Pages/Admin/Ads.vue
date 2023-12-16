<script setup>
import {useDateFormatting} from "@/Composables/useDateFormatting.js";
import {Link, router} from "@inertiajs/vue3";

const props = defineProps(
    {
        ads : Array,
    }
)
console.log(props.ads)
</script>
<template>
    <div style="padding: 2%;">
        <table class="table table-success table-striped" id="adminAdTable">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naslov oglasa</th>
                <th scope="col">Tip oglasa</th>
                <th scope="col">Cena</th>
                <th scope="col">Kreiran:</th>
                <th scope="col">Traje do:</th>
                <th scope="col">Naslova(Da/Ne)</th>
                <th scope="col">Action 1</th>
                <th scope="col">Action 2</th>
                <th scope="col">Action 3</th>
                <th scope="col">Action 4</th>



            </tr>
            </thead>
            <tbody>
            <tr v-for="ad in ads">
                <th scope="row">{{ ad.id }}</th>
                <td  style="text-transform: capitalize">{{ ad.title}}</td>
                <td style="text-transform: capitalize">{{ ad.advertisable_type }}</td>
                <td >{{ ad.price }}</td>
                <td>{{ useDateFormatting(ad.created_at)}}</td>
                <td>{{useDateFormatting(ad.lasts_until)}}</td>
                <td style="text-transform: capitalize"> {{ad.home_page}}</td>
                <td><Link :href="route('ads.edit', {ad: ad.id})" class="btn btn-warning">Edit</Link></td>
                <td><Link :href="route('ads.show', {ad: ad.id})" class="btn btn-primary">Pogledaj oglas</Link></td>
                <td><Link :href="route('ads.destroy', {ad:ad.id})" method="delete" as="button" class="btn btn-danger">Delete</Link></td>
                <td><Link :href="route('set-advert-to-premium', {ad : ad.id})" method="post" as="button" class="btn btn-secondary">Postavi na naslovnu</Link></td>
            </tr>

            </tbody>
        </table>
    </div>

</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    layout: AdminLayout
}
</script>
