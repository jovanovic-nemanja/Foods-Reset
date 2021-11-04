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
                                <h6>Update Profile</h6>
                                <span class="fs-13 color-light fw-400">
                                  Update Profile.
                                </span>
                            </div>
                            <div class="card-extra">
                                <div @click="saveChanges" class="btn btn-primary btn-sm">
                                    Save Changes
                                </div>
                            </div>
                        </div>
                        <div class="card-body mb-3">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="form-group"><label for="">Full name</label>
                                        <input v-model="user.name" type="text" class="form-control"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">Company name</label>
                                        <input v-model="user.company_name" type="text" class="form-control"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">Email Address</label>
                                        <input v-model="user.email" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">Street</label>
                                        <input v-model="user.street" type="text" class="form-control"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group"><label for="">Address</label>
                                        <input v-model="user.address" type="text" class="form-control"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">City</label>
                                        <input v-model="user.city" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">State</label>
                                        <input v-model="user.state" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">Zip Code</label>
                                        <input v-model="user.zipcode" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group"><label for="">Country</label>
                                        <input v-model="user.country" type="text" class="form-control">
                                    </div>
                                </div>


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
    name: "UserPersonalInfoPart",
    props: ['user'],
    methods: {
        saveChanges() {
            axios.post(`/ajax/user/update/profile`, {
                name: this.user.name,
                company_name: this.user.name,
                email: this.user.email,
                address: this.user.address,
                street: this.user.street,
                city: this.user.city,
                state: this.user.state,
                zipcode: this.user.zipcode,
                country: this.user.country,
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
