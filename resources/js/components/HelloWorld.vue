<template>
    <ul>
        <li>
            <router-link to="/books">Listar libros</router-link>
        </li>
        <li>
            <router-link to="/login">Login</router-link>
        </li>
        <li>
            <router-link to="/registro">Registro</router-link>
        </li>
    </ul>
    <router-view></router-view>
</template>

<script>
export default {};
</script>
