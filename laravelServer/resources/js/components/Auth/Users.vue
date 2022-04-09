<template>
    <div>
        <div class="container-login100" style="">
            <div style="position: relative;" class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                <div class="wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 100%;" viewBox="0 0 1600 720">
                        <defs>
                            <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%">
                                <stop offset="0%" stop-color="#1D58F5"/>
                                <stop offset="100%" stop-color="#3B90F7"/>
                            </linearGradient>
                            <path id="b" d="M114.960237,0 L1618.03976,0 C1618.03976,0 1876.9207,418.271277 1618.03976,506.271277 C1359.15883,594.271277 1289,506 1117.01325,544.058511 C945.026509,582.117021 874.328539,725.845745 615.986746,661.845745 C357.644952,597.845745 373.323297,827.632979 114.960237,827.632979 C-143.402823,827.632979 114.960237,0 114.960237,0 Z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd" transform="translate(-78 -108)">
                            <path fill="url(#a)" d="M114.960237,16 L1618.03976,0 C1618.03976,0 1844.9207,290.271277 1658.03976,442.271277 C1471.15883,594.271277 1375.35505,432.058511 1117.01325,520.058511 C858.671461,608.058511 874.328539,741.845745 615.986746,701.845745 C357.644952,661.845745 373.323297,827.632979 114.960237,827.632979 C-143.402823,827.632979 114.960237,16 114.960237,16 Z" opacity=".2"/>
                            <mask id="c" fill="white">
                                <use xlink:href="#b"/>
                            </mask>
                            <use fill="url(#a)" xlink:href="#b"/>
                            <g mask="url(#c)" opacity=".7">
                                <g transform="translate(-660.065 -775.149)">
                                    <path fill="#94C5FF" d="M754.067729,531.446809 L571.838569,975.459523 C546.600934,1036.94566 486.601576,1077.11086 419.986934,1077.11086 L82.1996616,1077.11086 L264.434819,633.10413 C289.672454,571.612009 349.671812,531.446809 416.280456,531.446809 L754.067729,531.446809 Z" opacity=".06"/>
                                    <path fill="#94C5FF" d="M1922.70825,0 L1522.44479,975.266913 C1467.01072,1110.32024 1335.22308,1198.54247 1188.90507,1198.54247 L0,1198.69149 L400.276643,223.437717 C455.71071,88.3712451 587.498353,0.149016157 733.803188,0.149016157 L1922.70825,0 Z" opacity=".06"/>
                                    <path fill="#1A32AF" fill-opacity=".4" d="M2566.38343,880.016429 L2341.04653,1429.06383 C2309.83874,1505.095 2235.64606,1554.76159 2153.2732,1554.76159 L631,1554.74516 L856.344311,1005.70516 C887.552106,929.666594 961.744783,880 1044.11022,880 L2566.38343,880.016429 Z" opacity=".31"/>
                                    <path fill="#0092FF" fill-opacity=".2" d="M2632.59095,606.319149 L2497.22956,936.135609 C2478.48283,981.808041 2433.91479,1011.6431 2384.43286,1011.6431 L1755.54992,1011.6431 L1890.91576,681.831081 C1909.66249,636.154205 1954.23053,606.319149 2003.708,606.319149 L2632.59095,606.319149 Z" opacity=".7"/>
                                    <path fill="#0092FF" fill-opacity=".2" d="M2512.22716,1249.34043 L2376.86577,1579.15689 C2358.11904,1624.82932 2313.551,1654.66437 2264.06907,1654.66437 L314.120135,1654.66437 L449.485976,1324.85236 C468.232708,1279.17548 512.800747,1249.34043 562.278221,1249.34043 L2512.22716,1249.34043 Z" opacity=".4"/>
                                </g>
                            </g>
                            <path fill="#0055FF" d="M114.960237,16 L1618.03976,0 C1618.03976,0 1948,228 1658,352 C1368,476 1349,596 1165.5,635.5 C982,675 826.341794,515.5 616,659.5 C405.658206,803.5 373.323297,787.632979 114.960237,763.632979 C-143.402823,739.632979 114.960237,16 114.960237,16 Z" opacity=".1"/>
                        </g>
                    </svg>

                </div>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "users",
    mounted() {
        // this.$router.push({ path: "/users/login-register"})
    },
    created() {
        window.addEventListener('beforeunload', this.handler)
    },


    updated() {
        // this.$router.push({ path: "/users/login-register"})
    },
    beforeUpdate() {
        // this.$router.push({ path: "/users/login-register"})
    },
    methods:{
        Body : function (){
            this.$router.push({ path: "/users/login-register"})
            // document.getElementById("p2").style.overflow = "hidden";
        }
    }
}
</script>

<style >




/*//////////////////////////////////////////////////////////////////
[ FONT ]*/



/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/


input {
    outline: none;
    border: none;
}



/*---------------------------------------------*/



