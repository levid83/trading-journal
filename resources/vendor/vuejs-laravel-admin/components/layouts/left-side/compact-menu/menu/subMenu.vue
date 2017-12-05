<template>
    <div class="submenu collapse-item">
        <div class="submenu-header touchable" role="tab" :aria-expanded="selected ? 'true' : 'fase'">
            <i class="fa fa-fw left_icon" :class="icon"></i><br/>
            <span class="submenu-header-title">{{ name }}</span>
        </div>
        <div class="submenu-content">
            <div class="submenu-content-box" ref="box">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
import anime from 'animejs'
export default {
    props: {
        selected: Boolean,
        icon: String,
        name: {
            type: String,
            required: true
        }
    }
}
</script>
<style lang="scss" scoped>
    @import "../../../css/customvariables";
.collapse-item {
    position: relative;
    .submenu-header {
        cursor: pointer;
        color: $menu_color;
        padding: 11px 10px 11px 20px;
        border-bottom: 1px solid #eee;
        &:hover {
        }
    }
    .submenu-content {
        background: $submenu_color;
        overflow-y: hidden;
        position: absolute;
        left: 100px;
        width: 200px;
        top: 15px;
        display: none;
        z-index: 50;
        margin: 0;
        padding: 0;
    }

    &:hover .submenu-content {
        display: block;
    }
    &.active {
        >.submenu-header {
            background: $menu_active;
            color: $menu_active_color;
        }
    }
}

.left_icon {
    font-size: 25px;
}
.collapse-item .submenu-header{
    padding: 11px 10px !important;
}
.collapse-item .submenu-content{
    top:-1px !important;
}
</style>
