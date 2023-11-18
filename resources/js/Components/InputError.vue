<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p style="color: red">
            {{ message }}
        </p>
    </div>
</template>
