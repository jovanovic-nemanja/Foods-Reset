<template>
    <aside class="sidebar collapsed">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <li>
                    <router-link to="/home">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Dashboard</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/account/settings">
                        <span
                            data-feather="settings"
                            class="nav-icon"
                        ></span>
                        <span class="menu-text">Settings</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script>
export default {
    name: "AsideMenuBarLayout"
};
</script>

<style scoped></style>
