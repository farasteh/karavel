<template>
  <div>
    <div slot="pdf-content" ref="content" id="content" class="d-flex justify-content-center">
      <div class="special" style="right : 10px">
        <span class="spe-text" style="word-spacing: -3px" v-if="staff.contact_status">شاغل شده ام</span>
        <span class="spe-text" style="word-spacing: -3px" v-else>جویای کار</span>
      </div>
      <div id="box-pdf" class="box-pdf" style="border: 1px solid #ccc; position: relative">
        <div class="contact-info col-12">
          <div class="name-job-desc">
            <div class="header row py-0">
              <div style="padding-top : 60px ; padding-bottom :20px;background: #e8e8e8" class="d-flex align-items-center col-md-4 flex-column">
                <div v-if="!LoggedIN">
                  <div class="disappeared-company user-image" v-if="staff.image" :style="{borderColor : activeColor , backgroundImage: 'url('+appUrl+'/images/company/' + staff.image + ')'}"></div>
                  <div class="disappeared-company user-image" :style="{ borderColor : activeColor}" v-else style="background-image: url(/images/company/no-photo.jpg);"></div>
                  <Tooltip trigger="hover" style="top: -100px;" placement="top" class="position-relative">
                    <Icon @click="Gologin" type="ios-lock" class="lock-company-image lock-compamy-image-mobile" style="right: 50px !important" />
                    <div style="line-height: 2.25;" slot="content">
                      <p class="font-weight-bold" ><Icon class="lump-icon" type="ios-bulb" /> برای مشاهده رزومه ابتدا وارد شوید</p>
                    </div>
                  </Tooltip>
                </div>
                <div v-else>
                  <div class="user-image" v-if="staff.image" :style="{borderColor : activeColor , backgroundImage: 'url('+appUrl+'/images/company/' + staff.image + ')'}"></div>
                  <div class="user-image" :style="{ borderColor : activeColor}" v-else style="background-image: url(/images/company/no-photo.jpg);"></div>
                </div>

                <div class="d-flex" style="margin-right: 10px;" v-if="!LoggedIN" >
                  <h1 class="disappeared-company mt-3" :style="{ color: activeColor , fontSize : titleSize}">{{ staff.name }}
                    {{ staff.last_name }}</h1>
                  <a  style="margin: 9px 5px 10px 0" title="برای مشاهده رزومه وارد شوید">
                    <Icon @click="Gologin" type="ios-lock" class="lock-company" />
                  </a>
                </div>
                <div style="margin-right: 10px;" class="" v-else>
                  <h1 class="mt-3" :style="{ color: activeColor , fontSize : titleSize}">{{ staff.name }}
                    {{ staff.last_name }}</h1>

                </div>
                <div class="box-exprimentas" :style="{ backgroundColor : labelColor , fontSize : textSize}">
                    {{staff.rank}}%
                </div>
              </div>
              <div class="total-info d-flex align-items-center col-md-8">
                <div :style="{ color: activeColor  , fontSize : subtitleSize}" class="other-infos not-drag">
                  <div class="basic__birthday" v-if="birthDate">
                    <span>متولد  </span>
                    <span> : </span>
                    <span>{{ birthDate }} </span>
                  </div>
                  <div class="basic__marital" v-if="staff.marital_status">
                    <span> وضعیت تاهل </span>
                    <span> : </span>
                    <span v-if="staff.marital_status == 1 ">متاهل</span>
                    <span v-if="staff.marital_status == 0 ">مجرد</span>
                  </div>
                  <div v-if="staff.soldier" class="basic_martial"
                       :style="{ fontSize : subtitleSize}">
                    <span> وضعیت سربازی </span>
                    <span> : </span>
                    <span v-if="staff.soldier">{{ staff.soldier.title }}</span>
                  </div>
                  <div class="basic_job" v-if="staff.job" :style="{ fontSize : subtitleSize}">
                    <span>  تخصص </span>
                    <span> : </span>
                    <span>{{ staff.job.title }}</span>
                    <span v-if="staff.cat">( {{ staff.cat.title }} )</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div style="background: #e8e8e8" class="col-12 col-md-4 smbox col-narrow sortable-cv-items">
                <div class="property-item">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" class="font-16">
                      اطلاعات تماس
                      <a v-if="!LoggedIN" title="برای مشاهده رزومه وارد شوید">
                        <Icon @click="Gologin" type="ios-lock" class="lock-company" style="font-size: 25px" />
                      </a>
                    </label>

                  </div>
                  <div class="property-item_body contact" >
                    <div class="text-justify font-weight-bold font-15" v-if="staff.contact_status">ایشان شاغل است و علاقه ای ندارد تا اطلاعات تماس نمایش داده شود</div>
                    <div v-else class="infoo info" :class="{disappearedCompany : !LoggedIN}">
                      <div class="infoo-head">
                        <label> اطلاعات تماس </label>
                      </div>
                      <div class="contact-item contact__email" v-if="staff.email"
                           :style="{ fontSize : subtitleSize}">
                                                <span :style="{ color: activeColor , fontSize : subtitleSize}">
                                                    <Icon class="font-18" type="ios-mail"/>
                                                </span>
                        <span>ایمیل :</span>
                        <span> {{ staff.email }} </span>
                      </div>
                      <div class="contact-item contact__mobile" v-if="staff.mobile"
                           :style="{fontSize : subtitleSize}">
                                                <span :style="{ color: activeColor }">
                                                    <Icon class="font-18" type="ios-phone-portrait"/>
                                                </span>
                        <span>موبایل :</span>
                        <span dir="ltr"> {{ staff.mobile }} </span>
                      </div>
                      <div class="contact-item contact__phone" v-if="staff.phone"
                           :style="{ fontSize : subtitleSize}">
                                                <span :style="{ color: activeColor}">
                                                    <Icon class="font-18" type="ios-call"/>
                                                </span>
                        <span>تلفن :</span>
                        <span dir="ltr"> {{ staff.phone }}</span>
                      </div>
                      <div class="contact-item contact__website" v-if="staff.site"
                           :style="{ fontSize : subtitleSize}">
                                                <span :style="{ color: activeColor}">
                                                    <Icon class="font-18" type="ios-radio"/>
                                                </span>
                        <span>وبسایت  :</span>
                        <span dir="ltr">{{ staff.site }}</span>
                      </div>
                      <div class="contact-item contact__city d-flex" v-if="staff.province || staff.city "
                           :style="{ fontSize : subtitleSize}">
                                                <span :style="{ color: activeColor}">
                                                    <Icon class="font-18" type="ios-pin"/>
                                                </span>
                        <span><Icon class="font-18" type="ios-pin"/></span>
                        <span dir="rtl">
                          <div v-if="staff.province" style="display: inline">  {{ staff.province.title }} - </div>
                          <div v-if="staff.city" style="display: inline">  {{ staff.city.title }} - </div>
                      </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="property-item skill__list"
                     v-if="staff.exprimentas && staff.exprimentas.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" class="font-16"> مهارت ها</label>
                  </div>
                  <div class="property-item_body">
                    <div class="bar-progress item-row row">
                                            <span class="box-exprimentas" v-for="(item , index ) in staff.exprimentas" :key="index" :style="{ backgroundColor : labelColor , fontSize : textSize}">
                                                {{item.name}}
                                            </span>
                    </div>
                  </div>
                </div>
                <div class="property-item language__list"
                     v-if="staff.languages && staff.languages.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor , fontSize : titleSize}"> زبان ها </label>
                  </div>
                  <div class="property-item_body">
                    <div class="item-row w4">
                      <ul class="history">
                        <li style="margin-top: 30px;" v-for="(item , index ) in staff.languages" :key="index">
                          <h2 class="subtitle language-item" v-if="item.lang_id" :style="{fontSize : subtitleSize}">{{ item.lang_id.title }}</h2>
                          <span v-if="item.read">
                                <label :style="{ backgroundColor : labelColor  , fontSize : textSize}">مهارت خواندن</label>
                                <label class="grade">
                                    <i v-for="(item , index) in parseInt(item.read)" class="tik"
                                       :style="{ background: labelColor}"></i>
                                    <i v-for="(item , index) in 5 - parseInt(item.read)"></i>
                                </label>
                            </span>
                          <span v-if="item.say">
                                        <label
                                          :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت گفتن</label>
                                        <label class="grade">
                                            <i v-for="(item , index) in parseInt(item.say)" class="tik"
                                               :style="{ background: labelColor}"></i>
                                            <i v-for="(item , index) in 5 - parseInt(item.say)"></i>
                                        </label>
                                   </span>
                          <span v-if="item.listen">
                                        <label
                                          :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت شنیدن</label>
                                        <label class="grade">
                                            <i v-for="(item , index) in parseInt(item.listen)" class="tik"
                                               :style="{ background: labelColor}"></i>
                                            <i v-for="(item , index) in 5 - parseInt(item.listen)"></i>
                                        </label>
                                    </span>
                          <span v-if="item.write">
                                                        <label
                                                          :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت نوشتن</label>
                                                        <label class="grade">
                                                            <i v-for="(item , index) in parseInt(item.write)" class="tik"
                                                               :style="{ background: labelColor}"></i>
                                                            <i v-for="(item , index) in 5 - parseInt(item.write)"></i>
                                                        </label>
                                                   </span>
                          <span style="margin-top: 26px;" v-if="index == 1"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>


                <div class="property-item social__list"
                     v-if="staff.social_networks && staff.social_networks.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" class="font-16"> شبکه های اجتماعی
                      <a v-if="!LoggedIN" title="برای مشاهده رزومه وارد شوید">
                        <Icon @click="Gologin" type="ios-lock" class="lock-company" style="font-size: 25px" />
                      </a>
                    </label>
                  </div>
                  <div class="property-item_body" :class="{disappearedCompany : !LoggedIN}" >
                    <div class="item-row w0">
                      <ul class="history">
                        <li style="margin-top: 15px;"  v-for="(item , index ) in staff.social_networks" :key="index">
                                                    <span v-if="item.social_network.id == 1"
                                                          :style="{fontSize : subtitleSize}">
                                                        <label :style="{ color: activeColor}">
                                                            <Icon type="ios-send"/>
                                                        </label>
                                                        <label style="direction:ltr ; text-align :left;">
                                                            <a :style="{ color: activeColor}" :href="telegram(item.link)"
                                                               class="social-link"
                                                               target="_blank">{{ item.link }}</a>
                                                        </label>
                                                    </span>
                          <span v-else-if="item.social_network.id == 2"
                                :style="{fontSize : subtitleSize}">
                                                        <label :style="{ color: activeColor}">
                                                            <Icon type="logo-instagram"/>
                                                        </label>
                                                        <label style="direction:ltr ; text-align :left;">
                                                            <a :style="{ color: activeColor}" :href="insta( item.link )"
                                                               class="social-link"
                                                               target="_blank">{{ item.link }}</a>
                                                        </label>
                                                    </span>

                          <span v-else-if="item.social_network.id == 3"
                                :style="{fontSize : subtitleSize}">
                                                        <label :style="{ color: activeColor}">
                                                            <Icon type="logo-youtube"/>
                                                        </label>
                                                        <label style="direction:ltr ; text-align :left;">
                                                            <a :style="{ color: activeColor}" :href="youtub(item.link)"
                                                               class="social-link"
                                                               target="_blank">{{ item.link }}</a>
                                                        </label>
                                                    </span>
                          <span v-else-if="item.social_network.id == 4"
                                :style="{fontSize : subtitleSize}">
                                                        <label :style="{ color: activeColor}">
                                                            <Icon type="logo-twitter"/>
                                                        </label>
                                                        <label style="direction:ltr ; text-align :left;">
                                                            <a :style="{ color: activeColor}" :href="twitt(item.link)"
                                                               class="social-link"
                                                               target="_blank">{{ item.link }}</a>
                                                        </label>
                                                    </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-8 lgbox col-wide sortable-cv-items">
                <div class="property-item basic__about" v-if="staff.comment">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" style="font-size: 16px"> درباره من </label>
                  </div>
                  <div class="property-item_body">
                    <p class="about-us"  v-html="staff.comment"></p>
                  </div>
                </div>

                <div class="property-item education__list mt-2"
                     v-if="staff.record_studies && staff.record_studies.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" style="font-size: 16px"> سوابق تحصیلی </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history multi-line">
                      <li class="mb-3" v-for="(item , index ) in staff.record_studies" :key="index">
                        <div style="margin-right: 0;margin-left: 0;" class="row">
                          <div style="padding-right: 0;padding-left: 0;" class="col-md-6 box-m">
                            <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                              <span v-if="item.document">{{item.document.title}}</span>
                              {{ item.Field_Study }}
                            </h2>
                          </div>
                          <div style="padding-right: 0px;padding-left: 0px;" class="col-md-6 box-m" v-if="item.orientation">
                            <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                              گرایش <span> : </span> {{ item.orientation }}
                            </h2>
                          </div>
                          <div style="padding-right: 0px;padding-left: 0px;" class="col-md-6 box-m">
                            <h3 class="subtitle" :style="{fontSize : textSize}">{{ item.title_institutes }}
                              <label v-if="item.institutes">{{item.institutes.title}}</label>
                            </h3>
                          </div>
                          <div style="padding-right: 0px;padding-left: 0px;" class="col-6 col-md-3 box-m">
                            <label style="direction: ltr" class="date" :style="{fontSize : textSize}" v-if="item.Studying == 1">    از سال {{ item.entering_year }} تا کنون   </label>
                            <label class="date" :style="{  fontSize : textSize}" v-if="item.Studying == 0 && item.entering_year && item.year_departure">{{item.entering_year}}
                              - {{ item.year_departure }}
                            </label>
                          </div>
                          <div style="padding-right: 0px;padding-left: 0px;" class="col-6 col-md-3 box-m" v-if="item.average">
                            <label class="Education-Grade" :style="{ fontSize : textSize}">معدل <span> : </span>
                              {{ item.average }}
                            </label>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-item experience__list mt-2"
                     v-if="staff.record_jobs && staff.record_jobs.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" style="font-size: 16px"> سوابق شغلی </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history multi-line">
                      <li style="margin-bottom: 20px !important;margin-top: 17px" class="mb-3" v-for="(item , index ) in staff.record_jobs" :key="index">
                        <div style="margin-right: 0px;margin-left: 0px;align-items: center;" class="row">
                          <div style="padding-left: 0px;padding-right: 0px" class="col-md-4 box-m">
                            <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                              {{ item.job_side }}
                            </h2>
                          </div>
                          <div style="padding-left: 0px;padding-right: 0px" class="col-md-3 box-m">
                            <label class="date" :style="{fontSize : textSize}" v-if="item.end && item.start">
                              {{ item.start }} - {{ item.end }}
                            </label>
                            <label class="date" :style="{ fontSize : textSize}" v-if="item.start && !item.end">
                                از سال {{ item.start }}
                              تا کنون
                            </label>
                          </div>
                          <div style="padding-left: 0px;padding-right: 0px" class="col-md-5 box-m">
                            <h3 class="subtitle" :style="{fontSize : textSize}">
                              <span v-if="item.center_job"> {{item.center_job.title}} : </span>
                              {{ item.title_center_job }}
                            </h3>
                          </div>
                        </div>
                        <label class="subtitle font-13" v-if="item.satisfying"> * از این مرکز رضایت نامه شغلی دارم!</label>
                        <label class="exp-desc-title" v-if="item.comment">وظایف و دستاوردها</label>
                        <div class="exp-desc mb-2 about-us text-justify" v-if="item.comment" >
                          {{ item.comment }}
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-item certificate__list mt-2"
                     v-if="staff.certificates && staff.certificates.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor}" style="font-size: 16px"> دوره ها و گواهینامه ها </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history one-line">
                      <li class="mb-3" v-for="(item , index ) in staff.certificates" :key="index">
                        <div style="margin-right: 0;margin-left: 0" class="row">
                          <div style="padding-right: 0;padding-left: 0" class="col-md-5 mb-1">
                            <h2 class="subtitle bidirectional" :style="{fontSize : subtitleSize}"><span> {{item.certificate}}  </span>{{ item.title }}</h2>
                          </div>
                          <div style="padding-right: 0;padding-left: 0" class="col-md-4">
                            <h3 class="subtitle" :style="{fontSize : textSize}">{{ item.Institute }}</h3>
                          </div>
                          <div style="padding-right: 0;padding-left: 0" class="col-md-3"  v-if="item.date">
                            <label class="date" :style="{ fontSize : textSize}"><label class="text-date">تاریخ <span> : </span></label>
                              {{ item.date }}
                            </label>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-item research__list mt-2" v-if="staff.articles && staff.articles.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor , fontSize : titleSize}">تحقیقات </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history one-line">
                      <li class="mb-3" v-for="(item , index ) in staff.articles" :key="index">
                        <div class="row">
                          <div class="col-md-6 box-m">
                            <h2 class="subtitle bidirectional" :style="{fontSize : subtitleSize}">
                              <span v-if="item.effect">{{ item.effect.title }}</span>
                              {{ item.title }}
                            </h2>
                          </div>
                          <div v-if="item.publisher" class="col-md-6 box-m">
                            <h3 class="subtitle" :style="{fontSize : textSize}">ناشر <span> : </span><span>{{ item.publisher }}</span>
                            </h3>
                          </div>
                          <div class="col-6 box-m" v-if="item.date">
                            <label class="date" :style="{ fontSize : textSize}">
                              <label class="text-date">تاریخ <span> : </span></label>{{ item.date }}
                            </label>
                          </div>
                          <div class="col-6 box-m" v-if="item.link">
                            <p class="project-link" :style="{ fontSize : textSize}">
                              <a :href="setLink(item.link)" target="_blank">{{ item.link }}</a>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-item project__list mt-2"
                     v-if="staff.projects && staff.projects.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor , fontSize : titleSize}"> پروژه ها </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history one-line">
                      <li class="mb-3" v-for="(item , index ) in staff.projects" :key="index">
                        <div style="margin-left: 0; margin-right: 0" class="row">
                          <div style="padding-left: 0;padding-right: 0" class="col-md-6 box-m">
                            <h2 class="subtitle bidirectional"
                                :style="{fontSize : subtitleSize}">
                              {{ item.title }}
                            </h2>
                          </div>
                          <div style="padding-left: 0;padding-right: 0" class="col-md-6 box-m" v-if="item.company">
                            <h3 class="subtitle" :style="{fontSize : textSize}">
                              درخواست کننده <span> : </span>
                              {{ item.company }}
                            </h3>
                          </div>
                          <div style="padding-left: 0;padding-right: 0" class="col-6 box-m"  v-if="item.date">
                            <label class="date" :style="{  fontSize : textSize}">
                              <label class="text-date">تاریخ <span> : </span></label>
                              {{ item.date }}
                            </label>
                          </div>
                          <div style="padding-left: 0;padding-right: 0" class="col-6 box-m" v-if="item.link">
                            <p class="project-link" :style="{ fontSize : textSize}">
                              <a :href="setLink(item.link)" target="_blank">{{ item.link }}</a>
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="property-item honor__list mt-2" v-if="staff.honors && staff.honors.length != 0">
                  <div class="property-item_head" :style="{ borderColor : activeColor}">
                    <label :style="{ color: activeColor , fontSize : titleSize}">افتخارات </label>
                  </div>
                  <div class="property-item_body">
                    <ul class="history list-item">
                      <li v-for="(item, index ) in staff.honors" :key="index">
                        <div class="row">
                          <div class="col-md-8 box-m"><p class="bidirectional" :style="{fontSize : subtitleSize}">{{ item.title }}</p></div>
                          <div class="col-md-4 box-m" v-if="item.date">
                            <label class="date" :style="{fontSize : textSize}">
                              <label class="text-date">تاریخ <span> : </span></label>
                              {{ item.date }}
                            </label>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props : ['memberRole' , 'Member' , 'staff'] ,
  data() {
    return {
      memberModal :false ,
      activeColor: '#0765bd',
      labelColor: '#F891A6',
      leftBOxColor: '#ee7057',
      rightBoxColor: '#ee7057',
      loadingB: false,
      loadingText: false,
      titleSize: '14px',
      subtitleSize: '13px',
      textSize: '12px',
      requestloading : false,
      modalMessage : ''
    }
  },

  computed: {
    appUrl() {
      return this.$store.state.globalFunctions.APP_URL
    },
    LoggedIN () {
      if(this.memberRole != ''){
        if ( this.memberRole == 'Company' || this.memberRole == 'Admin'  )
          return true
      }
      else return  false
    },
    birthDate() {
      if (this.staff.birth_date) {
        let Array1 = this.staff.birth_date.split("-");
        let DayArray = Array1[2].split(" ");
        let mount = Array1[1];
        let Day = DayArray[0];
        let years = Array1[0]
        return years + '/' + mount + '/' + Day
      } else {
        return ''
      }
    }
  },

  created() {
    this.getPdf();
  },


  methods: {
    Gologin() {
      if ( this.memberRole == '') {
        this.$store.commit('Auth/redirect/SET_ROUTE' , {
          route : {name : this.$route.fullPath }
        })
        this.$router.push({path : '/users/login-register/Company' })
      }
      else if(this.memberRole == 'NOTMember')
        this.$router.push({path : '/register/member'})
      else if(this.memberRole == 'NOTCompany')
        this.$router.push({path : '/register/company'})
    },
    insta(linkd)  {
      return `https://www.instagram.com/${linkd}`
    },
    telegram(linkd)  {
      return `https://telegram.me/${linkd}`
    },
    youtub(linkd) {
      return `https://youtu.be/${linkd}`
    } ,
    twitt(linkd) {
      return `https://twitter.com/${linkd}`
    } ,
    setLink(links) {
      if(links)
      {
        if(links.includes('https://' || 'http://'))
          return links
        else
          return `http://${links}`
      }

    },
    getPdf() {
      let form = {
        'themeNumber': 2,
        'base_id' : this.staff.id
      }
      this.$axios.post('api/v1/member/resume-pdf-options', form)
        .then(res => {
          let changes = JSON.parse(res.data.options)
          this.activeColor = changes.activeColor
          this.leftBOxColor = changes.leftBOxColor
          this.rightBoxColor = changes.rightBoxColor
          this.labelColor = changes.labelColor
        })
        .catch(({error, status}) => {
          console.log(error)

        });
    }  ,
    sendRequestToResume(){
      if(this.memberRole == 'Company'){
        this.$confirm("آیا از ارسال پیشنهاد خود اطمینان دارید؟").then(() => {
          this.requestloading = true
          this.$store.dispatch('Site/Staff/sendRequest', {
            resume: this.$route.params.id,
            company: this.Member.Company.id
          })
            .then(response => {
              this.$store.dispatch('globalFunctions/SuccessNotify', response.data.data.message)
              this.message = 'درخواست شما  ارسل شد.'
              this.messageType = 'alert-success'
            })
            .catch(error => console.log(error))
            .finally(() => this.requestloading = false)
        })
      }
      else{
        if(this.memberRole == 'Member'){
          this.memberModal = true
          this.modalMessage =  'شما با پروفایل کارجو وارد شده اید. برای ارسال پیشنهاد ابتدا باید با پروفایل کارفرما وارد شوید.'
        }
        else if(this.memberRole == 'Admin'){
          this.$store.dispatch('globalFunctions/ErrorNotify2' ,'شما با پروفایل ادمین وارد شده اید.')
        }
        else {
          this.memberModal = true
          this.modalMessage =  'لطفا ابتدا وارد شوید'
        }
      }
    }
  }
}

