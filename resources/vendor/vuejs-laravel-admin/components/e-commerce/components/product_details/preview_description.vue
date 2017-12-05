<template>
    <div>
        <div class="col-12 mt-5">
            <b-card>
                <div class="additional_heading  mb-4">Description</div>
                <div class="align-content-round">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                </div>
            </b-card>
        </div>
        <div class="col-12">
            <b-card>
                <div class="align-content-round">
                    <div class="additional_heading  mb-4">Additional Information</div>
                    <div class="row">
                        <div class="col-4 mt-2 item_head">Material:</div>
                        <div class="col-8 mt-2 pl-sm-3 pl-4">Cutton</div>
                        <div class="col-4 mt-2 item_head">Sleve type:</div>
                        <div class="col-8 mt-2">Half Sleeve</div>
                        <div class="col-4 mt-2 item_head">Neck  type:</div>
                        <div class="col-8 mt-2">Polo</div>
                        <div class="col-4 mt-2 item_head">Fit type:</div>
                        <div class="col-8 mt-2">Regular type</div>
                        <div class="col-4 mt-2 item_head">Color:</div>
                        <div class="col-8 mt-2">Black , Brown , white</div>
                        <div class="col-4 mt-2 item_head">Sleve type:</div>
                        <div class="col-8 mt-2">Half Sleeve</div>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-12">
            <b-card>
                <div class="additional_heading  mb-4">Reviews (3)</div>
                <div class="align-content-round">
                    <b-media class="mt-4">
                        <img slot="aside" src="../../../../assets/img/authors/avatar2.jpg" alt="image missing" class="rounded-circle cir_img mr-2">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="mt-1"><b>Charis Perter</b></h5>
                                <div class="date_year mb-2">Sep.28, 2016 </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star-half-o star_icon"></i>

                                </div>
                            </div>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                            in faucibus.
                        </p>
                    </b-media>
                    <b-media class="mt-4">
                        <img slot="aside" src="../../../../assets/img/authors/avatar3.jpg" alt="image missing" class="rounded-circle cir_img mr-2">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="mt-1"><b>John Corner</b></h5>
                                <div class="date_year mb-2">Oct.02, 2016 </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star-half-o star_icon"></i>
                                    <i class="fa fa-star-o star_icon"></i>
                                    <i class="fa fa-star-o star_icon"></i>

                                </div>
                            </div>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                            in faucibus.
                        </p>
                    </b-media>
                    <b-media class="mt-4">
                        <img slot="aside" src="../../../../assets/img/authors/avatar1.jpg" alt="image missing" class="rounded-circle cir_img mr-2">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="mt-1"><b>Lucis flowers</b></h5>
                                <div class="date_year mb-2">Oct.21, 2016 </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star star_icon"></i>
                                    <i class="fa fa-star-half-o star_icon"></i>

                                </div>
                            </div>
                        </div>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                            in faucibus.
                        </p>
                    </b-media>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
    import Vue from "vue";
    export default {
        // ===Component name
        name: "preview_description",
        // ===Props passed to component
        props: {},
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
    .star_icon{
        font-size: 14px;
        color:#ffd500;
    }
    .additional_heading{
        font-size: 16px;
        font-weight: bold;
        color:#337ab7 ;
    }
    .item_head{
        font-weight:700;
    }
    .cir_img{
        width: 50px;
        height:50px;
    }
    .date_year{
        font-size: 14px;
        color: #8799a3;
    }
</style>
