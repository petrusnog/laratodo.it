<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';

    const props = defineProps({
        grouped_tasks: { type: Object },
        statuses: { type: Object }
    });

    console.log(props.grouped_tasks);
    console.log(props.statuses);
</script>

<template>
    <AppLayout>
        <div class="mb-6" v-for="status in statuses" :key="status">
            <h2><strong>{{ status }}</strong></h2>
            <ul>
                <li class="mb-3" v-for="task in grouped_tasks[status]" :key="task.id">
                    <ul style="background: yellow">
                        <li>{{ task.title }}</li>
                        <li>{{ task.description }}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </AppLayout>
</template>