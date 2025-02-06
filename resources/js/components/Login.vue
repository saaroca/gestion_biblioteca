<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-4">Iniciar Sesión</h2>

        <form @submit.prevent="handleLogin">
            <div class="mb-4">
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-700"
                    >Correo Electrónico</label
                >
                <input
                    type="email"
                    id="email"
                    v-model="email"
                    class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    for="password"
                    class="block text-sm font-medium text-gray-700"
                    >Contraseña</label
                >
                <input
                    type="password"
                    id="password"
                    v-model="password"
                    class="mt-1 block w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    required
                />
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Iniciar Sesión
            </button>

            <p v-if="errorMessage" class="text-red-500 text-sm mt-2">
                {{ errorMessage }}
            </p>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            errorMessage: "",
        };
    },
    methods: {
        handleLogin() {
            axios
                .post("/api/login", {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {                    
                    localStorage.setItem("token", response.data.token);
                    this.$router.push({ name: "Profile" });
                })
                .catch((error) => {
                    console.log(error.response.data);
                    alert('No se ha podido hacer login');
                });
        },
    },
};
</script>

<style scoped></style>
