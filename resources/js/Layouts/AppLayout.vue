<script setup>
    import Header from '../Components/Header.vue';
</script>

<template>
    <section class="w-full flex flex-col items-center">
        <Header></Header>
        <div class="">
            <slot></slot>
        </div>
    </section>
</template>