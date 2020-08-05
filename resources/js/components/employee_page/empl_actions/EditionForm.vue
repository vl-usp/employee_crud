<template>
    <div>
        <b-alert v-model="alertShowed" dismissible variant="warning">{{ alertContent }}</b-alert>
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

            <b-form-group id="input-group-3" label="Должность" label-for="input-3" v-if="this.employee.position.id > 2" >
                <b-form-select
                    id="input-3"
                    v-model="form.position_id"
                    :options="getPositions"
                    required
                ></b-form-select>
            </b-form-group>

            <b-form-group id="input-group-4" label="Отдел" label-for="input-4" v-if="this.employee.position.id > 2" >
                <b-form-select
                    id="input-4"
                    v-model="form.department_id"
                    :options="getDepartments"
                    required
                ></b-form-select>
            </b-form-group>

<!--            <b-card class="mt-3" header="Form Data Result">-->
<!--                <pre class="m-0">{{ form }}</pre>-->
<!--            </b-card>-->

            <b-button type="submit" variant="primary">Сохранить</b-button>
            <b-button type="reset" variant="danger">Восстановить данные</b-button>
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
                alertShowed: false,
                alertContent: '',
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
                return this.$store.getters.getPositionsForEmployee;
            },
            getDepartments() {
                return this.$store.getters.getDepartments;
            },
        },
        methods: {
            showAlert(message) {
                this.alertShowed = true;
                this.alertContent = message;
            },

            getDirector() {
                return this.$store.getters.getDirector;
            },
            getManager(departmentId) {
                return this.$store.getters.getManagerByDepartment(departmentId);
            },

            setManagerBoss() { //проверяет занята ли должность руководителя, если нет, то устанавливает значения
                const manager = this.getManager(this.form.department_id);
                if(Object.keys(manager).length !== 0) {
                    this.showAlert('Должность руководителя проектов в этом отделе занята');
                    return false;
                }
                this.form.boss_id = this.getDirector().id;
                return true;
            },
            setEmployeeBoss() { //проверяет есть ли в выбранном отделе руководитель, если есть, устанавливает его как босса
                const manager = this.getManager(this.form.department_id);
                if(Object.keys(manager).length === 0) {
                    this.showAlert('Для начала нужно нанять руководителя проектами');
                    return false;
                }
                this.form.boss_id = manager[0].id;
                return true;
            },

            onSubmit(evt) {
                evt.preventDefault();
                if(this.form.position_id === 2) {
                    if(!this.setManagerBoss()) return;
                } else if(this.form.position_id > 2) {
                    if(!this.setEmployeeBoss()) return;
                }
                this.$store.dispatch('updateEmployee', [ this.employee.id, this.form ]);
                this.$emit('employee-handler');
                this.showAlert('Данные сотрудника изменены!');
            },
            onReset(evt) {
                evt.preventDefault();
                this.form.fio = this.employee.fio;
                this.form.phone = this.employee.phone;
                this.form.position_id = this.employee.position.id;
                this.form.department_id = this.employee.department.id;
            }
        },
    }
</script>
