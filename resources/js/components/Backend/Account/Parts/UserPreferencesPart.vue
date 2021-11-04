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
                                <h6>Update Preferences</h6>
                                <span class="fs-13 color-light fw-400">
                                 Update Preference.
                                </span>
                            </div>
                            <div class="card-extra">
                                <div @click="updateSupplierPreferences" class="btn btn-primary btn-sm">
                                    Save Changes
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="checkbox-theme-default custom-checkbox mb-2" v-for="preference in preferences"
                                 :key="preference.id">
                                <input
                                    v-model="selectedPreferences"
                                    :value="preference.id" class="checkbox" type="checkbox"
                                    :id="`check-grid-${preference.id}`">
                                <label :for="`check-grid-${preference.id}`">
                                                            <span class="checkbox-text">
                                                                {{ preference.name }}
                                                            </span>
                                </label>
                            </div>
                            <br>
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
    name: "UserPreferencesPart",
    props: ['user'],
    data() {
        return {
            preferences: [],
            selectedPreferences: [],
        }
    },
    mounted() {
        this.getAllPreferences();
        this.selectedPreferences = this.user.preference.split(',');
    },
    methods: {
        getAllPreferences() {
            axios.get(`/ajax/get/all-preferences`)
                .then(res => {
                    this.preferences = res.data.preference;
                })
                .catch(error => {
                    console.log(error)
                })
        },
        updateSupplierPreferences() {
            axios.post(`/ajax/update/supplier-preferences`, {
                preferences: this.selectedPreferences
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
