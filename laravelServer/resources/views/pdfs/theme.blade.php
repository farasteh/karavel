<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style >
    .preview-container{
        margin-bottom: 100px;
        direction : rtl
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
        display: -webkit-box;
        position: relative;
        z-index: 1;
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
    .name-desc h1{
        margin: 0;
        font-size: 18px;
        text-align: CENTER;
        font-weight: 700;
        margin-bottom: 10px;
        color: #147cbe;
        margin-top: 47px;
    }
    .name-desc h2{ 
        margin: -5px 0 15px;
        font-weight: 400;
        color: #909090;
        font-size: 12px;
        text-align: center;
    }
    .infoo.info{
        padding-right:25px;
      
    }
    .contact-item >div span:first-child {
        color: #1f222b;
        font-size: .9rem;
    }
    .contact-item >div span {
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
        font-size: 1.1rem;
        border-bottom: 1px solid #147cbe;
        text-align: center;
        width: 50%;
        margin: AUTO;
        clear: both;
        padding-top: 20px;
    }
    .property-item_head label {
        font-size: 14px;
        font-weight: 700;
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
        font-size: 14px;
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
        font-size: 1.1rem;
        margin-bottom: 5px;
        margin-top: 0;
        font-size: 13px;
    }
    ul.history h2.subtitle {
        margin: 0;
        font-size: 13px;
        margin-bottom: 0px;
        margin-top: 5px;
        font-weight: 700;
        color: inherit;
    
    }
    h3.subtitle {
        font-size: 1rem;
        margin: 0;
        font-weight: 400;
    }
    ul.history h3.subtitle {
        margin: 0;
        font-size: 12px;
        margin-bottom: 0px;
        font-style: italic;
    }
    ul.history label.date {
        font-size: 11px;
        margin-top: 5px;
    }
    label.date {
        color: #8a8a8a;
        font-size: 11px !important;
    }
    
    label.exp-desc-title {
        color: black;
        font-size: 10px;
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
    ul.exp-desc {
        padding: 0;
        float: right;
        padding-right: 0px;
        width: 90%;
        box-sizing: border-box;
    }
    ul.exp-desc li {
        color: #8a8a8a;
        font-size: 10px;
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
        display : flex
    }
    ul.exp-desc li {
        color: #8a8a8a;
        font-size: 10px;
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
        font-size: 19px;
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
        font-size: 10px;
    }
    .property-item.social__list .fab {
        display: inline;
    }
    .fab {
        font-family: "Font Awesome 5 Brands";
    }
    .property-item.social__list ul.history li span label i:last-child {
        display: none;
    }
    .property-item.social__list ul.history li span label:last-child {
        font-size: 15px;
        color: #334b63;
    }
    div.item-row li > span label {
        line-height: 24px;
        height: 100%;
        font-size: 10px;
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
        font-size: 12px !important;
    }
    h3.subtitle label {
        font-size: 9px;
        color: #2c2c2c;
        background: #d0d0d0;
        padding: 1px 6px;
        font-style: normal;
        border-radius: 4px;
    }
    label.Education-Grade {
        display: block;
        font-size: 11px !important;
        color: #8a8a8a;
        font-family: sdf;
    }
    small {
        font-size: 80%;
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
        font-size: 80px;
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
    .c100 *, .c100 *:before, .c100 *:after {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
    }
    .c100 .slice {
        position: absolute;
        width: 1em;
        height: 1em;
        clip: rect(0em,1em,1em,0.5em);
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
        clip: rect(0em,0.5em,1em,0em);
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
        font-family: mainfont !important;
        box-shadow: 0 0 6px -2px #000;
        margin: 0 auto;
        margin-top: 40px;
        margin-bottom: 50px;
        min-height: 500mm;
    }
</style>
</head>
<body>
    <div class="container preview-container" >
        <div class="contact-info">
            <div class="name-desc">
                @if($data['image'])
                <div class="user-image"  style="backgroundImage: url(/images/company/' + $data.image ')" ></div>
                @else
                <div class="user-image" style="background-image: url(/images/company/no-photo.jpg);" ></div>
                @endif
                <div class="contact-info-item">
                    <h1>{{$data['name']}} {{$data['last_name']}}</h1>
                   @if($data['job']) <h2> {{$data['job']['title']}} </h2>@endif
                    <div class="row">
                        <div class="info infoo col-6" data-section="Contact">
                            <div class="info-head">
                                <label>اطلاعات تماس</label>
                            </div>
                            <div class="contact-item">
                                <span>
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <span>ایمیل :</span>
                                <span> {{$data['email']}} </span>  
                            </div>
                            <div class="contact-item">
                                <span>
                                    <i class="fa fa-mobile-alt"></i>
                                </span>
                                <span>موبایل :</span>
                                <span dir="ltr"> {{$data['mobile']}} </span>  
                            </div>
                            <div class="contact-item">
                                <span>
                                    <i class="fa fa-phone"></i>
                                </span>
                                <span>تلفن :</span>
                                <span dir="ltr"> {{$data['phone']}}</span>  
                            </div>
                            <div class="contact-item">
                                <span>
                                    <i class="fa fa-globe"></i>
                                </span>
                                <span>وبسایت  :</span>
                                <span dir="ltr">{{$data['site']}}</span>  
                            </div>
                            <div class="contact-item">
                                <span>
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <span>آدرس  :</span>
                                <span dir="ltr"> 
                                     @if ($data['province']) 
                                        <span>{{$data['province']['title']}}</span> 
                                    @endif 
                                    @if($data['city'])
                                        <span> -{{$data['city']['title']}}</span> 
                                    @endif
                                    - {{$data['address']}}
                                </span>  
                            </div>
                        </div>
                        <div class="other-infos no-drag col-6">
                            <div class="basic_birthday">
                                <span>متولد : </span>
                                <span>{{$data['birth_date']}} </span>
                            </div>
                            <div class="basic_material">
                                <span> وضعیت تاهل :</span>
                                @if($data['marital_status'] == 1 )
                                    <span >متاهل</span>
                                @else
                                    <span >مجرد</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="one-col-layout sortable-cv-items">
                <div class="property-item experience__list">
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label>سوابق شفلی</label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history multi-line">
                            @foreach ($data['record_jobs'] as $item)
                                <li>
                                    <h2 class="subtitle"> {{ $item['job_side'] }} </h2>
                                    <h3 class="subtitle"> {{$item['center_job']['title']}} : {{$item['title_center_job']}}</h3>
                                    @if($item['end'])<label class="date">   {{$item['start']}} - {{$item['end']}}  </label>
                                    @else<label class="date"> آغاز همکاری از  {{$item['start']}}</label>@endif
                                    <label class="exp-desc-title">وظایف و دستاوردها :</label>
                                    <ul class="exp-desc">
                                        {{$item['comment']}}
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="property-item social__list">
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label> شبکه اجتماعی</label>
                    </div>
                    <div class="property-item_body">
                        <div class="item-row w0">
                            <ul class="history">
                            @foreach ($data['social_networks'] as $item)
                                <li >
                                    @if($item['social_network']['id'] == 1)
                                    <span >
                                        <label>
                                            <i class="fab fa-telegram"></i>
                                            <i>telegram </i>
                                        </label>
                                        <label style="direction:ltr ; text-align :left;">
                                            <a href="" class="social-link" target="_blank">{{$item['link']}}</a>
                                        </label>
                                    </span>
                                    @endif
                                    @if($item['social_network']['id'] == 2)
                                    <span>
                                        <label>
                                            <i class="fab fa-instagram"></i>
                                            <i>instagram </i>
                                        </label>
                                        <label  style="direction:ltr ; text-align :left;">
                                            <a href="" class="social-link" target="_blank">{{$item['link']}}</a>
                                        </label>
                                    </span>
                                    @endif
                                    @if($item['social_network']['id'] == 3)
                                    <span>
                                        <label>
                                            <i class="fab fa-youtube"></i>
                                            <i>youtube </i>
                                        </label>
                                        <label  style="direction:ltr ; text-align :left;">
                                            <a href="" class="social-link" target="_blank">{{$item['link']}}</a>
                                        </label>
                                    </span>
                                    @endif
                                    @if($item['social_network']['id'] == 4)
                                    <span>
                                        <label>
                                            <i class="fab fa-twitter"></i>
                                            <i> twiiter </i>
                                        </label>
                                        <label  style="direction:ltr ; text-align :left;">
                                            <a href="" class="social-link" target="_blank">{{$item['link']}}</a>
                                        </label>
                                    </span>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="property-item basic__about">
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label > درباره من </label>
                    </div>
                    <div class="property-item_body">
                        <p class="about-us">{{$data['comment']}}</p>
                    </div>
                </div>
                <div class="property-item education__list">
                    <div class="property-item_head" >
                        <span>
                        </span>
                        <label >  سوابق تحصیلی </label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history multi-line">
                        @foreach ($data['record_studies'] as $item)
                            <li>
                                <h2 class="subtitle">{{$item['document']['title']}} {{$item['Field_Study']}}</h2>
                                <h2 class="subtitle"> گرایش : {{$item['orientation']}}</h2>
                                <h3 class="subtitle">
                                    " {{$item['title_institutes']}} "
                                    <label>{{$item['institutes']['title']}}</label>
                                </h3>
                                @if($item['Studying'] == 1 )<label class="date">{{$item['entering_year']}}  آغار  از سال </label>
                                @else<label class="date" v-else>{{$item['entering_year']}} - {{$item['year_departure']}}</label>@endif
                                <label class="Education-Grade">معدل : {{$item['average']}}</label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="property-item skill__list">
                        <div class="property-item_head" >
                        <span>
                        </span>
                        <label > مهارت ها </label>
                    </div>
                    <div class="property-item_body">
                        <div class="bar-progress item-row w0">
                            <ul class="history">
                            @foreach ($data['exprimentas'] as $item)
                                <li>
                                    <span>
                                        <label> {{$item['name']}}</label>
                                        <label class="grade">
                                    
                                        </label>
                                    </span>
                                    
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="property-item language__list"  >
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label>  زبان </label>
                    </div>
                    <div class="property-item_body">
                        
                        <div class="bar-progress item-row w0">
                                <ul class="history">
                                @foreach ($data['languages'] as $item)
                                <li>
                                    <h2 class="subtitle language-item">{{$item['lang_id']['title']}}</h2>
                                    <span>
                                        <label>مهارت خواندن</label>
                                        <label class="grade">
                                          
                                           
                                        </label>
                                    </span>
                                    <span>
                                        <label>مهارت گفتن</label>
                                        <label class="grade">
                                         
                                        </label>
                                    </span>
                                    <span>
                                        <label>مهارت شنیدن</label>
                                        <label class="grade">
                                          
                                        </label>
                                    </span>
                                    <span>
                                        <label>مهارت نوشتن</label>
                                        <label class="grade">
                                           
                                        </label>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="property-item certificate__list" >
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label >  دوره ها و گواهینامه  </label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history one-line">
                        @foreach ($data['certificates'] as $item)
                            <li >
                                <h2 class="subtitle bidirectional"> {{$item['certificate']['title']}} {{$item['title']}}</h2>
                                <h3 class="subtitle">{{$item['Institute']}}</h3>
                                <label class="date">
                                    <label class="text-date">تاریخ :</label>
                                    "{{$item['Institute']}}"
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="property-item research__list" >
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label>  تحقیفات   </label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history one-line">
                        @foreach ($data['articles'] as $item)
                            <li  >
                                <h2 class="subtitle bidirectional"> {{$item['effect']['title']}}  {{$item['title']}}</h2>
                                <h3 class="subtitle"> 
                                    ناشر : 
                                    <span>{{$item['publisher']}}</span>
                                </h3>
                                <label class="date">
                                    <label class="text-date">تاریخ :</label>
                                    "{{$item['date']}}"
                                </label>
                                <p class="project-link"> 
                                    لینک مربوطه 
                                    <a href="#" target="_blank">{{$item['link']}}</a>
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="property-item project__list" >
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label >  پروژه ها   </label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history one-line">
                        @foreach ($data['projects'] as $item)
                            <li >
                                <h2 class="subtitle bidirectional"> {{$item['title']}} </h2>
                                <h3 class="subtitle"> 
                                    کارفرما /درخواست کننده : {{$item['company']}}
                                </h3>
                                <label class="date">
                                    <label class="text-date">تاریخ :</label>
                                    "{{$item['date']}}"
                                </label>
                                <p class="project-link"> 
                                    لینک مربوطه 
                                    <a href="#" target="_blank">{{$item['link']}}</a>
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="property-item honor__listt" >
                    <div class="property-item_head">
                        <span>
                        </span>
                        <label >  افتخارات    </label>
                    </div>
                    <div class="property-item_body">
                        <ul class="history list-item">
                        @foreach ($data['honors'] as $item)
                            <li>
                                
                                <p class="bidirectional"> 
                                    {{$item['title']}}
                                </p>
                                <label class="date">
                                    <label class="text-date">تاریخ :</label>
                                    "{{$item['date']}} "
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>