<template>
  <div>
    <article class="page">
      <div >
        <div style="margin-right: 58px;font-size: 25px;">
          <p>{{Advertizing.title}}</p>
        </div>
        <div class="box-advertizing karavel-box">
          <div class="row">
            <div class="col-md-2 d-flex align-items-center justify-content-center" v-if="Advertizing.Company">
              <img v-if="ErrorImage" class="box-log" :alt="Advertizing.Company.name_fa"
                   src="~/assets/images/company/no-company.png" >
              <img v-else :src="Advertizing.Company.logo" class="box-log"
                   :alt="Advertizing.Company.name_fa" @error="ErrorImage = true">
            </div>
            <div class="col-md-2 col-sm-6 my-1 d-flex align-items-center justify-content-center">
              <i class="fas fa-building"></i>
              <span  v-if="Advertizing.Company" class="pr-2">{{Advertizing.Company.name_fa }}</span>
            </div>
            <div class="col-md-2 col-sm-6  my-1 d-flex align-items-center justify-content-center">
              <i class="fas fa-map-marker-alt"></i>
              <span v-if="Advertizing.province" class="pr-2">{{Advertizing.province.title}} ، {{Advertizing.city.title}}</span>
            </div>
            <div class="col-md-2 col-sm-6  my-1 d-flex align-items-center justify-content-center">
              <i class="far fa-file-alt"></i>
              <span  v-if="Advertizing.CooperationType" class="pr-2">{{Advertizing.CooperationType.title}}</span>
            </div>
            <div class="col-md-4 col-sm-6  my-1 d-flex align-items-center justify-content-center">
              <i class="fas fa-donate"></i>
              <span v-if="Advertizing.money" class="pr-2">{{Advertizing.money.title}}</span>
            </div>
          </div>
          <div v-if="isActive">
            <div class="col-8 m-auto">
              <table class="table">
                <thead class="thead-dark">
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                  <th scope="row">جنسیت</th>
                  <td v-if="Advertizing.Gender">{{ Advertizing.Gender.title }}</td>
                </tr>
                <tr>
                  <th scope="row">وضعیت سربازی</th>
                  <td v-if="Advertizing.FildStudy">{{ Advertizing.FildStudy.title }}</td>
                </tr>
                <tr>
                  <th scope="row">دسته بندی شغلی</th>
                  <td>
                    <span v-if="Advertizing.job"> {{ Advertizing.job.title }} ,</span>
                    <span v-if="Advertizing.category"> {{ Advertizing.category.title }} , </span>
                    <span v-if="Advertizing.work_category"> {{ Advertizing.work_category.title }} </span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">مهارت</th>
                  <td><span v-for="ad in Advertizing.posibilities" :key="ad.id" class="">{{ad.title}} </span></td>
                </tr>
                <tr>
                  <th scope="row">امکانات</th>
                  <td><span v-for="ad in Advertizing.behavioralskills" :key="ad.id" class="">{{ad.title }}</span></td>
                </tr>
                </tbody>
              </table>
            </div>
            <div style="padding: 20px;"><span>در باره شرکت</span><p v-html="Advertizing.comment"></p></div>
          </div>
          <div class="text-center">
            <span class="btn btn-link my-2 p-0" @click="myFilter()">شرح شغل </span>
          </div>
        </div>
      </div>

      <ul class="timeline">
        <li v-for=" status in  lists" :key="status.id"
            class="timeline-milestone is-completed" >
          <div class="box-date">
            {{status.created_at}}
          </div>

          <div class="timeline-action karavel-box">

            <div v-if="statusList">
              <div  v-for="(s , index) in statusList" :key="index" v-if="status.status == s.id" >

                <h2 class="title mb-2" :class="setColor(status.id)">{{s.title}}</h2>
                <!--                                <div v-html="s.comment"></div>-->
              </div>
            </div>


            <div v-if="status.comment" class="mt-3">
              <h3 class="title " style="font-weight: bold"> پیامی از طرف کارفرما:</h3>
              <p class="mt-2 karfarma-comment">{{status.comment}}</p>
            </div>
          </div>
        </li>
      </ul>
    </article>
  </div>
</template>
<script>

export default {
  data() {
    return {
      isActive: false ,
      ErrorImage : false
    }
  },
  created ( ) {
    this.$store.dispatch('Member/Requests/advertizing/LoadMemberAdvertizingSingle' , {id  : this.$route.params.id})
    this.$store.dispatch('Company/resumeStatus/LoadStatus');
  } ,
  computed : {
    Advertizing() { return this.$store.state.Member.Requests.advertizing.memberAdvertizing},
    statusList() { return this.$store.state.Company.resumeStatus.statusList},
    reverse() { return this.statusList.slice().reverse()},
    lists(){ if(this.Advertizing) return this.Advertizing.status.slice().reverse()}
  },


  methods : {
    myFilter: function() {
      //this.isActive = !this.isActive;
      let routeUrl = this.$router.resolve( `/jobs/${this.Advertizing.id}`);
      window.open(routeUrl.href, '_blank');
    }        ,
    setColor(id) {

      return `background-${id}`

    },
  },
  filters: {

  }
}
</script>
<style scoped>
.karfarma-comment {
  background-color: #e9e9e9;
  border-color: #d0d0d0; display: block;
  padding: 10px;
  margin-bottom: 20px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
}
.box-advertizing{
  background: #fff;
  margin-left: 0;
  margin-right: 56px;
}
.ivu-collapse-simple {
  border: 0 !important;
}
.label-badge {
  padding : 3px 7px ;
  color: #fff;
  font-size: 13px;
  text-align: center;
}
.background-1 {
  background : #c7e9ff !important;
}
.background-2 {
  background : #f8f5d3 !important;
}
.background-3 {
  background : #e3faec !important;
}
.background-5 {
  background : #fbe7e7 !important;
}
.background-4 {
  background : #e3faec !important;
}
.background-6 {
  background : #f7f8fa !important;
}

