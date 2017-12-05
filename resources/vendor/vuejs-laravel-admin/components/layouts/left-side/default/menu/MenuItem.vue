<template>
    <div class="listbrdr">
        <router-link :to="link" exact class="menu-item">
            <i class="leftmenu_icon" :class="icon"></i>
            <span class="name"><slot></slot></span>
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
    color: $menu_color;
    position: relative;
    display: block;
    line-height: 21px;
    padding: 13px 30px;
    &:hover {
        color: $menu_hover_color;
    }
    &.active {
        color: $menu_active_color;
        background-color: $menu_active;
        i {
            color: $active_icon;
        }
    }
}

  /*.submenu-content-box .listbrdr::after{
      content: "";
     display: block;
     position: absolute;
     width: 11px;
     left: 25px;
     margin-top: -21px;
     border-top: 2px solid #888585;
     }*/

.submenu-content-box .listbrdr:active{
    color: #000;
}
.submenu-content {
    a {
        padding: 11px 20px 10px 45px;
        position: relative;  
    }
    .leftmenu_icon {
        font-size: 14px;
        color:inherit;
         
    }
}

.name {
    vertical-align: top;
}

.collapse-item .card-content .card-content-box div a {
    padding-left: 43px;

}

.leftmenu_icon {
    margin-right: 5px;
    line-height: 22px;
    height: 23px;
    width: 20px;
    text-align: center;
    font-size: 20px;
    color:$menu_color;


}
</style>
