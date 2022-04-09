<template>
  <div>
    <section>
      <div class="box-search-header box-header-home"
           :style="{'background-image': 'url(' + Company.banner + ')'}">
      </div>
      <div></div>
      <div class="col-12 col-md-8 m-auto profile-company">
        <compnyPro  v-if="loading"></compnyPro>
        <div v-else class="row px-2">
          <div class="header-image-show-page">
            <img v-if="ErrorImage"  src="~/assets/images/company/no-company.png"  :alt="Company.name_fa">
            <img v-else :src="Company.logo"  :alt="Company.name_fa" @error="imageError">
          </div>
          <div class="box-header-text d-flex align-items-center">
            <div class="col-12">
              <div class="col-12 text-dark pt-3">
                <h1 v-if="Company" style="font-size: 18px"> {{Company.name_fa}} ({{Company.name_en}}) </h1>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
</template>
<script>
export default {
  name : 'HeaderCompany',
  props: ['Company' , 'loading'],
  data () {
    return {
      ErrorImage : false ,
    }
  },
  methods : {
    imageError ()  {
      this.ErrorImage = true
    },
  }
}
</script>
<style scoped>
.profile-company {
  margin-top: -70px !important
}
.box-header-home{
  background-image: url("~/assets/images/Header.jpg");
  background-size: cover;
  box-shadow: none !important;
  background-position: center;
    background-repeat: no-repeat;
    background-position: center center;
    background-color: #f2f1f7;
}
.box-search-header{
  height: 175px !important;
  color: #fff;
  font-size: 18px;
  display: flex !important;
  align-items: center !important;
  justify-content: center;
  flex-wrap: wrap ;
}

.loadin-select-search{
  display: flex;
  position: absolute;
  z-index: 99;
  left: 0;
  left: 95px;
  top: 10px;
}
.header-image-show-page{
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: #fefefe;
  padding: 15px;
  box-shadow: 1px 1px 5px 1px rgba(7,1,1,.38824);
  display:flex;
  justify-content  : center;
}
.header-image-show-page::before {
  content: '' ;
}
.header-image-show-page img{
  width: 83%;
  height: 100%;
  object-fit: contain;
}
.box-header-text{
  margin-top: 20px;
  margin-right: 15px;
  color: #fff;
}

@media screen and (max-width: 992px) {
  .profile-company {
    margin-top: -7% !important
  }
}
@media screen and (max-width: 768px) {
  .profile-company {
    margin-top: -7% !important
  }
  .header-image-show-page{
    width: 120px ;
    height: 120px;
    margin-right: 10px;
  }
}
@media screen and (max-width: 480px) {
  .profile-company {
    margin-top: -12% !important
  }
}
@media screen and (max-width: 370px) {
  .profile-company {
    margin-top: -15% !important
  }
}

</style>