</script>

<style scoped>

.close-pdf {
  font-size: 35px;
  border-radius: 50%;
  padding: 5px;
  margin-bottom: 10px;
  box-shadow: 0px 0px 6px 5px #565454;
}
i {
  font-style: normal;
}
.box-m{
  margin: 12px 0 10px 0;
}
.box-exprimentas{
  padding: 7px;
  margin-right: 5px;
  margin-top: 5px;
  border-radius: 5px;
}

.btn-pdf {
  height: 100%;
  width: 100%;
  border: 0px;
  color: white;
  background: #79c34d;
}

.center-box-form {
  display: flex !important;
  align-items: center !important;
  justify-content: center;
}

.ivu-form .ivu-form-item-label {
  font-size: 13px !important;
}

.box-pdf {
  width: 218mm;
  background: #ffffff;
}

.btn-position {
  position: fixed;
  bottom: 20px;
  left: 50px
}


.container {
  display: block;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  padding: 30px;
  background: white;
  font-family: mainfont !important;
  box-shadow: 0 0 6px -2px #000;
  margin: 0 auto;
  margin-top: 40px;
  margin-bottom: 50px;
  min-height: 297mm;
  position: relative;
}

.preview-container {
  margin-bottom: 100px;
}

.banner.top {
  top: 0;
}

