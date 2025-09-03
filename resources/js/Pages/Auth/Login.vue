<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { errorMessages } from 'vue/compiler-sfc';

const form = useForm({
    email: '',
    password: '',
    processing: false
})

const errorMessage = ref(null)

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        onError: () => {
            errorMessage.value = form.errors.email
        }
    })
}

</script>

<template>
    <AuthLayout>
        <div v-if="errorMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-4 rounded relative" role="alert">
            {{ errorMessage }}
        </div>
        <!-- Formulário -->
        <form action="#" @submit.prevent="submit()">
            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input v-model="form.email" type="email" required
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 focus:outline-none" />
            </div>

            <!-- Senha -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Password</label>
                <input v-model="form.password" type="password" required
                    class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 focus:outline-none" />
            </div>

            <!-- Botão -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Entrar
            </button>
        </form>

        <!-- Link registro -->
        <p class="mt-4 text-center text-sm text-gray-600">
            Do not have an account?
            <a href="/register" class="text-blue-600 hover:underline">Register here.</a>
        </p>
    </AuthLayout>
</template>