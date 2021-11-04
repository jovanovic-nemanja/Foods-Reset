<template>
    <div>
        <div class="mobile-search"></div>
        <div class="mobile-author-actions"></div>
        <HeaderLayout></HeaderLayout>
        <main class="main-content">
            <AsideMenuBarLayout></AsideMenuBarLayout>
            <div class="contents expanded">
                <div class="container-fluid">
                    <slot></slot>

                </div>
                <FooterLayout></FooterLayout>
            </div>

        </main>
    </div>
</template>

<script>
import HeaderLayout from "./HeaderLayout";
import AsideMenuBarLayout from "./AsideMenuBarLayout";
import FooterLayout from "./FooterLayout";

export default {
    name: "MainLayout",
    components: {
        HeaderLayout,
        FooterLayout,
        AsideMenuBarLayout
    }
}
</script>

<style scoped>

</style>
