<template>
  <div>
    <div class="row pb-3">
      <div  class="col-6">مهارت های رفتاری</div>
      <div class="col-6">
        <Button  @click="CreateSkill()" class="col-8 float-left" type="primary">
          <Icon class="font-18 font-weight-bold" type="md-add" />ثبت مهارت رفتاری جدید
        </Button>
      </div>
    </div>
    <div>
      <div slot="content" class="content" v-for="(skill , index) in behavioralSkills" :key="index">
        <div class="row">
          <div class="col-6">  {{skill.title}}</div>
          <div class="col-6">
            <Button  @click="EditSkill(skill.title , skill.id , index)" class="col-md-1 col-4 btn-admin" >
              <Icon class="font-18 font-weight-bold d-flex justify-content-center" type="ios-create" />
            </Button>
            <Button  @click="DeleteSkill(skill.title , skill.id , index)" class="col-md-1 col-4 btn-admin">
              <Icon class="font-18 font-weight-bold d-flex justify-content-center"  type="ios-trash" />
            </Button>
          </div>
        </div>
      </div>
    </div>
    <Modal v-model="modal2" class-name="vertical-center-modal" >
      <p slot="header" class="text-center">
        <span>{{TitleModel}}</span>
      </p>
      <div class="text-center">
        <input type="hidden" v-model="id">
        <input type="hidden" v-model="type">
        <Form ref="formValidate">
          <FormItem :class="{ 'ivu-form-item-error': $v.title.$error,'is-valid': !$v.title.$invalid }">
            <Input size="large"
                   :class="{ 'ivu-form-item-error animation-error': $v.title.$error,'is-valid': !$v.title.$invalid }"
                   v-model.trim="$v.title.$model"></Input>
            <div class="ivu-form-item-error-tip" v-if="$v.title.$error">فیلد مورد نظر را پرکنید</div>
          </FormItem>
        </Form>
      </div>
      <div slot="footer">
        <Button type="primary" size="large"  long :loading="modal_loading" @click="putSkill()">ثبت مهارت رفتاری</Button>
      </div>
    </Modal>

    <Modal v-model="modal3" width="360">
      <input type="hidden" v-model="id">
      <p slot="header" class="text-center" style="color:#f60;">
        <Icon type="ios-information-circle"></Icon>
        <span>حذف مهارت {{TitleDelet}}</span>
      </p>
      <div class="text-center">
        <p>آیا از حذف مهارت {{TitleDelet}} مطمعن هستید؟</p>
      </div>
      <div slot="footer">
        <Button type="error" size="large" long :loading="modal_loading" @click="deleteS">حذف</Button>
      </div>
    </Modal>

  </div>
</template>
<script>
import { required } from 'vuelidate/lib/validators'

export default {
  name : 'behavioralSkill' ,
  data () {
    return {
      modal2 : false  ,
      modal_loading: false,
      TitleModel: '',
      TitleDelet: '',
      id : '' ,
      modal3 : false ,
      index : '' ,
      type : '' ,
      title : ''
    }
  },
  validations: {
    title:{
      required
    },
  },
  mounted() {
    this.$store.dispatch('Advertising/behavioralSkill/LoadBehavioralSkills');
  },
  methods: {
    CreateSkill() {
      this.modal2 = true;
      this.TitleModel = 'ثبت مهارت رفتاری جدید';
      this.title = '';
      this.id = '';
      this.type = 'create'
    } ,
    DeleteSkill( title , id , index ){
      this.modal3 = true;
      this.TitleDelet = title;
      this.id = id;
      this.index = index
    },
    EditSkill( title , id , index ){
      this.modal2 = true;
      this.TitleModel = 'ویرایش مهارت '+ title;
      this.title = title;
      this.id = id;
      this.type = 'edit';
      this.index = index
    },
    putSkill(){
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.ErrorNotify()
      }
      else{
        if(this.type == 'create')
          this.newSkill()
        else if( this.type == 'edit' )
          this.updateSkill()
      }
    },

    newSkill() {
      this.modal_loading = true;
      this.$store.dispatch('Advertising/behavioralSkill/storeBehavioralSkill', { 'title': this.title })
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' ,`مهارت ${response.data.data.skill.title} با موفقیت ثبت شد`)
          this.modal_loading = false;
          this.modal2 = false;
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify')
        });
    }  ,
    updateSkill() {
      this.modal_loading = true;
      this.$store.dispatch('Advertising/behavioralSkill/updateBehavioralSkill', { 'id': this.id  , 'title' : this.title})
        .then(response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
          this.modal_loading = false;
          this.modal2 = false;
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify')
        });
    },
    deleteS ( id , index) {
      this.modal_loading = true;
      this.$store.dispatch('Advertising/behavioralSkill/deleteBehavioralSkill', { 'id': this.id  , 'index' : this.index})
        .then( response => {
          this.$store.dispatch('globalFunctions/SuccessNotify' , response.data.data.message)
          this.modal_loading = false;
          this.modal3 = false;
        })
        .catch(error => {
          this.modal_loading = false;
          this.$store.dispatch('globalFunctions/ErrorNotify')
        });
    }
  },
  computed : {
    behavioralSkills(){return this.$store.state.Advertising.behavioralSkill.behavioralSkills},
  }
}
</script>
<style>

.content {
  color: #515a6e;
  padding: 10px 16px;
  background-color: #fff;
  margin-top: 10px;
  box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11), 0 5px 15px 0 rgba(0, 0, 0, 0.08);
}
</style>
