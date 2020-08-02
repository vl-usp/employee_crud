<template>
    <b-form @submit="onSubmit" @reset="onReset">
        <b-form-group
            id="input-group-6"
            label="Название:"
            label-for="input-6"
        >
            <b-form-input
                id="input-6"
                v-model="form.title"
                required
                placeholder="Название должности"
            ></b-form-input>
        </b-form-group>

        <b-button type="submit" id="submit3" variant="primary">Сохранить</b-button>
        <b-popover :show.sync="popover_showed" target="submit" title="Ошибка">
            {{ popover_content }}
        </b-popover>
        <b-button type="reset" variant="danger">Сбросить данные</b-button>
    </b-form>
</template>

<script>
    export default {
        name: "PositionCreation",
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
            getPositions() {
                return this.$store.getters.getPositions;
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
                if(this.getPositions.filter(obj => (obj.title === this.form.title)) === []) {
                    this.$store.dispatch('putPosition', this.form);
                } else {
                    this.showPopover('Должность с таким названием уже существует');
                }
                this.hidePopover();
            },
            onReset(evt) {
                evt.preventDefault()
                this.form.title = ''
                this.hidePopover();
            }
        }
    }
</script>

<style scoped>

</style>
