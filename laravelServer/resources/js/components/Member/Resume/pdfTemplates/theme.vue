<template>
    <div class="body-pdf">
        <div class="row col-12">
            <div style="margin: auto ;margin-top: 60px;">
                <div style="width: 218mm;" class="">
                    <div style="margin-right: 0px;" class="row">
                        <div style="padding-left: 0px;padding-right: 28px;" class="col-8">
                            <Form style="background: rgb(255, 255, 255) none repeat scroll 0% 0%;padding: 7px;"
                                  ref="UpdateProject">
                                <div class=" ">
                                    <div class="row">
                                        <FormItem class="col-md-4" label="رنگ عناوین">
                                            <v-swatches
                                                v-model="activeColor"
                                                popover-x="left"
                                                :swatches="swatches"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="رنگ برچسب ها">
                                            <v-swatches
                                                v-model="labelColor"
                                                popover-x="left"
                                                :swatches="swatches"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </FormItem>
                                        <FormItem class="col-md-4" label="رنگ باکس بالا">
                                            <v-swatches
                                                v-model="boxColor"
                                                popover-x="left"
                                                :swatches="swatches"
                                                :trigger-style="{ width: '30px', height: '30px' }"
                                                :swatch-style="{ width: '30px', height: '30px' }"
                                            ></v-swatches>
                                        </FormItem>
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
                    <div class="col-10">
                        <div class="col-10">
                            <div ref="content" id="content">
                                <div class="box-pdf">
                                    <div style="padding-right: 40px;padding-left: 40px;">
                                        <div class="contact-info">
                                            <div class="name-desc">
                                                <div class="center-image-pdf">
                                                    <img v-if="result.image" :src="'/images/company/' + result.image" class="user-image" alt="">
                                                    <img v-else src="/images/company/no-photo.jpg" class="user-image" alt="">
                                                </div>
                                                <div class="contact-info-item" :style="{background : boxColor}">
                                                    <h1 :style="{ color: activeColor }">{{ result.name }}
                                                        {{ result.last_name }}</h1>
                                                    <h2 v-if="result.job"> {{ result.job.title }} </h2>
                                                    <div class="row col-10 "
                                                         style="margin: auto;color: rgb(145, 145, 145) ;font-size: 12px;">
                                                        <div class="info infoo col-8" data-section="Contact">
                                                            <div class="contact-item">
                                                                <span>ایمیل </span>
                                                                <span> : </span>
                                                                <span> {{ result.email }} </span>
                                                            </div>
                                                            <div class="contact-item">
                                                                <span> موبایل <span> : </span> </span>
                                                                <span dir="ltr"> {{ result.mobile }} </span>
                                                            </div>
                                                            <div class="contact-item">
                                                                <span> تلفن <span> : </span> </span>
                                                                <span dir="ltr"> {{ result.phone }}</span>
                                                            </div>
                                                            <div class="contact-item">
                                                                <span> وبسایت  <span> : </span> </span>
                                                                <span dir="ltr">{{ result.site }}</span>
                                                            </div>
                                                            <div class="contact-item">
                                                                <span> آدرس  <span> : </span> </span>
                                                                <span dir="ltr">
                                                            <span
                                                                v-if="result.province">{{ result.province.title }} - </span>
                                                            <span v-if="result.city">{{ result.city.title }} - </span>
                                                            {{ result.address }}
                                                        </span>
                                                            </div>
                                                        </div>
                                                        <div class="other-infos no-drag  col-4">
                                                            <div class="basic_birthday">
                                                                <span> متولد <span> : </span> </span>
                                                                <span>{{ birthDate }} </span>
                                                            </div>
                                                            <div class="basic_material">
                                                                <span> وضعیت تاهل <span> : </span> </span>
                                                                <span v-if="result.marital_status == 1 ">متاهل</span>
                                                                <span v-if="result.marital_status == 0 ">مجرد</span>
                                                            </div>
                                                            <div v-if="result.gens && result.gens.id != 2"
                                                                 class="basic_martial">
                                                                <span> وضعیت سربازی <span> : </span></span>
                                                                <span>{{ result.soldier.title }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="one-col-layout sortable-cv-items">
                                                <div class="property-item experience__list"
                                                     v-if="result.record_jobs && result.record_jobs.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <label :style="{ color: activeColor }">سوابق شفلی</label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li v-for="(item , index ) in result.record_jobs"
                                                                :key="index">
                                                                <h2 class="subtitle"> {{ item.job_side }} </h2>
                                                                <h3 class="subtitle"><span
                                                                    v-if="item.center_job">  {{ item.center_job.title }}</span>:
                                                                    {{ item.title_center_job }}</h3>
                                                                <label class="date" v-if="item.end"
                                                                       :style="{ fontSize : textSize}"> {{ item.start }}
                                                                    - {{ item.end }} </label>
                                                                <label class="date" v-else
                                                                       :style="{ fontSize : textSize}"> آغاز همکاری از
                                                                    {{ item.start }}</label>
                                                                <label class="exp-desc-title">وظایف و دستاوردها
                                                                    <span> : </span></label>
                                                                <ul class="exp-desc">
                                                                    <li>{{ item.comment }}</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="property-item social__list"
                                                     v-if="result.social_networks && result.social_networks.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <label :style="{ color: activeColor }"> شبکه اجتماعی</label>
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
                                                    <label style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                                    <span v-else-if="item.social_network.id == 2">
                                                    <label>
                                                        <Icon type="logo-instagram"/>
                                                        <i>instagram </i>
                                                    </label>
                                                    <label style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>

                                                                    <span v-else-if="item.social_network.id == 3">
                                                    <label>
                                                        <i class="fab fa-youtube"></i>
                                                        <i>youtube </i>
                                                    </label>
                                                    <label style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                                    <span v-else-if="item.social_network.id == 4">
                                                    <label>
                                                        <i class="fab fa-twitter"></i>
                                                        <i> twiiter </i>
                                                    </label>
                                                    <label style="direction:ltr ; text-align :left;">
                                                        <a href="" class="social-link"
                                                           target="_blank">{{ item.link }}</a>
                                                    </label>
                                                </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="property-item basic__about" v-if="result.comment">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <label :style="{ color: activeColor }"> درباره من </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <p class="about-us">{{ result.comment }}</p>
                                                    </div>
                                                </div>
                                                <div class="property-item education__list"
                                                     v-if="result.record_studies && result.record_studies.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <label :style="{ color: activeColor }"> سوابق تحصیلی </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li v-for="(item , index ) in result.record_studies"
                                                                :key="index">
                                                                <h2 class="subtitle"><span
                                                                    v-if="item.document">{{ item.document.title }}</span>
                                                                    {{ item.Field_Study }}</h2>
                                                                <h2 class="subtitle"> گرایش  <span> : </span>
                                                                    {{ item.orientation }}</h2>
                                                                <h3 class="subtitle">
                                                                    " {{ item.title_institutes }} "
                                                                    <label
                                                                        v-if="item.institutes">{{ item.institutes.title }}</label>
                                                                </h3>
                                                                <label class="date"
                                                                       v-if="item.Studying == 1">{{ item.entering_year }}
                                                                    آغار از سال </label>
                                                                <label class="date" v-else>{{ item.entering_year }} -
                                                                    {{ item.year_departure }}</label>
                                                                <label class="Education-Grade"
                                                                       :style="{ fontSize : textSize}">معدل  <span> : </span>
                                                                    {{ item.average }}</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="property-item skill__list"
                                                     v-if="result.exprimentas && result.exprimentas.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <label :style="{ color: activeColor }"> مهارت ها </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <div class="bar-progress item-row w0">
                                                            <ul class="history">
                                                                <li v-for="(item , index ) in result.exprimentas"
                                                                    :key="index">
                                                <span :style="{ fontSize : textSize}">
                                                    <label
                                                        :style="{background : labelColor , fontSize  :textSize}"> {{ item.name }}</label>
                                                    <label class="grade">
                                                        <i v-for="index in  parseInt(item.level)" class="tik"
                                                           :style="{background : labelColor}"></i>
                                                        <i v-for="index in  5 - parseInt( item.level )"></i>
                                                    </label>
                                                </span>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="circle-progress"></div>
                                                    </div>
                                                </div>
                                                <div class="property-item language__list"
                                                     v-if="result.languages &&result.languages.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                    <span>
                                    </span>
                                                        <label :style="{ color: activeColor }"> زبان </label>
                                                    </div>
                                                    <div class="property-item_body">

                                                        <div class="bar-progress item-row w0">
                                                            <ul class="history">
                                                                <li v-for="(item , index ) in result.languages"
                                                                    :key="index">
                                                                    <h2 class="subtitle language-item">
                                                                        {{ item.lang_id.title }}</h2>
                                                                    <span>
                                                    <label :style="{background : labelColor ,fontSize : textSize }">مهارت خواندن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.read" class="tik"
                                                           :style="{background : labelColor}"></i>
                                                        <i v-for="(item , index) in 5 - item.read"></i>
                                                    </label>
                                                </span>
                                                                    <span>
                                                    <label :style="{background : labelColor , fontSize : textSize}">مهارت گفتن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.say" class="tik"
                                                           :style="{background : labelColor}"></i>
                                                        <i v-for="(item , index) in 5 - item.say"></i>
                                                    </label>
                                                </span>
                                                                    <span>
                                                    <label :style="{background : labelColor , fontSize : textSize }">مهارت شنیدن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.listen" class="tik"
                                                           :style="{background : labelColor}"></i>
                                                        <i v-for="(item , index) in 5 - item.listen"></i>
                                                    </label>
                                                </span>
                                                                    <span>
                                                    <label :style="{background : labelColor , fontSize : textSize}">مهارت نوشتن</label>
                                                    <label class="grade">
                                                        <i v-for="(item , index) in item.write" class="tik"
                                                           :style="{background : labelColor}"></i>
                                                        <i v-for="(item , index) in 5 - item.write"></i>
                                                    </label>
                                                </span>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="property-item certificate__list"
                                                     v-if="result.certificates && result.certificates.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                    <span>
                                    </span>
                                                        <label :style="{ color: activeColor }"> دوره ها و
                                                            گواهینامه </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history one-line">
                                                            <li v-for="(item , index ) in result.certificates"
                                                                :key="index">
                                                                <h2 class="subtitle bidirectional"><span
                                                                    v-if="item.certificate">{{ item.certificate.title }}</span>
                                                                    {{ item.title }}</h2>
                                                                <h3 class="subtitle">{{ item.Institute }}</h3>
                                                                <label class="date">
                                                                    <label class="text-date"
                                                                           :style="{ fontSize : textSize}">تاریخ
                                                                        :</label>
                                                                    "{{ item.Institute }}"
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="property-item research__list"
                                                     v-if="result.articles && result.articles.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                    <span>
                                    </span>
                                                        <label :style="{ color: activeColor }"> تحقیقات </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li v-for="(item , index ) in result.articles" :key="index">
                                                                <h2 class="subtitle bidirectional"><span
                                                                    v-if="item.effect">{{ item.effect.title }} </span>
                                                                    {{ item.title }}</h2>
                                                                <h3 class="subtitle" :style="{ fontSize : textSize}">
                                                                    ناشر  <span> : </span>
                                                                    <span>{{ item.publisher }}</span>
                                                                </h3>
                                                                <label class="date" :style="{ fontSize : textSize}">
                                                                    <label class="text-date">تاریخ  <span> : </span></label>
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
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                    <span>
                                    </span>
                                                        <label :style="{ color: activeColor }"> پروژه ها </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history multi-line">
                                                            <li v-for="(item , index ) in result.projects" :key="index">
                                                                <h2 class="subtitle bidirectional">
                                                                    {{ item.title }} </h2>
                                                                <h3 class="subtitle" :style="{ fontSize : textSize}">
                                                                    کارفرما  <span> / </span>درخواست کننده  <span> : </span> {{ item.company }}
                                                                </h3>
                                                                <label class="date" :style="{ fontSize : textSize}">
                                                                    <label class="text-date">تاریخ  <span> : </span></label>
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
                                                <div class="property-item honor__listt"
                                                     v-if="result.honors && result.honors.length != 0">
                                                    <div class="property-item_head"
                                                         :style="{ borderColor: activeColor}">
                                                        <span>
                                                        </span>
                                                        <label :style="{ color: activeColor }"> افتخارات </label>
                                                    </div>
                                                    <div class="property-item_body">
                                                        <ul class="history list-item">
                                                            <li v-for="(item, index ) in result.honors" :key="index">

                                                                <p class="bidirectional">
                                                                    {{ item.title }}
                                                                </p>
                                                                <label class="date" :style="{ fontSize : textSize}">
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
            labelColor: '#fdd60d',
            activeColor: '#575757',
            boxColor: '#f7f7f7',
            titleSize: '15px',
            subtitleSize: '14px',
            textSize: '13px',
            loadingB: false,
            loadingText: false,
            swatches: [
                ['#F64272', '#F6648B', '#F493A7', '#F891A6', '#FFCCD5'],
                ['#8b5aff', '#a27bff', '#b99cff', '#d0bdff', '#e8deff'],
                ['#51e5db', '#74ebe3', '#96f0ea', '#b9f5f1', '#dcfaf8'],
                ['#ffa51a', '#ffb748', '#ffc976', '#ffdba3', '#ffedd1']
            ]
        }
    },

    watch: {
        result() {
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
            } else
                return ''
        }
    },
    created() {
        this.$store.dispatch('LoadReultResume');
        this.getPdf()
    },
    methods: {
        createPDF() {
            var element = document.getElementById('content');
            var opt = {
                filename: 'myfile.pdf',
                image: {type: 'jpeg', quality: 0.98},
                html2canvas: {scale: 3},
                jsPDF: {unit: 'in', format: 'a4', orientation: 'portrait'}
            };
            html2pdf(element, opt);
        },
        saveChanges() {
            let form = {
                'themeNumber': 1,
                'changes': {
                    'labelColor': this.labelColor,
                    'activeColor': this.activeColor,
                    'boxColor': this.boxColor,
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
                });
        },
        getPdf() {

            let form = {
                'themeNumber': 1,
            }
            Axios.post('api/v1/member/getPdf', form)
                .then(res => {
                    let changes = JSON.parse(res.data.options)
                    this.activeColor = changes.activeColor
                    this.boxColor = changes.boxColor
                    this.labelColor = changes.labelColor
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

.center-image-pdf {
    display: flex !important;
    align-items: center !important;
    justify-content: center;
    flex-wrap: wrap;
}

.box-pdf {
    width: 210mm;
    background: #ffffff;
}

.box-center-resume {
    padding: 40px;
}

.box-pdf h1, h2, h3 {
    font-size: 15px;
}

ul.exp-desc li:before {
    content: '';
    position: absolute;
    width: 3px;
    height: 3px;
    background: #808080;
    right: 2px;
    top: 7px;
}

.ivu-form .ivu-form-item-label {
    display: contents !important
}


.preview-container {
    margin-bottom: 100px;
}

.name-desc {
    display: inline-block;
    width: 100%;
    box-sizing: border-box;
    padding: 0 10px;
    color: #333;
}

.user-image {
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
    margin-top: 10px
}

.contact-info-item {
    clear: both;
    display: inline-block;
    width: 100%;
    background: #f7f7f7;
    padding: 10px 0;
    margin-top: -50px;
    position: relative;
    z-index: 0;
}

/* .contact-info-item div {
     float: right;
     padding: 0;
     padding-right: 80px;
 }*/
.name-desc h1 {
    margin: 0;
    margin-top: 0px;
    margin-bottom: 0px;
    text-align: center;

    margin-bottom: 10px;
    color: #147cbe;
    margin-top: 47px;
    font-size: 15px;
}

.name-desc h2 {
    margin: -5px 0 15px;
    font-size: 12px;
    text-align: center;
}

.contact-item span:first-child {
    margin-left: 5px
}

.contact-item > div span:first-child {
    color: #1f222b;
}

.contact-item > div span {
    font-size: 0.92rem;
}

.one-col-layout {
    float: right;
    width: 100%;
}

.property-item {
    padding-bottom: 5px;
}

.property-item_head {
    border-bottom: 1px solid #147cbe;
    text-align: center;
    width: 50%;
    margin: AUTO;
    clear: both;
    padding-top: 20px;
}

.property-item_head label {

    color: #147cbe;
    position: relative;
    text-align: center;
    line-height: 2.2em;
    border-bottom: 3px solid;
    min-width: 100px;
}

.property-item_body {
    padding: 10px 0 5px;
    width: 100%;
    box-sizing: border-box;
}

.property-item_body > *:first-child {
    margin: 0;
    margin-top: 0;
    padding: 0 15px;
    box-sizing: border-box;
}

ul.history, ul.list-item {
    list-style-type: circle;
    padding-right: 0;
    float: right;
    margin-top: 0 !important;
    width: 100%;
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

ul.history li {
    float: right;
    list-style: none;
    box-sizing: border-box;
    padding-right: 15px;
    margin: 0;
    min-height: 40px;
    margin-bottom: 5px;
}

.multi-line li {
    width: 50%;
}

li {
    display: list-item;
    text-align: -webkit-match-parent;
}

h2.subtitle {
    width: 100%;
    margin-bottom: 5px;
    margin-top: 0;
}

ul.history h2.subtitle {
    margin: 10px 0 10px 0;
    color: inherit;

}

h3.subtitle {
    margin: 0;

}

ul.history h3.subtitle {
    margin: 10px 0 10px 0;
}

ul.history label.date {
    margin-top: 5px;
}

label.date {
    color: #8a8a8a;
}

label.exp-desc-title {
    color: black;
}

label.exp-desc-title {
    display: block;
    padding: 5px 0;
    border-bottom: 1px dotted #808080;
    width: 90%;
    margin-bottom: 5px;

}

ul.exp-desc {
    padding: 0;
    float: right;
    padding-right: 0px;
    width: 90%;
    box-sizing: border-box;
    margin: 5px;
}

ul.exp-desc li {
    color: #8a8a8a;
}

ul.exp-desc li {
    padding-right: 12px;
}

ul.history li {
    float: right;
    list-style: none;
    box-sizing: border-box;
    padding-right: 15px;
    margin: 0;
    min-height: 60px;
}

ul.history li {
    float: right;
    list-style: none;
    box-sizing: border-box;
    padding-right: 15px;
    margin: 0;
    min-height: 40px;
    margin-bottom: 5px;
}

ul.history li:last-child {
    margin-bottom: 0;
}

ul.exp-desc {
    padding: 0;
    float: right;
    padding-right: 0px;
    width: 90%;
    box-sizing: border-box;
    display: flex
}

ul.exp-desc li {
    color: #8a8a8a;
}

ul.exp-desc li {
    padding-right: 12px;
}

ul.exp-desc li:before {
    color: #8a8a8a;
}

ul.exp-desc li:before {
    content: '';
    position: absolute;
    width: 3px;
    height: 3px;
    background: #808080;
    right: 2px;
    top: 7px;
}

.item-row.w0 li > span {
    width: auto;
}

div.item-row li > span {
    float: right;
    padding-left: 10px;
    box-sizing: border-box;
    height: 24px;
    margin: 5px 0;
    display: block;
}

.property-item.social__list ul.history li span label:first-child {
    background-color: transparent !important;
}

.property-item.social__list ul.history li span label:first-child {
    color: #334b63;
    background: #fff;
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

.property-item.social__list .fab {
    display: inline;
}



.property-item.social__list ul.history li span label i:last-child {
    display: none;
}

.property-item.social__list ul.history li span label:last-child {
    color: #334b63;
}

div.item-row li > span label {
    line-height: 24px;
    height: 100%;
    display: block;
    float: right;
}

a.social-link {
    color: #232323;
    text-decoration: none;
    word-break: break-word;
}

.property-item_body {
    padding: 10px 0 5px;
    width: 100%;
    box-sizing: border-box;
}

.about-us {
    padding: 0 20px;
    text-align: justify;
    line-height: 28px;
}

h3.subtitle label {
    color: #2c2c2c;
    background: #d0d0d0;
    padding: 1px 6px;
    border-radius: 4px;
}

label.Education-Grade {
    display: block;
    color: #8a8a8a;
}

small {
}

div.item-row li > span label.grade i.tik {
    background: #575757;
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
    border-radius: 50%;
    width: 10px;
    height: 10px;
    margin: 7px 1px;
    background: #c7c7c7;
    box-sizing: border-box;
    display: block;
    float: right;
}

.circle-progress {

    float: right;
    width: 100%;
}

.circle-progress__item {
    float: right;
    width: 100%;
}

.c100.small {
}

.c100 {
    position: relative;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    float: left;
    margin: 0 .1em .1em 0;
    background-color: #ccc;
}

.c100 > span {
    position: absolute;
    width: 100%;
    z-index: 1;
    left: 0;
    top: 0;
    width: 5em;
    line-height: 5em;
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

.c100 *, .c100 *:before, .c100 *:after {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}

.c100 .slice {
    position: absolute;
    width: 1em;
    height: 1em;
    clip: rect(0em, 1em, 1em, 0.5em);
}

.c100.p40 .bar {
    -webkit-transform: rotate(144deg);
    -moz-transform: rotate(144deg);
    -ms-transform: rotate(144deg);
    -o-transform: rotate(144deg);
    transform: rotate(144deg);
}

.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill {
    position: absolute;
    border: .08em solid #307bbb;
    width: .84em;
    height: .84em;
    clip: rect(0em, 0.5em, 1em, 0em);
    border-radius: 50%;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
}

.circle-progress__title {
    font-size: 11px;
    position: absolute;
    top: 88px;
    line-height: 14px;
    width: 100%;
    text-align: center;
}

.property-item_body {
    padding: 10px 0 5px;
    width: 100%;
    box-sizing: border-box;
}

p.project-link a {
    text-decoration: none;
    word-break: break-word;
}

ul.history.one-line li {
    width: 100%;
}

.preview-container .certificate__list ul li {
    width: 50%;
    padding-left: 15px;
}

.container {
    width: 210mm;
    display: block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 30px;
    background: white;
    box-shadow: 0 0 6px -2px #000;
    margin: 0 auto;
    margin-top: 40px;
    margin-bottom: 50px;
    min-height: 297mm;
}

.btn-position {
    position: fixed;
    bottom: 20px;
    left: 50px
}

.fixed-box {
    position: fixed !important;
    right: 20px !important
}

.box-contain iframe .vue-swatches, .box-contain iframe .btn-position {
    display: none
}

body {
    background: #fff !important;
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
