<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Registro</h2>
        <form @submit.prevent="register">
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full p-2 border rounded"
                />
                <p v-if="errors.name" class="text-red-500 text-sm">
                    {{ errors.name }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input
                    v-model="form.email"
                    type="email"
                    class="w-full p-2 border rounded"
                />
                <p v-if="errors.email" class="text-red-500 text-sm">
                    {{ errors.email }}
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Contraseña</label>
                <input
                    v-model="form.password"
                    type="password"
                    class="w-full p-2 border rounded"
                />
                <p v-if="errors.password" class="text-red-500 text-sm">
                    {{ errors.password }}
                </p>
            </div>
            <button
                type="submit"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
            >
                Registrarse
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
            },
            errors: {},
        };
    },
    methods: {
        register() {
           axios.post("api/register", {
                name: this.form.name,
                email: this.form.email,
                password: this.form.password,
            })
            .then((response) => {
                console.log(response);
                localStorage.setItem('token', response.data.token);
                this.$router.push({ name: "Profile" });
            })
            .catch((error) => {
                this.errors = error.response.data.errors;
           })
        },
    },
};
</script>

<style>
</style>