.box-date{
  border: 1px solid var(--var-background-color);
  border-radius: 50%;
  position: absolute;
  right: -32px;
  width: 60px;
  height: 60px;
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  font-size: 11px;
  background: var(--var-background-color);
  color: #fff;
  text-align: center;
}
.timeline {
  list-style: none;
  margin: 25px 0 22px; padding: 0;
  position: relative;


}
.box-block-user{
  position: absolute;
  left: 25px;
  top: 10px;
}

.timeline-horizontal::after {
  border-top-width: 6px;
  border-left-width: 13px;
  border-color: transparent transparent transparent #00637d;
  top: 15px; right: 0; bottom: auto; left: auto;
}
.timeline-horizontal .timeline-milestone{
  border-top: 2px solid #00637d;
  display: inline;
  float: left;
  margin: 20px 0 0 0;
  padding: 40px 0 0 0;
}
.timeline-horizontal .timeline-milestone::before{
  top: -17px;
  left: auto;
}
.timeline-horizontal .timeline-milestone.is-completed::after {
  top: -17px;
  left: 0;
}

.timeline-milestone {
  border-right: 2px solid var(--var-background-color);
  margin: 0 20px 0 0px;
  padding: 0 35px 15px 0;
  position: relative;

}
.timeline-milestone::before {
  border: 7px solid var(--var-background-color);
  border-radius: 50%;
  content: "";
  display: block;
  position: absolute;
  right: -17px;
  width: 32px;
  height: 32px;

}
.timeline-milestone.is-completed::before {
  background-color: var(--var-background-color);
}

.timeline-milestone.is-current::before {
  background-color: #EEE;
}

.timeline-milestone.is-future::before {
  background-color: #9fc9f7 ;
  border: 0;
}

.timeline-action {
  background-color: #FFF;
  padding: 12px 20px;
  position: relative; top: -15px;
  border-radius: 5px;
}
.timeline-action ul {
  list-style: none !important;
}

.timeline-action.is-expandable .title {
  cursor: pointer;
  position: relative;
}
.timeline-action.is-expandable .title:focus{
  outline: 0;
  text-decoration: underline;
}
.timeline-action.is-expandable .title::after {
  border: 6px solid #666;
  border-color: transparent transparent transparent #666;
  content: "";
  display: block;
  position: absolute; top: 6px; right: 0;
}

.timeline-action.is-expandable .title:after {
  border-color: #666 transparent transparent transparent;
  top: 10px; right: 5px;
}

.timeline-action.is-expandable .content { display: block; }


.timeline-action .title, .content {
  word-wrap: break-word;
}


.timeline-action .title {

  font-size: 18px;
  margin: 0;
}


.timeline-action  .date {
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
}

.timeline-action  .content {
  font-size: 14px;
}


.fixed-modal {
  border-top: 1px solid rgba(0,0,0,.1);
  position: sticky !important;
  top: 0;
}
.label-badge {
  padding : 7px ;
  color: #fff;
  font-size: 13px;
  text-align: center;
}



.box-log{
  height: 70px;
  min-width: 70px;
  width: 70px;
  margin-bottom: 16px;
  margin-top: 16px;
  margin-left: 16px;
  margin-right: 16px;
  align-items: center;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  line-height: normal;
  position: relative;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
}
.tick-icon {
  z-index: 100;
  color: #fff;
  font-size: 17px;
  font-weight: bold;
  display: block;
  line-height: 32px;
  position: absolute;
  top: 0;
  right: -17px;
  text-align: center;
  width: 32px; height: 32px;
}


.file-list {
  line-height: 1.4;
  list-style: none;
  padding-left: 10px;
}

body {
  background-color: #EEE;
  font-family: Helvetica, Arial, Verdana, sans-serif;
}

.page {
  max-width: 1200px;
  margin: 40px 30px;
}

a {

  text-decoration: none;
}

.video-link:before {
  content: "\f03d";
  display: inline-block;
  font-family: "FontAwesome";
  margin-right: 5px;
}

a[href*=".pdf"]:before {
  content: "\f0f6";
  display: inline-block;
  font-family: "FontAwesome";
  margin-right: 8px;
}

@media screen and (max-width: 992px) {
  .page {
    max-width: 1200px;
    margin: 10px;
  }
}

</style>
