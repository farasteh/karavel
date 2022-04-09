<template>
  <div>
    <div class="row">
      <div class=" col-6 mb-2">
        <h2 style="font-weight: 600;font-size: 22px;">لیست گزارش تخلف کاربران</h2>
      </div>
      <div class="bottom-message"></div>
      <div class="col-12  table-responsive">
        <table class="table text-center">
          <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام کاربر</th>
            <th scope="col">تعداد گزارش تخلف</th>
            <th scope="col">مسدود کردن کاربر</th>
          </tr>
          </thead>
          <tbody style="background: #fff;">
          <tr v-for="(row,index) in reportUser" :key="index">
            <th scope="row">{{index + 1}}</th>
            <td>{{row.name}}</td>
            <td>{{row.count}}</td>
            <td>
              <input :id="'checkbox_' + row.id"  type="checkbox" v-if="row.blocked === true" checked class="switch" @click="CheckBlockUser(row.id)" >
              <input :id="'checkbox_' + row.id"  type="checkbox" v-else-if="row.blocked === false"  class="switch" @click="CheckBlockUser(row.id)" >
              <i :id="'check_true_'+row.id" style="position: absolute;margin-right: -42px;margin-top: 4px;color: #1e88e5; display: none" class="fas fa-circle-notch fa-spin"></i>
              <i :id="'check_false_'+row.id" style="position: absolute;margin-right: -17px;margin-top: 4px;color: #1e88e5; display: none" class="fas fa-circle-notch fa-spin"></i>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div>
    </div>
  </div>
</template>
<script>

export default {
  name : 'UserBlockList',
  data(){
    return {
      switch1: false,
      switch2: false,
      switch3: false,
      switch4: false
    };
  },
  created() {
    this.$store.dispatch('Admin/user/resumes/LoadResumeUsers')
  },
  computed:{
    reportUser(){return  this.$store.state.Admin.user.report.reportUser}
  },
  methods:{
    CheckBlockUser : function (id){
      var checkBox = document.getElementById("checkbox_" + id);
      var check = 'true';
      if(checkBox.checked  === false){
        check = 'false';
      }
      document.getElementById('check_' + check + '_' + id ).style.display = 'initial';
      this.$store.dispatch('Admin/user/report/updateUserBlock',{'id' : id , blocked : check})
        .then(success =>{
          this.$store.dispatch('globalFunctions/SuccessNotify' , success.data.data.message )
        })
        .catch(error =>{
          this.$store.dispatch('globalFunctions/ErrorNotify2' , error.data.data.message)
        })
        .finally(() =>{document.getElementById('check_'+ check + '_' + id ).style.display = 'none';})
    }
  }
}
</script>
