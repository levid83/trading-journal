<template>
    <div class="back_color">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-lg-right text-md-right  text-sm-right">
                <div class="btn-group">
                    <button v-for="(val, key) in option.getFilterData" class="btn" :class="[key===filterOption? 'is-checked' : '']" @click="filter(key)">{{key}}
                    </button>
                </div>
            </div>
        </div>
        <isotope class="center-block" ref="cpt" id="isotope" :item-selector="'element-item'" :list="list" :options='option' v-images-loaded:on.progress="layout" @filter="filterOption=arguments[0]">
                <div v-for="element,index in list" :key="index" :class="element.filter" class="col-md-4">
                    <div class="box_border box_color">
                       <div class="col-md-12 text-center">
                           <div class="">
                               <span class="price_box">{{element.off}}</span>
                           </div>
                           <a :href="element.src" class="text_color">
                           <img :src="element.src" class="img-fluid" alt="image missing">
                           </a>
                       </div>
                        <hr>
                        <div class="row tot_padd">
                             <div class="col-md-6 col-6 text-center">
                                 <span><b>{{element.Name}}</b></span>
                             </div>
                            <div class="col-md-6 col-6">
                                <b class="text_red"><span>{{element.title}}</span></b>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <span><b>{{element.color}}</b></span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>{{element.theme}}</span>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <span><b>{{element.size}}</b></span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>{{element.inch}}</span>
                            </div>
                            <div class="col-md-12 col-12 ml-2 mt-2 description_content">
                                <b>Description:</b><br>
                                <div class="mt-2">{{element.Description}}</div>
                            </div>
                            <div class="col-md-12 col-12 text-center mt-2">
                                <div class="btn btn-info text-white cost_bold">{{element.Cost}}</div>
                            </div>
                        </div>
                </div>
                </div>
        </isotope>
    </div>
