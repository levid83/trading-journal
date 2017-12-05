<template>
    <div class="row">
        <div class="col-lg-12">
            <b-card header="Edit user" header-tag="h4" class="bg-success-card">
                <div class="row">
                    <div class="col-lg-7 col-12 mb-3">
                        <vue-form class="form-horizontal form-validation" :state="formstate" @submit.prevent="onSubmit">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="email"> User Name</label>
                                        <input v-model="model.username" name="username" type="text" required autofocus placeholder="User Name" class="form-control" />
                                        <field-messages name="username" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Username is a required field</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="email"> E-mail</label>
                                        <input v-model="model.email" name="email" type="email" required placeholder="E-mail" class="form-control" />
                                        <field-messages name="email" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Email is a required field</div>
                                            <div slot="email">Email is not valid</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="mobile"> Mobile</label>
                                        <input v-model="model.mobile" name="mobile" type="mobile" required placeholder="Mobile Number(10 Digits)" class="form-control" pattern="[0-9]{10}" />
                                        <field-messages name="mobile" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Mobile number is a required field</div>
                                            <div slot="pattern">Mobile number is not valid</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="name">Date Of Birth</label>
                                        <input name="dob" type="date" required placeholder="Date of Birth" class="form-control" v-model="model.dob" />
                                        <field-messages name="dob" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Date of Birth is a required field</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="name">Gender</label>
                                        <select id="gender" name="gender" size="1" class="form-control" v-model="model.gender" required checkbox>
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
                                        <label for="email"> Password</label>
                                        <input v-model="model.password" name="password" type="password" required placeholder="Password" class="form-control" minlength="4" maxlength="10" />
                                        <field-messages name="password" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Password is required</div>
                                            <div slot="minlength">Password should be atleast 4 characters long</div>
                                            <div slot="maxlength">Password should be atmost 10 characters long</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="email"> Confirm Password</label>
                                        <input v-model="model.repeatPassword" name="repeatpassword" type="password" required placeholder="Confirm Password" class="form-control" :sameas="model.password">
                                        <field-messages name="repeatpassword" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Confirm password is required</div>
                                            <div slot="sameas">Password and Confirm password should match</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="address">Address</label>
                                        <textarea v-model="model.address" rows="4" class="form-control resize_vertical" name="address" id="address" placeholder="Enter your Address" required></textarea>
                                        <field-messages name="address" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Address is required</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="city">City</label>
                                        <input name="city" type="text" required placeholder="City" class="form-control" v-model="model.city" />
                                        <field-messages name="city" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">City is required</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="country">Country</label>
                                        <select id="country" name="country" required size="1" class="form-control" v-model="model.country" checkbox>
                                            <option value="0" selected disabled>
                                                Please select
                                            </option>
                                            <option value="1">Australia </option>
                                            <option value="2">Canada </option>
                                            <option value="3">India </option>
                                            <option value="4">Usa</option>
                                            <option value="5">Germany</option>
                                        </select>
                                        <field-messages name="country" show="$invalid && $submitted" class="text-danger">
                                            <div slot="checkbox">Country is required</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="pin">PinCode</label>
                                        <input name="pin" type="text" required placeholder="PIN" class="form-control" pattern="[0-9]{6}" v-model="model.pin" />
                                        <field-messages name="pin" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">PIN is required</div>
                                            <div slot="pattern">PIN is not valid</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <div class="checkbox">
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
                                </div>
                            </div>
                            <div class="col-md-offset-4 col-md-8 m-t-25">
                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                                <button type="reset" class="btn btn-effect-ripple btn-secondary  reset_btn1" @click="form_reset">
                                    Reset
                                </button>
                            </div>
                        </vue-form>
                    </div>
                    <div class="col-lg-5 col-12 mt-4">
                        <form class="form-horizontal form-validation" role="form" method="POST" action="" @submit.prevent="upload_pic">
                            <div class="dropzone_wrapper">
                                <vue-dropzone ref="user_image" id="dropzone" :options="dropzoneOptions" @vdropzone-success="uploaded"  @vdropzone-file-added="clearqueue"></vue-dropzone>
                            </div>
                        </form>
                    </div>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'
import VueForm from "vue-form";
import options from "../validations/validations.js";
Vue.use(VueForm, options);
export default {
    name: "add_user",
    data() {
        return {
            formstate: {},
            dropzoneOptions:{
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                autoProcessQueue:false,
                // maxFilesize: 0.5,
                maxFiles:1,
                headers: { "My-Awesome-Header": "header value" }
            },
            model: {
                username: "",
                email: "",
                mobile: "",
                gender: 1,
                dob: "",
                password: "",
                repeatPassword: "",
                address: " ",
                city: "",
                country: 1,
                pin: "",
                terms: false
            },
            old_file: ""
        }
    },
    components: {
        vueDropzone: vue2Dropzone,
    },
    methods: {
        upload_pic() {
            this.$refs.user_image.processQueue();
        },
        uploaded() {
            console.log("uploaded");
        },
        onSubmit: function() {
            this.upload_pic();
            if (this.formstate.$invalid) {
                return;
            } else {
                this.$router.push("/");
            }
        },
        clearqueue(file) {
            if (this.$refs.user_image.dropzone.files.length > 1) {
                this.$refs.user_image.dropzone.removeFile(this.old_file);
            }
            this.old_file = file;
        },
        form_reset() {
            this.model = {
                username: "",
                email: "",
                mobile: "",
                gender: 0,
                dob: "",
                password: "",
                repeatPassword: "",
                address: "",
                city: "",
                country: 0,
                pin: "",
                terms: false
            };
            this.$refs.user_image.removeAllFiles();
        }
    },
    mounted: function() {

    },
    destroyed: function() {

    }
}
</script>
<style scoped>
.dropzone_wrapper {
    width: 100%;
    height: 300px;
}
</style>
