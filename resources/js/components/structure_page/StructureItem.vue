<template>
    <div class="ml-5">
        <div class="px-10">
            <p class="text-left">{{ item.fio }}({{ item.position.title }})</p>
            <ul class="list-none mx-10" v-if="item.subjects && item.subjects.length > 0">
                <StructureItem
                    v-for="(subject,i) in item.subjects"
                    :key="i"
                    :item="subject"
                ></StructureItem>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StructureItem",
        props: {
            item: {
                type: Object,
                required: true,
            }
        }
    }
</script>

<style scoped>

</style>
