<template>
    <div class="department">
        <div class="container">
            <b-form-select
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
        mounted() {
            this.$store.dispatch('fetchDepartments');
        },
        computed: {
            getOptions() {
                let all = [
                    { value: null, text: "Все" }
                ];
                return all.concat(this.$store.getters.getDepartments);
            },
        },
        methods: {
            departmentHandler(selected) {
                return this.$emit('department-handler', selected);
            }
        }
    }
</script>
