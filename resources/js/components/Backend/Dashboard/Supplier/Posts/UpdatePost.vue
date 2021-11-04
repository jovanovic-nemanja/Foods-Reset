<template>
    <div class="social-dash-wrap mt-4">
        <transition name="fade">
            <div class="col-md-9 m-auto ">
                <div class="card border-0">
                    <div class="card-header">
                        <h6>Create New Supply Post</h6>
                    </div>
                    <div class="card-body p-5">
                        <form @click="addNewPost" action="">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Select Category</label>
                                        <select required v-model="postData.category" name="" id="" class="form-control">
                                            <option value="">Meat</option>
                                            <option value="">Meat</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">SKU (Item)</label>
                                        <input required v-model="postData.sku" placeholder="SKU" type="text"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea required v-model="postData.description" name="" id="" cols="10"
                                                  rows="3"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Unit Per Case </label>
                                        <input required v-model="postData.unit_per_case" type="text"
                                               class="form-control">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Net Weight(LBS) </label>
                                        <input required v-model="postData.net_weight" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Location </label>
                                        <input required v-model="postData.product_location" type="text"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Expiry Date </label>
                                        <input required v-model="postData.expiry" type="datetime-local"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Quantity </label>
                                        <input required v-model="postData.quantity" type="number" min="0"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">List Price </label>
                                        <input required v-model="postData.list_price" type="number" min="0"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Per case/mod</label>
                                        <input required v-model="postData.per_case_price" type="number" min="0"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Per unit </label>
                                        <input required v-model="postData.min_price" type="number" min="0"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="">Duration (Hours)</label>
                                            <select required v-model="postData.order_duration" name="" id=""
                                                    class="form-control">
                                                <option value="2">2</option>
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Pools</label>
                                        <textarea v-model="postData.pool_name" name="" id="" cols="10" rows="3"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <p class="text-center">Delivery Window</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">From</label>
                                                    <input v-model="postData.delivery_window" type="datetime-local"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">To</label>
                                                    <input v-model="postData.delivery_window_to" type="datetime-local"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Location</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea class="form-control" name="" id="" cols="10"
                                                              rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="button" value="Create Post" class="btn btn-block p-1 btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: "CreatePost",
    data() {
        return {
            postData: {
                category: null,
                sku: null,
                description: null,
                unit_per_case: null,
                net_weight: null,
                product_location: null,
                expiry: null,
                quantity: null,
                list_price: null,
                per_case_price: null,
                min_price: null,
                order_duration: null,
                pool_name: null,
                delivery_window: null,
                delivery_window_to: null,
            }
        }
    },
    methods: {
        addNewPost() {
            axios.post(`/ajax/supplier/post/create`, this.postData)
                .then(response => {
                    if (response.data.success) {
                        this.$toast.success(response.data.message)
                        this.$router.push('/home');
                    } else {
                        this.$toast.error(response.data.message)
                    }
                })
                .catch(err => {
                    console.error(err)
                })
        }
    }
}
</script>

<style scoped>
.form-control {
    background-color: #e5e5e56e !important;
}


</style>
