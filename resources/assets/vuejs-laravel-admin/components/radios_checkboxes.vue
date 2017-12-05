<template>
    <div class="row check">
        <div class="col-lg-12">
            <b-card header="Toggle Buttons" header-tag="h4" class="bg-warning-card">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Colors</h5>
                        <toggle-button :value="false" :sync="true" :labels="true" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                        <h5 class="mt-3
">Lables</h5>
                        <toggle-button :value="true" :labels="{checked: 'Checked', unchecked: 'UnChecked'}" :width="100" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                        <h5 class="mt-3">Width</h5>
                        <toggle-button :value="true" :labels="true" :width="50" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                        <toggle-button :value="true" :labels="true" :width="60" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                        <toggle-button :value="true" :labels="true" :width="100" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                        <toggle-button :value="true" :labels="true" :width="120" :color="{checked: '#09BD8F', unchecked: '#dc6460'}" />
                    </div>
                    <div class="col-lg-6 ">
                        <h5 class="mb-3 mt-3">Basic</h5>
                        <toggle-button :value="false" :sync="true" :labels="true" :color="{checked: '#6f9dd6', unchecked: '#6f9dd6'}" class="mb-5 togglesiwtch" />
                        <h5 class="mb-3">Disabled</h5>
                        <div class="cur">
                            <toggle-button :value="false" :sync="true" :labels="true" :disabled="true" class="cur" />
                            <toggle-button :value="true" :sync="true" :labels="true" :disabled="true" class="cur" />
                        </div>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Checkboxes with animations" header-tag="h4" class="bg-info-card">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label>
                                <input class="checkbox-hey" type="checkbox"> Hey</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-away" type="checkbox"> Away</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-inout" type="checkbox"> Inout
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-rotate" type="checkbox"> Rotate
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-yo" type="checkbox"> Yo</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-roll" type="checkbox"> Roll</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label>
                                <input class="checkbox-up" type="checkbox"> Up</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-down" type="checkbox"> Down
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-tv" type="checkbox"> Tv</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-jump" type="checkbox"> Jump</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-omg" type="checkbox"> Omg</label>
                        </div>
                        <div>
                            <label>
                                <input class="checkbox-splash" type="checkbox"> Splash</label>
                        </div>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Radios with animations" header-tag="h4" class="bg-danger-card">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label tabindex="0">
                                <input class="radiobox-tremolo" type="radio" name="x" value="1"> Tremolo
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-boing" type="radio" name="x" value="2"> Boing
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-boom" type="radio" name="x" value="3"> Boom
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-flash" type="radio" name="x"> Flash
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-wheel" type="radio" name="x"> Wheel
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-return" type="radio" name="x"> Return
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label>
                                <input class="radiobox-scatman" type="radio" name="x"> Scatman
                            </label>
                        </div>
                        <div class=" ">
                            <label>
                                <input class="radiobox-vertigo" type="radio" name="x"> Vertigo
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-pump" type="radio" name="x"> Pump</label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-focus" type="radio" name="x"> Focus
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-hooray" type="radio" name="x"> Hooray
                            </label>
                        </div>
                        <div>
                            <label>
                                <input class="radiobox-ufo" type="radio" name="x"> Ufo
                            </label>
                        </div>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-lg-6">
            <b-card header="Check boxes" header-tag="h4" class="bg-success-card">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h5>Color checkboxes</h5>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_primary"></span>
                            <span class="custom-control-description">Primary</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_info"></span>
                            <span class="custom-control-description">Info</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_warning"></span>
                            <span class="custom-control-description">Warning</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_danger"></span>
                            <span class="custom-control-description">Danger</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_success"></span>
                            <span class="custom-control-description">Success</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_default"></span>
                            <span class="custom-control-description">Deafult</span>
                        </label>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 mt-3">
                        <h5>Inline checkboxes</h5>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Inline one</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Inline two</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Inline three</span>
                        </label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Intermediate checkboxes</h5>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <label class="custom-control custom-checkbox">
                            <input id="indeterminateCheckbox" class="custom-control-input" type="checkbox" @click="changeState()">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Intermediate </span>
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h5> Disabled  </h5>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" disabled>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Can't check</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" disabled>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">This too</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" disabled>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">And this</span>
                        </label>
                    </div>
                </div>
            </b-card>
        </div>
        <div class="col-lg-6 ">
            <b-card header="Radios" header-tag="h4" class="bg-info-card">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h5>Color Radios</h5>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                <span class="custom-control-description">Primary</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_info"></span>
                            <span class="custom-control-description">Info</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_warning"></span>
                            <span class="custom-control-description">Warning</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_danger"></span>
                            <span class="custom-control-description">Danger</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_success"></span>
                            <span class="custom-control-description">Success</span>
                        </label>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator custom_checkbox_default"></span>
                            <span class="custom-control-description">Deafult</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5>Inline radios</h5>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator custom_checkbox_primary"></span>
                                <span class="custom-control-description">Inline Radio one</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Inline Radio Two</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <h5> Disabled state</h5>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" disabled>
                            <span class="custom-control-indicator custom_checkbox_primary"></span>
                            <span class="custom-control-description"> Its Disbaled</span>
                        </label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label class="custom-control custom-radio">
                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" disabled>
                            <span class="custom-control-indicator custom_checkbox_primary"></span>
                            <span class="custom-control-description">Can't check</span>
                        </label>
                    </div>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
require("checkbox.css/dist/css/checkbox.min.css");
require("radiobox.css/dist/css/radiobox.min.css");
export default {
    name: "radios_checkboxes",
    methods: {
        changeState() {
            var el = document.getElementById("indeterminateCheckbox");
            if (el.readOnly) el.checked = el.readOnly = false;
            else if (!el.checked) el.readOnly = el.indeterminate = true;
        }
    }
}
</script>
<style scoped>
.custom-control-input:checked ~ .custom_checkbox_primary,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_priamry {
    background-color: #428bca !important;
}

.custom-control-input:checked ~ .custom_checkbox_info,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_info {
    background-color: #4fc1e9 !important;
}

.custom-control-input:checked ~ .custom_checkbox_warning,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_warning {
    background-color: #ffb65f !important;
}

.custom-control-input:checked ~ .custom_checkbox_danger,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_danger {
    background-color: #fb8678 !important;
}

.custom-control-input:checked ~ .custom_checkbox_success,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_success {
    background-color: #22d69d !important;
}

.custom-control-input:checked ~ .custom_checkbox_default,
.custom-checkbox .custom-control-input:checked ~ .custom_checkbox_default {
    background-color: #CCC !important;
}

input {
    cursor: pointer;
}

.cur {
    cursor: not-allowed;
}
</style>
