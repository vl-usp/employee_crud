<template>
    <b-form @submit="onSubmit">
        <p>
            Вы действительно хотите уволить:
            <br>
            <span class="p-2">
                Должность - {{employee.position.title}}
            </span>
            <br>
            <span class="p-2">
                Отдел - {{employee.department.title}}
            </span>
            <br>
            <span class="p-2">
                №{{employee.id}}-{{employee.fio}}
            </span>

        </p>

        <b-button type="submit" variant="danger">Удалить</b-button>
    </b-form>
</template>

<script>
    export default {
        name: "DeletionForm",
        props: {
            employee: {
                type: Object,
                required: true,
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                this.$store.dispatch("deleteEmployee", this.employee.id);
            },
        }
    }
</script>

<style scoped>

</style>
