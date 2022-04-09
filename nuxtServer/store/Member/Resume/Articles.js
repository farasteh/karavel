export const state = () => ({
  Articles: {
    items: []
  }
})

export const mutations = {
  SET_LOAD_ARTECLES(state, Articles) {
    state.Articles.items = Articles
  },
  Delete_ARTICLE_RESUME (state  , id) {
    state.Articles.items.splice(id , 1)
  } ,
  ADD_CREATE_EFFECT ( state) {
    state.Articles.items.push({
      effect: '',
      title: '',
      publisher: '',
      link: '',
      comment: '',
      date: '',
      type :'create',
    })
  }
}

export const getters = {
  Articles: state => {
    if(state.Articles.items.length == 0 ) {
      state.Articles.items.push({
        effect: '',
        title: '',
        publisher: '',
        link: '',
        comment: '',
        date: '',
        type :'create',
      })
    }
    return state.Articles
  },
    CountArticles: (state, getters) => {
    return getters.Articles.items.length
  },
}

export const actions = {

  async LoadArticlesResume( state ) {
    return new Promise((resolve, reject) => {
      this.$axios.get('api/v1/member/load-articles')
        .then(response => {
          state.commit('SET_LOAD_ARTECLES', response.data.data)
          resolve(response)
        })
        .catch(error => reject(error))
    });
  },
  async deleteArticleResume( state , payload ) {
    this.$axios.delete(`api/v1/member/load-articles/${payload.id}`)
      .then(
        state.commit( 'Delete_ARTICLE_RESUME' , payload.index)
      )
      .catch ( error => {
        console.log(error)
      })
  }

}
