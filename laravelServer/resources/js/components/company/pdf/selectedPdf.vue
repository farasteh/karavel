<template>
    <div>
        <div v-if="theme == 2 ">
            <theme2 :id="id"></theme2>
        </div>
    </div>
</template>

<script>
import theme2 from './templates/theme2.vue'

export default {
    props :  [ 'theme' , 'id' ] ,
     components: {theme2},
    data(){
      return{
      }
    },
}

</script>
<style scoped>
</style>
