<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <b-card header="Select an effect" header-tag="h4" class="bg-primary-card">
                    <div id="demo" class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select name="effect" v-model="effect" class="form-control">
                                    <optgroup label="Bounce">
                                        <option value="bounce">bounce</option>
                                        <option value="bounceDown">bounceDown</option>
                                        <option value="bounceLeft">bounceLeft</option>
                                        <option value="bounceRight">bounceRight</option>
                                        <option value="bounceUp">bounceUp</option>
                                    </optgroup>
                                    <optgroup label="Fade">
                                        <option value="fade">fade</option>
                                        <option value="fadeDown">fadeDown</option>
                                        <option value="fadeDownBig">fadeDownBig</option>
                                        <option value="fadeLeft">fadeLeft</option>
                                        <option value="fadeLeftBig">fadeLeftBig</option>
                                        <option value="fadeRight">fadeRight</option>
                                        <option value="fadeRightBig">fadeRightBig</option>
                                        <option value="fadeUp">fadeUp</option>
                                        <option value="fadeUpBig">fadeUpBig</option>
                                    </optgroup>
                                    <optgroup label="Rotate">
                                        <option value="rotate">rotate</option>
                                        <option value="rotateDownLeft">rotateDownLeft</option>
                                        <option value="rotateDownRight">rotateDownRight</option>
                                        <option value="rotateUpLeft">rotateUpLeft</option>
                                        <option value="rotateUpRight">rotateUpRight</option>
                                    </optgroup>
                                    <optgroup label="Slide">
                                        <option value="slideDown">slideDown</option>
                                        <option value="slideLeft">slideLeft</option>
                                        <option value="slideRight">slideRight</option>
                                        <option value="slideUp">slideUp</option>
                                    </optgroup>
                                    <optgroup label="Zoom">
                                        <option value="zoom">zoom</option>
                                        <option value="zoomDown">zoomDown</option>
                                        <option value="zoomLeft">zoomLeft</option>
                                        <option value="zoomRight">zoomRight</option>
                                        <option value="zoomUp">zoomUp</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="code-sample">
                                <pre><code>&lt;transition-group name="{{ effect }}" tag=&quot;ul&quot; class=&quot;list-group&quot;&gt;
    &lt;li v-for=&quot;(item, i) in items&quot; class=&quot;list-group-item&quot; v-bind:key=&quot;i&quot;&gt;<span
                            v-pre>{{ item }}</span>&lt;/li&gt;
&lt;/transition-group&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="demo-component" class="col-lg-12 mt-5">
                            <h4>Add some input</h4>
                            <div class="text-toolbar">
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="input" />
                                    <span class="btn-group">
                                        <button type="button" class="btn btn-success" @click="addItem">Add</button>
                                        <button type="button" class="btn btn-danger text-white" @click="reset">Reset</button>
                                    </span>
                                </div>
                            </div>
                            <div class="list-box mt-5">
                                <transition-group :name="effect" tag="ul" class="list-group">
                                    <li v-for="(item, i) in items" class="list-group-item" :key="item">{{ item }}</li>
                                </transition-group>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
require('vue2-animate/dist/vue2-animate.min.css');
import Vue from 'vue';
export default {
    name: "ContactUs",
    mounted: function() {
        this.fill_word();
    },
    data() {
        return {
            lorem: 'Lorem ipsum dolor sit amet consectetur adipiscing elit Duis vestibulum tincidunt turpis Etiam eget eleifend elit In et vestibulum ipsum Donec eu convallis urna Pellentesque sit amet accumsan leo Aliquam elementum justo turpis mollis maximus libero faucibus non Vivamus et eros libero',
            words: [],
            items: ['Sakura', 'Sunflower', 'Rose'],
            input: 'Hello',
            effect: 'bounceDown'
        }
    },
    methods: {
        fill_word() {
            this.words = this.lorem.split(' ');
        },
        addItem: function() {
            if (!this.input) {
                return;
            }

            this.items.splice(0, 0, this.input);
            this.input = this.words.shift();

            if (!this.words.length) {
                this.words = this.lorem.split(' ');
            }
        },
        reset: function() {
            this.items = [];
        }
    },

    destroyed: function() {

    }
}
</script>
