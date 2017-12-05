<template>
    <div class="row">
        <div class="col-lg-12">
            <b-card header="Basic Client Table" header-tag="h4" class="bg-primary-card">
                <div class="table-responsive">
                    <datatable title="Registered Users" :rows="tableData" :columns="columndata"></datatable>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import datatable from "./plugins/DataTable/DataTable.vue";
export default {
    name: "users_list",
    components: {
        datatable
    },
    data() {
        return {
            tableData: [],
            columndata: [{
                label: 'ID',
                field: 'id',
                numeric: true,
                html: false,
            }, {
                label: 'Name',
                field: 'name',
                numeric: false,
                html: false,
            }, {
                label: 'Email',
                field: 'email',
                numeric: false,
                html: false,
            }, {
                label: 'Age',
                field: 'age',
                numeric: true,
                html: false,
            }, {
                label: 'Status',
                field: 'status',
                numeric: false,
                html: false,
            }, {
                label: 'Actions',
                field: 'action',
                numeric: false,
                html: true,
            }]
        }
    },
    mounted() {
        axios.get("http://www.filltext.com/?rows=20&id={index}&name={firstName}~{lastName}&email={email}&age={numberRange|20,60}&status=[%22Activated%22,%22Deactivated%22]").then(response => {
                this.tableData = response.data;
                this.tableData.forEach((item, index) => {
                    this.$set(item, "action", "<a class='btn btn-info text-white' href='#/edit_user?" + index + "'>Edit</a>");
                });
            })
            .catch(function(error) {});
    }
}
</script>
