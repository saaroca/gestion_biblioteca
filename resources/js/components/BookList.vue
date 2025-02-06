<template>
    <div>
        <h2 class="bg-green-800 text-white">Lista de libros</h2>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            books: [],
        };
    },
    mounted() {
        fetch("api/libros")
            .then((response) => response.json())
            .then((data) => {
                this.books = data;
            });
    },
};
</script>
