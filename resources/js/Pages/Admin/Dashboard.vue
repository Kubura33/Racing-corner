<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    layout: AdminLayout
}
</script>
<template>
    <div id="mainDiv">
        <div id="boxes">
            <div class="boxItem">
                <img src="/images/groups--v2.png" alt="" style="height: 100%; width: 100px;">
                <div style="font-size: 50px;">
                    {{numberOfUsers}}
                </div>
            </div>
            <div class="boxItem">
                <img src="/images/brOglasa.png" alt="" style="height: 100%; width: 100px;">
                <div style="font-size: 50px;">
                    {{numberOfAds}}
                </div>
            </div>
            <div class="boxItem">
                <img src="/images/premiumUsers.png" alt="" style="height: 100%; width: 100px;">
                <div style="font-size: 50px;">
                    {{numberOfPremiumUsers}}
                </div>
            </div>
            <div class="boxItem">
                Broj posetioca jos ne znam kako da implementiram...
            </div>
        </div>



    </div>

</template>
<script setup>
const props = defineProps(
    {
        numberOfUsers : Number,
        numberOfAds : Number,
        numberOfPremiumUsers : Number
    }
)
console.log(props.numberOfUsers)
</script>

