<template>
    <div class="body-pdf">
        {{ index }}
        <div class="col-12 row">
            <div class="row col-12">
                <div style="margin: auto ;margin-top: 60px;">
                    <div style="width: 218mm;" class="">
                        <div class="row">
                            <div style="padding-left: 0px;" class="col-8">
                                <Form style="background: #fff;padding: 7px;" ref="UpdateProject">
                                    <div
                                        style="display: flex !important;align-items: center !important;justify-content: center;"
                                        class=" row">
                                        <FormItem class="col-md-4" label="رنگ باکس چپ">
                                            <v-swatches
                                                v-model="leftBOxColor"
                                                popover-x="left"
                                                :swatches="swatches"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="رنگ باکس راست">
                                            <v-swatches
                                                v-model="rightBoxColor"
                                                popover-x="left"
                                                :swatches="swatches"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </FormItem>
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
                            <div id="box-pdf" class="box-pdf">
                                <div style="margin-right: 0px;margin-left: 0px;" class="row">
                                    <div class="smbox bluebox col-narrow sortable-cv-items"
                                         :style="{backgroundColor : rightBoxColor} ,ooo">
                                        <div class="contact-info_item not-drag">
                                            <div class="name-job-desc not-drag">
                                                <div class="user-image not-drag" v-if="result.image"
                                                     :style="{backgroundImage: 'url(/images/company/' + result.image + ')'}"></div>
                                                <div class="user-image not-drag" v-else
                                                     style="background-image: url(/images/company/no-photo.jpg);"></div>
                                                <h1 class="not-drag"
                                                    :style="{color : leftBOxColor , fontSize : titleSize}">
                                                    {{ result.name }} {{ result.last_name }}</h1>
                                                <h2 v-if="result.job" class="not-drag" :style="{fontSize : textSize}">
                                                    {{ result.job.title }} </h2>
                                                <div class="other-infos not-drag" :style="{fontSize : textSize}">
                                                    <div class="basic__birthday">
                                                        <span>متولد <span> : </span> </span>
                                                        <span>{{ birthDate }} </span>
                                                    </div>
                                                    <div class="basic__marital" :style="{fontSize : textSize}">
                                                        <span> وضعیت تاهل <span> : </span></span>
                                                        <span v-if="result.marital_status == 1 ">متاهل</span>
                                                        <span v-if="result.marital_status == 0 ">مجرد</span>
                                                    </div>
                                                    <div v-if="result.gens && result.gens.id != 2" class="basic_martial"
                                                         :style="{fontSize : textSize}">
                                                        <span> وضعیت سربازی <span> : </span></span>
                                                        <span v-if="result.soldier">{{ result.soldier.title }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="infoo not-drag">
                                            <div class="infoo info">
                                                <div class="infoo-head">
                                                    <label> اطلاعات تماس </label>
                                                </div>
                                                <div class="contact-item contact__email"
                                                     :style="{fontSize : subtitleSize}">
                                                <span>
                                                    <Icon style="font-size: 18px;" type="ios-mail"/>
                                                </span>
                                                    <span>ایمیل <span> : </span></span>
                                                    <span> {{ result.email }} </span>
                                                </div>
                                                <div class="contact-item contact__mobile"
                                                     :style="{fontSize : subtitleSize}">
                                                <span>
                                                    <Icon style="font-size: 18px;" type="ios-phone-portrait"/>
                                                </span>
                                                    <span>موبایل <span> : </span></span>
                                                    <span dir="ltr"> {{ result.mobile }} </span>
                                                </div>
                                                <div class="contact-item contact__phone"
                                                     :style="{fontSize : subtitleSize}">
                                                <span>
                                                    <Icon style="font-size: 18px;" type="ios-call"/>
                                                </span>
                                                    <span>تلفن <span> : </span></span>
                                                    <span dir="ltr"> {{ result.phone }}</span>
                                                </div>
                                                <div class="contact-item contact__website"
                                                     :style="{fontSize : subtitleSize}">
                                                <span>
                                                    <Icon style="font-size: 18px;" type="ios-radio"/>
                                                </span>
                                                    <span>وبسایت
                                                    <span> : </span>
                                                </span>
                                                    <span dir="ltr">{{ result.site }}</span>
                                                </div>
                                                <div class="contact-item contact__city"
                                                     :style="{fontSize : subtitleSize}">
                                                    <span><Icon style="font-size: 18px;" type="ios-pin"/></span>
                                                    <span dir="ltr">
                                                        <i v-if="result.province">
                                                            {{ result.province.title }} -
                                                        </i>
                                                         <i v-if="result.city">
                                                             {{ result.city.title }} -
                                                         </i>
                                                         {{result.address }}
                                                     </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-item skill__list"
                                             v-if="result.exprimentas && result.exprimentas.length != 0">
                                            <div class="property-item_head_right" id="head_board">
                                                <span :style="{backgroundColor : leftBOxColor}">
                                                    <i class="fa fa-lightbulb" style=""></i>
                                                </span>
                                                <label :style="{color : leftBOxColor , fontSize: titleSize}"> مهارت ها</label>
                                            </div>
                                            <div class="property-item_body">
                                                <div class="bar-progress item-row w0">
                                                    <ul class="history">
                                                        <li v-for="(item , index ) in result.exprimentas" :key="index">
                                                            <span
                                                                style="width: 100%;display: flex;align-items: center;">
                                                                <label
                                                                    :style="{backgroundColor : leftBOxColor , fontSize: textSize}"> {{
                                                                        item.name
                                                                    }}</label>
                                                                 <label style="margin-right: auto;margin-bottom: 0;"
                                                                        class="grade">
                                                                    <i v-for="(item , index) in item.level"
                                                                       class="tik"></i>
                                                                    <i :style="{backgroundColor : leftBOxColor}"
                                                                       v-for="(item , index) in 5 - item.level"></i>
                                                                </label>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-item language__list"
                                             v-if="result.languages && result.languages.length != 0">
                                            <div class="property-item_head_right">
                                                <span :style="{backgroundColor : leftBOxColor}">
                                                    <i class="fa fa-globe-americas"></i>
                                                </span>
                                                <label :style="{color : leftBOxColor , fontSize  :titleSize}"> زبان
                                                    ها</label>
                                            </div>
                                            <div class="property-item_body">
                                                <div class="item-row w4">
                                                    <ul class="history">
                                                        <li v-for="(item , index ) in result.languages" :key="index">
                                                            <h2 :style="{fontSize  :subtitleSize}" v-if="item.lang_id"
                                                                class="subtitle language-item">
                                                                {{ item.lang_id.title }}</h2>
                                                            <span>
                                                    <label :style="{fontSize  :textSize}">مهارت خواندن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.read" class="tik"></i>
                                                        <i :style="{backgroundColor : leftBOxColor}"
                                                           v-for="(item , index) in 5 - item.read"></i>
                                                    </label>
                                                </span>
                                                            <span>
                                                    <label :style="{fontSize  :textSize}">مهارت گفتن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.say" class="tik"></i>
                                                        <i :style="{backgroundColor : leftBOxColor}"
                                                           v-for="(item , index) in 5 - item.say"></i>
                                                    </label>
                                                </span>
                                                            <span>
                                                    <label :style="{fontSize  :textSize}">مهارت شنیدن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.listen" class="tik"></i>
                                                        <i :style="{backgroundColor : leftBOxColor}"
                                                           v-for="(item , index) in 5 - item.listen"></i>
                                                    </label>
                                                </span>
                                                            <span>
                                                    <label :style="{fontSize  :textSize}"> مهارت نوشتن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.write" class="tik"></i>
                                                        <i :style="{backgroundColor : leftBOxColor}"
                                                           v-for="(item , index) in 5 - item.write"></i>
                                                    </label>
                                                </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="property-item social__list"
                                             v-if="result.social_networks && result.social_networks.length != 0">
                                            <div class="property-item_head_right">
                                    <span :style="{backgroundColor : leftBOxColor}">
                                        <i class="fa fa-globe"></i>
                                    </span>
                                                <label :style="{color : leftBOxColor, fontSize  :titleSize}"> شبکه های
                                                    اجتماعی</label>
                                            </div>
                                            <div class="property-item_body">
                                                <div class="item-row w0">
                                                    <ul class="history">
                                                        <li v-for="(item , index ) in result.social_networks"
                                                            :key="index">
                                                <span v-if="item.social_network.id == 1">
                                                    <label>
                                                        <i class="fab fa-telegram"></i>
                                                        <i>telegram </i>
                                                    </label>
                                                    <label :style="{ fontSize  :textSize}"
                                                           style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                            <span v-else-if="item.social_network.id == 2">
                                                    <label>
                                                       <Icon type="logo-instagram"/>
                                                        <i>instagram </i>
                                                    </label>
                                                    <label :style="{ fontSize  :textSize}"
                                                           style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>

                                                            <span v-else-if="item.social_network.id == 3">
                                                    <label>
                                                        <i class="fab fa-youtube"></i>
                                                        <i>youtube </i>
                                                    </label>
                                                    <label :style="{ fontSize  :textSize}"
                                                           style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                            <span v-else-if="item.social_network.id == 4">
                                                    <label>
                                                        <i class="fab fa-twitter"></i>
                                                        <i> twiiter </i>
                                                    </label>
                                                    <label :style="{ fontSize  :textSize}"
                                                           style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lgbox blackbox col-wide sortable-cv-items"
                                         :style="{backgroundColor : leftBOxColor}">
                                        <div class="property-item basic__about" v-if="result.comment">
                                            <div class="property-item_head">
                                    <span :style="{backgroundColor : rightBoxColor}">
                                        <Icon type="md-person"/>
                                    </span>
                                                <label :style="{color : rightBoxColor , fontSize  :titleSize}"> درباره
                                                    من</label>
                                            </div>
                                            <div class="property-item_body">
                                                <p class="about-us" :style="{ fontSize  :textSize}">
                                                    {{ result.comment }}</p>
                                            </div>
                                        </div>
                                        <div class="" v-if="">
                                            <div class="">
                                    <span>
                                        <div style="width: 30px ;height: 30px">
                                                                                <i class="fa fa-graduation-cap"></i>

                                        </div>
                                    </span>
                                                <label :style="{color : rightBoxColor , fontSize  :titleSize}"> سوابق
                                                    تحصیلی</label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history multi-line">
                                                    <li v-for="(item , index ) in result.record_studies" :key="index">
                                                        <h2 class="subtitle" :style="{fontSize  : subtitleSize}"><span
                                                            v-if="item.document">{{ item.document.title }}</span>
                                                            {{ item.Field_Study }}</h2>
                                                        <h2 class="subtitle" :style="{fontSize  : subtitleSize}"> گرایش
                                                            : {{ item.orientation }}</h2>
                                                        <h3 class="subtitle" :style="{fontSize  : textSize}">
                                                            " {{ item.title_institutes }} "
                                                            <label
                                                                v-if="item.institutes">{{
                                                                    item.institutes.title
                                                                }}</label>
                                                        </h3>
                                                        <label :style="{fontSize  : textSize}" class="date"
                                                               v-if="item.Studying == 1">{{ item.entering_year }} آغار
                                                            از سال </label>
                                                        <label :style="{fontSize  : textSize}" class="date"
                                                               v-else>{{ item.entering_year }} -
                                                            {{ item.year_departure }}</label>
                                                        <label :style="{fontSize  : textSize}" class="Education-Grade">معدل
                                                            : {{ item.average }}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="property-item experience__list"
                                             v-if="result.record_jobs && result.record_jobs.length != 0">
                                            <div class="property-item_head">
                                    <span :style="{backgroundColor : rightBoxColor}">
                                        <i class="fa fa-toolbox"></i>
                                    </span>
                                                <label :style="{color : rightBoxColor , fontSize  : titleSize}"> سوابق
                                                    شغلی</label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history multi-line">
                                                    <li v-for="(item , index ) in result.record_jobs" :key="index">
                                                        <h2 class="subtitle" :style="{fontSize  : subtitleSize}">
                                                            {{ item.job_side }} </h2>
                                                        <h3 class="subtitle" :style="{fontSize  : textSize}"><span
                                                            v-if="item.center_job"> {{ item.center_job.title }} :</span>
                                                            {{ item.title_center_job }}</h3>
                                                        <label :style="{fontSize  : textSize}" class="date"
                                                               v-if="item.end"> {{ item.start }} -
                                                            {{ item.end }} </label>
                                                        <label :style="{fontSize  : textSize}" class="date" v-else> آغاز
                                                            همکاری از {{ item.start }}</label>
                                                        <label :style="{fontSize  : textSize}" class="exp-desc-title">وظایف
                                                            و دستاوردها <span> : </span></label>
                                                        <div class="exp-desc" :style="{fontSize  : textSize}">
                                                            {{ item.comment }}
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="property-item certificate__list"
                                             v-if="result.certificates && result.certificates.length != 0">
                                            <div class="property-item_head">
                                    <span :style="{backgroundColor : rightBoxColor}">
                                        <i class="fa fa-tasks"></i>
                                    </span>
                                                <label :style="{color : rightBoxColor ,  fontSize : titleSize}"> دوره ها
                                                    و گواهینامه</label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history one-line">
                                                    <li v-for="(item , index ) in result.certificates" :key="index">
                                                        <h2 class="subtitle bidirectional"
                                                            :style="{fontSize  : subtitleSize}"><span
                                                            v-if="item.certificate">{{ item.certificate.title }}</span>
                                                            {{ item.title }}</h2>
                                                        <h3 class="subtitle" :style="{fontSize  : textSize}">
                                                            {{ item.Institute }}</h3>
                                                        <label class="date" :style="{fontSize  : textSize}">
                                                            <label class="text-date">تاریخ <span> : </span></label>
                                                            "{{ item.date }}"
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="property-item research__list"
                                             v-if="result.articles && result.articles.length != 0">
                                            <div class="property-item_head">
                                                <span :style="{backgroundColor : rightBoxColor}">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                <label :style="{color : rightBoxColor ,  fontSize : titleSize}">
                                                    تحقیفات </label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history one-line">
                                                    <li v-for="(item , index ) in result.articles" :key="index">
                                                        <h2 class="subtitle bidirectional"
                                                            :style="{ fontSize : subtitleSize}"><span
                                                            v-if="item.effect">{{ item.effect.title }}</span>
                                                            {{ item.title }}</h2>
                                                        <h3 class="subtitle" :style="{ fontSize : textSize}">
                                                            ناشر <span> : </span>
                                                            <span>{{ item.publisher }}</span>
                                                        </h3>
                                                        <label class="date" :style="{ fontSize : textSize}">
                                                            <label class="text-date">تاریخ <span> : </span></label>
                                                            "{{ item.date }}"
                                                        </label>
                                                        <p class="project-link" :style="{ fontSize : textSize}">
                                                            لینک مربوطه
                                                            <a href="#" target="_blank">{{ item.link }}</a>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="property-item project__list"
                                             v-if="result.projects && result.projects.length != 0">
                                            <div class="property-item_head">
                                                <span :style="{backgroundColor : rightBoxColor}">
                                                    <i class="fa fa-pencil-ruler"></i>
                                                </span>
                                                <label :style="{color : rightBoxColor, fontSize : titleSize}"> پروژه
                                                    ها </label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history one-line">
                                                    <li v-for="(item , index ) in result.projects" :key="index">
                                                        <h2 class="subtitle bidirectional"
                                                            :style="{fontSize : subtitleSize}"> {{ item.title }} </h2>
                                                        <h3 class="subtitle" :style="{fontSize : textSize}">
                                                            کارفرما /درخواست کننده <span> : </span> {{ item.company }}
                                                        </h3>
                                                        <label class="date" :style="{fontSize : textSize}">
                                                            <label class="text-date">تاریخ <span> : </span></label>
                                                            "{{ item.date }}"
                                                        </label>
                                                        <p class="project-link" :style="{fontSize : textSize}">
                                                            لینک مربوطه
                                                            <a href="#" target="_blank">{{ item.link }}</a>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="property-item honor__list"
                                             v-if="result.honors && result.honors.length != 0">
                                            <div class="property-item_head">
                                                <span :style="{backgroundColor : rightBoxColor}">
                                                    <i class="fa fa-award"></i>
                                                </span>
                                                <label :style="{color : rightBoxColor , fontSize : titleSize}">
                                                    افتخارات </label>
                                            </div>
                                            <div class="property-item_body">
                                                <ul class="history list-item">
                                                    <li v-for="(item, index ) in result.honors" :key="index">

                                                        <p :style="{ fontSize : subtitleSize}" class="bidirectional">
                                                            {{ item.title }}
                                                        </p>
                                                        <label :style="{ fontSize : textSize}" class="date">
                                                            <label class="text-date">تاریخ <span> : </span></label>
                                                            "{{ item.date }} "
                                                        </label>
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


</template>

<script>

import html2pdf from 'html2pdf.js'
import VSwatches from 'vue-swatches'
import Axios from 'axios'

export default {

    components: {
        VSwatches
    },
    data() {
        return {
            activeColor: '#fdd60d',
            rightBoxColor: '#0a7acb',
            leftBOxColor: '#464547',
            loadingB: false,
            loadingText: false,
            titleSize: '14px',
            subtitleSize: '13px',
            textSize: '12px',
            ooo: '2ds',
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
        index() {
            return this.hieghtDiv()
        },
        birthDate() {
            if (this.result.birth_date) {
                let Array1 = this.result.birth_date.split("-");
                let DayArray = Array1[2].split(" ");
                let mount = Array1[1];
                let Day = DayArray[0];
                let years = Array1[0]
                return years + '/' + mount + '/' + Day
            } else
                return ''
        },

    },
    watch: {
        rightBoxColor() {
            this.applyCSS();
            this.hieghtDiv()
        },
        leftBOxColor() {
            this.applyRightCSS();
            this.hieghtDiv()
        },

    },
    created() {
        this.$store.dispatch('LoadReultResume');
        this.getPdf()
    },
    methods: {
        hieghtDiv() {
            setTimeout(() => {
                var offsetHeight = document.getElementById('box-pdf').offsetHeight;

                if (offsetHeight < 1056) {
                    this.ooo = "height: 297mm";
                } else if (offsetHeight > 1050) {

                    this.ooo = "height: 593mm";
                } else if (offsetHeight > 2110) {
                    this.ooo = "height: 889mm";
                }
            }, 200);
        },
        applyCSS() {
            let nodeId = "head_board_sr";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `.property-item_head:before { border-color: ${this.rightBoxColor} !important} .blackbox:after { border-color: ${this.rightBoxColor} !important} .bluebox .property-item_head_right span svg {color : ${this.rightBoxColor} !important}`;
            style.innerHTML = cssRule;
        },
        applyRightCSS() {
            let nodeId = "head_board_sl";
            let style = document.getElementById(nodeId);
            if (!style) {
                style = document.createElement("style");
                style.id = nodeId;
                style.type = "text/css";
                this.$el.appendChild(style);
            }
            let cssRule = `.property-item_head_right:before { border-color: ${this.leftBOxColor} !important} .blackbox .property-item_head span svg{color : ${this.leftBOxColor} !important}`;
            style.innerHTML = cssRule;
        },

        createPDF() {
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
                    scale: 1,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            // New Promise-based usage:
            html2pdf(element, opt);

        },
        saveChanges() {
            this.loadingB = true;
            this.loadingText = true;
            let form = {
                'themeNumber': 3,
                'changes': {
                    'activeColor': this.activeColor,
                    'leftBOxColor': this.leftBOxColor,
                    'rightBoxColor': this.rightBoxColor,
                    'titleSize': this.titleSize,
                    'subtitleSize': this.subtitleSize,
                    'textSize': this.textSize
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
                'themeNumber': 3,
            }
            Axios.post('api/v1/member/getPdf', form)
                .then(res => {
                    let changes = JSON.parse(res.data.options)
                    this.activeColor = changes.activeColor
                    this.leftBOxColor = changes.leftBOxColor
                    this.rightBoxColor = changes.rightBoxColor
                    this.subtitleSize = changes.subtitleSize
                    this.textSize = changes.textSize
                    this.titleSize = changes.titleSize
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
.body-pdf {
    background-color: #2d2d2d !important;
    background: #2d2d2d !important;
}

.btn-pdf {
    height: 100%;
    width: 100%;
    border: 0px;
    box-shadow: #79c34d 0px 1px 0px inset;
    color: white;
    background: #79c34d;
}

.box-pdf {
    width: 218mm;
    background: #ffffff;
}

.fixed-box {
    position: fixed !important;
    right: 20px !important
}

.btn-position {
    position: fixed;
    bottom: 20px;
    left: 50px;
}

.container {
    width: 210mm;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    height: 100%;
    background: #fff;
    min-height: 296mm;
    box-shadow: 0 0 6px -2px #000;
    margin: 0 auto;
    margin-top: 40px;
    margin-bottom: 50px;

}

div.container > div.row {
    height: 100%;
}

.bluebox {
    background-color: #0a7acb;
    width: 40%;
    min-height: 1100px;

    float: right;
    box-sizing: border-box;
}

.blackbox {
    background-color: #464547;
    min-height: 1113px;

    float: left;
    position: relative;
    box-sizing: border-box;
    width: 60%;
}

.contact-info_item {
    clear: both;
    display: block;
    background: none;
    padding: 0 0;
    margin-top: 0px;
    position: relative;
    z-index: 0;
}

.name-job-desc {
    display: inline-block;
    width: 100%;
    box-sizing: border-box;
    padding: 0 10px;
    color: #333;
}

.contact-info_item div {
    width: 100%;
    padding: 0px;
    float: initial;
}

.contact-info_item div {
    padding: 0px;
    float: initial;
}

div.user-image {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 160px;
    width: 160px;
    display: block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    border-radius: 100%;
    /* display: -webkit-box; */
    position: initial;

    z-index: 1;
    margin: AUTO;
    margin-bottom: 21px;
    margin-top: 23px;
}

.name-job-desc h1 {
    margin: 0 0px;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 12px;
    color: #ffffff;
    margin-top: 0px;
    margin-right: 0px;
    text-align: center;
}

.name-job-desc h2 {
    margin: -5px 0 15px;
    font-weight: 400;
    color: #909090;
    font-size: 13px;
    text-align: center;
    color: #e6e6e6;
    font-size: 13px;
}

.other-infos {
    text-align: center;
    color: #d0d0d0 !important;
    border-top: 1px dotted #d0d0d0;
    width: 75% !important;
    margin: 0 auto;
    padding-top: 10px !important;
    margin-bottom: 20px;
}

.other-infos > div {
    display: block;
    font-size: 11px;
}

.contact-info_item > div span:first-child {
    font-size: 11px;
}

.contact-info_item > div span:first-child {
    color: #d0d0d0 !important;
}

.infoo {
    padding: 5px 10px;
    color: #d4d3d3;
    font-size: 13px;
    line-height: 30px;
}

.infoo {
    padding: 5px 10px;
    color: #d4d3d3;
    font-size: 13px;
    line-height: 30px;
}

.infoo-head {
    display: none;
}

.contact-item {
    width: 100%;
    float: right;
}

div.contact-item span:first-child {
    display: inline-block;
    float: right;
    margin-left: 15px;
    margin-right: 15px;
}

.contact-item span:nth-child(2) {
    display: none;
}

.infoo div span:last-child {
    float: left;
    font-size: 14px;
    display: inline-block;
    width: 220px;
    text-align: right;
    float: right;
}

.property-item {
    padding-bottom: 0px;
}

.property-item_head, .property-item_head_right {
    font-size: 1.1rem;
    border-bottom: 0px solid #147cbe;
    text-align: right;
    height: 50px;
    margin: 0;
    display: block;
    width: 220px;
}

.bluebox .property-item_head::before, .bluebox .property-item_head_right::before {
    content: '';
    width: 0;
    height: 34px;
    display: block;
    top: 0px;
    background-color: red;
    border-right: 10px solid #464547;
    float: right;
}

.bluebox .property-item_head span, .bluebox .property-item_head_right span {
    border-radius: 50%;
    display: block;
    background-color: #e2e0e0;
    margin-right: 14px;
    width: 35px;
    height: 35px;
    float: right;
    text-align: center;
    background-color: rgb(234, 153, 153);
    display: flex !important;
    align-items: center !important;
    justify-content: center;
}

.property-item_head i, .property-item_head_right i {
    display: inline;
    line-height: 40px;
}

.property-item_head label, .property-item_head_right label {
    margin-top: 0px;
    margin-right: 8px;
    display: block;
    color: #45acf6;
    border: 0px;
    text-align: right;
    float: right;
    font-size: 15px;
    position: relative;
    font-weight: 700;
    line-height: 2.2em;
    min-width: 100px;
    color: #e2e0e0;
}

.property-item_body {
    display: block;
    padding: 5px 28px;
    width: 100%;
    box-sizing: border-box;
    clear: both;
}

.property-item_body > *:first-child {
    margin: 0;
    margin-top: 0;
    font-size: 0.9rem;
    padding: 0 0px;
    color: #dadada;
    width: 100%;
}

ul.history, ul.list-item {
    list-style-type: circle;
    padding-right: 0;
    margin-top: 0 !important;
    width: 100%
}

ul.history li {
    list-style: none;
    box-sizing: border-box;
    line-height: 1.6em;
    margin: 0px;
    color: white;
    float: right;
    margin-bottom: 7px !important;
    min-height: 10px;
    width: 100%
}

div.item-row li > span {
    float: right;
    padding-left: 5px;
    box-sizing: border-box;
    height: 24px;
    margin: 5px 0;
    width: 100%;
}

.item-row.w0 li > span {

    width: auto;
    height: auto;
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

div.item-row.w0 ul.history li label {
    width: auto;
    font-size: 11px;
    padding: 2px 6px; /**/
    color: #d4d3d3;
}

div.item-row li > span label {
    line-height: 24px;
    height: 100%;
    font-size: 10px;
    display: block;
    float: right;
}

.property-item.skill__list .grade {

}

div.item-row li > span label.grade i {
    display: block;
    border-radius: 50%;
    width: 11px;
    height: 11px;
    float: right;
    margin: -2px 3px;
    background: #0c8eed;
    box-sizing: border-box;
}

div.item-row li > span label.grade i.tik {
    background: #e2e0e0;
}

ul.history h2.subtitle {
    margin: 0;
    font-size: 12px;
    margin-bottom: 0px;
    margin-top: 0px;
    font-weight: bold;
    color: #fff;
    margin: 10px 0 10px 0 !important;
}

div.item-row li > span {
    float: right;
    padding-left: 5px;
    box-sizing: border-box;
    height: 24px;
    margin: 5px 0;
    width: 100%;
}

.language__list div.item-row li > span {
    margin: 5px 0 !important;
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

h2.language-item ~ span label:first-child {
    background: transparent !important;
    padding-right: 0 !important;
    font-size: 10px;
    width: 98px;
    padding-left: 0 !important;
    color: #d0ced0 !important;
}

.language-item ~ span label.grade {
    float: left;
    margin-top: 8px;
    line-height: 15px;
    margin-left: -25px;
    display: block;
    width: 121px;
    text-align: center;
}

.property-item.social__list ul.history li span label:first-child {
    font-size: 19px;
    color: #0a7acb;
    background: transparent;
}

.smbox .property-item.social__list ul.history li span label:first-child {
    color: #e2e0e0;
}

.property-item.social__list .fab {
    display: inline;
}

.property-item.social__list ul.history li span label i:last-child {
    display: none;
}

.property-item.social__list ul.history li span label:last-child {
    font-size: 15px;
    color: #c7d0d0;
    float: right;
    background: transparent;
}

a.social-link {
    color: #232323;
    text-decoration: none;
    word-break: break-word;
    color: #e2e0e0;
}

.blackbox::after {
    content: '';
    width: 0;
    height: 1040px;
    display: block;
    top: 0;
    border-right: 13px solid #0a7acb;
    float: left;
    position: ABSOLUTE;
    left: 0;
    top: 5%;
    min-height: 90%;
}

p.about-us {
    font-size: 11px;
    line-height: 25px !important;
}

ul.history.multi-line li {
    min-height: 55px;
    width: 100%;
    margin-bottom: 0px;
    padding-right: 13px;
    padding-right: 0;
}

ul.history.multi-line li:nth-child(2n+1) {
    padding-right: 0px;
}

h3.subtitle label {
    font-size: 0.78em;
    color: #d4d3d3;
    background: transparent;
    padding: 1px 6px;
    border-radius: 4px;
    border: 1px solid #d4d3d3;
}

ul.history label.date {
    font-size: 11px;
    margin-top: 0px;
    display: block;
    color: #d4d3d3;
}

label.Education-Grade {
    font-size: 11px;
    color: #d4d3d3;
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
    color: #d4d3d3;
    font-size: 10px;
}

.exp-desc {
    padding: 0;
    float: right;
    padding-right: 0px;
    width: 90%;
    box-sizing: border-box;
    padding-right: 12px;
}

ul.history.one-line li {
    width: 100%;
}

ul.history.one-line li {
    float: right;
    margin-bottom: 0px;
}

p.project-link {
    color: #d2d2d2;
    font-size: 10px;
    margin-top: 0;
    margin-bottom: 5px;
}

p.project-link a {
    color: #45acf6;
    text-decoration: none;
    word-break: break-word;
}

.blackbox .property-item_head::before {
    content: '';
    width: 0;
    height: 34px;
    top: 0;
    background-color: red;
    border-right: 10px solid #0a7acb;
    float: right;
}

.blackbox .property-item_head span {
    border-radius: 50%;
    display: block;
    background-color: #0a7acb;
    margin-right: 14px;
    width: 35px;
    height: 35px;
    text-align: center;
    float: right;
    display: flex !important;
    align-items: center !important;
    justify-content: center;

}

ul.list-item li p {
    padding-right: 0;
    padding-left: 15px;
    margin: 0;
    color: #d0d0d0;
    border-right: 0;
    font-size: 0.9em;
    font-weight: bold;
}

div.container > div.row {
    height: 100%;
}

.property-item.basic__about {
    padding-top: 20px
}

.blackbox .property-item_head label {
    margin-top: 0px;
    margin-right: 8px;
    display: block;
    color: #45acf6;
    border: 0px;
    text-align: right;
    float: right;
    font-size: 15px;
}

ul.history h3.subtitle {
    margin: 0;
    font-size: 11px;
    margin-bottom: 0px;
    color: #d8d8d8;
    margin: 10px 0 10px 0 !important;
}

@media only screen and (max-width: 760px) {

    .blackbox, .bluebox {
        width: 100%
    }
}

@media only screen and (max-width: 600px) {
    .container {
        width: 180mm;
    }

    .blackbox, .bluebox {
        width: 100%
    }
}

@media only screen and (max-width: 570px) {
    .container {
        width: 120mm;
    }

}

@media only screen and (max-width: 486px) {
    .container {
        width: 85mm;
    }
}

@media only screen and (max-width: 370px) {
    .container {
        width: 82mm;
    }
}
</style>
