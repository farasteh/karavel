<template>
    <div class="body-pdf" style="margin-top : -10px">
        <div class="mt-2">
            <div>
                <div class="row">
                    <div class="col-2 mt-4"></div>
                    <div class="col-8 mb-2 mt-4 centerd-box" >
                        <div class="row" style="width: 226mm">
                            <div class="col-12 d-flex justify-content-center mb-2" >
                                <router-link :to="{name  : 'memberResumesaz'}">
                                    <Icon type="md-close"  class="close-pdf"/>
                                </router-link>
                            </div>
                            <div class="col-6 pl-1">
                                <button @click="setDefault" class="btn-pdf p-4">
                                    تنظیمات پیشفرض
                                </button>
                            </div>
                            <div class="col-6 pr-1">
                                <button @click="createPDF" class="btn-pdf p-4">
                                    <Loadingbutton :loading="loadingB"/>
                                    <span v-if="loadingText === true"></span>
                                    <span v-else>دریافت فایل pdf</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"  style="z-index : 9">
                        <div style="position: sticky ; top: 20px;">
                            <Form style="background: #fff;padding: 7px;" ref="UpdateProject">
                                <div class="">
                                    <div class="row m-0">
                                        <div class="col-12 d-flex align-items-center justify-content-between">
                                            <span style="margin-left: 6px;">رنگ عناوین</span>
                                            <v-swatches
                                                v-model="activeColor"
                                                :swatches="swatches"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-12 d-flex align-items-center justify-content-between">
                                            <span style="margin-left: 6px;">رنگ برچسب ها</span>
                                            <v-swatches
                                                v-model="labelColor"
                                                :swatches="swatches"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-12 d-flex align-items-center justify-content-between">
                                            <span style="margin-left: 6px;">رنگ باکس چپ</span>
                                            <v-swatches
                                                v-model="leftBOxColor"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                                :swatches="swatches"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-12 d-flex align-items-center justify-content-between">
                                            <span style="margin-left: 6px;">رنگ باکس راست</span>
                                            <v-swatches
                                                v-model="rightBoxColor"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                                :swatches="swatches"
                                            ></v-swatches>
                                        </div>
                                    </div>
                                </div>
                            </Form>
                        </div>
                    </div>
                    <div class="col-8 centerd-box" >
                        <div slot="pdf-content" ref="content" id="content">
                            <div id="box-pdf" class="box-pdf">
                                <div class="banner top" :style="{ background: activeColor}"></div>
                                <div class="contact-info col-12">
                                    <div class="name-job-desc">
                                        <div class="header row">
                                            <div style="display: flex !important;align-items: center !important;" class="col-6">
                                                <div class="user-image" v-if="result.image" :style="{borderColor : activeColor , backgroundImage: 'url(/images/company/' + result.image + ')'}"></div>
                                                <div class="user-image" :style="{ borderColor : activeColor}" v-else style="background-image: url(/images/company/no-photo.jpg);"></div>
                                                <div style="margin-right: 10px;" class="">
                                                    <h1 :style="{ color: activeColor , fontSize : titleSize}">{{ result.name }}
                                                        {{ result.last_name }}</h1>
                                                    <h2 :style="{ color: activeColor , fontSize : subtitleSize}" v-if="result.job">{{ result.job.title }} </h2>
                                                </div>
                                            </div>
                                            <div style="display: flex !important;align-items: center !important" class="col-6">
                                                <div :style="{ color: activeColor  , fontSize : subtitleSize}" class="other-infos not-drag">
                                                    <div class="basic__birthday" v-if="birthDate">
                                                        <span>متولد  </span>
                                                        <span> : </span>
                                                        <span>{{ birthDate }} </span>
                                                    </div>
                                                    <div class="basic__marital" v-if="result.marital_status">
                                                        <span> وضعیت تاهل </span>
                                                        <span> : </span>
                                                        <span v-if="result.marital_status == 1 ">متاهل</span>
                                                        <span v-if="result.marital_status == 0 ">مجرد</span>
                                                    </div>
                                                    <div v-if="result.soldier" class="basic_martial"
                                                         :style="{ fontSize : subtitleSize}">
                                                        <span> وضعیت سربازی </span>
                                                        <span> : </span>
                                                        <span v-if="result.soldier">{{ result.soldier.title }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 smbox col-narrow sortable-cv-items">
                                                <div class="property-item">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px">اطلاعات تماس </label>
                                                    </div>
                                                    <div class="property-item_body contact">
                                                        <div class="infoo info">
                                                            <div class="infoo-head">
                                                                <label> اطلاعات تماس </label>
                                                            </div>
                                                            <div class="contact-item contact__email" v-if="result.email"
                                                                 :style="{ fontSize : subtitleSize}">
                                                                <span :style="{ color: activeColor , fontSize : subtitleSize}">
                                                                    <Icon style="font-size: 18px;" type="ios-mail"/>
                                                                </span>
                                                                <span>ایمیل :</span>
                                                                <span> {{ result.email }} </span>
                                                            </div>
                                                            <div class="contact-item contact__mobile" v-if="result.mobile"
                                                                 :style="{fontSize : subtitleSize}">
                                                                <span :style="{ color: activeColor }">
                                                                    <Icon style="font-size: 18px;" type="ios-phone-portrait"/>
                                                                </span>
                                                                <span>موبایل :</span>
                                                                <span dir="ltr"> {{ result.mobile }} </span>
                                                            </div>
                                                            <div class="contact-item contact__phone" v-if="result.phone"
                                                                 :style="{ fontSize : subtitleSize}">
                                                                <span :style="{ color: activeColor}">
                                                                    <Icon style="font-size: 18px;" type="ios-call"/>
                                                                </span>
                                                                <span>تلفن :</span>
                                                                <span dir="ltr"> {{ result.phone }}</span>
                                                            </div>
                                                            <div class="contact-item contact__website" v-if="result.site"
                                                                 :style="{ fontSize : subtitleSize}">
                                                                <span :style="{ color: activeColor}">
                                                                    <Icon style="font-size: 18px;" type="ios-radio"/>
                                                                </span>
                                                                <span>وبسایت  :</span>
                                                                <span dir="ltr">{{ result.site }}</span>
                                                            </div>
                                                            <div class="contact-item contact__city d-flex" v-if="result.province || result.city "
                                                                 :style="{ fontSize : subtitleSize}">
                                                                <span :style="{ color: activeColor}">
                                                                    <Icon style="font-size: 18px;" type="ios-pin"/>
                                                                </span>
                                                                <span><Icon style="font-size: 18px;" type="ios-pin"/></span>
                                                                <span dir="rtl" class="d-flex">
                                                                    <div v-if="result.province" style="width: initial">  {{ result.province.title }} - </div>
                                                                    <div v-if="result.city" style="width: initial">  {{ result.city.title }} - </div>
                                                                    <div style="width: initial">  {{ result.address }}  </div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property-item skill__list"
                                                     v-if="result.exprimentas && result.exprimentas.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> مهارت ها</label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <div class="bar-progress item-row row">
                                            <span class="box-exprimentas" v-for="(item , index ) in result.exprimentas" :key="index" :style="{ backgroundColor : labelColor , fontSize : textSize}">
                                                {{item.name}}
                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property-item language__list"
                                                     v-if="result.languages && result.languages.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor , fontSize : titleSize}"> زبان ها </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <div class="item-row w4">
                                                            <ul class="history">
                                                                <li style="margin-top: 30px;" v-for="(item , index ) in result.languages" :key="index">
                                                                    <h2 class="subtitle language-item" v-if="item.lang_id" :style="{fontSize : subtitleSize}">{{ item.lang_id.title }}</h2>
                                                                    <span>
                                                        <label :style="{ backgroundColor : labelColor  , fontSize : textSize}">مهارت خواندن</label>
                                                        <label class="grade">
                                                            <i v-for="(item , index) in item.read" class="tik"
                                                               :style="{ background: labelColor}"></i>
                                                            <i v-for="(item , index) in 5 - item.read"></i>
                                                        </label>
                                                    </span>
                                                                    <span>
                                                        <label
                                                            :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت گفتن</label>
                                                        <label class="grade">
                                                            <i v-for="(item , index) in item.say" class="tik"
                                                               :style="{ background: labelColor}"></i>
                                                            <i v-for="(item , index) in 5 - item.say"></i>
                                                        </label>
                                                   </span>
                                                                    <span>
                                                        <label
                                                            :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت شنیدن</label>
                                                        <label class="grade">
                                                            <i v-for="(item , index) in item.listen" class="tik"
                                                               :style="{ background: labelColor}"></i>
                                                            <i v-for="(item , index) in 5 - item.listen"></i>
                                                        </label>
                                                    </span>
                                                                    <span>
                                                        <label
                                                            :style="{ backgroundColor : labelColor, fontSize : textSize}">مهارت نوشتن</label>
                                                        <label class="grade">
                                                            <i v-for="(item , index) in item.write" class="tik"
                                                               :style="{ background: labelColor}"></i>
                                                            <i v-for="(item , index) in 5 - item.write"></i>
                                                        </label>
                                                   </span>
                                                                    <span style="margin-top: 26px;" v-if="index == 1"></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property-item social__list"
                                                     v-if="result.social_networks && result.social_networks.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> شبکه های اجتماعی </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <div class="item-row w0">
                                                            <ul class="history">
                                                                <li style="margin-top: 15px;"  v-for="(item , index ) in result.social_networks" :key="index">
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
                                            <div class="col-12 col-md-6 lgbox col-wide sortable-cv-items">
                                                <div class="property-item basic__about" v-if="result.comment">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> درباره من </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <p class="about-us"  v-html="result.comment"></p>
                                                    </div>
                                                </div>

                                                <div class="property-item education__list mt-2"
                                                     v-if="result.record_studies && result.record_studies.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> سوابق تحصیلی </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li class="mb-3" v-for="(item , index ) in result.record_studies" :key="index">
                                                                <div style="margin-right: 0;margin-left: 0;" class="row">
                                                                    <div style="padding-right: 0;padding-left: 0;" class="col-6 box-m">
                                                                        <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                                                                            <span v-if="item.document">{{item.document.title}}</span>
                                                                            {{ item.Field_Study }}
                                                                        </h2>
                                                                    </div>
                                                                    <div style="padding-right: 0px;padding-left: 0px;" class="col-6 box-m" v-if="item.orientation">
                                                                        <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                                                                            گرایش <span> : </span> {{ item.orientation }}
                                                                        </h2>
                                                                    </div>
                                                                    <div style="padding-right: 0px;padding-left: 0px;" class="col-6 box-m">
                                                                        <h3 class="subtitle" :style="{fontSize : textSize}">{{ item.title_institutes }}
                                                                            <label v-if="item.institutes">{{item.institutes.title}}</label>
                                                                        </h3>
                                                                    </div>
                                                                    <div style="padding-right: 0px;padding-left: 0px;" class="col-3 box-m">
                                                                        <label class="date" :style="{fontSize : textSize}" v-if="item.Studying == 1">{{ item.entering_year }} آغار از سال </label>
                                                                        <label class="date" :style="{  fontSize : textSize}" v-if="item.entering_year && item.year_departure">{{item.entering_year}}
                                                                            - {{ item.year_departure }}
                                                                        </label>
                                                                    </div>
                                                                    <div style="padding-right: 0px;padding-left: 0px;" class="col-3 box-m" v-if="item.average">
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
                                                     v-if="result.record_jobs && result.record_jobs.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> سوابق شغلی </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li style="margin-bottom: 20px !important;margin-top: 17px" class="mb-3" v-for="(item , index ) in result.record_jobs" :key="index">
                                                                <div style="margin-right: 0px;margin-left: 0px;align-items: center;" class="row">
                                                                    <div style="padding-left: 0px;padding-right: 0px" class="col-4 box-m">
                                                                        <h2 class="subtitle" :style="{fontSize : subtitleSize}">
                                                                            {{ item.job_side }}
                                                                        </h2>
                                                                    </div>
                                                                    <div style="padding-left: 0px;padding-right: 0px" class="col-3 box-m">
                                                                        <label class="date" :style="{fontSize : textSize}" v-if="item.end && item.start">
                                                                            {{ item.start }} - {{ item.end }}
                                                                        </label>
                                                                        <label class="date" :style="{ fontSize : textSize}" v-if="item.start && !item.end">
                                                                            آغاز همکاری از {{ item.start }}
                                                                        </label>
                                                                    </div>
                                                                    <div style="padding-left: 0px;padding-right: 0px" class="col-5 box-m">
                                                                        <h3 class="subtitle" :style="{fontSize : textSize}">
                                                                            <span v-if="item.center_job"> {{item.center_job.title}} : </span>
                                                                            {{ item.title_center_job }}
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                                <label class="exp-desc-title" v-if="item.comment">وظایف و دستاوردها</label>
                                                                <div class="exp-desc mb-2" v-if="item.comment" >
                                                                    {{ item.comment }}
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="property-item certificate__list mt-2"
                                                     v-if="result.certificates && result.certificates.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor}" style="font-size: 16px"> دوره ها و گواهینامه ها </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history one-line">
                                                            <li class="mb-3" v-for="(item , index ) in result.certificates" :key="index">
                                                                <div style="margin-right: 0;margin-left: 0" class="row">
                                                                    <div style="padding-right: 0;padding-left: 0" class="col-5 ">
                                                                        <h2 class="subtitle bidirectional" :style="{fontSize : subtitleSize}"><span> {{item.certificate}}  </span>{{ item.title }}</h2>
                                                                    </div>
                                                                    <div style="padding-right: 0;padding-left: 0" class="col-4">
                                                                        <h3 class="subtitle" :style="{fontSize : textSize}">{{ item.Institute }}</h3>
                                                                    </div>
                                                                    <div style="padding-right: 0;padding-left: 0" class="col-3"  v-if="item.date">
                                                                        <label class="date" :style="{ fontSize : textSize}"><label class="text-date">تاریخ <span> : </span></label>
                                                                            {{ item.date }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="property-item research__list mt-2" v-if="result.articles && result.articles.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor , fontSize : titleSize}">تحقیقات </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history one-line">
                                                            <li class="mb-3" v-for="(item , index ) in result.articles" :key="index">
                                                                <div class="row">
                                                                    <div class="col-6 box-m">
                                                                        <h2 class="subtitle bidirectional" :style="{fontSize : subtitleSize}">
                                                                            <span v-if="item.effect">{{ item.effect.title }}</span>
                                                                            {{ item.title }}
                                                                        </h2>
                                                                    </div>
                                                                    <div v-if="item.publisher" class="col-6 box-m">
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
                                                     v-if="result.projects && result.projects.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor , fontSize : titleSize}"> پروژه ها </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history one-line">
                                                            <li class="mb-3" v-for="(item , index ) in result.projects" :key="index">
                                                                <div style="margin-left: 0; margin-right: 0" class="row">
                                                                    <div style="padding-left: 0;padding-right: 0" class="col-6 box-m">
                                                                        <h2 class="subtitle bidirectional"
                                                                            :style="{fontSize : subtitleSize}">
                                                                            {{ item.title }}
                                                                        </h2>
                                                                    </div>
                                                                    <div style="padding-left: 0;padding-right: 0" class="col-6 box-m" v-if="item.company">
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
                                                <div class="property-item honor__list mt-2" v-if="result.honors && result.honors.length != 0">
                                                    <div class="property-item_head" :style="{ borderColor : activeColor}">
                                                        <label :style="{ color: activeColor , fontSize : titleSize}">افتخارات </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history list-item">
                                                            <li v-for="(item, index ) in result.honors" :key="index">
                                                                <div class="row">
                                                                    <div class="col-8 box-m"><p class="bidirectional" :style="{fontSize : subtitleSize}">{{ item.title }}</p></div>
                                                                    <div class="col-4 box-m" v-if="item.date">
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import html2pdf from 'html2pdf.js'
import VSwatches from 'vue-swatches'
import Axios from 'axios'

export default {

    components: {
        VSwatches,
    },
    data() {
        return {
            activeColor: '#fdd60d',
            labelColor: '#ffe174',
            leftBOxColor: '#ffe174',
            rightBoxColor: '#ee7057',
            loadingB: false,
            loadingText: false,
            titleSize: '14px',
            subtitleSize: '13px',
            textSize: '12px',
            swatches: [
                ['#F64272', '#F6648B', '#F493A7', '#F891A6', '#FFCCD5'],
                ['#8b5aff', '#a27bff', '#b99cff', '#d0bdff', '#e8deff'],
                ['#51e5db', '#74ebe3', '#96f0ea', '#b9f5f1', '#dcfaf8'],
                ['#ffa51a', '#ffb748', '#ffc976', '#ffdba3', '#ffedd1']
            ]
        }
    },

    computed: {
        result() {
            return this.$store.state.BaseRezome.result
        },
        birthDate() {
            if (this.result.birth_date) {
                let Array1 = this.result.birth_date.split("-");
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
        this.$store.dispatch('LoadReultResume');
        this.getPdf();
    },
    beforeDestroy: function () {
    },
    watch: {
        leftBOxColor() {
            this.applyLeftCSS();
        },

        rightBoxColor() {
            this.applyRightCSS();
        },
        result() {
            this.hieghtDiv();
        }
    },

    methods: {
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
        setDefault () {
            this.activeColor = '#fdd60d'
            this.labelColor = '#ffe174'
            this.leftBOxColor =  '#ffe174'
            this.rightBoxColor = '#ee7057'
            this.saveChanges();
        },
        hieghtDiv() {
            setTimeout(function () {
                var offsetHeight = document.getElementById('box-pdf').offsetHeight;

            }, 200);
        },
        applyLeftCSS() {
            let nodeId = "headsr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `.banner:before { border-left-color: ${this.leftBOxColor} !important}`;
            style.innerHTML = cssRule;
        },
        applyRightCSS() {
            let nodeId = "head_sr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `.banner:after { border-right-color: ${this.rightBoxColor} !important}`;
            style.innerHTML = cssRule;
        },
        createPDF() {
            window.scrollTo(0, 0);
            this.saveChanges();
            var element = document.getElementById('content');
            var opt = {
                margin: 0,

                filename: `myPdf.pdf`,

                image: {
                    type: 'jpeg',
                    quality: 0.98
                },

                enableLinks: false,

                html2canvas: {
                    scale: 2,
                    useCORS: true
                },

                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf(element, opt);
        },
        saveChanges() {
            this.loadingB = true;
            this.loadingText = true;
            let form = {
                'themeNumber': 2,
                'changes': {
                    'labelColor': this.labelColor,
                    'activeColor': this.activeColor,
                    'leftBOxColor': this.leftBOxColor,
                    'rightBoxColor': this.rightBoxColor,
                    'titleSize': this.titleSize,
                    'subtitleSize': this.subtitleSize,
                    'textSize': this.textSize
                }
            }
              return new Promise((resolve, reject) => {
                Axios.post('api/v1/member/pdfChanges', form)
                    .then(success => {

                        resolve(success)
                    })
                    .catch(({error, status}) => {
                        reject(error)
                    })
                    .finally(() => {
                        this.loadingB = false;
                        this.loadingText = false;
                    })
              });
        },
        getPdf() {

            let form = {
                'themeNumber': 2,
            }
            Axios.post('api/v1/member/getPdf', form)
                .then(res => {
                    let changes = JSON.parse(res.data.options)
                    this.activeColor = changes.activeColor
                    this.leftBOxColor = changes.leftBOxColor
                    this.rightBoxColor = changes.rightBoxColor
                    this.labelColor = changes.labelColor
                    // this.subtitleSize = changes.subtitleSize
                    // this.textSize = changes.textSize
                    // this.titleSize = changes.titleSize
                })
                .catch(({error, status}) => {
                    console.log(error)

                });
        }
    }
}

</script>

<style scoped>
.centerd-box  {
    display: flex;
    justify-content: center;
}
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
    box-shadow: #79c34d 0px 1px 0px inset;
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
    width: 210mm;
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
    border-left-color: #ffe174;
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
    background: #ffe174;
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
    background: #ffe174;
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
    width: 90%;
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

@media only screen and (max-width: 600px) {
    .container {
        width: 180mm;
    }
}

@media only screen and (max-width: 570px) {
    .container {
        width: 120mm;
    }

    .header {
        text-align: center;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-flow: column;
    }

    .name-job-desc h1, .other-infos {
        position: relative;
        top: 0;
        right: 0;
        left: 0
    }
}

@media only screen and (max-width: 486px) {
    .container {
        width: 93mm;
    }
}

@media only screen and (max-width: 370px) {
    .container {
        width: 82mm;
    }
}
</style>
