<template>
  <div>
    <div class="box-list-jobs karavel-box desk-box cursor-poiner" style="padding : 20px 0 !important;">
      <div>
        <Icon @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="col-12 p-0 d-flex">
        <div class="box-img">
          <nuxt-link :to="`/jobs/${this.List.id}`">
            <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png"
                 style="cursor: pointer"  :alt="List.title">
            <img v-else :src="List.Company.logo" style="cursor: pointer"
                 :alt="List.title" @error="imageError">
          </nuxt-link>
        </div>
        <div class="center-box arrow">
          <div class="left-board">
            <h3 class="mb-1">
              <nuxt-link :to="`/jobs/${this.List.id}`"
                           class="color-link" style="color: #777; !important;">
                {{List.title}}
              </nuxt-link>
              <span style="font-size: 12px">
                   ({{List.created_at}})
               </span>
            </h3>
            <div class="">
              <i class="fas fa-building"></i>
              <span  v-if="List.Company" class="pr-1">
                  {{List.Company.name_fa }}
              </span>
            </div>

            <div class="">
              <i class="fas fa-tag"></i>
              <span v-if="List.job" class="pr-1">
                  {{List.job.title}} ، {{List.category.title}}
              </span>
            </div>

            <div class="">
              <i class="fas fa-map-marker-alt"></i>
              <span v-if="List.province" class="pr-1">
                  {{List.province.title}} ، {{List.city.title}}
              </span>
            </div>
            <div >
              <i class="far fa-file-alt"></i>
              <span  v-if="List.CooperationType" class="pr-1">
                    {{List.CooperationType.title}}
                </span>
              <span>
                  (
                  <nuxt-link  :to="`/jobs/${this.List.id}`"
                                class="color-link">
                      <i class="fas fa-donate"></i>
                      <span class="pr-1">مشاهده حقوق</span>
                  </nuxt-link>
                  )
              </span>
            </div>
          </div>
        </div>
        <div class="left-box-board">
          <div v-if="$store.getters['Member/favorite/favorit/memberSentLikedResume'](List.id , User.member.id)">
            <p>
              رزومه ارسال شده
              <span class="tick-icon-color">
                  <Icon type="md-checkmark" class="sent-title-icon"/>
              </span>
            </p>
          </div>
          <nuxt-link v-else :to="`/jobs/${this.List.id}`"
                       class="color-link">
            <p  class="send-resume-box">
              ارتباط با آژانس
              <span class="color-link">
                  <Icon type="ios-return-left" class="sent-title-icon color-link" />
              </span>
            </p>
          </nuxt-link>
        </div>
      </div>
    </div>
    <div class="box-list-jobs karavel-box cursor-poiner mobile-box">
      <div>
        <Icon @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="advertizing-half-box">
        <div class="advertizing-half-box-image">
          <nuxt-link :to="`/jobs/${this.List.id}`">
            <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png"
                 style="cursor: pointer"  :alt="List.title">
            <img v-else style="cursor: pointer"  :src="List.Company.logo"
                 :alt="List.title" @error="imageError" >
          </nuxt-link>
        </div>
        <div class="center-box">
          <div class="mr-2">
            <h3 class="my-3 px-0" style="word-spacing: -1px">
              <nuxt-link :to="`/jobs/${this.List.id}`"
                           class="color-link"  style="color: #777; !important;">
                {{List.title}}
              </nuxt-link>
            </h3>
            <div class="d-flex flex-column">
              <div class="mb-2 px-0">
                <i class="fas fa-building"></i>
                <span  v-if="List.Company" class="pr-1">
                      {{List.Company.name_fa }}
                  </span>
              </div>
              <div class="mb-2 px-0">
                <i class="fas fa-map-marker-alt"></i>
                <span v-if="List.province" class="pr-1">
                      {{List.province.title}} ، {{List.city.title}}
                  </span>
              </div>
              <div >
                <i class="far fa-file-alt"></i>
                <span  v-if="List.CooperationType" class="pr-1" >
                    {{List.CooperationType.title}}</span>
                <span>
                      (
                      <nuxt-link :to="`/jobs/${this.List.id}`" class="color-link">
                          <i class="fas fa-donate"></i>
                          <span style="padding-right: 5px;">مشاهده حقوق</span>
                      </nuxt-link>
                      )
                  </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-2 px-3 d-flex justify-content-between" style="line-height: 32px;">
        <div>
          {{List.created_at}}
        </div>
        <div v-if=" $store.getters['Member/favorite/favorit/memberSentLikedResume'](List.id , User.member.id)">
          <p>
            رزومه ارسال شده
            <span class="tick-icon-color"><Icon type="md-checkmark" class="sent-title-icon"/></span>
          </p>
        </div>
        <nuxt-link v-else :to="`/jobs/${this.List.id}`"
                     class="color-link">
          <p>
            ارتباط با آژانس
            <span><Icon type="ios-return-left" class="sent-title-icon color-link" /></span>
          </p>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name:"Box",
  props: ['List' , 'index' , 'User'],
  data() {
    return {
      ErrorImage : false ,
    }
  },
  computed : {
    pathName() {
      var namee = this.List.Company.name_en
      namee = namee.toLowerCase()
      namee = namee.replace(/\s/g, '-')
      return this.List.Company.id + '-' + namee
    },
  },
  methods : {
    imageError ()  {
      this.ErrorImage = true
    },
    disliked () {
      this.$confirm("آیا اطمینان دارید؟").then(() => {
        this.$store.dispatch('Member/favorite/favorit/deleteLikeAds' ,{
          'index' : this.index ,
          'ad_id' : this.List.id
        });
      }).then(() => {
        this.$store.dispatch('globalFunctions/SuccessNotify' , 'این آیتم با موفقیت حذف شد')
      })
    },

  } ,

}
</script>
<style>
.box-img {
  width: 80px;
  height: 80px;
}
.box-img img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.center-box{
  display: flex !important;
  align-items: center !important;
  padding-right: 10px;
}
.center-box h3{
  font-size: 18px;
}
.box-icon-jobs{
  position: absolute;
  left: 30px;
  top: 23px;
  font-size: 24px;
}
.padding-box-list{
  padding-right: 40px;
  padding-top: 5px;
}
@media screen and (max-width: 759px){
  .center-box h3{
    font-size: 15px !important;
  }
  .padding-box-list{
    padding-right: 0 !important;
  }
}
</style>
