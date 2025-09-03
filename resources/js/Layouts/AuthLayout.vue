<script setup>
    import Header from '../Components/Header.vue';
</script>

<template>
    <section class="w-full flex flex-col items-center h-[100vh]">
        <Header></Header>
        <div class="shadow-x1/20 w-[800px]">
            <slot></slot>
        </div>
    </section>
</template>