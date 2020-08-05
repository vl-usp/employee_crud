<template>
    <div class="row justify-content-center">
        <span class="m-2">Страницы:</span>
        <ul class="pagination">
            <li class="page-item"
                :class="{ 'disabled': currentPage === 1 }"
            >
                <a class="page-link"
                   aria-label="Previous"
                   @click.prevent="changePage(prevPage)"
                >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
                <li class="page-item"
                    :class="{ 'active': currentPage === page }"
                    v-for="(page,i) of getPaginator.last_page"
                    :key="i"
                >
                    <a class="page-link"
                       @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>
            <li class="page-item"
                :class="{ 'disabled': currentPage === getPaginator.last_page }"
            >
                <a class="page-link"
                   aria-label="Next"
                   @click.prevent="changePage(nextPage)"
                >
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Paginator",
        computed: {
            getPaginator() {
                return this.$store.getters.getPaginator;
            },
            nextPage: function() {
                return this.getPaginator.next;
            },
            prevPage: function () {
                return this.getPaginator.prev;
            },
            currentPage: function () {
                return this.getPaginator.current_page;
            }
        },
        methods: {
            changePage(pageUrl) {
                if(typeof pageUrl === 'number') { //в случае нажатия на конкретную страницу
                    pageUrl = this.getPaginator.path + "?page=" + pageUrl;
                }
                this.$emit('page-handler', pageUrl);
            }
        },
    }
</script>