.banner {
  width: 100%;
  background: #ffa850;
  height: 40px;
  overflow: hidden;
  left: 0;
}

.banner:before {
  border-left: 250px solid #ee7057;
  border-bottom: 83px solid transparent;
  position: relative;
  top: -23px;
  left: -600px;
}

.banner:after, .banner:before {
  content: ' ';
  width: 0;
  height: 0;
}

.banner:before {
  border-left-color: #ee7057;
}

.banner:after {
  border-right: 250px solid #ee7057;
  border-top: 85px solid transparent;
  position: relative;
  top: 40px;
  right: -300px;
}

.name-job-desc {
  padding: 0;
}

.name-job-desc {
  display: inline-block;
  width: 100%;
  box-sizing: border-box;
  padding: 0 10px;
  color: #333;
}

.header {
  padding-top: 62px;
  padding-bottom: 20px;
  position: relative

}

div.user-image {

  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 110px;
  width: 110px;
  display: inline-block;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 100%;
  margin: AUTO;
  position: relative;
  z-index: 1;
}

.name-job-desc h1 {

}

div.user-image {
  box-shadow: none !important;
  border: 3px solid #ee7057;
  width: 130px;
  height: 130px;
  margin: 0;

}

.name-job-desc h2 {

}



.other-infos {
  display: inline-block;
  font-size: 11px;
  color: #ee7057;
}

