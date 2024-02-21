<script setup>
import { useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import Compressor from "compressorjs";

const fileInput = ref(null);
const props = defineProps({
  ad: Object,
  isEditting: false,

});
const isImageProcessing = ref(false)
const form = useForm({
  name: props.ad ? props.ad.title : '',
  description: props.ad ? props.ad.advertisable.description : '',
  price: props.ad ? props.ad.price : '',
  fixed: props.ad ? props.ad.fixed : 1,
  isNew: props.ad ? props.ad.advertisable.isNew : 1,
  type: 'parts',
  images: [],
});
const message = ref(0);
const openFileInput = () => {
  fileInput.value.click();
};
const handleFileChange = () => {
    const files = fileInput.value.files;
    if (files.length > 5) {
        message.value = 1
    } else {
        for (let i = 0; i < files.length; i++) {
            isImageProcessing.value = true

            if(files[i].size > 8 * 1024 * 1024){
                message.value = 2
                form.images = []
                break;
            }
            if(files[i].size <  1024 * 1024){
                form.images.push(files[i])
            }
            else{
                new Compressor(files[i], {
                    quality: 0.2,
                    success(file) {
                        const myFile = new File([file], file.name, {
                            type : file.type
                        })
                        form.images.push(myFile)
                        isImageProcessing.value =false

                    }
                })
            }


        }
    }
}
const store = () => form.post(route('ads.store'));
const update = () => form.put(route('ads.update', { ad: props.ad.id }));
const ruta = computed(() => {
  if (props.isEditting) return update();
  return store();
});

</script>
<template>
    <div class="signupSection_top" style="display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center; width: 100%;">

        <div class="signupSection">
            <div class="info">
                <div v-if="!isEditting" class="icon" @click="emitAction">
                    <div class="arrow"></div>
                </div>
                <img src="/images/delovi.jpeg" alt="" style="width: 100%;height: 100%">
            </div>
            <form  @submit.prevent="ruta" class="signupForm" name="signupform" id="deloviForma">
                <h2>Oglas za delove</h2>
                <ul class="noBullet">
                    <li>
                        <label for="name"></label>
                        <input v-model="form.name" type="text" class="inputFields" id="name" name="name"
                               placeholder="Naslov oglasa" />
                        <InputError v-if="form.errors.name" :message="form.errors.name" />
                    </li>

                    <li>
                        <label for="opis"></label>
                        <resize-textarea v-model="form.description" class="inputFields" name="opis" id="opis" placeholder="Opis"></resize-textarea>
                        <InputError v-if="form.errors.description" :message="form.errors.description" />
                    </li>
                    <li>
                        <label for="cena"></label>
                        <input type="text" v-model="form.price" class="inputFields" id="cena" name="cena" placeholder="Cena(€)" />
                        <InputError v-if="form.errors.price" :message="form.errors.price" />
                    </li>

                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px;">
                        <label for="">Fiksna cena? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="fixed" v-model="form.fixed" >
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="fixed" v-model="form.fixed">
                        <InputError v-if="form.errors.fixed" :message="form.errors.fixed" />
                    </li>
                    <li style="display: flex; flex-direction: row; justify-items: center;align-items: center;justify-content: center; gap:0.4rem; margin-top: 30px; margin-bottom: 30px;">
                        <label for="">Novo? </label>
                        <label for="da">Da</label>
                        <input type="radio" id="da" value="1" name="isNew" v-model="form.isNew" checked>
                        <label for="ne">Ne</label>
                        <input type="radio" id="ne" value="0" name="isNew" v-model="form.isNew">
                        <InputError v-if="form.errors.isNew" :message="form.errors.isNew" />
                    </li>
                    <li>
                        <div class="Neon Neon-theme-dragdropbox" v-if="!isEditting">
                            <input ref="fileInput" name="files[]" id="filer_input2" multiple="multiple" type="file" hidden @change="handleFileChange" accept="image/png, image/jpeg, image/jpg, image/gif">
                            <div class="Neon-input-dragDrop">
                                <div class="Neon-input-inner">
                                    <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                    <div class="Neon-input-text">
                                        <h3 v-if="form.images.length===0 && !message">*Prva slika je naslovna, max broj slika je 5</h3>
                                        <h3 v-if="message==1" style="color: red">Maksimalan broj slika je 5</h3>
                                        <h3 v-else-if="message == 2" style="color: red">Velicina jedne ili vise slika prelazi 8MB</h3>

                                        <div v-else>
                                            <span v-for="image in form.images">
                                                {{image.name}}
                                            </span>

                                        </div>
                                        <span
                                            style="display:inline-block; margin: 20px 0"></span>
                                    </div>
                                    <a href="#" class="Neon-input-choose-btn blue" @click.prevent="openFileInput">Odaberi slike</a>
                                </div>
                            </div>
                        </div>
                        <div v-if="isEditting">
                            Za menjanje slika, obrisite oglas pa kreirajte opet!
                        </div>
                        <InputError v-if="form.errors.images" :message="form.errors.images"/>
                    </li>
                    <li id="center-btn" style="margin-top: 50px;">
                        <input :disabled="form.processing || isImageProcessing" type="submit" id="join-btn" name="join" alt="Join" :value="isEditting ? 'Edituj oglas' : 'Kreiraj oglas'">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</template>
<script>
export default {
  methods: {
    emitAction() {
      this.$emit('arrow-clicked');
    },
  },
};
</script>
