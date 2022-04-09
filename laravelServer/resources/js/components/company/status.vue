<template>
    <div>
        <div  class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div style="padding: 10px">
                        <Card title="وضعیت متقاضی" icon="ios-options" :padding="0" shadow style="width: 300px;">
                            <Checkbox v-model="all" class="my-3 col-12" @on-change="filterAll"> همه </Checkbox>
                            <hr/>
                            <CheckboxGroup v-model="filterResume" @on-change="filter">
                                <Checkbox v-for="(status , index)  in statusList" :key="index"
                                          :label="status.id" class="my-3 col-12">
                                      {{status.title}}
                                      <span class="badge-glo" :class="setColor(status.id)">{{$store.getters.StatusCount(status.id)}}</span>
                                </Checkbox>
                            </CheckboxGroup>
                        </Card>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <resumeList :resumes='allResumes'></resumeList>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import pdf from './pdf/pdf'
import axios from 'axios'
import resumeList from './resumeList'
// const queryString = require('query-string');
export default {
    components: { 'resumeList': resumeList},

    data() {
        return {
            filterResume : [],
            all : false ,
        }
    },
    computed : {
        statusList() { return this.$store.state.resumeStatus.statusList},
        allResumes(){
           return this.$store.getters.resumeStatus(this.filterResume)
        }
    },
    created() {
        this.$store.dispatch('LoadStatus');
        this.$store.dispatch('LoadResumeStatus' , {'id' : this.$route.params.id})
    } ,
    mounted() {
         this.checkbox(this.$route.query.status);
    },
    methods : {
      setColor(id) {
          return `background-${id}`
      },
        checkbox(id){
          let arr = []
          if(Array.isArray(id) ){
             arr = id.map(i => {return parseInt(i)})
          }
          else  {
              arr.push( parseInt(id))
          }
          this.filterResume = []
          this.filterResume = arr

        },
        filterAll() {
            if(this.all)  {
                this.filterResume = []
                const filters = this.statusList.map(filter =>  { return filter.id })
                this.filterResume = filters
                this.$router.replace({ name: "postStatus", params: {id:this.$route.params.id}, query: {status: this.filterResume} })
            }
            else {
                 this.filterResume = []
                this.$router.replace({ name: "postStatus", params: {id: this.$route.params.id}, query: {status: this.filterResume} })
                }

        } ,
        filter () {
          this.$router.replace({ name: "postStatus", params: {id: this.$route.params.id}, query: {status: this.filterResume} })
        },
    }
}
</script>
<style >
.badge-glo {
  float: left;
  margin-left: 15px;
  background: yellow;
  padding: 5px;
}
.fixed-modal {
    border-top: 1px solid rgba(0,0,0,.1);
    position: sticky !important;
    top: 0;
}
.box-user-resume{
    box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
    border-radius: 0.5rem;
    border: 0px;
    padding: 10px;
}
.btn-delet-form{
    position: absolute;
    width: 78px;
    left: 10px;
    color: red;
}
.label-badge {
  padding : 7px ;
  color: #fff;
  font-size: 13px;
  text-align: center;
}
.background-1 {
    background : #89caf5 !important;
}
.background-2 {
    background :#e3dd98 !important;
}
.background-3 {
    background : #8dd6aa !important;
}
.background-5 {
    background : #db9797 !important;
}
.background-4 {
    background : #8adbaa !important;
}
.background-6 {
    background : #87a7e6 !important;
}
.ivu-modal-fullscreen .ivu-modal-content {
    top  : 70px !important
}

</style>
