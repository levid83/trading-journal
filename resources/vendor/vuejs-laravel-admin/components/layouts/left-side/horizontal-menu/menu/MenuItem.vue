<template>
    <li class="menu_item">
        <router-link :to="link" exact>
            <i :class="icon"></i>
            <slot></slot>
        </router-link>
    </li>
</template>
<script>
export default {
    props: ["link", "icon"]
}
</script>
<style scoped lang="scss">
@import "../../../css/customvariables";
li.menu_item>a {
    color: $menu_color;
    position: relative;
    display: block;
    line-height: 20px;
    padding: 11px 20px;
    &:hover {
        color: $menu_hover_color;
    }
    &.active {
        color: $menu_active_color;
        background-color: $menu_active;
    }
}

.collapse-item .card-content .card-content-box li a {
    padding-left: 43px;
}
</style>
