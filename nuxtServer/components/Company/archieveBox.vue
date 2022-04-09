<template>
  <div>
    <div class="box-A karavel-box">
      <div v-if="Advertisings.status == ''" class="box-stuatus back-stuatus"></div>
      <div v-if="Advertisings.status == 'no'" class="box-stuatus back-stuatus-error"></div>
      <div v-if="Advertisings.status == ''" class="col-lg-2 mb-2 back-stuatus status-box">بررسی نشده</div>
      <div v-if="Advertisings.status == 'no'" class="col-lg-2 mb-2 back-stuatus-error status-box">تایید نشده</div>
      <!-- <div v-if="Advertisings.status == ''" class="box-stuatus"></div> -->
      <div class="row">
        <div class=" col-8 ">
                <span style="font-weight: bold;font-size: 16px;">
                    <nuxt-link :to="`/posts/edit/${Advertisings.id}?type=archieved`">
                        <span style="color: #515a6e">
                            {{Advertisings.title}}
                        </span>
                    </nuxt-link>
                    <span style="font-size: 13px">
                        (
                        <span>
                           {{Advertisings.created_at}}
                        </span>
                        )
                    </span>
                </span>
        </div>
        <div class="col-4">
          <Button  id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  class="col-lg-6 btn-default-job" ><Icon type="ios-settings" />تنضیمات</Button>
          <div style="border-radius: .5rem;" class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <div style="cursor: pointer;" @click="restoreAdvertisings(Advertisings.id)" class="dropdown-item">
              <Icon class="box-icon" type="ios-share" />
              <span>  فعال کردن</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  props:['Advertisings'],
  data() {
    return {
      ad : '' ,
      stat : '' ,
      filterResume : [] ,
      loading : false ,
      fullPage: false  ,
    }
  },
  methods: {
    restoreAdvertisings (id)  {
      this.$confirm("آیا از فعال کردن این آگهی اطمینان دارید؟").then(() => {
        this.loading = true
        this.$store.dispatch('Company/advertizing/restoreCompanyAdvertizing', {id: id})
          .then(success => {
            this.$store.dispatch('globalFunctions/SuccessNotify' , 'با موفقیت به لیست آگهی های فعال اضافه شد.')
            this.loading = false
          })
          .catch(error => {
            this.$store.dispatch('globalFunctions/ErrorNotify')
          });
      })
    }
  } ,
}
</script>

<style scoped>
.selected {
  background: #2d8cf0;
  color: #fff !important;
}
.btn-default-job{
  background: #fff linear-gradient(180deg,#fafbfc,#fff) repeat-x;
  color: #595f66;
  border-color: #c9d2dc;
  box-shadow: none;
  box-shadow: 0 0 3px 0 rgba(188,205,215,.2), 0 1px 5px 0 rgba(188,205,215,.2), 0 3px 1px -1px rgba(188,205,215,.2);
  background-image: linear-gradient(-180deg,#fff,#f5f8f9 99%)!important;
  float: left;
}
.box-stuatus{
  height: 100%;
  width: 6px;
  position: absolute;
  right: 0;
  top: 0;
  border-radius: 0px 24px 25px 0px;
}
.back-stuatus{
  background: yellow;
}
.back-stuatus-error{
  background: red;
}
.box-B {
  background: #ececec;
  background-clip: border-box;
  position: relative;
  display: none;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  padding: 15px;
  margin-top: -5px !important;
  transition: opacity 1s ease-out;
  opacity: 0;
}
.box-B.active {
  display: flex;
  opacity: 1;
  color: #1b1e21 !important;
  /*transition: display 0s, opacity 0.5s linear;*/
}
.status-box {
  position: absolute;
  left: 20%;
  text-align: center;
}
@media screen and (max-width: 991px) {
  .status-box {
    position: relative;
    left: 0%;
    text-align: center;
  }
}
</style>
