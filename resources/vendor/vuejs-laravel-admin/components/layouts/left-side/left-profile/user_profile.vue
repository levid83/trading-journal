<template>
    <div>
        <div class="user_section">
            <div class="row">
                <div class="col-5">
                    <img :src="this.$store.state.user.picture" alt="user not found" class="rounded-circle">
                </div>
                <div class="col-7 compact_data">
                    <p class="text-white mt-2 mb-0 user_name_max">{{this.$store.state.user.name}}</p>
                    <div class="leftuser_icons mt-2">
                        <span class="float-left"><a href="#/user_profile"><i class="icon-user text-white"></i></a></span>
                        <span class="float-left"><a href="#/"><i class="fa fa-envelope-o text-white"></i></a></span>
                        <span class="float-left"><a href="#/lockscreen"><i class="icon-login text-white"></i></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped lang="scss">
/*user section*/

.user_section {
    height: 150px;
    background: url('../../../../assets/img/pages/user_bg.jpg');
    padding: 35px 20px;
}

.user_section img {
    width: 80px;
    border: 2px solid #fff;
}

.user_section p {
    font-size: 16px;
}

.user_name_max {
    display: inline-block;
    max-width: 120px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
    margin: 0 0 -4px;
}

.leftuser_icons span {
    cursor: pointer;
    padding: 4px 8px;
    background-color: rgba(16, 15, 15, 0.2);
    margin-right: 3px;
    border-radius: 50px;
}
</style>
