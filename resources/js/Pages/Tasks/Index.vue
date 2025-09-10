<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from 'dayjs'

const props = defineProps({
    grouped_tasks: { type: Object },
    statuses: { type: Object }
});

const formatDate = (date) => {
    return dayjs(date).format('DD/MM/YYYY');
};

console.log(props.grouped_tasks);
console.log(props.statuses);
</script>

<template>
    <AppLayout>
        <div class="flex w-100 justify-between pl-5 pr-5">
            <div class="bg-[#dddddd] mb-6 w-1/4 p-5 rounded-lg mr-5 last:mr-0" v-for="status in statuses" :key="status.name">
                <h2 class="text-lg uppercase mb-3"><strong>{{ status.label }}</strong></h2>
                <div class="h-fit max-h-[70vh] overflow-scroll overflow-x-hidden">
                    <ul>
                        <li class="mb-3" v-for="task in grouped_tasks[status.name]" :key="task.id">
                            <div class="bg-white p-5">
                                <div class="bg-[#97ff8d] w-fit pl-3 pr-2 rounded-xl">{{ formatDate(task.due_date) }}</div>
                                <h3 class="text-xl font-bold">{{ task.title }}</h3>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>