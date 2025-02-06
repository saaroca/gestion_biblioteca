<template>
    <div>
        <h2 class="bg-green-800 text-white">Lista de libros</h2>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
                <button
                    class="bg-blue-500 text-white rounded-lg font-bold w-32 h-8"
                    @click="addFavorito(book.id)"
                >
                    Add Fav
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
import Cookies from "js-cookie";
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
    methods: {
        addFavorito(id) {
            let favorites = Cookies.get("favorites");
            if (!favorites) {
                favorites = "[]";
            }

            favorites = JSON.parse(favorites);

            if (!favorites.includes(id)) {
                favorites.push(id);
                Cookies.set("favorites", JSON.stringify(favorites), {
                    expires: 30,
                });
            }

            this.favorites = favorites;
            console.log(this.favorites);
        },
    },
};
</script>
