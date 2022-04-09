<template>
  <div class="w-100">
    <div class="box-box-list-jobs-admin karavel-box col-12">
      <div  v-if="contact.status.title === 'Pending'" class="box-statuse-admin box-statuse-background-yellow"></div>
      <div  v-if="contact.status.title === 'yes'" class="box-statuse-admin box-statuse-background-green"></div>
      <div  v-if="contact.status.title === 'no'" class="box-statuse-admin box-statuse-background-error"></div>
      <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center flex-column">
          <div>{{contact.title}}</div>
          <div v-if="contact.status.title === 'yes'">  ({{contact.views}}بازدید) </div>
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
          <nuxt-link :to="`/admin/advertising/show/${contact.id}?place=${place}`" class="btn btn-link">نمایش و تایین وضعیت</nuxt-link>
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
        this.$store.dispatch('Advertising/specialAdvertising/DeleteSpecialAdvertising',{'id' : id})
        return true
      }
      this.$store.dispatch('Advertising/specialAdvertising/setSpecialAdvertising',{'id' : id})
    }
  }
}
</script>
<style>
.box-box-list-jobs-admin{
  padding: 15px;
  margin-top: 16px !important;
}
.box-statuse-admin{
  height: 100%;
  width: 5px;
  position: absolute;
  top: 0px;
  right: 0px;
  border-radius: 5px;
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
