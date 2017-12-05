<template>
    <!--<div>-->
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="first_head_text mt-4">Clothes</div>
            <div class="head_text">Men's Polo T-shirt</div>
            <div class="mt-2">
                 <span>
                 <i class="fa fa-star star_icon"></i>
                 <i class="fa fa-star star_icon"></i>
                 <i class="fa fa-star star_icon"></i>
                 <i class="fa fa-star star_icon"></i>
                 <i class="fa fa-star-half-o star_icon"></i>
                 </span>
                <span class="review_text ml-4">Read 3 more reviews</span>
            </div>
            <div class="about_item mt-4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.Ipsum has been the industry's standard
            </div>
            <div class="mt-4">
                 <span class="del_text">
                     <del>$99.99</del>
                 </span>
                <span class="original_price ml-3">$69.00</span>
            </div>
            <div class="mt-4">
                <span class="size_text"><b>Size</b></span>
                <span class="ml-sm-3">
                     <button class="btn-md siz_btn" type="button">S</button>
                     <button class="btn-md siz_btn" type="button">M</button>
                     <button class="btn-md siz_btn" type="button">L</button>
                     <button class="btn-md siz_btn" type="button">XL</button>
                 </span>
            </div>
            <div class="col-12 mt-5 mb-4">
                <button class="btn btn-primary btn-lg add_cart">ADD TO CART</button>
            </div>
            <div class="mt-3 mb-3">
                <hr>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-sm-2 col-lg-3 tag_text">Tags</div>
                    <div class="col-12 col-sm-10 col-lg-9 fashion_text">T-shirt, Clothes , Fashion, Shop</div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 col-sm-2 tag_text mt-3">Share</div>
                    <div class="col-12 col-lg-9 col-sm-10 mt-3">
                        <a href="#" class="social_icons mr-3"><i class=" fa fa-facebook"></i></a>
                        <a href="#" class="social_icons mr-3"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="social_icons mr-3"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social_icons mr-3"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <!--</div>-->
</template>
<script>
//    import Vue from "vue";
    export default {
        // ===Component name
        name: "privew_details",
        // ===Props passed to component
        props: {

        },
        // ===Components used by this component
        components: {

        },
        // ====component Data properties
        data(){
            return{

            }
        },
        // ===Code to be executed when Component is mounted
        mounted() {

        },
        // ===Computed properties for the component
        computed: {},
        // ===Component methods
        methods: {

        }
    }
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped>
    .first_head_text{
        font-size: 16px;
        color: #8799a3;
    }
    .head_text{
        font-weight: bold;
        font-size: 32px;
    }
    .star_icon{
        font-size: 14px;
        color:#ffd500;
    }
    .review_text{
        color: #4fc1e9;
        font-size: 14px;
    }
    .about_item{
        font-size: 16px;
    }
    .del_text{
        font-size: 20px;
        font-weight: 700;
        color: #8799a3;
    }
    .original_price{
        font-size: 28px;
        font-weight: 800;
        color:#16AF81;
    }
    .size_text{
        font-size: 14px;
    }
    .siz_btn {
        background: none;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 41px;
        color: #8799a3;
        box-shadow: 0 15px 145px 10px rgba(0, 0, 0, 0.15);
        font-size: 14px;
        padding: 10px 5px;
        cursor: pointer;
    }
    .siz_btn:focus, .product_description .siz_btn.active {
        outline: none;
        background: #8799a3;
        color: #fff; }
    .siz_btn:hover {
        background: #8799a3;
        color: #fff;
    }
    .add_cart{
        border-radius: 20px;
        font-size: 14px;
        padding: 11px 22px;
    }
    .tag_text{
        font-size: 15px;
        font-weight: 700;
    }
    .social_icons{
        font-size: 16px;
        color: #8799a3;
    }
    .fashion_text{
        font-size: 14px;
        color: #8799a3;
    }
    @media (max-width: 325px) {
        .siz_btn{
            width: 35px;
            height: 35px;
            padding: 6px 5px;
        }
    }
</style>
