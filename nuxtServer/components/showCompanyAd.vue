<template>
  <div>
    <div class="box-list-jobs karavel-box desk-box" style="padding : 20px 0 !important;">
      <div class="special" v-if="List.special">
        <span class="spe-text">ویژه</span>
      </div>
      <div>
        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>

      <div class="col-12 p-0 d-flex">
        <div class="box-img">
          <nuxt-link :to="`/jobs/${List.id}`" style="z-index: 1;">
            <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png" style="cursor: pointer"  :alt="List.title">
            <img v-else :src="List.Company.logo" style="cursor: pointer"  :alt="List.title" @error="imageError">
          </nuxt-link>
        </div>

        <div class="center-box arrow">
          <div class="left-board">
            <div class="mb-1 d-flex">
              <nuxt-link :to="`/jobs/${List.id}`"  class="color-link" style="color: #777; !important;">
                <h3 class="mb-0">{{List.title}}</h3>
              </nuxt-link>
              <span style="font-size: 12px">
                 ({{List.created_at}})
             </span>
            </div>
            <div >
              <i class="fas fa-building"></i>
              <span  v-if="List.Company" class="pr-1">
                  {{List.Company.name_fa }}
              </span>
            </div>

            <div>
              <i class="fas fa-tag"></i>
              <span v-if="List.job" class="pr-1">
                  {{List.job.title}} ، {{List.category.title}}
              </span>
            </div>

            <div>
              <i class="fas fa-map-marker-alt"></i>
              <span v-if="List.province" class="pr-1">
                  {{List.province.title}} ، {{List.city.title}}
              </span>
            </div>
            <div>
              <i class="far fa-file-alt"></i>
              <span  v-if="List.CooperationType" class="pr-1">
                  {{List.CooperationType.title}}
              </span>
              <span>
                    (
                    <nuxt-link  :to="`/jobs/${List.id}`" class="color-link">
                        <i class="fas fa-donate"></i>
                        <span class="pr-1">مشاهده حقوق</span>
                    </nuxt-link>
                    )
                </span>
            </div>
          </div>
        </div>
        <div class="left-box-board" >
          <div v-if="memberRole == 'Member' &&
                            $store.getters['Site/company/SitememberSentResume'](List.id , User.member.id)">
            <p>
              رزومه ارسال شده
              <span class="tick-icon-color">
                  <Icon type="md-checkmark" class="sent-title-icon"/>
              </span>
            </p>
          </div>
          <nuxt-link v-else :to="`/jobs/${List.id}`"  class="color-link">
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
    <div class="box-list-jobs karavel-box mobile-box">
      <div>
        <Icon v-if="!like"  @click="liked" class="box-icon-jobs" type="ios-bookmark-outline" />
        <Icon v-if="like"  @click="disliked" class="box-icon-jobs" type="ios-bookmark" />
      </div>
      <div class="advertizing-half-box">
        <div class="advertizing-half-box-image">
          <nuxt-link :to="`/jobs/${List.id}`">
            <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png" style="cursor: pointer"  :alt="List.title">
            <img v-else style="cursor: pointer"  :src="List.Company.logo" :alt="List.title" @error="imageError" >
          </nuxt-link>
        </div>


        <div class="center-box">
          <div class="mr-2">
              <nuxt-link :to="`/jobs/${List.id}`" class="color-link my-3 px-0"  style="color: #777; !important;">
                <h3 class="" style="word-spacing: -1px">
                  {{List.title}}
                </h3>
              </nuxt-link>

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
                <span  v-if="List.CooperationType" class="pr-1" >{{List.CooperationType.title}}</span>
                <span>
                    (
                    <nuxt-link :to="`/jobs/${List.id}`" class="color-link">
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
        <div v-if="memberRole == 'Member' &&
                            $store.getters['Site/company/SitememberSentResume'](List.id , User.member.id)">
          <p>
            رزومه ارسال شده
            <span class="tick-icon-color"><Icon type="md-checkmark" class="sent-title-icon"/></span>
          </p>
        </div>
        <nuxt-link :to="`/jobs/${List.id}`" v-else class="color-link">
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
  props: ['List' , 'User'],
  data() {
    return {
      title : '',
      ErrorImage : false ,
    }
  },
  methods : {
    imageError ()  {
      this.ErrorImage = true
    },
    liked() {
      if(this.memberRole == 'Member')
      {
        this.$store.dispatch('Site/company/SiteLikeAdvertising' , {id : this.List.id , member : this.User.member.id})
      }
      else if(this.memberRole == 'Company')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , ' شما با پروفایل کارفرما وارد شده اید')
      }
      else if(this.memberRole == 'Admin')
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , ' شما با پروفایل ادمین وارد شده اید')
      }
      else
      {
        this.$store.dispatch('globalFunctions/ErrorNotify2' , 'لطفا ابتدا لاگین کنید')
      }
    } ,
    disliked () {
      this.$store.dispatch('Site/company/SitedislikeAdvertising' , {id : this.List.id , member : this.User.member.id})
        .then(success => {
          console.log(success)
        }).catch(err => {
        console.log(err)

      })
    }  ,
  } ,

  computed :  {
    companyImage () {
      if(this.ErrorImage)
        return  '~/aasets/images/company/no-company.png'
      return this.List.Company.logo
    },
    memberRole() {
      return this.$store.getters['User/User/userRole']
    },
    like() {
      if(this.User && this.List)
        if(this.memberRole == 'Member')
          return this.$store.getters['Site/company/SiteLikedUsersList'](this.List.id , this.User.member.id)
    },
    pathName() {
      var namee = this.List.Company.name_en
      namee = namee.toLowerCase()
      namee = namee.replace(/\s/g, '-')
      return this.List.Company.id + '-' + namee
    },
  },

}
</script>

