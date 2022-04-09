<template>
    <div class="body-pdf">
        <div class="row col-12">
            <div style="margin: auto ;margin-top: 60px;">
                <div style="width: 218mm;" class="">
                    <div class="row">
                        <div style="padding-left: 0px;" class="col-8">
                            <Form style="background: #fff;padding: 7px;" ref="UpdateProject">
                                <div class="">
                                    <div class="row">
                                        <div class="col-6 center-box-form">
                                            <span style="margin-left: 6px;">رنگ متن</span>
                                            <v-swatches
                                                v-model="activeColor"
                                                :swatches="swatches"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-6 center-box-form">
                                            <span style="margin-left: 6px;">رنگ زمینه</span>
                                            <v-swatches
                                                v-model="backColor"
                                                :swatches="swatches"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-6 center-box-form">
                                            <span style="margin-left: 6px;">رنگ قالب</span>
                                            <v-swatches
                                                v-model="themeColor"
                                                popover-x="left"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                                :swatches="swatches"
                                            ></v-swatches>
                                        </div>
                                        <div class="col-6 center-box-form">
                                            <span style="margin-left: 6px;">رنگ اجزا</span>
                                            <v-swatches
                                                v-model="detailColor"
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
                        <div style="padding-right: 9px;" class="col-4">
                            <button @click="createPDF" class="btn-pdf">
                                <Loadingbutton :loading="loadingB"/>
                                <span v-if="loadingText === true"></span>
                                <span v-else>دریافت فایل pdf</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div ref="content" id="content">
                    <div class="container" style="height: 483.312mm;" :style="{background : backColor}">
                        <div class="row">
                            <div class="smbox col-narrow" :style="{background : themeColor , color : activeColor}">
                                <div class="border" :style="{ background : detailColor} "></div>
                                <div class="pic-thumb" :style="{borderColor : themeColor }">
                                    <div class="user-image" v-if="result.image" :style="{backgroundImage: 'url(/images/company/' + result.image + ')'}" ></div>
                                    <div class="user-image" v-else style="background-image: url(/images/company/no-photo.jpg);" ></div>
                                </div>
                            </div>
                            <div class="lgbox col-wide sortable-cv-items">
                                <div class="contact-info not-drag">
                                    <h1 class="not-drag" :style="{color : activeColor}">{{result.name}} {{result.last_name}}</h1>
                                    <h2 class="job-title not-drag" :style="{ color : detailColor}" v-if="result.job"> {{result.job.title}}  </h2>
                                    <div class="other-infos not-drag">
                                        <div :style="{color : activeColor}" class="basic__birthday" v-if="birthDate">
                                            <span>  متولد  <span>:</span></span>
                                            <span>{{birthDate}} </span>
                                        </div>
                                        <div v-if="result.marital_status " class="basic__marital" :style="{color : activeColor}" >
                                            <span>   وضعیت تاهل <span>:</span></span>
                                            <span v-if="result.marital_status == 1 ">متاهل</span>
                                            <span v-if="result.marital_status == 2 ">مجرد</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="not-drag">
                                    <div class="infoo info">
                                        <div class="contact-item contact__email" v-if="result.email">
                                            <span>
                                                 <Icon :style="{color : themeColor}" style="margin-right: -3px;margin-top: -8px; font-size: 18px;" type="ios-mail"/>
                                            </span>
                                            <span :style="{color : activeColor}">ایمیل :</span>
                                            <span dir="ltr" :style="{color : activeColor}"> {{result.email}} </span>
                                        </div>
                                        <div class="contact-item contact__mobile" v-if="result.mobile">
                                            <span>
                                                 <Icon :style="{color : themeColor}" style="margin-right: -3px;margin-top: -8px; font-size: 18px;" type="ios-phone-portrait"/>
                                            </span>
                                            <span :style="{color : activeColor}">موبایل :</span>
                                            <span :style="{color : activeColor}" dir="ltr"> {{result.mobile}} </span>
                                        </div>
                                        <div class="contact-item contact__phone" v-if="result.phone">
                                            <span>
                                                 <Icon :style="{color : themeColor}" style="margin-right: -3px;margin-top: -8px;font-size: 18px;" type="ios-call"/>
                                            </span>
                                            <span :style="{color : activeColor}">تلفن :</span>
                                            <span :style="{color : activeColor}" dir="ltr"> {{result.phone}}</span>
                                        </div>
                                        <div class="contact-item contact__website" v-if="result.site">
                                            <span>
                                                <Icon :style="{color : themeColor}" style="margin-right: -3px;margin-top: -8px;font-size: 18px;" type="ios-radio"/>
                                            </span>
                                            <span :style="{color : activeColor}">وبسایت  :</span>
                                            <span :style="{color : activeColor}" dir="ltr">{{result.site}}</span>
                                        </div>
                                        <div class="contact-item contact__city" v-if="result.province || result.city || result.address">
                                            <span>
                                                 <Icon :style="{color : themeColor}" style="margin-right: -3px;margin-top: -8px;font-size: 18px;" type="ios-pin"/>
                                            </span>
                                            <span :style="{color : activeColor}">آدرس  :</span>
                                            <span :style="{color : activeColor}" dir="ltr">
                                                <i v-if="result.province">{{ result.province.title }} - </i>
                                                <i v-if="result.city">{{ result.city.title }} -</i>
                                                 {{ result.address }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="not-drag" v-if="result.comment">
                                    <div class="property-item basic__about">
                                        <div class="property-item_head">
                                            <label :style="{color : themeColor}" style="background: none !important" > درباره من </label>
                                        </div>
                                        <div class="property-item_body">
                                            <p :style="{color : activeColor}" class="about-us">{{result.comment}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-item education__list"
                                     v-if="result.record_studies && result.record_studies.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" >  سوابق تحصیلی</label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history multi-line">
                                            <li v-for="(item , index ) in result.record_studies" :key="index">
                                                <h2 :style="{color : activeColor}"  class="subtitle"><span v-if="item.document">{{item.document.title}}</span> {{item.Field_Study}}</h2>
                                                <h2 :style="{color : activeColor}"  class="subtitle" v-if="item.orientation"> گرایش <span>:</span> {{item.orientation}}</h2>
                                                <h3 :style="{color : activeColor}"  class="subtitle">
                                                    " {{item.title_institutes}} "
                                                    <label v-if="item.institutes">{{item.institutes.title}}</label>
                                                </h3>
                                                <label :style="{color : activeColor}"  class="date" v-if="item.Studying == 1">{{item.entering_year}}  آغار  از سال </label>
                                                <label :style="{color : activeColor}"  class="date" v-else>{{item.entering_year}} - {{item.year_departure}}</label>
                                                <label :style="{color : activeColor}"  class="Education-Grade" v-if="item.average"> معدل  <span>:</span> {{item.average}}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item experience__list"
                                     v-if="result.record_jobs && result.record_jobs.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" > سوابق شغلی  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history multi-line">
                                            <li v-for="(item , index ) in result.record_jobs" :key="index">
                                                <h2 :style="{color : activeColor}" class="subtitle"> {{ item.job_side }} </h2>
                                                <h3  :style="{color : activeColor}" class="subtitle"> <span v-if="item.center_job"> {{item.center_job.title}} </span><span>:</span> {{item.title_center_job}}</h3>
                                                <label :style="{color : activeColor}" class="date" v-if="item.end">   {{item.start}} - {{item.end}}  </label>
                                                <label :style="{color : activeColor}" class="date" v-else> آغاز همکاری از  {{item.start}}</label>
                                                <label v-if="item.comment" :style="{color : activeColor}" class="exp-desc-title">وظایف و دستاوردها <span>:</span></label>
                                                <ul :style="{color : activeColor}" class="exp-desc">
                                                    {{item.comment}}
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item skill__list"
                                     v-if="result.exprimentas && result.exprimentas.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" > مهارت ها  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <div class="bar-progress item-row w0">
                                            <ul class="history">
                                                <li  v-for="(item , index ) in result.exprimentas" :key="index">
                                                    <span>
                                                        <label :style="{color : activeColor}"> {{item.name}}</label>
                                                        <label class="grade">
                                                            <i v-for="index in   parseInt(item.level)" class="tik"  :style="{ background : themeColor  , borderColor : themeColor}"></i>
                                                            <i v-for="index in  5 - parseInt(item.level)"></i>
                                                        </label>
                                                    </span>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-item language__list"
                                     v-if="result.languages && result.languages.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" > زبان ها  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <div class="circle-progress">
                                            <div class="circle-progress__item">
                                                <ul class="history">
                                                    <li v-for="(item , index ) in result.languages" :key="index">
                                                        <h2 class="subtitle language-item"
                                                            v-if="item.lang_id"
                                                            :style="{color : activeColor}">
                                                            {{item.lang_id.title}}
                                                        </h2>
                                                        <div class='c100 small' :class=" 'p'+item.read * 20">
                                                            <span>{{item.read * 20 }} %</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <div class="circle-progress__title"   :style="{color : activeColor}"  >مهارت حواندن</div>
                                                        </div>
                                                        <div class="c100 small" :class=" 'p'+item.say * 20">
                                                            <span>{{item.say * 20}} %</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <div class="circle-progress__title"  :style="{color : activeColor}" >مهارت گفتن</div>
                                                        </div>
                                                        <div class="c100 small" :class=" 'p'+item.listen * 20">
                                                            <span>{{item.listen * 20}} %</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <div  class="circle-progress__title" :style="{color : activeColor}">مهارت شنیدن</div>
                                                        </div>
                                                        <div class="c100 small" :class=" 'p'+item.listen * 20">
                                                            <span>{{item.write * 20}} %</span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <div  class="circle-progress__title" :style="{color : activeColor}">مهارت نوشتن</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-item certificate__list"
                                     v-if="result.certificates && result.certificates.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" >  دوره ها و گواهینامه  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history one-line">
                                            <li v-for="(item , index ) in result.certificates" :key="index">
                                                <h2   :style="{color : activeColor}" class="subtitle bidirectional"> <span v-if="item.certificate"> {{item.certificate.title}}</span> {{item.title}}</h2>
                                                <h3   :style="{color : activeColor}" class="subtitle">{{item.Institute}}</h3>
                                                <label  :style="{color : activeColor}" class="date" v-if="item.date">
                                                    <label class="text-date">
                                                        تاریخ
                                                        <span>:</span>
                                                    </label>
                                                    "{{item.date}}"
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item research__list"
                                     v-if="result.articles && result.articles.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" >  تحقیفات </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history one-line">
                                            <li  v-for="(item , index ) in result.articles" :key="index">
                                                <h2 :style="{color : activeColor}" class="subtitle bidirectional"> <span v-if="item.effect">{{item.effect.title}}</span>   {{item.title}}</h2>
                                                <h3 :style="{color : activeColor}" class="subtitle">
                                                    ناشر <span>:</span>
                                                    <span>{{item.publisher}}</span>
                                                </h3>
                                                <label :style="{color : activeColor}" class="date" v-if="item.date">
                                                    <label class="text-date" >
                                                        تاریخ
                                                        <span>:</span>
                                                    </label>
                                                    "{{item.date}}"
                                                </label>
                                                <p class="project-link" v-if="item.link">
                                                    <span :style="{color : activeColor}">لینک مربوطه</span>
                                                    <a href="#" :style="{ color : themeColor }" target="_blank">{{item.link}}</a>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item project__list"
                                     v-if="result.projects && result.projects.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" > پروژه ها  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history one-line">
                                            <li  v-for="(item , index ) in result.projects" :key="index">
                                                <h2  :style="{color : activeColor}"  class="subtitle bidirectional"> {{item.title}} </h2>
                                                <h3  :style="{color : activeColor}"  class="subtitle" v-if="item.company">
                                                    کارفرما <span>/</span> درخواست کننده <span>:</span> {{item.company}}
                                                </h3>
                                                <label  :style="{color : activeColor}"  class="date" v-if="item.date">
                                                    <label class="text-date">
                                                        تاریخ
                                                        <span>:</span>
                                                    </label>
                                                    "{{item.date}}"
                                                </label>
                                                <p class="project-link" v-if="item.link">
                                                   <span :style="{color : activeColor}">لینک مربوطه</span>
                                                    <a  href="#"  :style="{ color : themeColor }" target="_blank">{{item.link}}</a>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item honor__list"
                                     v-if="result.honors && result.honors.length != 0">
                                    <div class="property-item_head">
                                        <label :style="{color : activeColor}" > افتخارات  </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history list-item">
                                            <li v-for="(item, index ) in result.honors" :key="index">

                                                <p  :style="{color : activeColor}"  class="bidirectional">
                                                    {{item.title}}
                                                </p>
                                                <label  :style="{color : activeColor}"  class="date" v-if="item.date">
                                                    <label class="text-date">
                                                        تاریخ
                                                        <span>:</span>
                                                    </label>
                                                    "{{item.date}} "
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-item social__list"
                                     v-if="result.social_networks && result.social_networks.length != 0">
                                    <div class="property-item_head">
                                        <label  style="word-spacing: -3px" :style="{color : activeColor}" >  شبکه های اجتماعی </label>
                                    </div>
                                    <div class="property-item_body">
                                        <ul class="history">
                                            <li v-for="(item , index ) in result.social_networks" :key="index">
                                                <span v-if="item.social_network.id == 1">
                                                    <label>
                                                       <Icon type="ios-send" :style="{ color : themeColor }"/>
                                                    </label>
                                                    <label style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link" :style="{color : activeColor}"  target="_blank">{{item.link}}</a>
                                                    </label>
                                                </span>
                                                <span v-else-if="item.social_network.id == 2">
                                                    <label>
                                                        <Icon type="logo-instagram"  :style="{ color : themeColor }"/>
                                                    </label>
                                                    <label  style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link" :style="{color : activeColor}"  target="_blank">{{item.link}}</a>
                                                    </label>
                                                </span>

                                                <span v-else-if="item.social_network.id == 3">
                                                    <label>
                                                       <Icon type="logo-youtube"  :style="{ color : themeColor }"/>
                                                    </label>
                                                    <label  style="direction:ltr ; text-align :left;">
                                                        <a   href="" class="social-link" :style="{color : activeColor}" target="_blank">{{item.link}}</a>
                                                    </label>
                                                </span>
                                                <span v-else-if="item.social_network.id == 4">
                                                    <label>
                                                        <Icon type="logo-twitter" :style="{ color : themeColor }"/>
                                                    </label>
                                                    <label  style="direction:ltr ; text-align :left;">
                                                        <a  href="" class="social-link" :style="{color : activeColor}" target="_blank">{{item.link}}</a>
                                                    </label>
                                                </span>
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


</template>

<script>



import html2pdf from 'html2pdf.js'
import VSwatches from 'vue-swatches'
import Axios from  'axios'

export default {

    components: {
        VSwatches
    },
    data(){
        return{
            activeColor : '#fff' ,
            backColor : '#002b34',
            themeColor : '#fdd60d'  ,
            detailColor : '#ff8700' ,
            swatches: [
                ['#F64272', '#F6648B', '#F493A7', '#F891A6', '#FFCCD5'],
                ['#8b5aff', '#a27bff', '#b99cff', '#d0bdff', '#e8deff'],
                ['#51e5db', '#74ebe3', '#96f0ea', '#b9f5f1', '#dcfaf8'],
                ['#ffa51a', '#ffb748', '#ffc976', '#ffdba3', '#ffedd1'] ,
                ['#000000', '#002b34', '#6b6b6b', '#888888', '#9c9c9c']
            ] ,
            loadingB: false,
            loadingText: false,
        }
    },

    watch: {
        themeColor ( )  {
            this.applyThemeCSS()
        } ,
        detailColor () {
            this.applyDetailCss()
        }
    },
    computed:{
        result() { return this.$store.state.BaseRezome.result} ,
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

    created(){
        this.$store.dispatch('LoadReultResume');
        this.getPdf()
    },
    methods: {
        applyThemeCSS() {
            let nodeId = "headddsr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `ul.history h2.subtitle::before { background: ${this.themeColor} !important}ul.list-item li p::before { background: ${this.themeColor} !important}.c100 > span { color: ${this.themeColor} !important}.lgbox.col-wide{ border-left-color : ${this.themeColor} !important }.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill{border-color :  ${this.themeColor} !important}`;
            style.innerHTML = cssRule;
        },
        applyDetailCss() {
            let nodeId = "headdddsr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `.property-item_head label::before { border-left-color: ${this.detailColor} !important ; border-right-color : ${this.detailColor} !important ; }`;
            style.innerHTML = cssRule;

        },
        createPDF () {
            this.saveChanges()
            var element = document.getElementById('content');
            var opt = {
                margin:       0,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2},
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            // New Promise-based usage:
            html2pdf(element, opt);
        } ,
        saveChanges() {
            this.loadingB = true;
            this.loadingText = true;
            let form = {
                'themeNumber': 4,
                'changes': {
                    'activeColor': this.activeColor,
                    'backColor': this.backColor,
                    'themeColor': this.themeColor,
                    'detailColor': this.detailColor,
                }
            }
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
        },
        getPdf() {

            let form = {
                'themeNumber': 4,
            }
            Axios.post('api/v1/member/getPdf', form)
                .then(res => {
                    let changes = JSON.parse(res.data.options)
                    console.log(changes)
                    this.activeColor = changes.activeColor
                    this.backColor = changes.backColor
                    this.detailColor = changes.detailColor
                    this.themeColor = changes.themeColor
                })
                .catch(({error, status}) => {
                    console.log(error)

                });
        }
    }
}

</script>

<style scoped>
i {
    font-style: normal;
}
.center-box-form {
    display: flex !important;
    align-items: center !important;
    justify-content: center;
}

.btn-pdf {
    height: 100%;
    width: 100%;
    border: 0px;
    box-shadow: #79c34d 0px 1px 0px inset;
    color: white;
    background: #79c34d;
}
.body-pdf {
    background-color: #2d2d2d !important;
    background: #2d2d2d !important;
}

.container {
    width: 218mm;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    background: #002b34;
    height: 100%;
    position: relative;
    box-shadow: 0 0 6px -2px #000;
    margin: 0 auto;
    min-height: 297mm;
}
.row {
    height: 100%;
}
.smbox {
    background-color: #ffc300;
    width: 10%;
    height: 100%;
    box-sizing: border-box;
    float: right;
    margin-right: 60px;
    overflow: hidden;
}
.border {
    width: 155px;
    height: 155px;
    background: #ff8700;
    position: relative;
    top: 28px;
    -webkit-transform: rotate(45deg);
    right: -39px;
    border-radius: 15px;
}
.pic-thumb {
    width: 112px;
    height: 115px;
    background: transparent;
    position: absolute;
    -webkit-transform: rotate(45deg);
    top: 40px;
    right: 33px;
    overflow: hidden;
    border: 8px solid #ffc300;
    border-radius: 15px;
}
div.user-image {
    background-image: url(/content/pic/download.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 110px;
    width: 110px;
    -webkit-box-sizing: border-box;
    border-radius: 100%;
    margin: AUTO;
    position: relative;
    z-index: 1;
}
div.user-image {
    box-shadow: 0 1px 1px;
    -webkit-transform: rotate(-45deg);
    height: 150%;
    width: 150%;
    border-radius: 0;
    right: -30%;
    top: -20%;
    background-size: contain;
}
.lgbox.col-wide {
    width: 81%;
    height: 100%;
    float: left;
    border-left: 5px solid #ffc300;
    padding-bottom: 0;
}
.contact-info {
    display: inline-block;
    float: right;
    width: 49%;
    margin-top: 50px;
}
h1 {
    color: #f3f3f3;
    font-size: 20px;
    display: inline-block;
    margin-top: 0px;
    margin-bottom: 5px;
    margin-right: 50px;
    width: 87mm;
}
h2.job-title {
    color: #ff8700;
    font-size: 13px;
    margin-right: 50px;
    margin-top: 0;
    display: inline-block;
    width: 60mm;
}
.other-infos {
    color: #c1ced0;
    display: block;
    position: relative;
    right: 50px;
}
.other-infos > div {
    display: block;
    font-size: 11px;
}
.contact-item {
    margin-bottom: 3px;
}
div.contact-item span:first-child {
    display: inline-block;
    width: 20px;
    height: 21px;
    text-align: center;
    line-height: 18px;
    border-radius: 50%;
    color: #ffc300;
    border: 1px solid #f8f8f8;
    font-size: 12px;
    margin-left: 10px;
    padding: 3px;
}
.contact-item span:nth-child(2) {
    display: none;
}
.infoo div span:last-child {
    display: inline-block;
    width: 210px;
    text-align: right;
    vertical-align: text-top;
    font-size: 11px;
}
.contact-item.contact__email span:last-child {
}
.infoo {
    display: inline-block;
    width: 80mm;
    float: left;
    color: #aec0c3;
    position: relative;
    font-size: 12px;
    margin-top: 50px;
}
.property-item {
    float: right;
    padding-bottom: 20px;
    border-bottom: 1px solid #7a7667;
    width: 152mm;
    margin-right: 20px;
    padding-right: 10px;
    padding-left: 15px;
}
.property-item.basic__about {
    margin-top: 20px;
}
.basic__about .property-item_head {
    text-align: right;
    width: 95%;
    padding-top: 0;
    border-bottom: 0;
    margin-right: 0;
    position: initial;
}
.property-item_head span {
    display: none;
}
.property-item_head label {
    border-bottom: 0;
    position: absolute;
    right: -135px;
    font-weight: bold;
    background: #335300;
    padding: 3px 8px 3px 20px;
    text-align: center;
    border-top-left-radius: 40px;
    color: #e7fdff;
    font-size: 13px;
    width: 28mm;
    height: 9mm;
}
.basic__about .property-item_head label {
    border-bottom: 0;
    color: #ffc300;
    position: initial;
    background: #002b34 !important;
    padding: initial;
}
.basic__about .property-item_head label {
    border-bottom: 0;
    color: #ffc300;
    position: initial;
    background: #002b34 !important;
    padding: initial;
}
.property-item_body > *:first-child {
    margin: 0;
    margin-top: 0;
    font-size: 14px;
    padding: 0 15px;
}
p.about-us {
    color: #c1ced0;
    font-size: 11px !important;
    line-height: 25px;
    text-align: right;
    padding-right: 0 !important;
}
.property-item_head label {
    border-bottom: 0;
    position: absolute;
    right: -135px;
    font-weight: bold;
    background: #335300;
    padding: 3px 8px 3px 20px;
    text-align: center;
    border-top-left-radius: 40px;
    color: #e7fdff;
    font-size: 13px;
    width: 28mm;
    height: 9mm;
    background: #1f6574 !important;
    line-height: 2.2em;
    min-width: 130px;
}
.property-item_head label:before {
    content: '';
    position: absolute;
    border-bottom: 11px solid transparent;
    border-left: 79.5px solid #ff8700;
    border-right-color: #ff8700;
    top: 34.5px;
    right: 25.5px;
}
.property-item_head label:after {
    content: '';
    position: absolute;
    right: 2px;
    top: -7px;
    border-right: 21px solid #002b34;
    border-bottom: 7px solid #528600;
    border-bottom-color: #2b8cb2 !important;
}
.basic__about .property-item_head label:before {
    display : none
}
.basic__about .property-item_head label:after {
    display : none
}
.property-item_body {
    padding: 10px 0 5px;
    width: 100%;
    box-sizing: border-box;
}
.property-item_head {
    font-size: 1.1rem;
    border-bottom: 1px solid #147cbe;
    text-align: center;
    width: 50%;
    margin: AUTO;
    clear: both;
    padding-top: 15px;
}
.property-item_head {
    text-align: right;
    width: 100%;
    border-bottom: 0;
    position: relative;
}
ul.history, ul.list-item {
    list-style-type: circle;
    padding-right: 0;
    float: right;
    margin-top: 0 !important;
    width: 100%;
}
ul.history {
    width: 154mm;
    padding-right: 0 !important;
}
.multi-line li {
    width: 100%;
}
ul.history li {
    float: right;
    list-style: none;
    box-sizing: border-box;
    padding-right: 0;
    margin: 0;
    min-height: 60px;
}
ul.history li {
    position: relative;
    margin-bottom: 10px;
    padding-right: 30px;
    min-height: 40px;
}
ul.history h2.subtitle {
    margin: 0;
    font-size: 13px;
    margin-bottom: 10px;
    margin-top: 10px;
    font-weight: 700;
    color: inherit;
}
ul.history h2.subtitle {
    font-weight: normal;
    color: #ffffff;
    position: relative;
    width: 100mm;
    font-size: 12px;
}
ul.history h2.subtitle:before {
    content: '';
    position: absolute;
    font-size: 7px;
    width: 6px;
    height: 6px;
    background: #ffc300;
    border-radius: 50%;
    right: -15px;
    top: 8px;
}
ul.history h3.subtitle {
    margin: 0;
    font-size: 12px;
    margin-bottom: 2px;
}
ul.history h3.subtitle {
    color: #ffffff;
    font-size: 11px;
}
label.date {
    position: absolute;
    left: 0;
    top: -3px;
    background: transparent;
    padding: 3px 8px;
    border-radius: 10px;
    color: #c1ced0;
    font-size: 11px !important;
    width: 44mm;
    text-align: left;
}
ul.history label.date {
    font-size: 11px;
    margin-top: 5px;
}
label.Education-Grade {
    color: #ffffff;
    font-size: 11px;
}
label.exp-desc-title {
    display: block;
    font-size: 11px;
    padding: 5px 0;
    border-bottom: 1px dotted #808080;
    width: 90%;
    margin-bottom: 5px;
    font-weight: bold;
}
label.exp-desc-title {
    font-size: 10px;
    color: #ffffff;
    font-weight: normal;
}
ul.exp-desc {
    padding: 0;
    float: right;
    padding-right: 0px;
    width: 90%;
    box-sizing: border-box;
}
.skill__list ul.history li {
    min-height: 10px;
    width: 74mm;
    padding-right: 0;
    margin-bottom: 0;
}
.item-row.w0 li > span {
    width: 100%;
    height: auto;
    padding-left: 0;
    margin: 10px 0;
}
div.item-row li > span label {
    line-height: 24px;
    height: 100%;
    font-size: 10px;
    display: block;
    float: right;
}
div.item-row li > span label:first-child {
    float: right;
    color: #fff;
    background: #575757;
    display: block;
    padding: 0 6px;
    border-radius: 2px;
    margin-left: 5px;
}
div.item-row li > span label:first-child {
    background: transparent;
}
div.item-row li > span label:first-child {
    width: 43mm;
    height: auto;
    font-size: 10px;
}
.property-item.skill__list .grade {
    display: block;
    float: left;
}
div.item-row li > span label.grade i {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    margin: 7px 1px;
    background: #c7c7c7;
    box-sizing: border-box;
    display: block;
    float: right;
}
div.item-row li > span label.grade i {
    border: 1px solid #ffc300;
    background: #002b34;
    width: 8px;
    height: 8px;
    border-radius: 0;
    -webkit-transform: rotate(45deg) skew(-3deg);
    margin: 7px 4px;
}
div.item-row li > span label.grade i.tik {
    background: #ffc300;
}
.language__list .circle-progress {
    display: block;
    float: right;
    width: 100%;
}
.circle-progress__item {
    float: right;
    width: 100%;
}
.language__list ul.history li {
    width: 50%;
    height: 100px;
}
.c100 {
    position: relative;
    font-size: 120px;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    float: left;
    margin: 0 .1em .1em 0;
    background-color: #ccc;
}
.c100.small {
    font-size: 42px;
    float: right;
    margin: 0 11px;
}
.c100 > span {
    position: absolute;
    width: 100%;
    z-index: 1;
    left: 0;
    top: 0;
    width: 5em;
    line-height: 5em;
    font-size: .2em;
    color: #ccc;
    display: block;
    text-align: center;
    white-space: nowrap;
    -webkit-transition-property: all;
    -moz-transition-property: all;
    -o-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -o-transition-duration: .2s;
    transition-duration: .2s;
    -webkit-transition-timing-function: ease-out;
    -moz-transition-timing-function: ease-out;
    -o-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
}
.c100 > span {
    color: #ffc300;
    font-size: 11px;
    right: -7px;
    top: -5px;
}
.rect-auto, .c100.p51 .slice, .c100.p52 .slice, .c100.p53 .slice, .c100.p54 .slice, .c100.p55 .slice, .c100.p56 .slice, .c100.p57 .slice, .c100.p58 .slice, .c100.p59 .slice, .c100.p60 .slice, .c100.p61 .slice, .c100.p62 .slice, .c100.p63 .slice, .c100.p64 .slice, .c100.p65 .slice, .c100.p66 .slice, .c100.p67 .slice, .c100.p68 .slice, .c100.p69 .slice, .c100.p70 .slice, .c100.p71 .slice, .c100.p72 .slice, .c100.p73 .slice, .c100.p74 .slice, .c100.p75 .slice, .c100.p76 .slice, .c100.p77 .slice, .c100.p78 .slice, .c100.p79 .slice, .c100.p80 .slice, .c100.p81 .slice, .c100.p82 .slice, .c100.p83 .slice, .c100.p84 .slice, .c100.p85 .slice, .c100.p86 .slice, .c100.p87 .slice, .c100.p88 .slice, .c100.p89 .slice, .c100.p90 .slice, .c100.p91 .slice, .c100.p92 .slice, .c100.p93 .slice, .c100.p94 .slice, .c100.p95 .slice, .c100.p96 .slice, .c100.p97 .slice, .c100.p98 .slice, .c100.p99 .slice, .c100.p100 .slice {
    clip: rect(auto,auto,auto,auto);
}
.c100 .slice {
    position: absolute;
    width: 1em;
    height: 1em;
    clip: rect(0em,1em,1em,0.5em);
}
.c100.p60 .bar {
    -webkit-transform: rotate(216deg);
    -moz-transform: rotate(216deg);
    -ms-transform: rotate(216deg);
    -o-transform: rotate(216deg);
    transform: rotate(216deg);
}

.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
    border: 0.08em solid #ffc300;
}

.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
    position: absolute;
    width: .84em;
    height: .84em;
    clip: rect(0em,0.5em,1em,0em);
    border-radius: 50%;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
}
.c100 *, .c100 *:before, .c100 *:after {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}
.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
    border: 0.08em solid #ffc300;
}
.pie-fill, .c100.p51 .bar:after, .c100.p51 .fill, .c100.p52 .bar:after, .c100.p52 .fill, .c100.p53 .bar:after, .c100.p53 .fill, .c100.p54 .bar:after, .c100.p54 .fill, .c100.p55 .bar:after, .c100.p55 .fill, .c100.p56 .bar:after, .c100.p56 .fill, .c100.p57 .bar:after, .c100.p57 .fill, .c100.p58 .bar:after, .c100.p58 .fill, .c100.p59 .bar:after, .c100.p59 .fill, .c100.p60 .bar:after, .c100.p60 .fill, .c100.p61 .bar:after, .c100.p61 .fill, .c100.p62 .bar:after, .c100.p62 .fill, .c100.p63 .bar:after, .c100.p63 .fill, .c100.p64 .bar:after, .c100.p64 .fill, .c100.p65 .bar:after, .c100.p65 .fill, .c100.p66 .bar:after, .c100.p66 .fill, .c100.p67 .bar:after, .c100.p67 .fill, .c100.p68 .bar:after, .c100.p68 .fill, .c100.p69 .bar:after, .c100.p69 .fill, .c100.p70 .bar:after, .c100.p70 .fill, .c100.p71 .bar:after, .c100.p71 .fill, .c100.p72 .bar:after, .c100.p72 .fill, .c100.p73 .bar:after, .c100.p73 .fill, .c100.p74 .bar:after, .c100.p74 .fill, .c100.p75 .bar:after, .c100.p75 .fill, .c100.p76 .bar:after, .c100.p76 .fill, .c100.p77 .bar:after, .c100.p77 .fill, .c100.p78 .bar:after, .c100.p78 .fill, .c100.p79 .bar:after, .c100.p79 .fill, .c100.p80 .bar:after, .c100.p80 .fill, .c100.p81 .bar:after, .c100.p81 .fill, .c100.p82 .bar:after, .c100.p82 .fill, .c100.p83 .bar:after, .c100.p83 .fill, .c100.p84 .bar:after, .c100.p84 .fill, .c100.p85 .bar:after, .c100.p85 .fill, .c100.p86 .bar:after, .c100.p86 .fill, .c100.p87 .bar:after, .c100.p87 .fill, .c100.p88 .bar:after, .c100.p88 .fill, .c100.p89 .bar:after, .c100.p89 .fill, .c100.p90 .bar:after, .c100.p90 .fill, .c100.p91 .bar:after, .c100.p91 .fill, .c100.p92 .bar:after, .c100.p92 .fill, .c100.p93 .bar:after, .c100.p93 .fill, .c100.p94 .bar:after, .c100.p94 .fill, .c100.p95 .bar:after, .c100.p95 .fill, .c100.p96 .bar:after, .c100.p96 .fill, .c100.p97 .bar:after, .c100.p97 .fill, .c100.p98 .bar:after, .c100.p98 .fill, .c100.p99 .bar:after, .c100.p99 .fill, .c100.p100 .bar:after, .c100.p100 .fill {
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    transform: rotate(180deg);
}

.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
    position: absolute;
    width: .84em;
    height: .84em;
    clip: rect(0em,0.5em,1em,0em);
    border-radius: 50%;

}
.circle-progress__title {
    font-size: 11px;
    position: absolute;
    top: 88px;
    line-height: 14px;
    width: 100%;
    text-align: center;
}
.circle-progress__title {
    color: #d9d9d9;
    top: 50px;
    font-size: 11px;
    width: 72px;
    right: -18px;
    -webkit-transform: rotate(-20deg);
}
.c100:after {
    background: #002b34;
    left: 2px;
    top: 2px;
    width: 38px;
    height: 38px;
}
.c100:after {
    position: absolute;
    top: .08em;
    left: .08em;
    display: block;
    content: " ";
    border-radius: 50%;

    width: .84em;
    height: .84em;
    -webkit-transition-property: all;
    -moz-transition-property: all;
    -o-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -o-transition-duration: .2s;
    transition-duration: .2s;
    -webkit-transition-timing-function: ease-in;
    -moz-transition-timing-function: ease-in;
    -o-transition-timing-function: ease-in;
    transition-timing-function: ease-in;
}
.c100.p40 .bar {
    -webkit-transform: rotate(144deg);
    -moz-transform: rotate(144deg);
    -ms-transform: rotate(144deg);
    -o-transform: rotate(144deg);
    transform: rotate(144deg);
}
.c100.p80 .bar {
    -webkit-transform: rotate(288deg);
    -moz-transform: rotate(288deg);
    -ms-transform: rotate(288deg);
    -o-transform: rotate(288deg);
    transform: rotate(288deg);
}
ul.history.one-line li {
    width: 100%;
}
.certificate__list .property-item_head label {
    font-size: 10px;
    line-height: 30px;
}
p.project-link {
    font-size: 11px;
    color: #525252;
    margin-top: 0;
    margin-bottom: 5px;
}
p.project-link {
    color: #9ab1b6;
    font-size: 10px;
}
p.project-link a {
    text-decoration: none;
    word-break: break-word;
}
p.project-link a {
    color: #ffc300;
}
ul.list-item li p {
    border-right: 1px solid #eee;
    padding-right: 0;
    padding-left: 15px;
    margin: 0;
    font-weight: bold;
}
ul.list-item li p {
    font-size: 12px;
    color: #ffffff;
    font-weight: normal;
    border-right: 0;
    position: relative;
    width: 105mm;
    top: 6px;
}
ul.list-item li p:before {
    content: '';
    position: absolute;
    font-size: 7px;
    width: 6px;
    height: 6px;
    background: #ffc300;
    border-radius: 50%;
    right: -15px;
    top: 8px;
}
.property-item.social__list {
    border-bottom: 0;
    margin-top: 30px;
    padding-bottom: 0;
}
.social__list .property-item_head {
    display: block;
}
.social__list ul.history {
    margin-bottom: 0;
}
.social__list ul.history li {
    min-height: initial;
    margin-bottom: 0;
    padding-right: 0px;
}
.item-row.w0 li > span {
    width: 100%;
    height: auto;
    padding-left: 0;
    margin: 10px 0;
}
.property-item.social__list ul.history li span label:first-child {
    font-size: 16px;
    color: #ffc300;
    background: transparent;
    width: 5mm;
    text-align: center;
    line-height: 30px;
}
.property-item.social__list .fab {
    display: inline;
}
.property-item.social__list ul.history li span label:last-child {
    font-size: 15px;
    color: #334b63;
}

a.social-link {
    color: #232323;
    text-decoration: none;
    word-break: break-word;
}
a.social-link {
    color: #9ab1b6 ;
}
ul.history li{
    width: 100%
}
.property-item.social__list ul.history li{
    width : auto
}
.btn-position {
    position : fixed ;
    bottom  : 20px ;
    left : 50px
}
.vue-swatches__trigger__wrapper{
    position : fixed  !important;
    top: 50px !important ;
    right : 100px !important
}
label {
    direction: rtl;
}
.vue-swatches__trigger {
    border: 1px solid #000 !important;
}
</style>
