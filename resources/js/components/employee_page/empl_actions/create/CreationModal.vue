<template>
    <b-modal id="creation-modal" title="Создание сотрудника" hide-footer>
        <div>
            <b-form @submit="onSubmit" @reset="onReset">
                <b-form-group
                    id="input-group-1"
                    label="ФИО:"
                    label-for="input-1"
                >
                    <b-form-input
                        id="input-1"
                        v-model="form.fio"
                        required
                        placeholder="Введите ФИО сотрудника"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Номер телефона" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="form.phone"
                        required
                        placeholder="Введите номер телефона сотрудника"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-3" label="Должность" label-for="input-3">
                    <b-form-select
                        id="input-3"
                        v-model="form.position"
                        :options="getPositions"
                        required
                    ></b-form-select>
                </b-form-group>

                <b-form-group id="input-group-4" label="Отдел" label-for="input-4">
                    <b-form-select
                        id="input-4"
                        v-model="form.department"
                        :options="getDepartments"
                        required
                    ></b-form-select>
                </b-form-group>

                <b-button type="submit" variant="primary">Сохранить</b-button>
                <b-button type="reset" variant="danger">Сбросить данные</b-button>
            </b-form>
            <b-card class="mt-3" header="Form Data Result">
                <pre class="m-0">{{ form }}</pre>
            </b-card>
        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "CreationModal",
        data() {
            return {
                form: {
                    fio: '',
                    phone: '',
                    position: null,
                    department: null,
                },
            }
        },
        mounted() {

        },
        computed: {
            getPositions() {
                return this.$store.getters.getPositions;
            },
            getDepartments() {
                return this.$store.getters.getDepartments;
            },

        },
        methods: {
            getDirector() {
                return this.$store.getters.getEmployees
                    .filter(obj => (obj.position === "Директор"))
            },
            getManager(department) {
                return this.$store.getters.getEmployees
                    .filter(obj => (obj.position === "Руководитель проектов" && obj.department.id === department))
            },
            onSubmit(evt) {
                evt.preventDefault();
                if(this.form.position === 1) {
                    console.log(this.getDirector()); //todo вставить открытие модального окна редактирования
                } else if (this.form.position === 2) {
                    console.log(this.getManager(this.form.department))
                } else {

                }
                this.$store.dispatch("pushEmployee");
                alert(JSON.stringify(this.form));
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.fio = ''
                this.form.phone = ''
                this.form.position = null
                this.form.department = null
            }
        },
    }
</script>

<style scoped>

</style>
