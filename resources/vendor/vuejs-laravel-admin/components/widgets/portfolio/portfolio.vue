<template>
    <div class="card social-widget">
        <div class="card-block">
            <div class="row text-center">
                <div class="col-12">
                    <img src="../../../assets/img/authors/avatar.jpg" alt="profile image" class="user-pic mt-3 mb-2">
                    <h4 class="text_color">Arthur Riley</h4>
                </div>
                <div class="col-12 mt-2 text_color mt-2">
                    <p>Morbi nisi elit, blandit sit amet tincidunt eget, ullamcorper at diam. Nunc ultullamcorper at diam. Nunc ultricies semper porta.</p>
                </div>
                <div class="col-12 border_top">
                    <div class="row">
                <div class="col-4 social-icons">
                    <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                </div>
                <div class="col-4 social-icons">
                    <a href="#"><i class="fa fa-facebook text-primary" aria-hidden="true"></i></a>
                </div>
                <div class="col-4 social-icons">
                    <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0 text-center">
            <div class="col-4  pb-0 post-fllow">
                <span class="mt-3"><strong>39</strong></span>
                <p class="mt-2">Posts</p>
            </div>
            <div class="col-4 pb-0 post-fllow">
                <span><strong>210</strong></span>
                <p class="mt-2">Following</p>
            </div>
            <div class="col-4 pb-0 post-fllow">
                <span><strong>1,650</strong></span>
                <p class="mt-2">Followers</p>
            </div>
        </div>
    </div>
</template>
<style scoped>
/*social-widget*/

.social-widget .user-pic {
    border-radius: 50%;
    width: 106px;
}

.social-widget .social-icons {
    font-size: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
}
.border_top{
    padding-top: 15px;
    border-top:1px solid #ccc;

}
.post-fllow {
    background-color: #fff !important;
}
.social-widget .post-fllow {
    background-color: #e5e5e5;
    padding-bottom: 4px;
    padding-top: 18px;
    border-top: 1px solid #ccc;
}

.social-widget .post-fllow:not(:last-child) {
    border-right: 1px solid #CCC;
}
</style>
