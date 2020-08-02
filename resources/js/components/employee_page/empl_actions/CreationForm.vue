<template>
    <div>
        <b-card title="Добавление" no-body>
            <b-card no-body>
                <b-tabs card>
                    <b-tab title="Сотрудник" active>
                        <EmployeeCreation></EmployeeCreation>
                    </b-tab>
                    <b-tab title="Отдел">
                        <DepartmentCreation></DepartmentCreation>
                    </b-tab>
                    <b-tab title="Должность">
                        <PositionCreation></PositionCreation>
                    </b-tab>
                </b-tabs>
            </b-card>
        </b-card>
    </div>
</template>

<script>
    import PositionCreation from "./creation/PositionCreation";
    import DepartmentCreation from "./creation/DepartmentCreation";
    import EmployeeCreation from "./creation/EmployeeCreation";
    export default {
        name: "CreationForm",
        components: {EmployeeCreation, DepartmentCreation, PositionCreation},

    }
</script>

<style scoped>

</style>
