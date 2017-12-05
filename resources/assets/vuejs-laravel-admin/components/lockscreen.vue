<template>
    <div class="container-fluid img_backgrond">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 login-content mt-5">
                <div class="row">
                    <div class="col-lg-12 col-12 mt-4">
                        <h2 class="text-center">
              <img src="../assets/img/logo_black.png" alt="Logo">
            </h2>
                    </div>
                    <div class="col-lg-12 col-12 mt-4">
                        <h3 class="page-name text-center">
              <img src="../assets/img/pages/User-01.png" alt="user" class="rounded-circle img-thumbnail user-img">
            </h3>
                    </div>
                </div>
                <vue-form :state="formstate" @submit.prevent="onSubmit">
                    <div class="col-sm-12">
                        <validate tag="div">
                            <input v-model="model.password" name="password" type="password" required placeholder="Password" class="form-control" minlength="4" maxlength="10" />
                            <field-messages name="password" show="$invalid && $submitted" class="text-danger">
                                <div slot="required">Password is required</div>
                                <div slot="minlength">Password should be atleast 4 characters long</div>
                                <div slot="maxlength">Password should be atmost 10 characters long</div>
                            </field-messages>
                        </validate>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <input type="submit" value="Unlock" class="btn btn-primary btn-block" />
                        </div>
                    </div>
                </vue-form>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import VueForm from "vue-form";
import options from "../validations/validations.js";
Vue.use(VueForm, options);
export default {
    name: "lockscreen",
    data() {
        return {
            formstate: {},
            model: {
                password: ''
            }
        }
    },
    methods: {
        onSubmit() {
            if (this.formstate.$invalid) {
                return;
            } else {
                this.$router.push("/");
            }
        }
    },
    mounted: function() {

    },
    destroyed: function() {

    }
}
</script>
<style scoped>
.login-content {
    margin-top: 8%;
    margin-bottom: 7%;
    box-shadow: 0 0 30px #ccc;
    background-size: 100% 100%;

}

.user-img {
    margin-bottom: 10px;
}
.img_backgrond{
    background-image: url("../assets/img/pages/Login-03-01.png");
    background-size:cover;
    height:100vh;
    background-repeat:no-repeat;
    width: 100%;
    padding: 75px 15px;
}
label{
    font-size: 14px !important;
}
::-webkit-input-placeholder {
    font-size:14px;
}
</style>