.col-narrow {
  width: 45%;
  padding: 0 20px;
}

.col-wide {
  width: 45%;
  padding: 0px 19px;
}

.property-item {
  margin-bottom: 45px;
  padding: 0 10px;
  box-sizing: border-box;
}

.property-item_head {
  border-bottom: 1px solid #ee7057;
  text-align: right;
  width: 100%;
  margin: 0;
  padding-top: 5px;
  font-size: 1.1rem;
  clear: both;

}

.property-item_head label {
  text-align: right;
  border: 0;
  color: #ee7057;
  padding-bottom: 5px;
  font-size: 14px;
  display: block;
  font-weight: 700;
  line-height: 2.2em;
  position: relative;
  min-width: 100px;
}

.property-item_body {
  padding: 10px 0 5px;
  width: 100%;
  box-sizing: border-box;
}

.property-item_body.contact div {
  margin-bottom: 5px;
  font-size: 14px;
  width: 100%;
}

.infoo-head {
  display: none;
}

div.contact-item span:first-child {
  display: inline-block;
  color: #ee7057;
}

.contact-item span:nth-child(2) {
  display: none;
}

.property-item_body.contact div span:nth-child(3) {
  font-size: 13px;
  width: 295px;
  text-align: right;
}

.property-item_body > *:first-child {
  padding: 0;
}

