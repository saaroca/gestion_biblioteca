<template>
    <div>
        <h2>Perfil usuario:</h2>
        <div v-if="user">
            {{ user }}
            <p>Nombre: {{ user.name }}</p>
            <p>Email: {{ user.email }}</p>
        </div>
        <button class="bg-blue-500 text-white" @click="logout">
            Cerrar Sesión
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        };
    },
    mounted() {
        fetch('api/user', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
        .then(response => response.json())
        .then(data => {
            this.user = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    },

    methods: {
        logout() {
            fetch('/logout', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(response => {
                localStorage.removeItem('token');
                this.$router.push({ name: 'Login' });
            })
            .catch(error => console.error('Error:', error));
        }
    }
};
</script>
