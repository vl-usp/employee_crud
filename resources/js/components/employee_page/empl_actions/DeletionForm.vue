<template>
    <b-form @submit="onSubmit">
        <b-alert v-model="alertShowed" dismissible variant="danger">{{ alertContent }}</b-alert>
        <div v-if="isDeleted === false ">
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
        </div>
        <div v-else>
            <p>
                Сотрудник уволен.
            </p>
        </div>
    </b-form>
</template>

<script>
    export default {
        name: "DeletionForm",
        data() {
            return {
                isDeleted: false,
                alertShowed: false,
                alertContent: '',
                clickCount: 0,
            }
        },
        props: {
            employee: {
                type: Object,
                required: true,
            }
        },
        methods: {
            showAlert(message) {
                this.alertShowed = true;
                this.alertContent = message;
            },

            onSubmit(evt) {
                evt.preventDefault();
                let position = this.employee.position.title;
                if(position === "Директор") {
                    if(this.clickCount < 1) {
                        this.clickCount++;
                        this.showAlert("ВНИМАНИЕ! Если вы уволите директора, то все сотрудники компании уволятся самостоятельно! " +
                            "Если все равно хотите уволить директора, нажмите на кнопку еще раз");
                        return;
                    }
                } else if(position === "Руководитель проектов") {
                    if(this.clickCount < 1) {
                        this.clickCount++;
                        this.showAlert("ВНИМАНИЕ! Если вы уволите руководителя проектами, то все его подчиненные уволятся самостоятельно! " +
                            "Если все равно хотите уволить руководителя проектами, нажмите на кнопку еще раз");
                        return;
                    }
                }
                this.$store.dispatch("destroyEmployee", this.employee.id);
                this.$store.dispatch('fetchDirector');
                this.$store.dispatch('fetchManagers');
                this.$emit('employee-handler');
                this.isDeleted = true;
            },
        }
    }
</script>
