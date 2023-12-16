<script
    setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    ad : Object,
})
const adType = props.ad.advertisable_type
console.log(props.ad)

</script>
<template>
    <EquipmentAdForm :ad="ad" :is-editting="true" v-if="adType==='equipment'"></EquipmentAdForm>
    <CarAdForm v-else-if="adType==='vehicle'" :ad="ad" :is-editting="true"></CarAdForm>
    <PartsAdForm v-else-if="adType==='parts' && ad.advertisable.type==='other'" :ad="ad" :is-editting="true"></PartsAdForm>
    <TiresAdForm v-else-if="adType==='parts' && ad.advertisable.type==='tires'" :ad="ad" :is-editting="true"></TiresAdForm>
</template>
<script>
import EquipmentAdForm from "@/Components/EquipmentAdForm.vue";
import CarAdForm from "@/Components/CarAdForm.vue";
import PartsAdForm from "@/Components/PartsAdForm.vue";
import TiresAdForm from "@/Components/TiresAdForm.vue";

export  default {
    components : {EquipmentAdForm, CarAdForm, PartsAdForm, TiresAdForm }
}
</script>
