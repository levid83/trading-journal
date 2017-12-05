<template>
    <div class="ui_font_family">
        <div class="row">
            <div class="col-lg-6">
                <b-card header="Breadcrumb" header-tag="h4" class="bg-info-card">
                    <b-breadcrumb :items="items1" class="breadcrumb1" />
                    <b-breadcrumb :items="items2" class="breadcrumb2" />
                    <b-breadcrumb :items="items3" class="breadcrumb3" />
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Pagination" header-tag="h4" class="bg-warning-card">
                    <b-pagination size="sm" :total-rows="100" v-model="currentPage" :per-page="10"> </b-pagination>

                    <b-pagination size="md" :total-rows="100" class="mt-4" variant="primary" secondary-variant="success" v-model="currentPage2" :per-page="10">
                    </b-pagination>

                    <b-pagination size="lg" :total-rows="100"   class="mt-4" v-model="currentpage3" :per-page="5">
                    </b-pagination>
                    <br>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <b-card header="Wenk Tool Tips" header-tag="h4" class="bg-success-card">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <h4>Tool tips different positions!</h4>
                            <p><span class="wenkborder mt-3" data-wenk="Top">Tool tip to the top!</span></p>
                            <p><span class="wenkborder" data-wenk="Right" data-wenk-pos="right">Tool tip right</span></p>
                            <p><span class="wenkborder" data-wenk="Left" data-wenk-pos="left">Tool tip  to the left!</span></p>
                            <p><span class="wenkborder" data-wenk=" Bottom" data-wenk-pos="bottom">Tool tip to the bottom!</span></p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <h4>Tool tips different widths!</h4>
                            <p><span class="wenk-length--small wenkborder mt-3" data-wenk="I'm small!">Small Tool Tip!</span></p>
                            <p><span class="wenk-length--medium wenkborder" data-wenk="I'm medium!">Medium Tool Tip!</span></p>
                            <p><span class="wenk-length--large wenkborder" data-wenk="I'm large!">Large Tool Tip!</span></p>
                            <p><span class="wenk-length--fit wenkborder" data-wenk="I fit!">I fit just right!</span></p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <h4>Tool tips  alignments!</h4>
                            <p><span class="wenk-align--left wenk-length--large wenkborder mt-3" data-wenk="I'm left!">Left Tool Tip!</span></p>
                            <p><span class=" wenk-align--right wenk-length--large wenkborder" data-wenk="I'm right!">Right Tool Tip!</span></p>
                            <p><span class="wenk-align--center wenk-length--large wenkborder" data-wenk="I'm center!">Center Tool Tip!</span></p>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <b-card header="Progressbars" header-tag="h4" class="bg-primary-card">
                    <b-progress v-model="progress1counter1" variant="primary" hide-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter2" variant="info" hide-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter3" variant="danger" hide-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter4" variant="warning" hide-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter5" variant="success" hide-value class="mb-4"></b-progress>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Progressbar With Labels" header-tag="h4" class="bg-info-card">
                    <b-progress v-model="progress1counter1" variant="primary" show-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter2" variant="info" show-value class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter3" variant="danger" show-progress class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter4" variant="warning" show-progress class="mb-4"></b-progress>
                    <b-progress v-model="progress1counter5" variant="success" show-progress class="mb-4"></b-progress>
                </b-card>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <b-card header="Animated Progressbars" header-tag="h4" class="bg-success-card">
                    <b-progress v-model="progress2counter1" variant="primary" hide-value animated class="mb-4"></b-progress>
                    <b-progress v-model="progress2counter2" variant="info" hide-progress class="mb-4" animated></b-progress>
                    <b-progress v-model="progress2counter3" variant="danger" hide-progress class="mb-4" animated> </b-progress>
                    <b-progress v-model="progress2counter4" variant="warning" hide-progress class="mb-4" animated></b-progress>
                    <b-progress v-model="progress2counter5" variant="success" hide-progress class="mb-4" animated></b-progress>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Striped  With Labels" header-tag="h4" class="bg-danger-card">
                    <b-progress v-model="progress2counter1" variant="primary" show-value class="mb-4" striped></b-progress>
                    <b-progress v-model="progress2counter2" variant="info" show-value class="mb-4" striped></b-progress>
                    <b-progress v-model="progress2counter3" variant="danger" show-progress class="mb-4" striped></b-progress>
                    <b-progress v-model="progress2counter4" variant="warning" show-progress class="mb-4" striped></b-progress>
                    <b-progress v-model="progress2counter5" variant="success" show-progress class="mb-4" striped></b-progress>
                </b-card>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-6">
                <b-card header="Alerts" header-tag="h4" class="bg-warning-card">
                    <b-alert variant="info" show>
                        Info Alert
                    </b-alert>
                    <b-alert variant="danger" show>
                        Danger Alert
                    </b-alert>
                    <b-alert variant="warning" show>
                        Warning Alert
                    </b-alert>
                    <b-alert variant="success" show>
                        Success Alert
                    </b-alert>
                </b-card>
            </div>
            <div class="col-lg-6">
                <b-card header="Dismissible Alerts" header-tag="h4" class="bg-primary-card">
                    <b-alert variant="danger" dismissible :show="showDismissibleAlert" @dismissed="showDismissibleAlert=false">
                        Dismissible Alert!
                    </b-alert>
                </b-card>
                <b-card header="Tool Tips" header-tag="h4" class="bg-info-card">
                    <div class="row text-center">
                        <div class="col-lg-3 mt-3 mb-3">
                            <b-btn  v-b-tooltip.hover.top title="hi" variant="outline-primary">Top</b-btn>
                            <b-tooltip content="bottom" placement="bottom"  class="d-block">
                            </b-tooltip>
                        </div>
                        <div class="col-lg-3 mt-3 mb-3">
                             <b-btn  v-b-tooltip.hover.bottom title="hi" variant="outline-info" id="bt1">bottom</b-btn>
                            <b-tooltip content="bottom" placement="bottom" target="bt1"  class="d-block">
                            </b-tooltip>
                        </div>
                        <div class="col-lg-3 mt-3 mb-3">
                            <b-btn  v-b-tooltip.hover.left title="hi" variant="outline-success" id="bt1">left</b-btn>
                            <b-tooltip content="bottom" placement="bottom" target="bt1"  class="d-block">
                            </b-tooltip>
                        </div>
                        <div class="col-lg-3 mt-3 mb-3">
                            <b-btn  v-b-tooltip.hover.right title="hi" variant="outline-danger">right</b-btn>
                            <b-tooltip    class="d-block">
                            </b-tooltip>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
        <b-card header="Popovers" header-tag="h4" class="bg-primary-card">
            <div class="row">
                <div class="col-lg-4">
                    <b-card header="Placement" header-tag="h4" class="mt-1 bg-warning-card">
                            <b-col md="10" class="py-4 text-center" v-for="(placement,index) in placements" :key="index">
                                <b-btn :id="'exPopover1-'+placement" :variant="color[index]" class="text-white">
                                    {{ placement }}
                                </b-btn>
                                <b-popover :target="'exPopover1-'+placement"
                                           :placement="placement"
                                           title="Popover!"
                                           triggers="hover focus"
                                           :content="`Placement ${placement}`">
                                </b-popover>
                            </b-col>
                    </b-card>
                </div>
                <div class="col-lg-8">
                    <b-card header="Content via properties or Slots" class="bg-success-card" header-tag="h4">
                        <b-row>
                            <b-col md="6" class="py-4 text-center">
                                <b-btn id="exPopover2" variant="danger" class="text-white">Using properties</b-btn>
                                <b-popover target="exPopover2"
                                           title="Prop Examples"
                                           triggers="hover focus"
                                           placement="top"
                                           content="Embedding content">
                                </b-popover>
                            </b-col>
                            <b-col md="6" class="py-4 text-center">
                                <b-btn id="exPopover3" variant="primary">Using slots</b-btn>
                                <b-popover target="exPopover3" placement="top" triggers="hover focus">
                                    <template slot="title">Content </template>
                                    Embedding <span class="text-danger">using slots</span>
                                     you
                                </b-popover>
                            </b-col>
                        </b-row>
                    </b-card>
                    <b-col md="10" class="py-4 text-center" in placements >
                    </b-col>
                    <b-card header="Delay" header-tag="h4" class="mt-5 mb-5">
                        <div class="row mt-5 mb-4">
                            <div class="col-md-4 my-1 text-center ">
                                <b-btn id="exPopoverxyz" variant="warning" class="text-white">
                                    1000ms
                                </b-btn>
                                <b-popover target="exPopoverxyz"
                                           triggers="hover"
                                           delay="1000"
                                           placement="top"
                                           :content="`Sorry, I'm a little sleepy.`" class="d-block">
                                </b-popover>
                            </div>
                            <div class="col-md-4 my-1 text-center">
                                <b-btn id="exPopover7"variant="success">1000ms on show</b-btn>
                                <b-popover delay="1000"
                                           target="exPopover7"
                                           hide="0"
                                           placement="top"
                                           content="This will disappear right away!"
                                           triggers="hover" class="d-block">
                                </b-popover>
                            </div>
                            <div class="col-md-4 my-1 text-center">
                                <b-btn id="exPopver8" variant="primary">1000ms on hide</b-btn>
                                <b-popover
                                          :show=false
                                          target="exPopver8"
                                          hide="1000"
                                          placement="top"
                                          content="This will disappear after a second's delay."
                                          triggers="hover" class="d-block">
                                </b-popover>
                            </div>
                        </div>
                    </b-card>
                </div>
            </div>
        </b-card>

    </div>
