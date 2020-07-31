<template>
    <tr>
        <td>emp.fio</td>
        <td>emp.</td>
        <td>ДОЛЖ123123НОСТЬ</td>
        <td>123213123</td>
        <td>123</td>
        <td>112</td>
        <td>122</td>
    </tr>
</template>

<script>
    export default {
        name: "TableRow",
        props: {
            employee: {
                type: Object,
                require: true,
            }
        }
    }
</script>

<style scoped>

</style>
