<template>
    <!-- Profile Account -->
    <div class="card mb-25">
        <div class="card-body text-center p-0">

            <div
                class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                <div class="ap-img mb-20 pro_img_wrapper">
                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                    <label for="file-upload">
                        <!-- Profile picture image-->
                        <img class="ap-img__main rounded-circle wh-120" src="/img/author/profile.png"
                             alt="profile">
                        <span class="cross" id="remove_pro_pic">
                                                    <span data-feather="camera"></span>
                                                </span>
                    </label>
                </div>
                <div class="ap-nameAddress pb-3">
                    <h5 class="ap-nameAddress__title">{{ user.name }}</h5>
                    <p class="ap-nameAddress__subTitle fs-14 m-0">{{ user.user_role == "2" ? 'Buyer' : '' }}
                        {{ user.user_role == "3" ? 'Supplier' : '' }}</p>
                </div>
            </div>
            <div class="ps-tab p-20 pb-25">
                <div class="nav flex-column text-left" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a @click="changeActiveMenu('UserPersonalInfoPart')" class="nav-link "
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-home"
                       aria-selected="true">
                        <span data-feather="user"></span>
                        Edit profile
                    </a>
                    <a @click="changeActiveMenu('UserChangePasswordPart')" class="nav-link"
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-messages"
                       aria-selected="false">
                        <span data-feather="key"></span>change password</a>

                    <a @click="changeActiveMenu('UserPreferencesPart')" class="nav-link"
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-profile"
                       aria-selected="false">
                        <span data-feather="settings"></span>Update Preferences</a>

                    <a @click="changeActiveMenu('SupplierPoolsPart')" class="nav-link"
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-profile"
                       aria-selected="false">
                        <span data-feather="settings"></span>Pools</a>

<!--                    <a @click="changeActiveMenu('UserDeliveryLocationPart')" class="nav-link"-->
                    <!--                       data-toggle="pill"-->
                    <!--                       role="tab" aria-controls="v-pills-settings"-->
                    <!--                       aria-selected="false">-->
                    <!--                        <span data-feather="users"></span>Delivery Locations</a>-->

                    <a @click="changeActiveMenu('UserBankInformationPart')" class="nav-link"
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-settings"
                       aria-selected="false">
                        <span data-feather="users"></span>Bank Information</a>

                    <a @click="changeActiveMenu('UserNotificationPart')" class="nav-link"
                       data-toggle="pill"
                       role="tab" aria-controls="v-pills-notification"
                       aria-selected="false">
                        <span data-feather="bell"></span>notification</a>
                </div>
            </div>

        </div>
    </div>
    <!-- Profile Account End -->
</template>

<script>
export default {
    name: "AccountSidebar",
    props: ['user'],
    data() {
        return {}

    },
    methods: {
        changeActiveMenu(val) {
            this.$emit('activeComponent', val);
        }
    },


}
</script>

<style scoped>
.nav-link {
    cursor: pointer;
}
</style>
