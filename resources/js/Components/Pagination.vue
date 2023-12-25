<template>
    <div >
        <ul class="pagination" >


        <li class="page-item" style="display: flex; flex-direction: row;">
            <Link

            v-for="(link, index) in links"
            :key="index"
            class="page-link"
            :href="link.url ?? ''"
            v-html="link.label"
        >
        </Link>
        </li>
        </ul>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ links: Array });
</script>
