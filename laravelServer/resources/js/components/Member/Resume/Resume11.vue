<template>
    <div id="watch-example">
  <p>
    Ask a yes/no question:
    <input v-model="question">
    <div v-for="pp in Jobs" :key="pp.id">{{pp.title}}</div>
  </p>
  <p>{{ answer }}</p>
</div>
</template>
<script>
export default {
      data() {
          return{
                question: '',
    answer: 'I cannot give you an answer until you ask a question!'
          }
  },
  computed:{
Jobs(){return this.$store.state.Job.Jobs;},
  },
  mounted(){
  },
  watch: {
    // whenever question changes, this function will run
    question: function () {
        alert('sd');
      this.answer = 'Waiting for you to stop typing...'
      this.debouncedGetAnswer()
    },
    Jobs(){
      console.log(this.$store.state.Job.Jobs)
    }
  },
  created: function () {
    this.$store.dispatch('LoadJobs');
    this.debouncedGetAnswer = _.debounce(this.getAnswer, 500)
  },
  methods: {
    getAnswer: function () {
      if (this.question.indexOf('?') === -1) {
        this.answer = 'Questions usually contain a question mark. ;-)'
        return
      }
      this.answer = 'Thinking...'
      var vm = this
      axios.get('https://yesno.wtf/api')
        .then(function (response) {
          vm.answer = _.capitalize(response.data.answer)
        })
        .catch(function (error) {
          vm.answer = 'Error! Could not reach the API. ' + error
        })
    }
  }
}
</script>