<template>
    <div>
        <b-card header="vscroll" header-tag="h4" class="bg-default-card">
            <div class="row">
                <div class="col-lg-12">
                    <p>Available props</p>
                    <pre>"Height","min-height","max-height","color","bar-width","alwaysvisible"</pre>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Bar Color (Any valid css color)</label>
                        <input type="color" v-model="bar_color" class="form-control valid_align" placeholder="Any valid css color">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Height</label>
                        <input type="text" v-model="height" class="form-control" placeholder="Height of container">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Bar Width</label>
                        <input type="text" v-model="bar_width" class="form-control" placeholder="width of bar">
                    </div>
                </div>
                <div class="col-lg-3 mt-5 mb-4">
                    <div>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" v-model="visible" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_primary"></span>
                            <span class="custom-control-description">Always visible</span>
                        </label>
                    </div>
                </div>
            </div>
            <v-scroll :height="height" :color="bar_color" max-height="100%" min-height="120px" :bar-width="bar_width" :alwaysvisible="visible" ref="scroll">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </v-scroll>
            <div class="text-center mt-4 mb-3">
                <button class="btn btn-primary" @click="scrolltotop">Scroll to top</button>
                <button class="btn btn-primary" @click="scrolltobottom">Scroll to bottom</button>
            </div>
        </b-card>
    </div>
</template>
<script>
import vScroll from "./plugins/scroll/vScroll.vue"
export default {
    name: "vscroll_demo",
    components: {
        vScroll
    },
    data() {
        return {
            bar_color: "#428bca",
            height: "300px",
            bar_width: "10px",
            visible: false
        }
    },
    methods: {
        scrolltotop() {
            this.$refs.scroll.scrolltotop();
        },
        scrolltobottom() {
            this.$refs.scroll.scrolltobottom();
        }
    }
}
</script>
<style scoped>
.valid_align {
    height: 35px
}

pre {
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>
