<template>
    <div class="social-dash-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <div class="d-flex align-items-center">
                        <h4 class="text-capitalize breadcrumb-title mr-3">Supplier Dashboard</h4>
                    </div>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <router-link :to="{name:'supplier-create-post'}" href="#"
                                         class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New Supply
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <transition name="fade">
            <div class="row  mb-30">
                <div class="col-xl-12 col-lg-12 ">
                    <div class="card border-0">
                        <div class="card-header">
                            <h6>Active Supplies</h6>
                        </div>
                        <!-- ends: .card-header -->
                        <div class="card-body pt-0">
                            <PostTable :posts="supplierPosts"></PostTable>
                        </div>
                        <!-- ends: .card-body -->
                    </div>

                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import PostTable from "./Supplier/Table/PostTable";

export default {
    name: "DashboardIndex",
    components: {
        PostTable
    },
    data() {
        return {
            supplierPosts: []
        }
    },
    mounted() {
        this.getSupplierPosts();
    },
    methods: {
        getSupplierPosts() {
            axios.get(`/ajax/supplier/posts`)
                .then(response => {
                    this.supplierPosts = response.data.supplierPosts;
                })
                .catch(err => {
                    console.error(err)
                })
        }
    },
}
</script>

<style scoped>

</style>
