<template>
    <div>
        <v-scroll height="300px" color="#ccc" bar-width="3px" ref="task_scroller">
            <ul class="task_block1">

                <li v-for='(item,index) in value' :key="index" class="task_block">

                    <div v-if="!item.edit">
                        <span class="marker" @click="item.mark = !item.mark">
                            <i class="fa fa-check" :class="{'fa fa-check':item.mark,'fa fa-times':!item.mark}"></i>
                        </span> {{ item.tname }}

                        <span class="float-right">
                            <i class="fa fa-pencil" @click="edit(item,index)"></i> | <i class="fa fa-trash text-danger" @click='remove(item,index)'></i>
                    </span>
                    </div>

                    <div v-if="item.edit">
                        <input type="text" v-model="item.tname" @keyup.enter='save(item,index)'><span class="float-right "><i class="fa fa-save" @click='save(item,index)'></i> | <i class="fa fa-times text-danger" @click='cancel(item,index)'></i></span>
                    </div>

                </li>
            </ul>
        </v-scroll>
        <div class="input-group text-field">
            <input type="text" class="ml-4 task_input form-control" @keyup.enter="addtask" v-model="newtask" placeholder="New Task">
            <span class="input-group-btn">
            <button class="btn btn-success send-btn" type="submit"  @click="addtask"><i class="fa fa-plus text-white" aria-hidden="true"></i></button>
        </span>
        </div>
    </div>
</template>
<script>
import vScroll from "../../plugins/scroll/vScroll.vue";
export default {
    props: ["value"],
    components: {
        vScroll
    },
    mounted() {
        this.value.forEach((item, index) => {
            this.$set(item, "edit", false);
        });
    },
    data() {
        return {
            newtask: "",
            task_editing : []
        }
    },
    methods: {
        remove(item, index) {
            this.value.splice(index, 1);
        },
        edit(item,index){
            item.edit=!item.edit;
            this.task_editing[index] = item.tname;
        },
        save(item, index) {
            this.value[index].tname = item.tname;
            item.edit = false;
        },
        cancel(item, index) {
            this.value[index].tname = this.task_editing[index];
            item.edit = false;
        },
        addtask() {
            if (this.newtask.trim() != "") {
                this.value.push({
                    tname: this.newtask,
                    edit: false,
                    mark: false
                });
                this.$emit('input', this.value);
                this.newtask = "";
                this.$refs.task_scroller.scrolltobottom();
            }
        }
    }
}
</script>
<style>
.task_block {
    border: 1px solid #e6e6e6;
    padding: 10px 15px;
    margin: 5px 0;
    box-shadow: 0 0 7px #e6e6e6;
}

.task_block:hover {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
}

.task_block1 {
    padding: 0;
}

.task_input {
    border-radius: 5px;
    padding: 5px;
    border-width: 1px;
    width: 90%;
}

.task_block {
    overflow: hidden;
    text-overflow: ellipsis;
}

@media screen and (max-width: 575px) {
    .task_block1 input {
        margin-left: -10px;
    }
}

.task_block i,
.marker,
.send-btn {
    cursor: pointer;
}
</style>
