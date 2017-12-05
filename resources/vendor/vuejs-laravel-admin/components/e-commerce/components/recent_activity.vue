<template>
<div class="col-sm-6 col-lg-4">
    <b-card>
        <div class="row">
            <div class="col-md-6 mb-2">
                <img src="images/avatar1.jpg" class="rounded-circle img_height" alt="user image">
            </div>
            <div class="col-md-6">
                <div class=" icon_star">
                    <img src="../../../assets/img/pages/e2.jpg" class="img-fluid" alt="image missing">
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Order ID </th>
                            <td>: #12345</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>: Peter jammy</td>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td>: Micro oven</td>
                        </tr>
                        <tr>
                            <th> <b>Rating</b></th>
                            <td>
                                <div class="icon_star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue";
export default {
    // ===Component name
    name: "recent_activity",
    // ===Props passed to component
    props: {},
    // ===Components used by this component
    components: {

    },
    // ====component Data properties
    data() {
        return {

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
.icon_star {
    color: #f5a022;
    font-size: 16px;
}

.img_height {
    width: 45px;
}
</style>
