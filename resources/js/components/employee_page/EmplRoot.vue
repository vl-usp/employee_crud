<template>
    <div class="container">
        <Header></Header>
        <div class="container row justify-content-center">
            <Department
                :departments="getDepartments"
                @department-handler="departmentHandler"
            ></Department>
            <div class="add col justify-content-right">
                <b-button v-b-modal="'creation-modal'"
                          class="btn-sm btn-info text-light">
                    Добавить
                </b-button>

                <b-modal id="creation-modal" title="Добавление" hide-footer centered>
                    <CreationForm></CreationForm>
                </b-modal>
            </div>
        </div>
        <Table
            :employees="getEmployees"
        ></Table>
        <Paginator
            :paginator="getPaginator"
            @page-handler="pageHandler"
        ></Paginator>
    </div>
</template>

<script>
    import Header from "../header/Header";
    import Table from "./table/Table"
    import Paginator from "./paginate/Paginator";
    import Department from "./filter/Department";
    import CreationForm from "./empl_actions/CreationForm";

    export default {
        name: "EmplRoot",
        components: {CreationForm, Department, Header,  Table, Paginator },
        data() {
            return {
                isCreationModalOpen : false,
                isEditionModalOpen : false,
                isDeletionModalOpen : false,
            }
        },
        mounted() {
            this.$store.dispatch("fetchAllEmployees");
            this.$store.dispatch("fetchDepartments");
            this.$store.dispatch("fetchPositions");
        },
        computed: {
            getEmployees() {
                return this.$store.getters.getEmployees;
            },
            getPaginator() {
                return this.$store.getters.getPaginator;
            },
            getDepartments() {
                return this.$store.getters.getDepartments;
            }
        },
        methods: {
            departmentHandler(selected) {
                if(selected === null) {
                    this.$store.dispatch("fetchAllEmployees");
                } else {
                    this.$store.dispatch("fetchEmployeesByDepartment", selected);
                }
            },
            pageHandler(pageUrl) {
                this.$store.dispatch('fetchAllEmployees', pageUrl);
            },
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
