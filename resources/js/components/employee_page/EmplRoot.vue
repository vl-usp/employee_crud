<template>
    <div class="container">
        <Header></Header>
        <div class="container row justify-content-center">
            <Department class="col"></Department>
            <div class="add col justify-content-right">
                <a role="button" class="btn btn-primary text-light btn-sm" @click="">Добавить</a>
            </div>
        </div>
        <Table :employee="[1,2,3,4,5,6]"></Table>
        <Paginator></Paginator>
    </div>
</template>

<script>
    import Header from "../header/Header";
    import Table from "./table/Table"
    import Paginator from "./paginate/Paginator";
    import Department from "./filter/Department";

    export default {
        name: "EmplRoot",
        components: {Department, Header,  Table, Paginator }
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
    }
</style>
