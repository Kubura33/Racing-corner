<template>
        <diV class="banner_oprema"></diV>
    <div class="div-oglas">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" v-for="ad in ads" :key="ad.id">
                <div class="card">
                    <img :src="ad.image_path[0]" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ad.advertisable.name}}</h5>
                        <p class="card-text">{{ad.slug}}</p>
                        <Link :href="route('ads.show', {ad:ad})" class="btn btn-primary">Detalji</Link>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    ads : Array,
})
</script>