ul.history, ul.list-item {
  list-style-type: circle;
  padding-right: 0;
  margin-top: 0 !important;
  width: 100%;
}

ol, ul {
  padding-left: 30px;
}

ul {
  display: block;
  list-style-type: disc;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  padding-inline-start: 40px;
}

.skill__list ul.history li {
  min-height: 10px;
  margin-bottom: 0;
}

ul.history li {
  list-style: none;
  box-sizing: border-box;
  padding-right: 0;
  margin: 0;
  min-height: 60px;
  width: 100%
}

ul.history li {
  position: relative;
  padding: 0;
  margin-bottom: 10px !important;
  min-height: initial;
}

.item-row.w0 li > span {
  height: auto;
}

.item-row.w0 li > span {
  width: auto;
}

div.item-row li > span {
  padding-left: 5px;
  box-sizing: border-box;
  height: 24px;
  margin: 5px 0;
  width: 100%;
}

div.item-row li > span label:first-child {
  color: #000;
  background: #ee7057;
  padding: 0 6px;
  border-radius: 5px;
  font-size: 10px;
  min-width: 100px;
  text-align: center;
}

div.item-row li > span label {
  line-height: 24px;
  height: 100%;
  font-size: 10px;
}



div.item-row li > span label.grade i.tik {
  background: #ee7057;
}

