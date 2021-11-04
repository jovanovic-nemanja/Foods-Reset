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
                                <h6>Update Bank Information</h6>
                                <span class="fs-13 color-light fw-400">
                                     Bank Information.
                                </span>
                            </div>
                            <div class="card-extra">
                                <div @click="saveChanges" class="btn btn-primary btn-sm">
                                    Save Changes
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bank_name">Bank Name:</label>
                                        <input v-model="user.bank" type="text" id="bank_name" class="form-control"
                                               placeholder="Bank Name">
                                    </div>
                                </div>
                                <!--                                <div class="col-md-6">-->
                                <!--                                    <div class="form-group">-->
                                <!--                                        <label for="bank_contact_number">Contact number:</label>-->
                                <!--                                        <input type="text" id="bank_contact_number" class="form-control"-->
                                <!--                                               placeholder="Contact Number">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="col-md-12">-->
                                <!--                                    <div class="form-group">-->
                                <!--                                        <label for="bank_address">Bank Address:</label>-->
                                <!--                                        <input type="text" id="bank_address" class="form-control"-->
                                <!--                                               placeholder="Bank Address">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="col-md-12">-->
                                <!--                                    <div class="form-group">-->
                                <!--                                        <label for="bank_number">Bank Number:</label>-->
                                <!--                                        <input type="text" id="bank_number" class="form-control"-->
                                <!--                                               placeholder="Bank Number">-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_name">Account Name:</label>
                                        <input v-model="user.bank_account_name" type="text" id="account_name"
                                               class="form-control"
                                               placeholder="Account Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_type">Account Type:</label>
                                        <input v-model="user.bank_account_type" type="text" id="account_type"
                                               class="form-control"
                                               placeholder=" Account Type">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="account_number">Account Number:</label>
                                        <input v-model="user.account_number" type="text" id="account_number"
                                               class="form-control"
                                               placeholder="Account Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="branch_number">Branch Number:</label>
                                        <input v-model="user.branch" type="text" id="branch_number" class="form-control"
                                               placeholder="Branch Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="transit_number">Transit Number:</label>
                                        <input v-model="user.transit" type="text" id="transit_number"
                                               class="form-control"
                                               placeholder="Transit Number">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Profile End -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserBankInformationPart",
    props: ['user'],
    methods: {
        saveChanges() {
            axios.post(`/ajax/user/update/profile`, {
                bank: this.user.bank,
                bank_account_name: this.user.bank_account_name,
                bank_account_type: this.user.bank_account_type,
                account_number: this.user.account_number,
                branch: this.user.branch,
                transit: this.user.transit,

            })
                .then(response => {
                    if (response.data.success) {
                        this.$toast.success(response.data.message)
                    } else {
                        this.$toast.error(response.data.message)
                    }
                })
                .catch(err => {
                    this.$toast.error("Request Failed.")
                })

        }
    }
}
</script>

<style scoped>

</style>
