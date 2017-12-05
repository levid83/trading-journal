<template>
    <div class="cal">
        <full-calendar :events="fcEvents" locale="en" @dayClick="day_click" @eventClick="eventclick">
            <template slot="fc-body-card">
                <div v-show="showinput" :style="pos" class="evt-handler">
                    <b-card header=" " class="bg-info-card" show-footer>
                        <span slot="header"><span @click="closeinput"><i class="fa fa-times float-right"></i></span>
                        <p>Add Event</p>
                        </span>
                        <p>Add Event on {{display_date}}</p>
                        <div class="input-group mt-4">
                            <input type="text" name="" @keyup.enter="addevent" @keyup.esc="closeinput" v-model="evtname" ref="evtinput" placeholder="Event Name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mt-4">
                                    <flat-pickr v-model="from_date" :config="{enableTime: true}" class="time_pic" placeholder="From"></flat-pickr>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mt-4">
                                    <flat-pickr v-model="to_date" :config="{enableTime: true}" class="time_pic" placeholder="To"></flat-pickr>
                                </div>
                            </div>
                        </div>
                        <span slot="footer" class="float-right">
                            <button @click="addevent" class="btn btn-primary btn-xs">Add Event</button>
                        </span>
                    </b-card>
                </div>
                <div v-show="showedit" :style="pos" class="evt-editor">
                    <b-card header=" " class="bg-info-card" show-footer>
                        <span slot="header"><span @click="closeedit"><i class="fa fa-times float-right"></i></span>
                        <p>Edit Event</p>
                        </span>
                        <div class="input-group">
                            <input type="text" name="" @keyup.enter="editevent" @keyup.esc="closeedit" v-model="edit_evt.title" ref="evtedit" placeholder="Event Name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mt-4">
                                    <flat-pickr v-model="edit_evt.start" :config="{enableTime: true}" class="time_pic" placeholder="From"></flat-pickr>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mt-4">
                                    <flat-pickr v-model="edit_evt.end" :config="{enableTime: true}" class="time_pic" placeholder="To"></flat-pickr>
                                </div>
                            </div>
                        </div>
                        <span slot="footer" class="float-right">
                            <button @click="editevent" class="btn btn-primary btn-xs">Done</button>
                            <button @click="deleteevent" class="btn btn-danger btn-xs">Delete</button>
                        </span>
                    </b-card>
                </div>
            </template>
        </full-calendar>
    </div>
</template>
<script>
    import Vue from 'vue'
    import fullCalendar from 'vue-fullcalendar'
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';



    export default {
        name: "calendar",
        components: {
            fullCalendar,
            flatPickr
        },
        data() {
            return {
                from_date:"",
                to_date:"",
                clicked_date: "",
                showinput: false,
                showedit: false,
                mouse_evt: {},
                evtname: "",
                edit_evt: "",
                delete_evt: "",
                pos: {
                    top: "50%",
                    left: "50%",
                    transform: "translate(-50%,-50%)"
                }
            };
        },
        methods: {
            day_click(date, evt) {
                this.closeedit();
                this.showinput = true;
                setTimeout(() => {
                    this.$refs.evtinput.focus();
                }, 20);
                this.clicked_date = date;
                this.from_date = date;
                this.to_date = date;
                this.mouse_evt = evt;
            },
            addevent() {
                if (this.evtname !== "") {
                    this.$store.commit('addevent', {
                        evtname: this.evtname,
                        date: {
                            from:this.from_date,
                            to:this.to_date
                        }
                    });
                    this.evtname = "";
                    this.showinput = false;
                } else {
                    alert("Event name should not be empty");
                }
            },
            editevent() {
                if (this.edit_evt.title !== "") {
                    this.$store.commit('editevent', this.edit_evt);
                    this.edit_evt = "";
                    this.showedit = false;
                } else {
                    alert("Event name should not be empty");
                }
            },
            eventclick(evt, mevt, pos) {
                this.closeinput();
                this.showedit = true;
                setTimeout(() => {
                    this.$refs.evtedit.focus();
                }, 20);
                this.edit_evt = JSON.parse(JSON.stringify(evt));
                this.delete_evt = evt;
                this.mouse_evt = mevt;
            },
            deleteevent() {
                var evt = this.delete_evt;
                if (confirm("Sure to delete event " + evt.title)) {
                    this.$store.commit('removeevent', {
                        evtid: evt.id
                    });
                }
                this.closeedit();
            },
            closeinput() {
                this.showinput = false;
                this.evtname = "";
            },
            closeedit() {
                this.showedit = false;
                this.edit_evt = "";
            }
        },
        computed: {
            fcEvents() {
                return this.$store.state.cal_events
            },
            display_date() {
                var now = new Date(this.clicked_date);
                return now.getDate() + "-" + eval(now.getMonth() + 1) + "-" + now.getFullYear()
            }
        }
    }
</script>
<style scoped>
    .evt-handler,
    .evt-editor {
        position: fixed;
        z-index: 1500;
        transform: translate(-50%, -50%);
        min-width: 210px;
    }
    div.cal {
        padding-bottom: 70px;
    }
    .time_pic{
        background-color: #fff;
    }

    @media (min-width: 992px) and (max-width: 2560px) {
        .evt-handler,
        .evt-editor {
            position: fixed;
            z-index: 1500;
            transform: translate(-50%, -50%);
            min-width: 500px;
        }
    }
</style>