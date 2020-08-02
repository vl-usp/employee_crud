<template>
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

        <b-form-group id="input-group-4" label="Отдел" label-for="input-4"
                      v-if="form.position_id !== 1"
        >
            <b-form-select
                id="input-4"
                v-model="form.department_id"
                :options="getDepartments"
                required
            ></b-form-select>
        </b-form-group>

        <b-button type="submit" id="submit" variant="primary">Сохранить</b-button>
        <b-popover :show.sync="popover_showed" target="submit">
            {{ popover_content }}
        </b-popover>
        <b-button type="reset" variant="danger">Сбросить данные</b-button>
    </b-form>
</template>

<script>
    export default {
        name: "EmployeeCreation",
        data() {
            return {
                form: {
                    fio: '',
                    phone: '',
                    position_id: null,
                    department_id: null,
                },
                popover_showed: false,
                popover_content: '',
            }
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
            showPopover(message) {
                this.popover_showed = true;
                this.popover_content = message;
            },
            hidePopover() {
                this.popover_showed = false;
                this.popover_content = '';
            },
            getDirector() {
                return this.$store.getters.getEmployees
                    .filter(obj => (obj.position.title === 'Директор'))
            },
            getManager(department_id) {
                return  this.$store.getters.getEmployees
                    .filter(obj => (obj.position.title === 'Руководитель проектов' && obj.department.id === department_id))
            },
            setDirectorBoss() {
                if(this.getDirector() !== []) {
                    this.showPopover('Должность директора занята');
                }
                this.form.department_id = null;
            },
            setManagerBoss() {
                if(this.getManager(this.form.department_id) !== []) {
                    this.showPopover('Должность руководителя проектов в этом отделе занята');
                }
                this.form.boss_id = this.getDirector()[0].id;
            },
            setEmployeeBoss() {
                this.form.boss_id = this.getManager(this.form.department_id)[0].id;
            },
            onSubmit(evt) {
                evt.preventDefault();
                if(this.form.position_id === 1) {
                    this.setDirectorBoss();
                } else if (this.form.position_id === 2) {
                    this.setManagerBoss();
                } else {
                    this.setEmployeeBoss();
                }
                this.$store.dispatch('putEmployee', this.form);
                // this.$bvModal.hide('creation-modal');
                this.hidePopover();
            },
            onReset(evt) {
                evt.preventDefault()
                this.form.fio = ''
                this.form.phone = ''
                this.form.position = null
                this.form.department = null
                this.hidePopover();
            }
        },
    }
</script>

<style scoped>

</style>
