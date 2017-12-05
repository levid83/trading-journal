<template>
    <div class="row">
        <div class="col-lg-12">
            <b-card header="vue-form Validation" header-tag="h4" class="bg-default-card">
                <div class="row">
                    <div class="col-md-12">
                        <vue-form :state="formstate" @submit.prevent="onSubmit">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <validate tag="div">
                                            <label for="email"> User Name</label>
                                            <input v-model="model.username" name="username" type="text" required autofocus placeholder="User Name" class="form-control" id="email"/>
                                            <field-messages name="username" show="$invalid && $submitted" class="text-danger">
                                                <div slot="required">Username is a required field</div>
                                            </field-messages>
                                        </validate>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <validate tag="div">
                                            <label for="email_input"> E-mail</label>
                                            <input v-model="model.email" name="email" type="email" required placeholder="E-mail" class="form-control" id="email_input"/>
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
                                            <label for="email_password"> Password</label>
                                            <input v-model="model.password" name="password" type="password" required placeholder="Password" class="form-control" minlength="4"  maxlength="10" id="email_password"/>
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
                                            <label for="email_confirm"> Confirm Password</label>
                                            <input v-model="model.repeatPassword" name="repeatpassword" type="password" required placeholder="Confirm Password" class="form-control" :sameas="model.password" id="email_confirm">
                                            <field-messages name="repeatpassword" show="$invalid && $submitted" class="text-danger">
                                                <div slot="required">Password confirmatoin is required</div>
                                                <div slot="sameas">Password and Confirm password should match</div>
                                            </field-messages>
                                        </validate>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <validate tag="div">
                                            <label for="name_gen">Gender</label>
                                            <select id="name_gen" name="gender" size="1" class="form-control" v-model="model.gender" required checkbox>
                                                <option value="0" selected disabled>
                                                    Please select
                                                </option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            <field-messages name="gender" show="$invalid && $submitted" class="text-danger">
                                                <div slot="checkbox">Gender is required</div>
                                            </field-messages>
                                        </validate>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <validate tag="div">
                                            <label for="address">Address</label>
                                            <textarea v-model="model.address" rows="5" class="form-control resize_vertical" name="address" id="address" placeholder="Enter your Address" required></textarea>
                                            <field-messages name="address" show="$invalid && $submitted" class="text-danger">
                                                <div slot="required">Address is required</div>
                                            </field-messages>
                                        </validate>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <validate tag="label">
                                        <label class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checkbox_label" name="terms" id="terms" v-model="model.terms" checkbox>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">I agree the
                                <span>
                                <router-link to="/">terms &amp; conditions</router-link></span></span>
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
                            </div>
                        </vue-form>
                    </div>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'

import VueForm from "vue-form";
import options from "../validations/validations.js";
Vue.use(VueForm, options);
export default {
    name: "formfeatures",
    data() {
        return {
            username: "",
            mail: "",
            password: '',
            repeatPassword: '',
            confirm_field: '',
            address: "",
            terms: false,
            formstate: {},
            model: {
                username: "",
                email: "",
                password: '',
                repeatPassword: '',
                gender: 0,
                address: "",
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
    },
    mounted: function() {

    },
    destroyed: function() {

    }
}
</script>
