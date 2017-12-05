<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <b-card class="mb-2 bg-default-card" header="Form Elements" header-tag="h4">
                    <div>
                        <form method="" class="form-horizontal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Text:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="text" placeholder="Some value">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="input_Email">Email:</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" id="input_Email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="input_Password">Password:</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="input_Password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Disabled:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="text1" placeholder="Disabled input" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Readonly:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="text2" placeholder="Read only" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="col-md-3 control-label" for="example-select">Select:</label>
                                        <div class="col-md-9">
                                            <select id="example-select" name="example-select" class="form-control" size="1">
                                                <option value="0">
                                                    Please select
                                                </option>
                                                <option value="1">Bootstrap</option>
                                                <option value="2">CSS</option>
                                                <option value="3">JavaScript</option>
                                                <option value="4">HTML</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text_area">Text area:</label>
                                        <div class="col-md-9">
                                            <textarea rows="4" class="form-control resize_vertical" id="text_area" placeholder="Postal Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Maxlength:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" maxlength="5" id="text3" placeholder="Maxlength is five">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Color:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="color" class="form-control" name="color" id="color" value="#428bca">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Range:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="range" class="form-control" name="range" id="range" value="50">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Url:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="url" class="form-control" name="url" value="http://www.example.com/" id="url">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Search:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="search" class="form-control" id="search" placeholder="Search value">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-3" for="text">Number:
                                        </label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="number" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2" for="text">Date:
                                        </label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="date" class="form-control" id="date" value="yyyy-mm-dd" aria-selected="true">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2" for="text">Time:
                                        </label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="time" class="form-control" id="time" value="14:38:00">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2" for="text">Datetime:
                                        </label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="datetime-local" class="form-control" id="datetime" value="yyyy-mm-dd T14:38:00">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2" for="text">Week:
                                        </label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="week" class="form-control" id="week" value="2017-W28">
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="col-md-2 control-label" for="example-multiple-select2">Multiple:</label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <select id="example-multiple-select2" name="example-multiple-select" class="form-control" size="5" multiple>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                                <option value="4">Option #4</option>
                                                <option value="5">Option #5</option>
                                                <option value="6">Option #6</option>
                                                <option value="7">Option #7</option>
                                                <option value="8">Option #8</option>
                                                <option value="9">Option #9</option>
                                                <option value="10">Option #10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <div class="col-md-2">
                                            <label class="control-label" for="text_area">Dropdowns</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-btn form_elemntsdropdown">
                                                    <b-dropdown text="Action">
                                                        <b-dropdown-header>This is a heading</b-dropdown-header>
                                                        <b-dropdown-item>Action</b-dropdown-item>
                                                        <b-dropdown-item>Another action</b-dropdown-item>
                                                        <b-dropdown-divider></b-dropdown-divider>
                                                        <b-dropdown-item>Something else here...</b-dropdown-item>
                                                    </b-dropdown>
                                                </div>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="input-group mt-3 drp_align">
                                                <input type="text" class="form-control">
                                                <div class="input-group-btn form_elemntsdropdown">
                                                    <b-dropdown text="Action">
                                                        <b-dropdown-header>This is a heading</b-dropdown-header>
                                                        <b-dropdown-item>Action</b-dropdown-item>
                                                        <b-dropdown-item>Another action</b-dropdown-item>
                                                        <b-dropdown-divider></b-dropdown-divider>
                                                        <b-dropdown-item>Something else here...</b-dropdown-item>
                                                    </b-dropdown>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2">Radios:</label>
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="radio">
                                                <label class="custom-control custom-radio">
                                                    <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input">
                                                    <span class="custom-control-indicator custom_checkbox_info"></span>
                                                    <span class="custom-control-description">Normal</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="custom-control custom-radio">
                                                    <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" checked>
                                                    <span class="custom-control-indicator custom_checkbox_info"></span>
                                                    <span class="custom-control-description">Checked</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="custom-control custom-radio">
                                                    <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" disabled>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group p-10">
                                        <label class="control-label col-md-2">Checkbox:</label>
                                        <div class=" col-md-8 col-md-offset-2">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Normal</span>
                                            </label>
                                            <div class="checkbox">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Checked</span>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" disabled>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group p-10 form-actions">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="button" class="btn btn-primary">Submit
                                            </button>
                                            <button type="reset" class="btn btn-effect-ripple btn-secondary  reset_btn1">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "formelements",
    mounted: function() {

    },
    destroyed: function() {

    }
}
</script>
<style type="text/css" scoped>
#color {
    height: 35px;
}
</style>
