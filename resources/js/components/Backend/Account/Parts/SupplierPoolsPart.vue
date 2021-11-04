<template>
    <div class="mb-50">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade  show active" id="api-access-token-area" role="tabpanel"
                 aria-labelledby="v-pills-home-tab">
                <!-- Edit Profile -->
                <div class="edit-profile">
                    <div class="card">
                        <div class="card-header px-sm-25 px-3">
                            <div class="edit-profile__title">
                                <h6>Pools</h6>
                                <span class="fs-13 color-light fw-400">
                                     Add or Update Pools.
                                </span>
                            </div>
                            <div class="card-extra">
                                <div @click="callPoolModal" class="btn btn-primary btn-sm">
                                    ADD POOL
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table--default">
                                <thead>
                                <tr>
                                    <th style="width: 60px !important;">ID</th>
                                    <th style="max-width: 200px">Pool Name</th>
                                    <th>Distance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(pool,index) in pools" :key="pool.id">
                                    <td style="width: 60px !important;">
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        {{ pool.pool_name }}
                                    </td>
                                    <td>
                                        {{ pool.distance }} KM
                                    </td>
                                    <td>
                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                            <li>
                                                <a @click="editPool(index)" href="#" class="edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path
                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="remove" @click="deletePool(pool.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Edit Profile End -->
            </div>
        </div>
        <div class="modal-basic modal fade show" id="poolModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal-bg-white ">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Pool</h6>
                        <button type="button" class="close" @click="closeModal">
                            <span data-feather="x"></span></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="savePoolChanges" action="">
                            <div class="form-group">
                                <label for="">Pool Name</label>
                                <input required v-model="poolFormData.pool_name" type="text" class="form-control"
                                       placeholder="Pool Name">
                            </div>
                            <div class="form-group">
                                <label for="">Pool Type</label>
                                <select required v-model="poolFormData.pool_type" name="" id="" class="form-control">
                                    <option value="2">Distance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Distance</label>
                                <input required v-model="poolFormData.distance" type="number" class="form-control"
                                       placeholder="Distance">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary" value="Save Changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ends: .modal-Basic -->


    </div>
</template>

<script>
export default {
    name: "SupplierPoolsPart",
    props: ['user'],
    data() {
        return {
            pools: [],
            poolFormData: {
                id: null,
                pool_name: '',
                pool_type: 2,
                distance: 0
            }
        }
    },
    created() {
        this.getUserPools();
    },
    methods: {


        editPool(index) {
            let pool = this.pools[index];

            this.poolFormData.id = pool.id;
            this.poolFormData.pool_name = pool.pool_name;
            this.poolFormData.pool_type = pool.pool_type;
            this.poolFormData.distance = pool.distance;
            $("#poolModal").modal('show');

        },
        closeModal() {
            $("#poolModal").modal('hide');
            this.resetModal();
        },

        resetModal() {
            this.poolFormData.id = null;
            this.poolFormData.pool_name = '';
            this.poolFormData.pool_type = 2;
            this.poolFormData.distance = 0;
        },
        addNewPool() {
            axios.post(`/ajax/supplier/pool/add`, this.poolFormData)
                .then(response => {
                    if (response.data.success) {
                        this.$toast.success(response.data.message)
                        this.getUserPools();
                        this.closeModal();
                    } else {
                        this.$toast.error(response.data.message)
                    }
                })
                .catch(err => {
                    console.error(err)
                })
        },
        deletePool(poolID) {
            let confirmDelete = confirm('Are you sure you want to delete the pool?');
            if (!confirmDelete) return;
            axios.post(`/ajax/supplier/pool/delete`, {
                pool: poolID
            })
                .then(response => {
                    if (response.data.success) {
                        this.$toast.success(response.data.message)
                        this.getUserPools();
                    } else {
                        this.$toast.error(response.data.message)
                    }
                })
                .catch(err => {
                    console.error(err)
                })
        },
        updatePool() {
            axios.post(`/ajax/supplier/pool/update`, this.poolFormData)
                .then(response => {
                    if (response.data.success) {
                        this.$toast.success(response.data.message)
                        this.getUserPools();
                        this.closeModal();
                    } else {
                        this.$toast.error(response.data.message)
                    }
                })
                .catch(err => {
                    console.error(err)
                })
        },
        savePoolChanges() {
            if (this.poolFormData.id != null) {
                this.updatePool();


            } else {
                this.addNewPool();
            }
        },
        callPoolModal() {
            $("#poolModal").modal('show');
        },
        getUserPools() {
            axios.get(`/ajax/user/pools`)
                .then(response => {
                    this.pools = response.data.pools;
                })
                .catch(err => {
                    console.error(err)
                })
        }
    }
}
</script>

<style scoped>
td {
    width: 100px !important;
}

table {
    table-layout: fixed;
    word-wrap: break-word;
}
</style>
