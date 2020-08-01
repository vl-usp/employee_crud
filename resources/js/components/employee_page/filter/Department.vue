<template>
    <div class="department">
            <div>
                <b-form-select
                    v-model="selected"
                    :options="getOptions"
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