div.item-row li > span label.grade i {
  border-radius: 50%;
  width: 10px;
  height: 10px;
  margin: 7px 3px;
  background: #dadada;
  box-sizing: border-box;
}

ul.history h2.subtitle {
  font-size: 12px;
  text-align: right
}

div.item-row li > span {
  box-sizing: border-box;
  height: 24px;
  width: 100%;
  display: flex;
  margin: 9px 0px 7px 0;
}

div.item-row li > span label:last-child {
  line-height: 24px;
  display: flex;
  height: 100%;
  font-size: 10px;
  width: auto;
  margin-right: auto;
}

.property-item.social__list ul.history li span {
  width: 100%;
}

.property-item.social__list ul.history li span label:first-child {
  font-size: 19px;
  color: #ee7057;
  background: transparent !important;
}

.property-item.social__list .fab {
  display: inline;
}

.property-item.social__list ul.history li span label:last-child {
  font-size: 15px;
  color: #565555;
}

a.social-link {
  color: #ee7057;
}

.about-us {
  font-size: 12px;
  line-height: 25px;
  text-align: justify;
}

ul.history h2.subtitle {
  margin-top: 0;
  font-size: 12px;
}

ul.history h2.subtitle {
  margin: 0;
  font-size: 13px;
  font-weight: 700;
  color: inherit;
}

