<template>
    <div >
        <p class="text-left">{{ structure.fio }}({{ structure.position.title }})</p>
        <StructureItem
            v-for="(item,i) in structure.subjects"
            :key="i"
            :item="item"
        ></StructureItem>
    </div>
</template>

<script>
    import StructureItem from "./StructureItem";
    export default {
        name: "StructureList",
        components: {StructureItem},
        props: {
            structure: {
                type: Object,
                required: true,
            }
        }
    }
</script>

<style scoped>

</style>
