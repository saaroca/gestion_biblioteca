<template>
    <div class="max-w-md mx-auto mt-10 p-4 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">PERFIL USUARIO</h2>
        <div class="flex-wrap">
            <div v-if="user">
                <p class="font-bold ml-20 block text-gray-700">Nombre: {{ user.name }}</p>
                <p class="font-bold ml-20 block text-gray-700 mt-2">Email: {{ user.email }}</p>
            </div>
            <div class="text-right mt-4 w-md">
                <button class="bg-blue-500 text-white rounded-lg font-bold w-32 h-8" @click="logout">
                    Cerrar Sesión
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
        };
    },
    mounted() {
        fetch("api/user", {
            method: "GET",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("token"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                this.user = data;
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    },

    methods: {
        logout() {
            fetch("/logout", {
                method: "POST",
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("token"),
                },
            })
                .then((response) => {
                    localStorage.removeItem("token");
                    this.$router.push({ name: "Login" });
                })
                .catch((error) => console.error("Error:", error));
        },
    },
};
</script>
