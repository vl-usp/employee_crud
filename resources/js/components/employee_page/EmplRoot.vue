<template>
    <div class="container">
        <Header></Header>
        <div class="row justify-content-between mb-3">
            <div class="col-3">
                <Department
                    @department-handler="departmentHandler"
                ></Department>
            </div>
            <div class="col-2">
                <b-button v-b-modal="'creation-modal'" class="btn-sm btn-info text-light">
                    Добавить
                </b-button>

                <b-modal id="creation-modal" title="Добавление" hide-footer centered>
                    <CreationForm @employee-handler="employeeHandler"></CreationForm>
                </b-modal>
            </div>
        </div>
        <Table
            @employee-handler="employeeHandler"
        ></Table>
        <Paginator
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
                selectedDepartment: null,
                currentPageUrl: '',
            }
        },
        mounted() {
            this.$store.dispatch('fetchAllEmployees');
            this.$store.dispatch('fetchPositions');
        },
        computed: {

        },
        methods: {
            fetchEmployees() {
                setTimeout(() => {
                    if(this.selectedDepartment === null) {
                        this.$store.dispatch('fetchAllEmployees');
                    } else {
                        this.$store.dispatch('fetchEmployeesByDepartment', this.selectedDepartment);
                        this.$store.dispatch('fetchDirector');
                        this.$store.dispatch('fetchManagers');
                    }

                }, 350)

            },
            departmentHandler(selected) { //обработчик события изменения отдела в селект боксе
                this.selectedDepartment = selected;
                this.fetchEmployees();
            },
            pageHandler(pageUrl) { //обработчик изменения страницы
                this.currentPageUrl = pageUrl;
                this.$store.dispatch('fetchAllEmployees', this.currentPageUrl); //this.currentPageUrl уже использует '/{id}?page=x в url
            },
            employeeHandler() {
                this.fetchEmployees();
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
