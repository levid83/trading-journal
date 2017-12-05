<template>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <b-card class="bg-info-card">
                <div class="profile text-center ">
                    <img :src="this.$store.state.user.picture" alt="User Image" class="rounded-circle img-fluid profile-thumb mb-3">
                    <h4 class="text-gray">{{this.$store.state.user.name}}</h4>
                    <p>{{this.$store.state.user.job}}</p>
                    <div class="row">
                        <div class="col-sm-7 text-warning user-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-full" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-5">
                            <i class="fa fa-heart text-danger" aria-hidden="true"></i> 2,080
                        </div>
                    </div>
                </div>
                <div class="profile_details">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="nav-tabs-custom">
                                <b-tabs>
                                    <b-tab title="Status">
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-6 text-right mt-1">Followers :</div>
                                                    <div class="col-6 mt-1">1,079</div>
                                                    <div class="col-6 text-right mt-1">Online Status :</div>
                                                    <div class="col-6 mt-1">Offline</div>
                                                    <div class="col-6 text-right mt-1">Last seen :</div>
                                                    <div class="col-6 mt-1">2 Days ago</div>
                                                    <div class="col-6 text-right mt-1">Last Updated :</div>
                                                    <div class="col-6 mt-1">A Month ago</div>
                                                    <div class="col-6 text-right mt-1">Connections :</div>
                                                    <div class="col-6 mt-1">2,679</div>
                                                </div>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab title="About" active>
                                          <div class="row">
                                              <div class="col-12">
                                                  <div class="row">
                                                      <div class="col-6 text-right mt-2">Email :</div>
                                                      <div class="col-6 mt-2">user@example.com</div>
                                                      <div class="col-6 text-right mt-2">Contact :</div>
                                                      <div class="col-6 nt-2">(394)-968-3152</div>
                                                      <div class="col-6 text-right mt-2">D.O.B :</div>
                                                      <div class="col-6 mt-2">6-4-1987</div>
                                                      <div class="col-6 text-right mt-1">Address :</div>
                                                      <div class="col-6 mt-1">Westwood, 12th Street,7023 Mckinley Ave, US.</div>
                                                  </div>
                                              </div>
                                          </div>
                                    </b-tab>
                                </b-tabs>
                            </div>
                        </div>
                    </div>
                </div>
            </b-card>
            <b-card header="Project Details :" header-tag="h4" class="bg-success-card">
                <b-list-group class="project-deatails">
                    <b-list-group-item>
                        <a href="#" class="text-primary"> Total Projects <span class="badge badge-primary float-right">28</span></a>
                    </b-list-group-item>
                    <b-list-group-item>
                        <a href="#" class="text-info"> Tasks <span class=" badge badge-info float-right">7</span></a>
                    </b-list-group-item>
                    <b-list-group-item>
                        <a href="#" class="text-success"> Submitted Projects <span class=" badge badge-success float-right">9</span></a>
                    </b-list-group-item>
                    <b-list-group-item>
                        <a href="#" class="text-warning"> Submitted Projects <span class="badge badge-warning float-right">9</span></a>
                    </b-list-group-item>
                    <b-list-group-item>
                        <a href="#" class="text-danger">In Progress <span class=" badge badge-danger float-right"> 11</span></a>
                    </b-list-group-item>
                    <b-list-group-item>
                        <a href="#" class="text-success"> Upcoming <span class="badge badge-success float-right">8</span></a>
                    </b-list-group-item>
                </b-list-group>
            </b-card>
        </div>
        <div class="col-xl-8 col-lg-7">
            <b-card class="bg-primary-card data">
                <!-- Nav tabs -->
                <b-tabs>
                    <b-tab title="Connections">
                        <v-scroll height="740px">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar2.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Ella Washington</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">14</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">60</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar3.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Quincy Hirthe</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg1">
                                            <strong><span class="count">7</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg1">
                                            <strong><span class="count">89</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar4.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Heath Buckridge</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg4">
                                            <strong><span class="count">6</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg4">
                                            <strong><span class="count">75</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar5.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Jonatan</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">8</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">93</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar6.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1"> Wilderman</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg4">
                                            <strong><span class="count">12</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg4">
                                            <strong><span class="count">80</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar3.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Jessyca McGlynn</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">7</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">89</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar2.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Dasia Bernhard</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">5</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">86</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar4.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Edwina West</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">16</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg3">
                                            <strong><span class="count">94</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="connection text-center row">
                                        <div class="connect-head">
                                            <img src="../assets/img/authors/avatar5.jpg" alt="User Image" class="rounded-circle">
                                            <h5 class="text-gray mt-1">Ernestina Sporer</h5>
                                            <p>Project Architect</p>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">9</span> <br> Posts</strong>
                                        </div>
                                        <div class="connect-data connect-bg2">
                                            <strong><span class="count">69</span> <br> Followers</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </v-scroll>
                    </b-tab>
                    <b-tab title="Blog">
                        <div class="row" id="blog">
                            <div class="col-xl-4 col-lg-6">
                                <div class="blog-border">
                                    <div class="blog-heading">
                                        <p>
                                            <img src="../assets/img/authors/avatar6.jpg" alt="author image" class="blog-image rounded-circle p-2 float-left img-fluid">
                                            <span class="post-by p-2"><strong>Jennie</strong> shared a post from <strong>Nature's</strong></span>
                                        </p>
                                        <img src="../assets/img/pages/blog1.jpeg" alt="blog image2" class="sharedpost-image img-fluid">
                                    </div>
                                    <div class="blog-body p-2">
                                        <p>Lorem Ipsum is simply dummy, vidis litro abertis.</p>
                                    </div>
                                </div>
                                <div class="blog-border">
                                    <div class="blog-heading">
                                        <div>
                                            <span class="blog-desc">Lorem Ipsum is simply dummy, vidis litro abertis.</span>
                                            <img src="../assets/img/pages/blog4.jpg" alt="blog image2" class="sharedpost-image img-fluid">
                                        </div>
                                        <div class="connect-data connect-bg1 text-center">
                                            <i aria-hidden="true" class="fa fa-comment"></i> 65
                                        </div>
                                        <div class="connect-data connect-bg1 text-center">
                                            <i aria-hidden="true" class="fa fa-heart"></i> 680
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="blog-border p-2">
                                    <div class="blog-heading ">
                                        <img src="../assets/img/pages/blog2.png" alt="blog image2" class="sharedpost-image img-fluid">
                                    </div>
                                    <div class="blog-body p-2">
                                        <p>Lorem Ipsum is simply dummy, vidis litro abertis.</p>
                                    </div>
                                </div>
                                <div class="blog-heading">
                                    <span class="blog-desc"><u>
                                        <a href="#">https://examples. blogspot.in</a></u><br> Lorem Ipsum is simply dummy, vidis litro abertis.</span>
                                    <img src="../assets/img/pages/blog5.jpg" alt="blog image2" class="posted-image img-fluid">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="blog-border">
                                    <div class="blog-heading">
                                        <p>
                                            <span class="post-by p-2"><strong>Jennie</strong> shared a post.</span>
                                        </p>
                                        <img src="../assets/img/pages/blog3.jpeg" alt="blog image2" class="attached-image img-fluid">
                                    </div>
                                </div>
                                <div class="blog-border">
                                    <div class="blog-heading">
                                        <p>
                                            <img src="../assets/img/authors/avatar4.jpg" alt="author image" class="blog-image rounded-circle p-2 float-left">
                                            <span class="post-by pt-4">Post by <strong>John</strong></span>
                                        </p>
                                        <img src="../assets/img/pages/profile-coverbg.jpeg" alt="blog image2" class="sharedpost-image img-fluid">
                                    </div>
                                    <div class="blog-body p-2">
                                        <p>Lorem Ipsum is simply dummy, vidis litro abertis. simply dummy, vidis litro abertis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </b-tab>
                </b-tabs>
            </b-card>
        </div>
    </div>
</template>
<script>
import vScroll from "./plugins/scroll/vScroll.vue"
export default {
    name: "user_profile",
    components: {
        vScroll
    },
    mounted: function() {},
    destroyed: function() {}
}
</script>
<style src="../assets/css/user_profile.css" scoped></style>
