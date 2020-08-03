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
                    v-for="(page,i) of paginator.last_page"
                    :key="i"
                >
                    <a class="page-link"
                       @click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>
            <li class="page-item"
                :class="{ 'disabled': currentPage === paginator.last_page }"
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
            changePage(pageUrl) {
                if(typeof pageUrl === 'number') { //в случае нажатия на конкретную страницу
                    pageUrl = this.paginator.path + "?page=" + pageUrl;
                }
                this.$emit('page-handler', pageUrl);
            }
        },
    }
</script>