</template>
<script>
export default {
    data() {
            return {
                placements: [
                     'top', 'right', 'left','bottom',
                ],
                color:['primary','danger','success','warning'],
                currentPage: 2,
                currentPage2: 4,
                currentpage3:5,
                items1: [{
                    text: 'Home',
                    link: '#',
                }, {
                    text: 'Manage',
                    link: '#',
                }, {
                    text: 'picker',
                    active: true
                }],
                items2: [{
                    text: 'Dashboard',
                    link: '#',
                }, {
                    text: 'Tables',
                    link: '#',
                }, {
                    text: 'Data tables',
                    active: true
                }],
                items3: [{
                    text: 'Dashboard',
                    link: '#',
                }, {
                    text: 'Charts',
                    link: '#',
                }, {
                    text: 'Float Charts',
                    active: true
                }],
                progress1counter1: 10,
                progress1counter2: 30,
                progress1counter3: 45,
                progress1counter4: 50,
                progress1counter5: 80,
                progress2counter1: 20,
                progress2counter2: 40,
                progress2counter3: 60,
                progress2counter4: 75,
                progress2counter5: 90,
                showDismissibleAlert: true
            }

        },
        methods: {}

}
</script>
<style src="../assets/css/wenk.css"></style>
<style scoped>
.wenkborder {
    border: 1px solid #ccc;
    padding: 3px 12px;
    border-radius: 3px;
    display: inline-block;
    cursor: default;
}

</style>
