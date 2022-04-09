<template>
    <div style="width: 100%;">
        <div class="box-box-list-jobs-admin col-12">
           <div  v-if="contact.status.title === 'Pending'" class="box-statuse-admin box-statuse-background-yellow"></div>
           <div  v-if="contact.status.title === 'yes'" class="box-statuse-admin box-statuse-background-green"></div>
           <div  v-if="contact.status.title === 'no'" class="box-statuse-admin box-statuse-background-error"></div>
               <div class="row">
                    <div class="col-3 d-flex justify-content-center align-items-center">
                        <span>{{contact.title}}</span>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <span>{{contact.created_at}}</span>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <span v-if="contact.Company">{{contact.Company.name_fa}}</span>
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center"  v-if="contact.status.title == 'yes'">
                        <input :id="'checkbox_' + contact.id"  type="checkbox" v-if="contact.special === true" checked class="switch" @click="specialAdvertising(contact.id)" >
                        <input :id="'checkbox_' + contact.id"  type="checkbox" v-else-if="contact.special  === false"  class="switch" @click="specialAdvertising(contact.id)" >
                        <i :id="'check_true_'+contact.id" style="position: absolute;margin-right: -42px;margin-top: 4px;color: #1e88e5; display: none" class="fas fa-circle-notch fa-spin"></i>
                        <i :id="'check_false_'+contact.id" style="position: absolute;margin-right: -17px;margin-top: 4px;color: #1e88e5; display: none" class="fas fa-circle-notch fa-spin"></i>
                    </div>
                    <div class="col-3 d-flex justify-content-center align-items-center">
                        <router-link :to="{name: 'AdvertisingAdminShow',params : {id:contact.id} , query : {place :place  }}" class="btn btn-link">نمایش و تایین وضعیت</router-link>
                    </div>
               </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['contact' , 'place'] ,
    methods: {
        specialAdvertising : function(id){
          var checkBox = document.getElementById("checkbox_" + id);

          if(checkBox.checked  === false){
            this.$store.dispatch('DeleteSpecialAdvertising',{'id' : id})
            return true
          }
          this.$store.dispatch('setSpecialAdvertising',{'id' : id})
        }
    }
}
</script>
<style>
.box-box-list-jobs-admin{
        box-shadow: 0 4px 8px 0 rgba(0,0,0,.12), 0 2px 4px 0 rgba(0,0,0,.08);
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        padding: 15px;
        margin-top: 16px !important;
}
.box-statuse-admin{
    height: 100%;
    width: 5px;
    position: absolute;
    top: 0px;
    right: 0px;
}
.box-statuse-background-error{
    background: red;
}
.box-statuse-background-yellow{
    background: yellow;
}
.box-statuse-background-green{
    background: green;
}
.ivu-modal-body{
    padding: 25px !important;
}
</style>