input::-webkit-input-placeholder { color: #4b2354;}
input:-moz-placeholder { color: #4b2354;}
input::-moz-placeholder { color: #4b2354;}
input:-ms-input-placeholder { color: #4b2354;}

textarea::-webkit-input-placeholder { color: #4b2354;}
textarea:-moz-placeholder { color: #4b2354;}
textarea::-moz-placeholder { color: #4b2354;}
textarea:-ms-input-placeholder { color: #4b2354;}

/*!*---------------------------------------------*!*/
button {
    outline: none !important;
    border: none;
    background: transparent;
}
input[type=number] {
    -moz-appearance: textfield;
}
button:hover {
    cursor: pointer;
}

iframe {
    border: none !important;
}



/*//////////////////////////////////////////////////////////////////
[ Utility ]*/
.txt1 {
    font-size: 16px;
    line-height: 1.4;
    color: #999999;
}

.txt2 {
    font-size: 16px;
    line-height: 1.4;
    color: #4b2354;
}

.hov1:hover {
    color: #4b2354;
    text-decoration: underline;
}


/*//////////////////////////////////////////////////////////////////
[ login ]*/

.container-login100 {
    width: 100%;
    min-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    z-index: 1;
}

.container-login100::before {
    content: "";
    display: block;
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(93,84,240,0.5);
    background: -webkit-linear-gradient(left, rgba(0,168,255,0.5), rgba(185,0,255,0.5));
    background: -o-linear-gradient(left, rgba(0,168,255,0.5), rgba(185,0,255,0.5));
    background: -moz-linear-gradient(left, rgba(0,168,255,0.5), rgba(185,0,255,0.5));
    /*background: linear-gradient(left, rgba(0,168,255,0.5), rgba(185,0,255,0.5));*/
    pointer-events: none;
}

.wrap-login100 {
    width: 390px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;

    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}


/*==================================================================
[ Form ]*/

.login100-form {
    width: 100%;
    margin-top: 10px;
}

.login100-form-title {
    display: block;
    font-size: 25px;
    color: #4b2354;
    line-height: 1.2;
    text-align: center;
}

/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
    width: 85%;
    position: relative;
    background-color: #fff;
    border-radius: 20px;
    margin: auto;
    margin-top: 30px;
    margin-bottom: 30px;
}

.input100 {
    font-size: 16px;
    color: #4b2354;
    line-height: 1.2;

    display: block;
    width: 100%;
    height: 62px;
    background: transparent;
    padding: 0 20px 0 23px;
}


/*------------------------------------------------------------------
[ Focus Input ]*/

.focus-input100 {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    border-radius: 20px;
    box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
}

.input100:focus + .focus-input100 {
    box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
    -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.2);
}

/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
    width: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.login100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 50px;
    background-color: #2772f2;
    border-radius: 25px;
    font-size: 16px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;

    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;

    box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
    -moz-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
    -webkit-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
    -o-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
    -ms-box-shadow: 0 10px 30px 0px rgba(131, 195, 253, 0.65);
}
 .error-btn{
    background-color: #6e6e6f !important;
    box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
    -moz-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
    -webkit-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
    -o-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
    -ms-box-shadow: 0 10px 30px 0px rgba(148, 150, 151, 0.65) !important;
    cursor: no-drop !important;
}
.login100-form-btn:hover {
    background-color: #263a88;
    box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
    -moz-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
    -webkit-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
    -o-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
    -ms-box-shadow: 0 10px 30px 0px rgba(158, 179, 242, 0.8);
}


/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
    position: relative;
}

.alert-validate .focus-input100 {
    box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
    -moz-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
    -webkit-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
    -o-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
    -ms-box-shadow: 0 5px 30px 0px rgba(250, 66, 81, 0.1);
}

.alert-validate::before {
    content: attr(data-validate);
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    position: absolute;
    width: 100%;
    min-height: 62px;
    background-color: #fff;
    border-radius: 20px;
    top: 0px;
    left: 0px;
    padding: 0 45px 0 22px;
    pointer-events: none;

    font-family: SourceSansPro-Bold;
    font-size: 16px;
    color: #fa4251;
    line-height: 1.2;
}

.btn-hide-validate {
    font-family: Material-Design-Iconic-Font;
    font-size: 15px;
    color: #fa4251;
    cursor: pointer;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    height: 62px;
    top: 0px;
    right: 23px;
}

.rs1-alert-validate.alert-validate::before {
    background-color: #fff;
}

.true-validate::after {
    content: "\f269";
    font-family: Material-Design-Iconic-Font;
    font-size: 15px;
    color: #57b846;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    height: 62px;
    top: 0px;
    right: 23px;
}



/*//////////////////////////////////////////////////////////////////
[ Social item ]*/

.login100-social-item {
    font-size: 25px;
    color: #3b5998;

    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    margin: 5px;
    box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
}

.login100-social-item img {
    width: 26px;
}

.login100-social-item:hover {
    color: #3b5998;
    box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
    -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
    -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.2);
}

/*//////////////////////////////////////////////////////////////////
[ Responsive ]*/

@media (max-width: 720px) {
    .container-login100{
        padding: 0;
        height: 100vh;
    }
    .login100-form {
        margin-top: 10px;
    }
    .box-back{
        position: absolute;
        top: 130px;
    }
    .wrap-login100{
        height: 100%;
        border-radius: 0;
    }
}

.box-back{
    width: 50px;
    height: 50px;
    background: #fff;
    border-radius: 50%;
    margin-right: 20px;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
    align-items: center !important;
    justify-content: center;
    flex-wrap: wrap;
    font-size: 20px;
    -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.18);
    cursor: pointer;
    position: absolute;
    top: 130px;
}
.box-back:hover{
    box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
    -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
    -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
    -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
    -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.26);
}
</style>
