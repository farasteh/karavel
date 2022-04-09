<template>
  <div>
    <div class="row">
      <div class=" col-6 mb-2">
        <h2 style="font-weight: 600;font-size: 22px;">لیست رزومه های ارسال شده</h2>
      </div>
      <div class="bottom-message"></div>
      <div class="col-12 table-responsive">
        <table class="table text-center table-striped ">
          <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام کارجو</th>
            <th scope="col">  عنوان آگهی</th>
            <th scope="col">  عنوان آژانس</th>
            <th scope="col"> تاریخ ارسال رزومه</th>
            <th scope="col"> وضعیت رزومه</th>
            <th scope="col"></th>
          </tr>
          </thead>
          <tbody style="background: #fff;">
          <tr v-for="(resume , index) in resumes" :key="index">
            <th scope="row">{{index + 1}}</th>
            <td v-if="resume.resume">{{resume.resume.name}} {{resume.resume.last_name}}</td>
            <td v-if="resume.advertising">{{resume.advertising.title}}</td>
            <td v-if="resume.company">{{resume.company.title}}</td>
            <td>{{resume.created_at}}</td>
            <td v-if="resume.status">{{resume.status.title}}</td>
            <td>
              <Button type="primary" small
                      @click="sendSMS(resume.advertising.id ,resume.company.title , resume.resume.id)">ارسال مجدد پیام</Button>
              <br/>
              <span v-for="(log , index) in resume.logs" :key="index"><span v-if="index == 1">,</span>{{log.date}}</span>
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
  name : 'AdminResume',

  data(){
    return {
      switch1: false,
      switch2: false,
      switch3: false,
      switch4: false
    };
  },
  created() {
    if(this.resumes.length == 0 )
      this.$store.dispatch('Admin/user/resumes/LoadResumeUsers')
  },
  computed:{
    resumes(){return  this.$store.state.Admin.user.resumes.resumes}
  },
  methods:{
    sendSMS($id , $title , $base) {
      this.$confirm(` آیا از ارسال پیام به آژانس ${$title}اطمینان دارید؟ `).then(() => {
        this.$axios.post('api/v1/admin/company/remindSMS' ,
          {
            'base_resume'   : $base ,
            'advertising'   : $id
          })
          .then(() => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , `پیام با موفقیت به آژانس   ${$title}  ارسال شد . `)
          })
          .catch(({error, status}) => {
            console.log(error)

          })
      })
    }
  }
}
</script>

