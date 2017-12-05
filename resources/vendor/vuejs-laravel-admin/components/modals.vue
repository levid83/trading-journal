<template>
<div>
    <b-card header="Modals" header-tag="h4" class="bg-primary-card">
        <div class="row">
            <div class="col-lg-12">
                <b-card class="bg-primary-card">
                    <b-btn v-b-modal.modal1 class="mt-3 mb-3"  variant="outline-secondary">Launch demo modal</b-btn>
                    <b-btn @click="open_modal" class="mt-3 mb-3 " variant="outline-secondary">Launch modal with ref</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal1" title="Modal" ref="modal1" class="bg-primary">
                        <h1>modal</h1>
                    </b-modal>
                    <b-modal id="modal21" title="Modal" ref="modal21">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-6 mt-3">
                <b-card class="bg-info-card">
                    <h4>Stop closing on backdrop click</h4>
                    <b-btn v-b-modal.modal2  variant="outline-secondary">Launch demo modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal :close-on-backdrop=false id="modal2" title="Modal" ref="modal2">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-6 mt-3">
                <b-card class="bg-info-card">
                    <!-- Programitacally stop close -->
                    <h4>Programmatically stop closing of modal</h4>
                    <b-btn v-b-modal.modal3  variant="outline-secondary">Launch demo modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal3" title="Modal" ref="modal3" @hidden="stop">
                        <h1>modal</h1>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" v-model="stop_close">
                                    <span class="custom-control-indicator custom_checkbox_info"></span>
                                    <span class="custom-control-description">Enable Modal closing</span>
                                </label>
                        </div>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-primary-card">
                    <b-btn v-b-modal.modal4  variant="outline-secondary">Launch small modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal4" title="Small Modal" size="sm">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-success-card">
                    <b-btn v-b-modal.modal5  variant="outline-secondary">Launch Normal modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal5" title="Normal Modal" size="md">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-danger-card">
                    <b-btn v-b-modal.modal6  variant="outline-secondary">Launch Large modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal6" title="Large Modal" size="lg">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-12 mt-3">
                <b-card class="bg-warning-card">
                    <b-btn v-b-modal.modal7  variant="outline-secondary">Launch modal Events</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal7" title="Modal" @shown="shown" @hidden="hidden" @ok="success" @cancel="cancel">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-primary-card">
                    <h4>Background Primary Modal </h4>
                    <b-btn v-b-modal.modal8  variant="outline-primary">Primary modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal8" title="Priamry Modal" size="md">
                        <h1> Primary modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-info-card">
                    <h4>Background Info Modal </h4>
                    <b-btn v-b-modal.modal9  variant="outline-info">Info modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal9" title="Info Modal">
                        <h1> Info modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-warning-card">
                    <h4>Background Warning Modal </h4>
                    <b-btn v-b-modal.modal10  variant="outline-warning">Warning modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal10" title="Warning Modal">
                        <h1> Warning modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-danger-card">
                    <h4>Background Danger Modal </h4>
                    <b-btn v-b-modal.modal11  variant="outline-danger">Danger Modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal11" title="Danger Modal">
                        <h1>Danger modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-success-card">
                    <h4>Background Success Modal </h4>
                    <b-btn v-b-modal.modal12  variant="outline-success">Success Modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal12" title="Success Modal">
                        <h1> Success modal</h1>
                    </b-modal>
                </b-card>
            </div>
            <div class="col-lg-4 mt-3">
                <b-card class="bg-deafult-card">
                    <h4>Background Deafult Modal </h4>
                    <b-btn v-b-modal.modal13  variant="outline-secondary">Deafult modal</b-btn>
                    <!-- Modal Component -->
                    <b-modal id="modal13" title="Deafult Modal">
                        <h1>modal</h1>
                    </b-modal>
                </b-card>
            </div>
        </div>
    </b-card>
</div>
</template>
<script>
import Vue from "vue"

export default {
    name: "modals",
    data() {
        return {
            stop_close: false
        }
    },
    methods: {
        open_modal() {
            console.log(this.$refs);
            this.$refs.modal21.show();
        },
        stop(e) {
            if (!this.stop_close) {
                return e.cancel();
            }
        },
        shown() {
            alert("Modal opened");
        },
        hidden() {
            alert("Modal Hidden");
        },
        success() {
            alert("OK Clicked");
        },

        cancel() {
            alert("Close Clicked");
        }

    }

}
</script>
<style>
#modal8 .modal-header,
#modal8 .modal-footer {
    background-color: #3a7db5;
}

#modal9 .modal-header,
#modal9 .modal-footer {
    background-color: #4FC1E9;
}

#modal10 .modal-header,
#modal10 .modal-footer {
    background-color: #f89a14;
}

#modal11 .modal-header,
#modal11 .modal-footer {
    background-color: #DC6460;
}

#modal13 .modal-header,
#modal13 .modal-footer {
    background-color: #dcdcdc;
}

#modal12 .modal-header,
#modal12 .modal-footer {
    background-color: #09BD8F;
}
</style>
