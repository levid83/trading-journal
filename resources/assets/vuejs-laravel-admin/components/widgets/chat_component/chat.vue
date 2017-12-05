<template>
    <div :style="{'height':height+'px'}">
        <transition name="slide-fade" mode="in-out">
            <div v-show="view=='chat'" class="converstion_back">
                <div class="chat_header "><a href="" @click.prevent="view='user'"><i class="fa fa-arrow-left text-white pl-2"></i>
                 </a><span class="pl-4"><img :src="list[selected_user_index].image"
                                          class="img-fluid rounded-circle desc-img "></span>
                    <span class="pl-3 text-white">{{list[selected_user_index].user}}</span>
                    <i class="fa fa-bars text-white pr-4  mt-3 pull-right"></i>
                </div>
                <v-scroll :height="(height-79)+'px'" color="#ccc" bar-width="3px" ref="message_scroller">
                    <ul>
                        <li v-for='(item,index) in list[selected_user_index].messages' :key="index" :class="[{ sent: item.from=='me' },{ received: item.from!=='me' }]">
                            <div>
                                <p>{{ item.msg }}</p>
                            </div>
                        </li>
                    </ul>
                </v-scroll>
                <div class="input-group text-field">
                    <input type="text" @keyup.enter="send_message" v-model="newmessage" placeholder="New Message" class="chat_input form-control" ref="input">
                    <span class="input-group-btn">
            <button class="btn btn-success send-btn" type="submit"  @click="send_message"><i class="fa fa-paper-plane-o text-white" aria-hidden="true"></i></button>
        </span>
                </div>
            </div>
        </transition>
        <transition name="slide-fade" mode="in-out">
            <div v-show="view=='user'" class="chatalign">
                <v-scroll :height="height+'px'" color="#ccc" bar-width="3px">
                    <ul>
                        <li v-for="(user,index) in list" class="chat_block">
                            <a :href="user.user" @click.prevent="show_chat(user,index)">
                                <article class="media">
                                    <a class="float-left desc-img mt-3">
                                        <img :src="user.image" class="img-fluid rounded-circle">
                                    </a>
                                    <div class="media-body pl-3 mb-1 mt-3 chat_content">
                                        <a class="c-head text-success " href="javascript:void(0)">{{user.user}}</a>
                                        <p class="text-muted"><span>{{user.status}}</span></p>
                                    </div>
                                </article>
                            </a>
                        </li>
                    </ul>
                </v-scroll>
            </div>
        </transition>
    </div>
</template>
<script>
import vScroll from "../../plugins/scroll/vScroll.vue";
export default {
    props: {
        list: {
            default: []
        },
        height: {
            default: "auto"
        }
    },
    components: {
        vScroll
    },
    mounted() {

    },
    data() {
        return {
            view: "user",
            newmessage: "",
            selected_user_index: 0
        }
    },
    methods: {
        send_message() {
            if (this.newmessage.trim() != "") {
                this.list[this.selected_user_index].messages.push({
                    msg: this.newmessage,
                    from: "me"
                });
                this.newmessage = "";
                this.$refs.message_scroller.scrolltobottom();

            }
        },
        show_chat(user, index) {
            this.selected_user_index = index;
            this.view = "chat";
            setTimeout(() => {
                this.$refs.input.focus();
            }, 20)
        }
    }
}
</script>
<style scoped lang="scss">
/*==Transition code==*/

.slide-fade-enter-active {
    transition: all .3s ease;
    position: absolute;
}

.slide-fade-leave-active {
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter,
.slide-fade-leave-to {
    transform: translateX(-10px);
    opacity: 0;
    position: absolute;
}


/*==Transition code==*/

.desc-img {
    height: 40px;
    width: 40px;
}

.chat_block {
    border-bottom: 1px solid #f4f2f2;
}

.chatalign ul {
    padding: 0;
}

.converstion_back {
    background-image: url("../../../assets/img/pages/brick-wall.png");
    overflow: hidden;
    background-color: #0a001f;
}

.converstion_back ul {
    padding: 0;
}

.sent>div {
    text-align: right;
    p {
        background-color: #fff;
        border-radius: 3px;
        display: inline-block;
        padding: 5px 10px;
        position: relative;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
}

.received>div {
    text-align: left;
    >p {
        background-color: #dbf2fa;
        border-radius: 3px;
        display: inline-block;
        padding: 5px 10px;
        position: relative;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }
}

.converstion_back > .chat_header {
    background-color: #7388c6;
    padding: 4px;
    font-size: 20px;
    font-weight: 500;
}

.chat_input {
    padding: 5px;
    border: none;
    width: 100%;
}

.chat_content {
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
