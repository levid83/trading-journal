<template>
    <div class="row">
        <div class="col-lg-12 mb-3">
            <b-card header="Basic Client Table" header-tag="h4" class="bg-danger-card">
                <v-client-table :data="tableData" :columns="columns" :options="options"></v-client-table>
            </b-card>
        </div>
        <div class="col-lg-12 mb-3">
            <b-card header="AJAX Client Table" header-tag="h4" class="bg-info-card">
                <v-client-table :data="tableData2" :columns="columns" :options="options"></v-client-table>
            </b-card>
        </div>
        <div class="col-lg-12 mb-3">
            <b-card header="Vue2-datatable" header-tag="h4" class="bg-success-card">
                <datatable title="" :rows="rowdata" :columns="columndata"></datatable>
            </b-card>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import {
    ClientTable,
    Event
} from 'vue-tables-2';
import datatable from "./plugins/DataTable/DataTable.vue";
Vue.use(ClientTable, {}, false);
export default {
    name: "advanced_tables",
    components: {
        datatable
    },
    data() {
        return {
            rowdata: [{
                "fname": "Gale",
                "lname": "Mcmyne",
                "age": 16,
                "state": "RI",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Tighe",
                "lname": "Walls",
                "age": 43,
                "state": "AL",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Anuj",
                "lname": "Wittcop",
                "age": 16,
                "state": "MO",
                "button": "<i class='fa fa-pencil text-info mr-3 text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Elisha",
                "lname": "Mahan",
                "age": 28,
                "state": "MA",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Sutman",
                "lname": "Kiab",
                "age": 18,
                "state": "ME",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Wazir",
                "lname": "Odonoghue",
                "age": 27,
                "state": "ND",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Renardo",
                "lname": "Schuessler",
                "age": 5,
                "state": "OK",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Colleen",
                "lname": "Schotuen",
                "age": 33,
                "state": "DE",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Natalia",
                "lname": "Sacks",
                "age": 24,
                "state": "FL",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Kamaniee",
                "lname": "Knaus",
                "age": 11,
                "state": "ID",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Deena",
                "lname": "Downing",
                "age": 39,
                "state": "NM",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Gueorgui",
                "lname": "Downing",
                "age": 22,
                "state": "LA",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Toya",
                "lname": "Wallace",
                "age": 19,
                "state": "MD",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Deborah",
                "lname": "Morrison",
                "age": 14,
                "state": "VT",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Nerissa",
                "lname": "Wade",
                "age": 7,
                "state": "DE",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Glenn",
                "lname": "Bommi",
                "age": 8,
                "state": "MO",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Kate",
                "lname": "Azcunaga",
                "age": 25,
                "state": "ME",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Jesse",
                "lname": "Ingham",
                "age": 50,
                "state": "OK",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Gateri",
                "lname": "Sergent",
                "age": 50,
                "state": "MA",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }, {
                "fname": "Marian",
                "lname": "Malmfeldt",
                "age": 50,
                "state": "DC",
                "button": "<i class='fa fa-pencil text-info mr-3'></i><i class='fa fa-trash text-danger'></i>"
            }],

            columndata: [ // Array of objects
                {
                    label: 'First Name', // Column name
                    field: 'fname', // Field name from row
                    numeric: false, // Affects sorting
                    width: "200px", //width of the column
                    html: false, // Escapes output if false.
                }, {
                    label: 'Last Name',
                    field: 'lname',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Age',
                    field: 'age',
                    numeric: true,
                    html: false,
                }, {
                    label: 'State',
                    field: 'state',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Action',
                    field: 'button',
                    numeric: false,
                    html: true,
                }
            ],
            columns: ['id', 'name', 'age'],
            tableData: [{
                id: 1,
                name: "John",
                age: "20"
            }, {
                id: 2,
                name: "Jane",
                age: "24"
            }, {
                id: 3,
                name: "Susan",
                age: "16"
            }, {
                id: 4,
                name: "Chris",
                age: "55"
            }, {
                id: 5,
                name: "Dan",
                age: "40"
            }],
            tableData2: [],
            options: {
                sortIcon: {
                    base: 'fa',
                    up: 'fa fa-angle-up',
                    down: 'fa fa-angle-down'
                },
                // see the options API
                skin: "table-hover table-striped table-bordered",
                perPage: 7,
                // footerHeadings: true,
                highlightMatches: true,
                pagination: {
                    chunk: 5,
                    //set dropdown to true to get dropdown instead of pagenation
                    dropdown: false
                }
            }
        }
    },
    mounted() {
        axios.get("http://www.filltext.com/?rows=50&id={index}&name={firstName}~{lastName}&age={numberRange|20,60}").then(response => {
                this.tableData2 = response.data;
            })
            .catch(function(error) {

            });
    }
}
</script>
