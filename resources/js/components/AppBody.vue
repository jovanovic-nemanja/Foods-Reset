<template>
    <MainLayout>
        <vue-page-transition name="fade-in-up">
            <router-view>
            </router-view>
        </vue-page-transition>
    </MainLayout>
</template>

<script>
import MainLayout from "./LayoutParts/MainLayout";

export default {
    name: "AppBody",
    props:['user'],
    components: {
        MainLayout
    },
    created() {
        this.$store.commit('SET_USER',this.user)
    }

}
</script>

<style scoped>

</style>