</template>
<script>
    var unsub;
    import isotope from 'vueisotope'
    import imagesLoaded from 'vue-images-loaded'
    import baguetteBox from 'baguettebox.js'

    require("baguettebox.js/dist/baguetteBox.min.css");

    export default {
        directives: {
            imagesLoaded,
        },
        components: {
            isotope,
        },
        data() {
            return {
                list: [{
                    src: require( "../../assets/img/pages/900x600_2.png"),
                    filter: "Electronic ",
                    title: "Electroinc",
                    Name:'Name',
                    Cost: "196$",
                    color:'color',
                    theme:'Black and Red',
                    size:'size',
                    inch:'32 inch',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    priceBox:'Cost',
                    off:'18% off'
                }, {
                    src: require( "../../assets/img/pages/14.jpg"),
                    filter: "Fashion",
                    title: "Fashion",
                    Name:'Name',
                    Cost: "245$",
                    color :'color',
                    theme:'Brown',
                    size:'size',
                    inch:'kids wear',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'6% off'

                }, {
                    src: require( "../../assets/img/pages/e4.png"),
                    filter: "Electronic",
                    title: "Electronic",
                    Name:'Name',
                    Cost: "152$",
                    color :'color',
                    theme:'Black',
                    size:'size',
                    inch:'32 Pixel',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'11% off'
                },
                    {
                        src: require( "../../assets/img/pages/900x600_5.png"),
                        filter: "Electronic",
                        title: "Electronic",
                        Name:'Name',
                        Cost: "152$",
                        color :'color',
                        theme:'Black',
                        size:'size',
                        inch:'32 Pixel',
                        Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                        off:'11% off'
                    }, {
                    src: require( "../../assets/img/pages/15.jpg"),
                    filter: "Fashion",
                    title: "Womens Wear",
                    Name:'Name',
                    Cost: "191$",
                    color:'color',
                    theme:"Blue",
                    size:'Style',
                    inch:'Fashion',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'9% off'
                }, {
                    src: require( "../../assets/img/pages/900x600_2.png"),
                    filter: "Electronic",
                    title: "Electronic",
                    Name:'Name',
                    Cost: "93$",
                    color :'color',
                    theme:"Black",
                    size:'size',
                    inch:'32 inch',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'5% off'
                }, {
                    src: require( "../../assets/img/pages/16.jpg"),
                    filter: "Fashion",
                    title: "Womens Wear",
                    Name:'Name',
                    Cost: "152$",
                    color :'color',
                    theme:"Black",
                        size:'Style',
                        inch:'Fashion',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'10% off'
                }, {
                    src: require( "../../assets/img/pages/e6.png"),
                    filter: "Electronic",
                    title: "Electroinc",
                    Name:'Name',
                    Cost: "21$",
                    color:'color',
                    theme:"Orange",
                    size:'size',
                    inch:'32 inch',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'15% off'
                }, {
                    src: require( "../../assets/img/pages/17.jpg"),
                    filter: "Fashion",
                    title: "Womens Wear",
                    Name:'Name',
                    Cost: "21$",
                    color :'color',
                    theme:"Black",
                        size:'Style',
                        inch:'Fashion',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'15% off'
                }, {
                    src: require( "../../assets/img/pages/900x600.png"),
                    filter: "Electronic",
                    title: "Electronic",
                    Name:'Name',
                    Cost: "19$",
                    color:'color',
                    size:'size',
                    theme:'Black',
                    inch:'42 inch',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'11% off'
                }, {
                    src: require( "../../assets/img/pages/18.jpg"),
                    filter: "Fashion",
                    title: "Mens Wear",
                    Name:'Name',
                    Cost: "14$",
                    color :'color',
                    theme:"Black",
                        size:'Style',
                        inch:'Fashion',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'15% off'
                },{
                    src: require( "../../assets/img/pages/e1.png"),
                    filter: "Electronic",
                    title: "Electronic",
                    Name:'Name',
                    Cost: "14$",
                    color :'color',
                    theme:"Black",
                    size:'size',
                    inch:'32 inch',
                    Description :'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    off:'15% off'
                }],
                filterOption: "All",
                option: {
                    itemSelector: ".element-item",
                    getFilterData: {
                        All() {
                            return true;
                        },
                        Electronic(el) {
                            return el.filter === "Electronic";
                        },
                        Fashion(el) {
                            return el.filter === "Fashion";
                        }
                    }
                }
            }

        },
        methods: {
            filter: function(key) {
                this.$refs.cpt.filter(key);
            },
            layout() {
                this.$refs.cpt.layout('masonry');
            }
        },
        mounted() {
            unsub = this.$store.subscribe((mutation, state) => {
                if (mutation.type == "left_menu") {
                    setTimeout(() => {
                        this.$refs.cpt.layout('masonry');
                        setTimeout(() => {
                            this.$refs.cpt.layout('masonry');
                        }, 600)
                    });
                }
            });
            baguetteBox.run('#isotope');
        },
        beforeRouteLeave (to, from, next) {        unsub();        next();    },
    }
</script>
<style scoped>
    .element-item {
        padding: 12px;
    }
    .element-item img {
        width: 100%;
    }

    @media screen and (max-width: 1250px)and (min-width: 1100px) {
        .element-item img {
            width: 400px;
        }
    }

    @media screen and (max-width: 991px) and (min-width: 900px) {
        .element-item img {
            width: 270px;
        }
    }

    @media screen and (max-width: 899px) and (min-width: 775px) {
        .element-item img {
            width: 350px;
        }
    }

    @media screen and (max-width: 670px) and (min-width: 400px) {
        .element-item img {
            width: 270px;
        }
    }
    @media screen and (max-width: 680px) and (min-width: 424px) {
        .price_box {
            position: absolute;
            right:67px !important;
        }
    }


    button.is-checked {
        background-color: #428bca;
        color: #fff;
    }

    button.btn {
        cursor: pointer;
    }
    .box_border{
        border: 1px solid #ccc;
    }
    .text_color{
        color:#000000;
    }
    .text_color:focus{
        outline: none !important;
    }
    .tot_padd{
        padding: 10px;
    }
    .text_red{
        color:red;
    }
    .price_box{
        background-color: #c83040;
        padding: 4px 7px;
        position: absolute;
        right: 5px;
        border-radius: 5px;
        top: 8px;
        color: white;
        font-weight: bold;

    }
    .cost_bold{
        font-weight: bold;
    }
    .box_color{
        background-color: white;
    }
.description_content{
    text-align: justify;
    padding-right:30px;
}
</style>
