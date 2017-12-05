<template>
    <div>
        <div class="col-12 mb-5">
            <div class="row">
                <div class="col-12 mt-5">
                    <b-card class="round_box">
                        <div>
                            <h4 class="cata_text mt-2 ml-2 mb-3" title="click on below the cart styles">Categories</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row hvr_clr mt-3">
                                    <div class="col-2 text-right">
                                        <i class="fa fa-caret-right caret_clr hvr_text"></i>
                                    </div>
                                    <div class="col-10 text-left catag_inr_text hvr_text">
                                        <a href="#" class="cart_style"> Accessories (68)</a>
                                    </div>
                                </div>

                                <div class="row hvr_clr mt-2">
                                    <div class="col-2 text-right hvr_text">
                                        <i class="fa fa-caret-right caret_clr hvr_text"></i>
                                    </div>
                                    <div class="col-10 text-left catag_inr_text hvr_text">
                                        <a href="#" class="cart_style"> Clothing (36)</a>
                                    </div>
                                </div>
                                <div class="row hvr_clr mt-2">
                                    <div class="col-2 text-right hvr_text">
                                        <i class="fa fa-caret-right caret_clr hvr_text"></i>
                                    </div>
                                    <div class="col-10 text-left catag_inr_text hvr_text">
                                        <a href="#" class="cart_style"> Things (29)</a>
                                    </div>
                                </div>
                                <div class="row hvr_clr mt-2">
                                    <div class="col-2 text-right hvr_text">
                                        <i class="fa fa-caret-right caret_clr hvr_text"></i>
                                    </div>
                                    <div class="col-10 text-left catag_inr_text hvr_text">
                                        <a href="#"  class="cart_style"> Polygraphy (20)</a>
                                    </div>
                                </div>
                                <div class="row hvr_clr mt-2">
                                    <div class="col-2 text-right hvr_text">
                                        <i class="fa fa-caret-right caret_clr hvr_text"></i>
                                    </div>
                                    <div class="col-10 text-left catag_inr_text hvr_text">
                                        <a href="#" class="cart_style">Other (7)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-card>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12  mt-4">
                    <b-card class="range_box">
                        <h4 class="cata_text mt-3 ml-3">Filter by price </h4>
                        <div  class="ml-3">
                            <h5 class="mt-5">Price Range{{value2}}</h5>
                            <vue-slider v-model="value2" class="mt-5 mb-5 range_space" :range="true"></vue-slider>
                        </div>
                    </b-card>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <b-card class="round_box">
                                <div>
                                    <h4 class="cata_text mt-3 ml-2">Popular Items </h4>
                                </div>
                                <div class="row mt-5 hrv_text">
                                    <div class="col-6 mt-2 hvr_img">
                                        <img src="../../../../assets/img/pages/shirt70x70.png" alt="images missing" class="img-fluid">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star-half-o f-s-10"></i>
                                            </div>
                                        </div>
                                        <div class="item_text">Men's Polo T-shirt</div>
                                        <div class="pri_clr">$269.00</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row hrv_text">
                                    <div class="col-6 mt-2 hvr_img">
                                        <img src="../../../../assets/img/pages/bag70x70.png" alt="images missing" class="img-fluid">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star-o f-s-10"></i>
                                                <i class="fa fa-star-o f-s-10"></i>
                                            </div>
                                        </div>
                                        <div class="item_text">Modern Fabric Bag</div>
                                        <div class="pri_clr">$28.99</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row hrv_text">
                                    <div class="col-6 mt-2 hvr_img">
                                        <img src="../../../../assets/img/pages/desk70x70.png" alt="images missing" class="img-fluid">
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star f-s-10"></i>
                                                <i class="fa fa-star-half-empty f-s-10"></i>
                                                <i class="fa fa-star-half-o f-s-10"></i>
                                            </div>
                                        </div>
                                        <div class="item_text">Desk Calendar</div>
                                        <div class="pri_clr">$8.99</div>
                                    </div>
                                </div>
                            </b-card>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <b-card class="round_box">
                                <div>
                                    <h4 class="cata_text mt-3 mb-4 ml-2">Popular Tags</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">Mock-Ups</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">UI</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">Websites</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">brand</button>
                                    </div>
                                    <div class="col-8 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">PSD Templates</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">Websites</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">brand</button>
                                    </div>
                                    <div class="col-8 mt-3">
                                        <button type="button" class="btn btn-sm all_btn">PSD Templates</button>
                                    </div>
                                </div>
                            </b-card>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
    import Vue from "vue";
    import vueSlider from 'vue-slider-component';
    export default {
        // ===Component name
        name: "preview_categories",
        // ===Props passed to component
        props: {},
        // ===Components used by this component
        components: {
            vueSlider
        },
        // ====component Data properties
        data(){
            return{
                value2: [20, 50],
                value: null,
                multi_value: null,
                object_value: null,
                value_search: null,
            }
        },
        // ===Code to be executed when Component is mounted
        mounted() {

        },
        // ===Computed properties for the component
        computed: {},
        // ===Component methods
        methods: {
            openPictureModal(ref) {
                this.$refs.pictureModal[ref].show()
            },
            addTag(newTag) {
                const tag = {
                    name: newTag,
                    code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
                }
                this.object_options.push(tag)
                this.tag_value.push(tag)
            }
        }
    }
</script>
<!-- styles -->
<!-- adding scoped attribute will apply the css to this component only -->
<style scoped>
    .cata_text{
        color: rgba(37, 37, 37, 255);
        font-weight: bold;
    }
    .hvr_clr:hover .hvr_text , .hvr_clr:hover .caret_clr{
        color: #8799a3;
    }
    .caret_clr{
        color: #337ab7;
    }
    .catag_inr_text{
        font-size:16px;
    }
    .hvr_img:hover{
        cursor: pointer;
    }
    .all_btn:hover{
        background-color: #337ab7;
        color: #fff;
    }
    .all_btn{
        background-color: #fff;
        border: 1px solid #eee;
        border-radius: 27px;
        padding: 7px 20px;
        color:  rgba(135, 153, 163, 255);
        font-weight: 400 !important;
        font-size: 12px;
    }
    .f-s-10{
        font-size:10px;
        color: #fcd846;
    }
    .hrv_text:hover .item_text{
        color: #8799a3;
    }
    .hrv_text:hover .hvr_img{
        opacity: 0.5;
    }
    .hvr_img:hover{
        cursor: pointer;
    }
    .item_text{
        font-size: 14px;
        color: #252525;
        font-weight: 700;
    }
    .pri_clr{
        font-size: 14px;
        color: rgba(57, 181, 74, 255);
        font-weight: 700;
    }
</style>
