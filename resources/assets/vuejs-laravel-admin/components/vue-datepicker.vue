<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <b-card class="bg-primary-card" header="Default datepicker" header-tag="h4">
                    <datepicker placeholder="Select Date"></datepicker>
                    <code>
                        &lt;datepicker&gt;&lt;/datepicker&gt;
                    </code>
                </b-card>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-6">
                 <div class="row">
                     <div class="col-lg-12">
                         <b-card class="bg-success-card" header="Translations" header-tag="h4">
                             <h5>Spanish datepicker</h5>
                             <datepicker language="es"></datepicker>
                             <code>
                                 &lt;datepicker language="es"&gt;&lt;/datepicker&gt;
                             </code>
                             <h5>French datepicker</h5>
                             <datepicker language="fr"></datepicker>
                             <code>
                                 &lt;datepicker language="fr"&gt;&lt;/datepicker&gt;
                             </code>
                         </b-card>
                     </div>
                     <div class="col-lg-12">
                         <b-card class="example bg-danger-card" header="Inline datepicker" header-tag="h4">
                             <datepicker :inline="true"></datepicker>
                             <code>
                                 &lt;datepicker :inline="true"&gt;&lt;/datepicker&gt;
                             </code>
                         </b-card>
                     </div>
                 </div>
             </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <b-card class="bg-info-card" header="With minimum and maximum date range" header-tag="h4">
                            <datepicker :disabled="disabled"></datepicker>
                            <code>
                                &lt;datepicker :disabled="disabled"&gt;&lt;/datepicker&gt;
                            </code>
                            <div class="settings ">
                                <h5 class="mt-2">Settings</h5>
                                <div class="form-group">
                                    <label class="label_font">Range from:</label>
                                    <datepicker @selected="disableTo"></datepicker>
                                </div>
                                <div class="form-group">
                                    <label class="label_font">Range to:</label>
                                    <datepicker @selected="disableFrom"></datepicker>
                                </div>
                            </div>
                        </b-card>
                    </div>
                    <div class="col-lg-12 mb-5">
                        <b-card class="bg-success-card" header="Format datepicker" header-tag="h4">
                            <datepicker :format="format"></datepicker>
                            <code>
                                &lt;datepicker :format="format"&gt;&lt;/datepicker&gt;
                            </code>
                            <div class="settings">
                                <h5>Settings</h5>
                                <div class="form-group">
                                    <label class="label_font">Format</label>
                                    <select v-model="format" class="date_time">
                                        <option value="d MMM yyyy" selected>d MMM yyyy - e.g 12 Feb 2016</option>
                                        <option value="d MMMM yyyy">d MMMM yyyy - e.g 12 February 2016</option>
                                        <option value="yyyy-MM-dd">yyyy-MM-dd - e.g 2016-02-12</option>
                                        <option value="dsu MMM yyyy">dsu MMM yyyy - e.g 12th Feb 2016</option>
                                        <option value="D dsu MMM yyyy">D dsu MMM yyyy - e.g Sat 12th Feb 2016</option>
                                    </select>
                                </div>
                            </div>
                        </b-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'

var state = {
    date1: new Date()
}

export default {
    components: {
        Datepicker
    },
    data() {
        return {
            format: 'd MMMM yyyy',
            disabled: {},
            eventMsg: null,
            state: state
        }
    },
    methods: {
        disableTo(val) {
            console.log(val)
            if (typeof this.disabled.to === 'undefined') {
                this.disabled = {
                    to: null,
                    from: this.disabled.from
                };
            }
            this.disabled.to = val;
        },
        disableFrom(val) {
            if (typeof this.disabled.from === 'undefined') {
                this.disabled = {
                    to: this.disabled.to,
                    from: null
                };
            }
            this.disabled.from = val;
        }
    }
}
</script>
<style scoped>
code,
pre {
    margin: 1em 0;
    padding: 1em;
    border: 1px solid #bbb;
    display: block;
    background: #f1f1f1;
    border-radius: 3px;
}

.settings {
    margin: 2em 0;
    /*padding: 0 1.5em 1.5em;*/
    background: #fff;
}

h5 {
    font-size: 100%;
    padding: 0;
}

.form-group {
    margin-bottom: 1em;
}

.form-group label {
    font-size: 80%;
    display: block;
}

select {
    height: 2.5em;
    padding: 0;
}
    .date_time{
        margin-left: -6px !important;
    }
</style>
<style>
.example .vdp-datepicker__calendar{
    margin: 0 auto;
}
.label_font{
    font-size: 12px !important;
}
</style>
