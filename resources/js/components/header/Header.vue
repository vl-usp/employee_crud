<template>
    <div class="header bg-info">
        <div class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" :class="{ 'bg-primary': isEmployeeRoute }">
                        <router-link class="nav-link text-light" :to="{ name: 'employee' }"> Сотрудники </router-link>
                    </li>
                    <li class="nav-item" :class="{ 'bg-primary' : isStructureRoute }">
                        <router-link class="nav-link text-light" :to="{ name: 'structure' }"> Струтктура компании </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Header",
        computed: {
            isEmployeeRoute() {
                return this.$route.name === 'employee';
            },
            isStructureRoute() {
                return this.$route.name === 'structure';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .header {
        margin-bottom: 15px;
    }
    .navbar {
        padding: 0;
    }
</style>
