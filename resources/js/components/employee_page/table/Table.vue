<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                        <TableRow v-for="employee in employees"></TableRow>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    import TableRow from "./TableRow";
    export default {
        name: "Table",
        components: { TableRow },
        props: {
            employees: {
                type: Array,
                require: true,
            }
        }
    }
</script>

<style scoped>

</style>
