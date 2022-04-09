<template>
  <div>
      <div v-show="show" style="background: #fff;margin-top: 31px;">
          <div  style="padding: 50px;" class="loadingBox">
              <p style="text-align: center;margin-top: 31px;font-size: 12px;">در حال جستجو تمام شغل ها برای شماست...</p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "loadingBox",
    props:{
        show: {
            type: Boolean,
            default: true,
        },
    }
}
</script>s

<style scoped>

</style>
