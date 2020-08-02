<template>
    <b-form @submit="onSubmit" @reset="onReset">
        <b-form-group
            id="input-group-5"
            label="Название:"
            label-for="input-5"
        >
            <b-form-input
                id="input-5"
                v-model="form.title"
                required
                placeholder="Название отдела"
            ></b-form-input>
        </b-form-group>

        <b-button type="submit" id="submit2" variant="primary">Сохранить</b-button>
        <b-popover :show.sync="popover_showed" target="submit" title="Ошибка">
            {{ popover_content }}
        </b-popover>
        <b-button type="reset" variant="danger">Сбросить данные</b-button>
    </b-form>
</template>

<script>
    export default {
        name: "DepartmentCreation",
        data() {
            return {
                form: {
                    title: '',
                },
                popover_showed: false,
                popover_content: '',
            }
        },
        computed: {
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
            onSubmit(evt) {
                evt.preventDefault();
                if(this.getDepartments.filter(obj => (obj.title === this.form.title)) === []) {
                    this.$store.dispatch('putDepartment', this.form);
                } else {
                    this.showPopover('Отдел с таким именем уже существует');
                }
                this.hidePopover();
            },
            onReset(evt) {
                evt.preventDefault();
                this.form.title = '';
                this.hidePopover();
            }
        }
    }
</script>

<style scoped>

</style>
