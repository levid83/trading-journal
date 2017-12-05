<template>
    <div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <b-card header="Predefined Messages" header-tag="h4" class="bg-primary-card">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <button type="button" class="alert btn-success mt-sm-1" @click="successMsg()">
                                <strong>Success!</strong> Your message has been sent successfully.
                            </button>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <button type="button" class="alert btn-info mt-sm-1 text-white" @click="infoMsg()">
                                <strong>Note!</strong> Please read the comments carefully.
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <button type="button" class="alert btn-warning  mt-sm-1 text-white" @click="warnMsg()">
                                <strong>Warning!</strong> There was a problem with your network connection.
                            </button>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <button type="button" class="text-white alert btn-danger mt-sm-1" @click="errorMsg()">
                                <strong>Error!</strong> A problem has been occurred while submitting your data.
                            </button>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 col-12">
                <b-card header="Dynamic Messages" header-tag="h4" class="bg-info-card">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-3 col-12">
                            <label for="title">Title:</label>
                            <div class="form-group">
                                <input type="text" id="title" class="form-control" v-model="title">
                            </div>
                            <label for="msg">Message:</label>
                            <div class="form-group">
                                <textarea class="form-control resize_vertical" id="msg" v-model="msg" rows="4"></textarea>
                            </div>
                            <div>
                                <div v-for="t in types">
                                    <label class="custom-control custom-radio">
                                        <input id="radioStacked1" name="type" type="radio" class="custom-control-input" :value="t" v-model="type">
                                        <span class="custom-control-indicator custom_checkbox_primary"></span>
                                        <span v-text="t"></span>
                                    </label>
                                </div>
                            </div>
                            <div CLASS="text-center">
                                <button type="button" class="btn btn-info mt-3 text-white" @click="dynamicMsg()">Submit</button>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import miniToastr from 'mini-toastr';
miniToastr.init();

export default {
    name: 'notification',
    data() {
        return {
            switchVal: true,
            types: [
                'error',
                'warn',
                'info',
                'success'
            ],
            title: 'Your title',
            msg: 'Your message',
            type: 'error'
        }
    },
    created() {
        miniToastr.setIcon('error', 'i', {
            'class': 'fa fa-times'
        });
        miniToastr.setIcon('warn', 'i', {
            'class': 'fa fa-exclamation-triangle'
        });
        miniToastr.setIcon('info', 'i', {
            'class': 'fa fa-info-circle'
        });
        miniToastr.setIcon('success', 'i', {
            'class': 'fa fa-arrow-circle-o-down'
        });
        this.successMsg();
    },
    methods: {
        successMsg() {
            miniToastr.success("Some success msg", "Success title")
        },
        infoMsg() {
            miniToastr.info("Some info msg", "Note title")
        },
        warnMsg() {
            miniToastr.warn("Some waqrning msg", "Warning")
        },
        errorMsg() {
            miniToastr.error("Some error msg", "Error")
        },
        dynamicMsg() {
            miniToastr[this.type](this.msg, this.title)
        }
    }
}
</script>
