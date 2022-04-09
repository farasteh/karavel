<template>
  <div>
    <div v-if="theme == 2 ">
      <CompanyPdfTheme2 :id="id"></CompanyPdfTheme2>
    </div>
  </div>
</template>

<script>
export default {
  props :  [ 'theme' , 'id' ] ,

  data(){
    return{
    }
  },
}

</script>
<style scoped>
</style>
