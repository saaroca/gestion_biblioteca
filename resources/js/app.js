import "./bootstrap";
import { createApp } from "vue";
import BookList from "@/components/BookList.vue";
import HelloWorld from "@/components/HelloWorld.vue";
import "../css/app.css";
import router from "./router";

//Crear aplicacion
createApp(HelloWorld).use(router).mount("#app");
