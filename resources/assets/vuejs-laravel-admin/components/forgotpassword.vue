<template>
    <div class="container-fluid img_backgrond">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 login-content mt-5">
                <div class="row">
                    <div class="col-sm-12 mt-4">
                        <h2 class="text-center">
              <img src="../assets/img/logo_black.png" alt="Logo">
            </h2>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <h3 class="page-name text-center">Forgot Password</h3>
                    </div>
                </div>
                <vue-form :state="formstate" @submit.prevent="onSubmit">
                    <div class="col-lg-12">
                        <p class="user-message "> Please enter the email you are registered with. An email message will be sent to the email address with further instructions.</p>
                        <div class="form-group">
                            <validate tag="div">
                                <input v-model="model.email" name="email" type="email" required placeholder="E-mail" class="form-control" />
                                <field-messages name="email" show="$invalid && $submitted" class="text-danger">
                                    <div slot="required">Email is a required field</div>
                                    <div slot="email">Email is not valid</div>
                                </field-messages>
                            </validate>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <input type="submit" value="Send Confirmation Mail" class="btn btn-primary btn-block" />
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
    name: "forgetpassword",
    data() {
        return {
            formstate: {},
            model: {
                email: ""
            }
        }
    },
    methods: {
        onSubmit() {
            if (this.formstate.$invalid) {
                return;
            } else {
                this.$router.push("/reset_password");
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
    margin-top: 7%;
    margin-bottom: 7%;
    padding-bottom: 20px;
    box-shadow: 0 0 20px #ccc;
    /*background-image: url("../assets/img/pages/profile-coverbg.jpeg");*/
    background-size: 100% 100%;
    border-radius: 7px;
    /*position: absolute;*/
    /*top:10%;*/
}

.user-message {
    padding: 15px 0;
    font-size: 14px;
    color: #777;
}
.img_backgrond{
    background-image: url("../assets/img/pages/Login-03-01.png");
    background-size: cover;
    height: 100vh;
    width:100%;
}
label{
    font-size: 14px !important;
}
::-webkit-input-placeholder {
    font-size:14px;
}
</style>
