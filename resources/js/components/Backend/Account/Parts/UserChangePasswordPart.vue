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
                                <h6>Update Password</h6>
                                <span class="fs-13 color-light fw-400">
                                                   Update Password.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-10 m-auto">
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" v-model="newPassword" class="form-control"
                                           placeholder="New Password">
                                </div>

                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" v-model="confirmPassword" class="form-control"
                                           placeholder="Confirm Password">
                                </div>

                                <div class="form-group">
                                    <input type="button" value="Change Password" @click="changePassword"
                                           class="btn btn-block btn-primary">
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
    name: "UserChangePasswordPart",
    data() {
        return {
            newPassword: '',
            confirmPassword: ''
        }
    },
    methods: {
        validatePassword() {
            if (this.newPassword.length < 1) {
                this.$toast.error("Password can't be empty.")
                return false;
            }
            if (this.newPassword.length < 6) {
                this.$toast.error("Password must be more then 6 digit characters.")
                return false;
            }

            if (this.newPassword !== this.confirmPassword) {
                this.$toast.error("Password didn't match.")
                return false;
            }

            return true;

        },
        changePassword() {
            if (!this.validatePassword()) return;

            axios.post(`/ajax/user/update/password`, {
                password: this.newPassword,
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