h2.subtitle {
  display: block;
  width: 100%;
}

ul.history h3.subtitle {
  font-size: 11px;
}

ul.history h3.subtitle {
  font-size: 12px;
}

h3.subtitle label {
  background: #ee7057;
  color: #000;
  font-size: 8px;
}

h3.subtitle label {
  font-size: 10px;
  color: #2c2c2c;
  background: #d0d0d0;
  padding: 1px 6px;
  border-radius: 4px;
}

label.date {
  font-size: 11px;
}

ul.history label.date {
  font-size: 11px;
  margin-top: 0px;
}

label.Education-Grade {
  font-size: 11px;
}

label.exp-desc-title {
  color: #303030;
  font-size: 10px;
}

label.exp-desc-title {
  display: block;
  font-size: 11px;
  padding: 5px 0;
  border-bottom: 1px dotted #808080;
  width: 100%;
  margin: 0px 0 14px 0px;
  font-weight: bold;
}

ul.exp-desc {
  padding-right: 20px;
}

ul.exp-desc {
  padding: 0;
  padding-right: 0px;
  width: 90%;
  box-sizing: border-box;
}

ul.history.one-line li {
  width: 100%;
}

p.project-link {
  font-size: 12px;
}

p.project-link a {
  font-size: 10px;
}

p.project-link a {
  text-decoration: none;
  word-break: break-word;
}

ul.list-item li p {
  border: 0;
  padding: 0 !important;
  font-weight: bold;
  font-size: 12px;
}

.body-pdf {
  background-color: #2d2d2d !important;
  background: #2d2d2d !important;
}

.fixed-box {
  position: fixed !important;
  right: 20px !important
}
.total-info {
  padding-top : 60px ;
  padding-bottom :20px;
}
@media only screen and (max-width: 760px) {
  .btn-pdf  {
    font-size: 30px;
  }
  .total-info {
    padding-top : 20px ;
    padding-bottom :20px;
    background: #e8e8e8;
  }
}
@media only screen and (max-width: 512px) {
  .box-pdf {
    width: 100%;
  }
}

.site-link {
  color: #fff;
}
.site-link:hover {
  color: #fff;
}

.ivu-modal-footer {
  direction: ltr !important;
}
.ivu-modal-footer button {
  width: 25% !important;
}
.ivu-modal-header{
  text-align: center !important;
}
</style>
