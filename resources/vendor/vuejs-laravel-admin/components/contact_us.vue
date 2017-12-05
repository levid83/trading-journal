<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <b-card header="Our Locations" header-tag="h4" class="bg-success-card">
                    <gmap-map :center="center" :zoom="12" class="gmap" ref="gmap">
                        <gmap-marker v-for="(m,index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"></gmap-marker>
                    </gmap-map>
                </b-card>
            </div>
            <div class="col-lg-5 contact-details">
                <b-card header="Contact us" class="bg-primary-card" header-tag="h4">
                    <div>
                        <i class="fa fa-map-marker float-left text-info" aria-hidden="true"></i>
                        <address>39 Berkshire Lane San Jose,
                            <br> California 95116</address>
                    </div>
                    <div>
                        <i class="fa fa-mobile  float-left text-info" aria-hidden="true"></i>
                        <p>+1-775-351-5054</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o float-left text-info" aria-hidden="true"></i>
                        <p>
                            <a href="javascript:void(0)">email.id@example.com</a>
                        </p>
                    </div>
                    <div class="social-details pt-2">
                        <h5>Connect with Us</h5>
                        <div>
                            Follow us for daily updates, Trending Designs and Featured UI.
                        </div>
                        <div class="text-left">
                            <a href="javascript:void(0)">
                                <i class="fa fa-google-plus text-danger" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fa fa-facebook text-primary" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fa fa-linkedin text-primary" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fa fa-twitter text-info" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fa fa-globe text-danger" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-7">
                <div class="message-fields p-t-30">
                    <b-card class="bg-success-card" header="Have a Question?" header-tag="h4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam aut autem culpa dolorem, eligendi
                            ex facere.</p>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your E-mail" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Your Message here" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </b-card>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var unsub;
    import * as VueGoogleMaps from 'vue2-google-maps';
    import Vue from 'vue';

    Vue.use(VueGoogleMaps, {
        load: {}
    });
    export default {
        name: "gmaps",
        data() {
            return {
                center: {
                    lat: 37.279988,
                    lng: -121.883233
                },
                markers: [{
                    position: {
                        lat: 37.279988,
                        lng: -121.883233
                    }
                }, {
                    position: {
                        lat: 37.236988,
                        lng: -121.863233
                    }
                }]
            }
        },
        mounted() {
            unsub = this.$store.subscribe((mutation, state) => {
                if (mutation.type == "left_menu") {
                    this.$refs.gmap.resize();
                }
            });
        },
        beforeRouteLeave(to, from, next) {
            unsub();
            next();
        },
    }
</script>
<style scoped>
    .gmap {
        width: 100%;
        height: 300px;
        margin: 5px auto;
    }

    .contact-details h4,
    .message-fields h4 {
        margin-bottom: 20px;
    }

    .contact-details i {
        font-size: 24px;
        width: 30px;
        color: #666;
    }

    .contact-details i.fa fa-envelope-o {
        font-size: 22px;
    }

    .contact-details address,
    .contact-details p {
        overflow: hidden;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .social-details a {
        padding: 10px;
        display: inline-block;
        margin: 10px 0;
        font-size: 1.7em;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    @media screen and (min-width: 768px) {
        .contact-details,
        .social-details {
            padding-top: 20px;
        }
        .message-fields {
            padding: 20px 0;
        }
    }

    @media screen and (max-width: 767px) {
        .p-t-30 {
            padding-top: 30px;
        }
        .contact-details,
        .message-fields {
            padding-left: 4%;
            padding-right: 4%;
        }
    }
</style>
