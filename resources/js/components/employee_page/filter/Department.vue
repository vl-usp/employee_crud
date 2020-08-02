<template>
    <div class="department">
<!--        todo Стили-->
            <div class="container">
                <span class="m-2 col">Отделы</span>
                <b-form-select
                    class="col"
                    v-model="selected"
                    :options="getOptions"
                    size="sm"
                    @change="departmentHandler"
                >
                </b-form-select>
            </div>
    </div>
</template>

<script>
    export default {
        name: "Department",
        data() {
            return {
                selected: null,
            }
        },
        props: {
            departments: {
                type: Array,
                required: true,
            }
        },
        computed: {
            getOptions() {
                let all = [
                    { value: null, text: "Все" }
                ];
                return all.concat(this.departments);
            }
        },
        methods: {
            departmentHandler(selected) {
                return this.$emit('department-handler', selected);
            }
        }
    }
</script>
