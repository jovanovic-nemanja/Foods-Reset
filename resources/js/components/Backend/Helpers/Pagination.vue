<template>
    <ul class="pagination">
        <li class="page-item" v-if="pagination.current_page > 1">
            <a class="page-link" href="javascript:void(0)" aria-label="Previous"
               v-on:click.prevent="changePage(pagination.current_page - 1)">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
            <a class="page-link" href="javascript:void(0)" v-on:click.prevent="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
            <a class="page-link" href="javascript:void(0)" aria-label="Next"
               v-on:click.prevent="changePage(pagination.current_page + 1)">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
</template>
<script>
export default {
    name: 'Pagination',
    props: {
        pagination: {
            type: Object,
            required: true
        },
        offset: {
            type: Number,
            default: 4
        }
    },
    computed: {
        pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            for (let page = from; page <= to; page++) {
                pagesArray.push(page);
            }
            return pagesArray;
        }
    },
    methods: {
        changePage(page) {
            this.pagination.current_page = page;
            this.$emit('paginate');
        }
    }
}
</script>

<style scoped>
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #e06aa5;
    border-color: #e06aa5;
}

.page-link {
    position: relative;
    display: block;
    padding: 8px 14px;
    margin-left: -1px;
    line-height: 1.25;
    color: #e06aa5;
    background-color: #fff;
    border: 1px solid #dee2e6;
}
</style>
