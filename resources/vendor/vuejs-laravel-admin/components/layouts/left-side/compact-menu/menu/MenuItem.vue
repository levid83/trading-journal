<template>
    <div>
        <router-link :to="link" exact>
            <i class="fa fa-fw left_icon" :class="icon"></i>
            <slot></slot>
        </router-link>
    </div>
</template>
<script>
export default {
    props: ["link", "icon"]
}
</script>
<style scoped lang="scss">
    @import "../../../css/customvariables";
a {
     font-size: 14px;
    color: $menu_color;
    position: relative;
    display: block;
    line-height: 20px;
    padding: 16px 23px;
    border-bottom: 1px solid #e5e5e5;
    &:hover {
        color: $menu_hover_color;
    }
    &.active {
        color: $menu_active_color;
        background: $menu_active;
        i {
            color: $active_icon;
        }
    }
}
    #menu > .navigation> .vuemenu> div > a {
        border-bottom: 1px solid #eee;
        padding: 11px 25px 4px  17px;
        i {
            font-size: 25px;
        }
    }
    #menu > .navigation> .vuemenu .typography_text >a{
        padding: 11px 15px 12px 12px;
        border-bottom: 1px solid #eee;
    }
.collapse-item .card-content .card-content-box div a {
    padding-left: 43px;
}

.left_icon {
    color: $menu_color;
    font-size: 14px;
}
</style>
