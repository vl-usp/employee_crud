<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <b-alert v-model="alertShowed" dismissible variant="warning">{{ alertContent }}</b-alert>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="scope">ФИО</th>
                            <th class="scope">ОТДЕЛ</th>
                            <th class="scope">ДОЛЖНОСТЬ</th>
                            <th class="scope">РУКОВОДИТЕЛЬ</th>
                            <th class="scope">ТЕЛЕФОН</th>
                            <th class="scope"></th>
                            <th class="scope"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="employee in getEmployees"
                            :key="employee.id"
                        >
                            <th class="scope">{{ employee.fio }}</th>
                            <td>{{ employee.department.title }}</td>
                            <td>{{ employee.position.title }}</td>
                            <td>{{ employee.boss }}</td>
                            <td>{{ employee.phone }}</td>
                            <td>
                                <b-button v-b-modal="'edition-modal' + employee.id" class="btn-sm btn-info text-light">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                        <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                        <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                    </svg>
                                </b-button>
                                <b-modal :id="'edition-modal' + employee.id" title="Редактирование данных сотрудника" hide-footer centered >
                                    <EditionForm :employee="employee" @employee-handler="employeeHandler"></EditionForm>
                                </b-modal>
                            </td>
                            <td>
                                <b-button v-b-modal="'deletion-modal' + employee.id" class="btn-sm btn-info text-light">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </b-button>
                                <b-modal :id="'deletion-modal' + employee.id" title="Увольнение сотрудника" hide-footer centered>
                                    <DeletionForm :employee="employee" @employee-handler="employeeHandler" @show-alert="showAlert"></DeletionForm>
                                </b-modal>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import EditionForm from "../empl_actions/EditionForm";
    import DeletionForm from "../empl_actions/DeletionForm"
    export default {
        name: "Table",
        components: { EditionForm, DeletionForm },
        data() {
            return {
                alertShowed: false,
                alertContent: '',
                isEmployeesExist: false,
            }
        },
        computed: {
            getEmployees() {
                return this.$store.getters.getEmployees;
            },
        },
        methods: {
            showAlert(message) {
                this.alertShowed = true;
                this.alertContent = message;
            },
            employeeHandler() {
                this.$emit('employee-handler');
            },
        }
    }
</script>
