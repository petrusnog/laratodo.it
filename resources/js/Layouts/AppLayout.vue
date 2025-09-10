<script setup>
    import Header from '../Components/Header.vue';
</script>

<template>
    <section class="w-full flex flex-col items-center">
        <Header></Header>
        <div class="m-auto max-w-[2000px] mt-[50px]">
            <slot></slot>
        </div>
    </section>
</template>