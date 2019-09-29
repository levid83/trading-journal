<template>
    <div>
        <div class="modal fade"
             :id="target+position"
             tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Comments</h4>
                    </div>
                    <div class="modal-body" >
                        <div class="flex-center position-ref full-height">
                            <div class="content">
                                <div class="title m-b-md">
                                    <template v-for="comment in comments" inline-template>
                                        {{comment.body}}
                                        <hr>
                                    </template>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea name="comment" id="comment" class="form-control" placeholder="Add a new comment" v-model="comment"></textarea>
                                            </div>
                                            <div class="form-group"><button @click.prevent="addComment">Save</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                v-show="position"
                :data-target="'#'+target+position"
                @click="showModal"
        ><slot></slot></button>
    </div>
</template>

<script>
  export default {
    name    : 'trade-comment',
    data (){
      return {
        comments: '',
        comment: ''
      }
    },
    props: ['target','position'],
    created () {
    },
    watch   : {

    },
    computed: {

    },
    methods: {
        showModal(){
          axios.get(`/admin/comments/position/${this.position}`)
               .then((result)=>{
                 this.comments = result.data.comments
               })
               .catch((error)=>console.log(error))
        },
        addComment(){
          axios.post(`/admin/comments`,
                    {
                      position_id : this.position,
                      comment : this.comment
                    }
               ).then((result)=>{
                    this.comment=''
                    this.comments = result.data.comments
               })
               .catch((error)=>console.log(error))
        }

    },
  }
</script>