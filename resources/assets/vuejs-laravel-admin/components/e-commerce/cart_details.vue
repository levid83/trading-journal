<template>
    <div>
      <div class="row">
          <div class="col-md-12 mb-5">
              <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-5 mt-5">
                                      <span class="show_txt ml-1">Showing 1-12 of 18 results</span>
                                  </div>
                                  <div class="col-md-6 text-center mt-5 mr-1">
                                      <div class="row">
                                          <div class="col-4 mt-2 text-right sort_text">SORT BY</div>
                                          <div class="col-8">
                                              <div>
                                                  <multiselect v-model="value_search" :options="options1" placeholder="Select One Cart style" label="name" track-by="name"></multiselect>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class=" col-xl-3 col-lg-6 col-md-6 col-12 mt-5">
                              <div class="row hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <div>
                                              <button class="new_btn btn btn-sm" type="button">NEW</button>
                                          </div>
                                          <div class="cart_btn">
                                              <img src="../../assets/img/pages/polo_tshirt.jpg" alt="image missing" class="img-fluid img_rad">
                                              <div class="middle">
                                                  <div class="text">
                                                      <a href="#" class="btn_cart">Add to cart <i class=" fa fa-check text-white"></i></a>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Red Men's Polo T-shirt</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$269.00</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/Desk-Calendar-Mockup.jpg" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Desk Calendar</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$9.99</span>
                                  </div>
                              </div>


                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <div>
                                              <button class="top_btn btn-sm" type="button">TOP</button>
                                          </div>
                                          <div class="cart_btn">
                                              <img src="../../assets/img/pages/fabric_bag.png" alt="image missing" class="img-fluid img_rad">
                                              <div class="middle">
                                                  <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Fabric Bag</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$28.99</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/book.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Special Perfume</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$85.00</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/wood.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">
                                                  <a href="#" class="btn_cart">Add to cart <i class=" fa fa-check text-white"></i></a>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Wood Salt Grinder</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$39.99</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <button class="sell_btn btn-sm" type="button">SALE</button>
                                      </div>
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/T-shirt.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Men's Polo T-shirt</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_del mr-2"><del class="delete_price">$269.99</del></span><span class="price_clr">$39.99</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/notebook.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Funny Note Book</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$12.00</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/WoodStamp.jpg" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Wood Stamp</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$33.00</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <div>
                                              <button class="sell_btn btn-sm" type="button">SALE</button>
                                          </div>
                                          <div class="cart_btn">
                                              <img src="../../assets/img/pages/Mini-Envelopes-Businesscard-Mockup.jpg" alt="image missing" class="img-fluid img_rad">
                                              <div class="middle">
                                                  <div class="text">
                                                      <a href="#" class="btn_cart">Add to cart <i class=" fa fa-check text-white"></i></a>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Business card</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_del mr-2"><del class="delete_price">$13.00</del></span><span class="price_clr">$8.00</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/dark-wine.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Dry Red Wine</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$83.00</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <button class="fea_btn btn-sm" type="button">FEATURED</button>
                                      </div>
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/terminal.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>


                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">A3 Landscape Poster</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_clr">$24.99</span>
                                  </div>
                              </div>
                              <div class="row mt-5 hvr_img">
                                  <div class="col-12">
                                      <div>
                                          <button class="sell_btn btn-sm" type="button">SALE</button>
                                      </div>
                                      <div class="cart_btn">
                                          <img src="../../assets/img/pages/coffeecup.png" alt="image missing" class="img-fluid img_rad">
                                          <div class="middle">
                                              <div class="text">Add to cart <i class=" fa fa-check text-white"></i></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <div class="text-center">
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star star_text"></i>
                                          <i class="fa fa-star-o star_text"></i>
                                      </div>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="items_names">Classic White Cup</span>
                                  </div>
                                  <div class="col-12 text-center mt-2">
                                      <span class="price_del mr-2"><del class="delete_price">$9.00</del></span><span class="price_clr">$4.00</span>
                                  </div>
                              </div>
                          </div>
                             <div class="col-xl-3  col-lg-6 col-md-6 mb-5">
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
                                                  <img src="../../assets/img/pages/shirt70x70.png" alt="images missing" class="img-fluid">
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
                                                  <img src="../../assets/img/pages/bag70x70.png" alt="images missing" class="img-fluid">
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
                                                  <img src="../../assets/img/pages/desk70x70.png" alt="images missing" class="img-fluid">
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
                                              <div class="col-6 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">Mock-Ups</button>
                                              </div>
                                              <div class="col-6 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">UI</button>
                                              </div>
                                              <div class="col-6 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">Websites</button>
                                              </div>
                                              <div class="col-6 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">brand</button>
                                              </div>
                                              <div class="col-8 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">PSD Templates</button>
                                              </div>
                                              <div class="col-6 mt-3">
                                                  <button type="button" class="btn btn-sm all_btn">Websites</button>
                                              </div>
                                              <div class="col-6 mt-3">
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
          </div>
      </div>
    </div>
</template>
<script>
    import Vue from "vue";
    import Multiselect from 'vue-multiselect';
    import vueSlider from 'vue-slider-component';
    export default {
        // ===Component name
        name: "CartDetail",
        // ===Props passed to component
        props: {},
        // ===Components used by this component
        components: {
            Multiselect,
            vueSlider
        },
        // ====component Data properties
        data(){
            return {
                value2: [20, 50],
                value: null,
                multi_value: null,
                object_value: null,
                value_search: null,
                options: ['default', 'Select2', 'Selectize', 'MultiSelect'],
                tag_value: [{
                    name: 'Javascript',
                    code: 'js'
                }],
                options1: [{
                    name: 'Cart style1',
                    language: 'JavaScript'
                }, {
                    name: 'Cart style2',
                    language: 'Ruby'
                }, {
                    name: 'Cart style3',
                    language: 'Ruby'
                }, {
                    name: 'Cart style4',
                    language: 'PHP'
                }, {
                    name: 'Cart style5',
                    language: 'Elixir'
                }],
                object_options: [{
                    name: 'Vue.js',
                    code: 'vu'
                }, {
                    name: 'Javascript',
                    code: 'js'
                }, {
                    name: 'Monterail',
                    code: 'pl'
                }, {
                    name: 'Open Source',
                    code: 'os'
                }]
            }
        },
        // ===Code to be executed when Component is mounted
        mounted() {

        },
        // ===Computed properties for the component
        computed: {},
        // ===Component methods
        methods: {
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
<style scoped src="../../assets/css/cart_details.css"></style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
