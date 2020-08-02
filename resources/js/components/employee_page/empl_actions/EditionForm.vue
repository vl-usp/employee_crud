<template>
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
                    v-model="form.position_id"
                    :options="getPositions"
                    required
                ></b-form-select>
            </b-form-group>

            <b-form-group id="input-group-4" label="Отдел" label-for="input-4">
                <b-form-select
                    id="input-4"
                    v-model="form.department_id"
                    :options="getDepartments"
                    required
                ></b-form-select>
            </b-form-group>

            <b-button type="submit" variant="primary">Сохранить</b-button>
            <b-button type="reset" variant="danger">Сбросить данные</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "EditionForm",
        data() {
            return {
                form: {
                    fio: this.employee.fio,
                    phone: this.employee.phone,
                    position_id: this.employee.position.id,
                    department_id: this.employee.department.id,
                },
            }
        },
        props: {
            employee: {
                type: Object,
                require: true,
            }
        },
        computed: {
            getPositions() {
                return this.$store.getters.getPositions;
            },
            getDepartments() {
                return this.$store.getters.getDepartments;
            }
        },
        methods: {
            getDirector() {
                return this.$store.getters.getEmployees
                    .filter(obj => (obj.position.title === "Директор"))
            },
            getManager(department_id) {
                return this.$store.getters.getEmployees
                    .filter(obj => (obj.position.title === "Руководитель проектов" && obj.department.id === department_id))
            },
            onSubmit(evt) {
                evt.preventDefault();
                if(this.form.position_id === 1) {
                    this.form.department_id = null;
                    this.$store.dispatch("patchEmployee", this.employee.id, this.form); //todo вставить открытие модального окна редактирования
                } else if (this.form.position_id === 2) {
                    this.form.boss_id = this.getDirector()[0].id;
                    this.$store.dispatch("patchEmployee", this.employee.id, this.form);
                } else {
                    this.form.boss_id = this.getManager(this.form.department_id)[0].id;
                    this.$store.dispatch("patchEmployee", this.employee.id, this.form);
                }
            },
            onReset(evt) {
                evt.preventDefault()
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
