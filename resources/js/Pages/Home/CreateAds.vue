<template>
    <div style="width: 100%;
    background-color: #354649; ">


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
                <Transition name="slide-fade" @after-leave="afterLeave">
                    <CarAdForm v-if="selectedImageId===1" @arrow-clicked="goBack"></CarAdForm>
                </Transition>
                <Transition name="slide-fade" @after-leave="afterLeave">
                    <PartsAdForm v-if="selectedImageId===2" @arrow-clicked="goBack"></PartsAdForm>
                </Transition>
                <Transition name="slide-fade" @after-leave="afterLeave">
                    <EquipmentAdForm v-if="selectedImageId===3" @arrow-clicked="goBack">

                    </EquipmentAdForm>
                </Transition>
                <Transition name="slide-fade" @after-leave="afterLeave">
                    <TiresAdForm v-if="selectedImageId===4" @arrow-clicked="goBack">

                    </TiresAdForm>
                </Transition>
            </div>
        </div>
    </div>
</template>

<script>
import CarAdForm from "@/Components/CarAdForm.vue";
import PartsAdForm from "@/Components/PartsAdForm.vue";
import EquipmentAdForm from "@/Components/EquipmentAdForm.vue";
import TiresAdForm from "@/Components/TiresAdForm.vue";


export default {
    components: {TiresAdForm, EquipmentAdForm, PartsAdForm, CarAdForm},
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
                    image: "/images/toyota.jpg",
                    alt: "Toyota",
                    title: "Auto",
                },
                {
                    id: 2,
                    image: "/images/delovi.jpeg",
                    alt: "Delovi",
                    title: "Delovi",
                },
                {
                    id: 3,
                    image: "/images/kaciga.jpg",
                    alt: "Kaciga",
                    title: "Oprema",
                },
                {
                    id: 4,
                    image: "/images/gume_prodaja.jpeg",
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
        },
        goBack() {
            this.selectedImageId = null;

        },
        afterLeave() {
            this.showImages = true;
        },
        create() {
        },
    },
};

</script>
<style scoped>
.slide-fade-enter-active {
    transition: all 1.8s ease-out;
}

.slide-fade-leave-active {
    transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(100px);
    opacity: 0;
}
</style>
