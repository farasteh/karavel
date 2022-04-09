<template>
  <HomeStaffItem :similarStaffList="similarStaffList" :staff="staff"></HomeStaffItem>
</template>

<script>
    export default {
      layout :'default' ,
    head() {
        return {
          title: ` رزومه ${this.staff.name} ${this.staff.last_name} - استخدام آژانس مسافرتی . هواپیمایی - کاراول ` ,
          meta: [
            {
              hid: 'description',
              name: 'description',
              content: `${this.descReg}  - استخدام آژانس مسافرتی و هواپیمایی `
            }
          ]
        }
      },
      async fetch({store , route }) {
        await store.dispatch('Site/Staff/loadSimilarStaff', {id: route.params.id})
        await  store.dispatch('Site/Staff/LoadStaff' , {id : route.params.id})
      },
      computed : {
        similarStaffList() {return this.$store.state.Site.Staff.similarStaffList},
        staff() { return this.$store.state.Site.Staff.staff},
        descReg() {
          if(this.staff.comment) {
            let comment =  this.staff.comment
            let comment2 =  comment.replace(/(<([^>]+)>)/ig, "");
            let comment3 = comment2.replace(/\&nbsp;/g, "");
            return comment3.replace('"' , '');
          }
          else
            return ''
        }
      }
    }
</script>
