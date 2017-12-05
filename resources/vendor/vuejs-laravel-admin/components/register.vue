<template>
    <div class="container-fluid img_backgrond">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 login-content mt-5">
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <h2 class="text-center"><img src="../assets/img/logo_black.png" alt="Logo"></h2>
                    </div>
                </div>
                <vue-form :state="formstate" @submit.prevent="onSubmit">
                    <div class="row">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <validate tag="div">
                                    <label for="user_name"> User Name</label>
                                    <input v-model="model.username" id="user_name"name="username" type="text" required autofocus placeholder="User Name" class="form-control" />
                                    <field-messages name="username" show="$invalid && $submitted" class="text-danger">
                                        <div slot="required">Username is a required field</div>
                                    </field-messages>
                                </validate>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <validate tag="div">
                                    <label for="email"> E-mail</label>
                                    <input v-model="model.email" id="email"name="email" type="email" required placeholder="E-mail" class="form-control" />
                                    <field-messages name="email" show="$invalid && $submitted" class="text-danger">
                                        <div slot="required">Email is a required field</div>
                                        <div slot="email">Email is not valid</div>
                                    </field-messages>
                                </validate>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <validate tag="div">
                                    <label for="password"> Password</label>
                                    <input v-model="model.password" id="password" name="password" type="password" required placeholder="Password" class="form-control" minlength="4" maxlength="10" />
                                    <field-messages name="password" show="$invalid && $submitted" class="text-danger">
                                        <div slot="required">Password is required</div>
                                        <div slot="minlength">Password should be atleast 4 characters long</div>
                                        <div slot="maxlength">Password should be atmost 10 characters long</div>
                                    </field-messages>
                                </validate>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <validate tag="div">
                                    <label for="confirm_password"> Confirm Password</label>
                                    <input v-model="model.repeatPassword" name="repeatpassword" id="confirm_password" type="password" required placeholder="Confirm Password" class="form-control" :sameas="model.password">
                                    <field-messages name="repeatpassword" show="$invalid && $submitted" class="text-danger">
                                        <div slot="required">Password confirmatoin is required</div>
                                        <div slot="sameas">Password and Confirm password should match</div>
                                    </field-messages>
                                </validate>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <validate tag="label">
                                <label class="form-group custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox_label" name="terms" id="terms" v-model="model.terms" checkbox>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description text_gray">I agree the
                                <span>
                                <router-link to="/" class="text-info">terms &amp; conditions</router-link></span></span>
                                </label>
                                <field-messages name="terms" show="$invalid && $submitted" class="text-danger">
                                    <div slot="checkbox">Terms must be accepted</div>
                                </field-messages>
                            </validate>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group float-right">
                                <input type="submit" value="Sign Up" class="btn btn-success" />
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <router-link tag="a" to="/login" class="btn btn-primary btn-block">Already a member? Sign In
                                </router-link>
                            </div>
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
    name: "register",
    data() {
        return {
            formstate: {},
            model: {
                username: "",
                email: "",
                password: '',
                repeatPassword: '',
                terms: false
            }
        }
    },
    methods: {
        onSubmit: function() {
            if (this.formstate.$invalid) {
                return;
            } else {
                this.$router.push("/");
            }
        }
    }
}
</script>
<style scoped>
.login-content {
    margin-top: 6%;
    margin-bottom: 6%;
    padding-bottom: 20px;
    box-shadow: 0 0 30px #ccc;
    /*background-image: url("../assets/img/pages/profile-coverbg.jpeg");*/
    background-size: 100% 100%;
    border-radius: 7px;
    /*position: absolute;*/
    /*top:10%;*/
}
.img_backgrond{
    background-image: url("../assets/img/pages/Login-03-01.png");
    background-size: cover;
    padding: 75px 15px;
}
    .text_gray{
        color:#625e5e;
    }
label{
    font-size: 14px !important;
}
::-webkit-input-placeholder {
   font-size: 14px;
}
</style>
