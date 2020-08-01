<template>
    <div class="row justify-content-center">
        <span class="m-2">Страницы:</span>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link"
                   aria-label="Previous"
                   v-show="currentPage !== 1"
                   @click.prevent="changePage(prevPage)"
                >
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
                <li class="page-item"
                    :class="{ 'active': currentPage === page }"
                    v-for="page of paginator.last_page"
                >
                    <a class="page-link"
                       @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>
            <li class="page-item">
                <a class="page-link"
                   aria-label="Next"
                   v-show="currentPage !== paginator.last_page"
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
        props: {
            paginator: {
                type: Object,
                required: true,
            }
        },
        computed: {
            nextPage: function() {
                return this.paginator.next;
            },
            prevPage: function () {
                return this.paginator.prev;
            },
            currentPage: function () {
                return this.paginator.current_page;
            }
        },
        methods: {
            changePage(page) {
                let pageUrl = this.paginator.path;
                if(typeof page === 'number') {
                    pageUrl += "?page=" + page;
                }
                this.$emit('page-handler', pageUrl);
            }
        },
    }
</script>
