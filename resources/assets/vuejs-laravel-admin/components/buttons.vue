<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <b-card header="Basic Buttons" header-tag="h4" class="bg-deafult-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary mt-3">Primary</button>
                        <button type="button" class="btn btn-secondary mt-3">Default</button>
                        <button type="button" class="btn btn-success mt-3">Success</button>
                        <button type="button" class="btn btn-info mt-3 text-white">Info</button>
                        <button type="button" class="btn btn-warning mt-3 text-white">Warning</button>
                        <button type="button" class="btn btn-danger mt-3 text-white">Danger</button>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Outline buttons" header-tag="h4" class="bg-default-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline-primary mt-3">Primary</button>
                        <button type="button" class="btn btn-outline-secondary mt-3">Default</button>
                        <button type="button" class="btn btn-outline-success mt-3">Success</button>
                        <button type="button" class="btn btn-outline-info mt-3">Info</button>
                        <button type="button" class="btn btn-outline-warning mt-3">Warning</button>
                        <button type="button" class="btn btn-outline-danger mt-3">Danger</button>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Rounded Buttons" header-tag="h4" class="bg-default-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-outline-primary btn_width btn_rounded mt-3 ">Primary
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn_width btn_rounded mt-3">Default
                        </button>
                        <button type="button" class="btn btn-outline-success btn_width btn_rounded mt-3">Success
                        </button>
                        <button type="button" class="btn btn-outline-info btn_width btn_rounded mt-3">
                            Info
                        </button>
                        <button type="button" class="btn btn-outline-warning btn_width btn_rounded mt-3">Warning
                        </button>
                        <button type="button" class="btn btn-outline-danger btn_width btn_rounded mt-3">
                            Danger
                        </button>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Curls" header-tag="h4" class="bg-default-card effects">
                    <button type="button" class="btn btn-default hvr-curl-top-left">Curl Top Left</button>
                    <button type="button" class="btn btn-default hvr-curl-top-right">Curl Top Right</button>
                    <button type="button" class="btn btn-default hvr-curl-bottom-right">Curl Bottom Right</button>
                    <button type="button" class="btn btn-default hvr-curl-bottom-left">Curl Bottom Left</button>
                </b-card>
            </div>
            <div class="col-lg-12">
                <b-card header="2D Transitions" header-tag="h4" class="bg-primary-card effects">
                    <button type="button" class="btn btn-default hvr-grow">Grow</button>
                    <button type="button" class="btn btn-default hvr-shrink">Shrink</button>
                    <button type="button" class="btn btn-default hvr-pulse">Pulse</button>
                    <button type="button" class="btn btn-default hvr-pulse-grow">Pulse Grow</button>
                    <button type="button" class="btn btn-default hvr-pulse-shrink">Pulse Shrink</button>
                    <button type="button" class="btn btn-default hvr-push">Push</button>
                    <button type="button" class="btn btn-default hvr-pop">Pop</button>
                    <button type="button" class="btn btn-default hvr-bounce-in">Bounce In</button>
                    <button type="button" class="btn btn-default hvr-bounce-out">Bounce Out</button>
                    <button type="button" class="btn btn-default hvr-rotate">Rotate</button>
                    <button type="button" class="btn btn-default hvr-grow-rotate">Grow Rotate</button>
                    <button type="button" class="btn btn-default hvr-float">Float</button>
                    <button type="button" class="btn btn-default hvr-sink">Sink</button>
                    <button type="button" class="btn btn-default hvr-bob">Bob</button>
                    <button type="button" class="btn btn-default hvr-hang">Hang</button>
                    <button type="button" class="btn btn-default hvr-skew">Skew</button>
                    <button type="button" class="btn btn-default hvr-skew-forward">Skew Forward</button>
                    <button type="button" class="btn btn-default hvr-skew-backward">Skew Backward</button>
                    <button type="button" class="btn btn-default hvr-wobble-horizontal">Wobble Horizontal</button>
                    <button type="button" class="btn btn-default hvr-wobble-vertical">Wobble Vertical</button>
                    <button type="button" class="btn btn-default hvr-wobble-to-bottom-right">Wobble To Bottom Right
                    </button>
                    <button type="button" class="btn btn-default hvr-wobble-to-top-right">Wobble To Top Right</button>
                    <button type="button" class="btn btn-default hvr-wobble-top">Wobble Top</button>
                    <button type="button" class="btn btn-default hvr-wobble-bottom">Wobble Bottom</button>
                    <button type="button" class="btn btn-default hvr-wobble-skew">Wobble Skew</button>
                    <button type="button" class="btn btn-default hvr-buzz">Buzz</button>
                    <button type="button" class="btn btn-default hvr-buzz-out">Buzz Out</button>
                    <button type="button" class="btn btn-default hvr-forward">Forward</button>
                    <button type="button" class="btn btn-default hvr-backward">Backward</button>
                </b-card>
            </div>
            <div class="col-lg-6 ">
                <b-card header="Border Transitions" header-tag="h4" class="bg-info-card effects">
                    <button type="button" class="btn btn-default hvr-border-fade">Border Fade</button>
                    <button type="button" class="btn btn-default hvr-round-corners">Round Corners</button>
                    <button type="button" class="btn btn-default hvr-underline-from-left">Underline From Left</button>
                    <button type="button" class="btn btn-default hvr-underline-from-center">Underline From Center
                    </button>
                    <button type="button" class="btn btn-default hvr-underline-from-right">Underline From Right</button>
                    <button type="button" class="btn btn-default hvr-reveal">Reveal</button>
                    <button type="button" class="btn btn-default hvr-underline-reveal">Underline Reveal</button>
                    <button type="button" class="btn btn-default hvr-overline-reveal">Overline Reveal</button>
                    <button type="button" class="btn btn-default hvr-overline-from-left">Overline From Left</button>
                    <button type="button" class="btn btn-default hvr-overline-from-center">Overline From Center</button>
                    <button type="button" class="btn btn-default hvr-overline-from-right">Overline From Right</button>
                </b-card>
            </div>
            <div class="col-lg-6 ">
                <b-card header="Background Transitions" header-tag="h4" class="bg-success-card effects">
                    <button type="button" class="btn btn-default hvr-sweep-to-right">Sweep To Right</button>
                    <button type="button" class="btn btn-default hvr-sweep-to-left">Sweep To Left</button>
                    <button type="button" class="btn btn-default hvr-sweep-to-bottom">Sweep To Bottom</button>
                    <button type="button" class="btn btn-default hvr-sweep-to-top">Sweep To Top</button>
                    <button type="button" class="btn btn-default hvr-bounce-to-right">Bounce To Right</button>
                    <button type="button" class="btn btn-default hvr-bounce-to-left">Bounce To Left</button>
                    <button type="button" class="btn btn-default hvr-bounce-to-bottom">Bounce To Bottom</button>
                    <button type="button" class="btn btn-default hvr-bounce-to-top">Bounce To Top</button>
                    <button type="button" class="btn btn-default hvr-radial-out">Radial Out</button>
                    <button type="button" class="btn btn-default hvr-rectangle-out">Rectangle Out</button>
                    <button type="button" class="btn btn-default hvr-shutter-out-horizontal">Shutter Out Horizontal
                    </button>
                    <button type="button" class="btn btn-default hvr-shutter-out-vertical">Shutter Out Vertical</button>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Speech Bubbles" header-tag="h4" class="bg-warning-card effects">
                    <button type="button" class="btn btn-default hvr-bubble-top mb-2">Bubble Top</button>
                    <button type="button" class="btn btn-default hvr-bubble-right mb-2">Bubble Right</button>
                    <button type="button" class="btn btn-default hvr-bubble-float-bottom mb-2">Bubble Float Bottom</button>
                    <button type="button" class="btn btn-default hvr-bubble-bottom mb-2">Bubble Bottom</button>
                    <button type="button" class="btn btn-default hvr-bubble-left mb-2">Bubble Left</button>
                    <button type="button" class="btn btn-default hvr-bubble-float-right mb-2">Bubble Float Right</button>
                    <button type="button" class="btn btn-default hvr-bubble-float-top mb-2">Bubble Float Top</button>
                    <button type="button" class="btn btn-default hvr-bubble-float-left mb-2">Bubble Float Left</button>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Shadow and Glow Transitions" header-tag="h4" class="bg-danger-card effects">
                    <button type="button" class="btn btn-default hvr-shadow">Shadow</button>
                    <button type="button" class="btn btn-default hvr-grow-shadow">Grow Shadow</button>
                    <button type="button" class="btn btn-default hvr-float-shadow">Float Shadow</button>
                    <button type="button" class="btn btn-default hvr-glow">Glow</button>
                    <button type="button" class="btn btn-default hvr-shadow-radial">Shadow Radial</button>
                    <button type="button" class="btn btn-default hvr-box-shadow-outset">Box Shadow Outset</button>
                    <button type="button" class="btn btn-default hvr-box-shadow-inset">Box Shadow Inset</button>
                </b-card>
            </div>
            <div class="col-lg-4">
                <b-card header="Buttons Sizes" header-tag="h4" class="bg-default-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary btn-sm mt-3">Small button</button>
                        <button type="button" class="btn btn-secondary btn-sm mt-3">Small button</button>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-4">
                <b-card header="Normal Buttons " header-tag="h4" class="bg-default-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary btn-md mt-3">Normal button</button>
                        <button type="button" class="btn btn-secondary btn-md mt-3">Normal button</button>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-4">
                <b-card header="Large Buttons" header-tag="h4" class="bg-default-card">
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary btn-lg mt-3">Large button</button>
                        <button type="button" class="btn btn-secondary btn-lg mt-3">Large button</button>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from "vue"

export default {
    name: "buttons",
    components: {},
    mounted() {

    },
    data() {
        return {}
    },
    methods: {},
}
</script>
<style src="hover.css/css/hover.css"></style>
<style scoped src="../assets/css/button.css" rel="stylesheet"></style>
