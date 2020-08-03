<template>
    <div class="container">
        <Header></Header>
        <StructureList
            :structure="getStructure"
        ></StructureList>
    </div>
</template>

<script>
    import Header from "../header/Header";
    import StructureList from "./StructureList";

    export default {
        name: "StructRoot",
        components: { StructureList, Header },
        mounted() {
            this.$store.dispatch('fetchStructure');
        },
        computed: {
            getStructure() {
                return this.$store.getters.getStructure;
            }
        }
    }
</script>

<style lang="scss">
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        a {
            text-decoration: none;
        }
    }
</style>
