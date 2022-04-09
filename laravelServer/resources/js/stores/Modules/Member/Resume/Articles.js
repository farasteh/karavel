import Axios from "axios"

export default {
    state: {
        Articles: {
            items: []
        }
    },
    mutations: {
        SET_LOAD_ARTECLES(state, Articles) {
            state.Articles.items = Articles
        },
        Delete_ARTICLE_RESUME (state  , id) {
            state.Articles.items.splice(id , 1)
        }
    },
    getters: {
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
        uarticles(state) {
            return state.Articles.items.map(t => {
                const Array1 = t.date.split("-");
              return {
                ...t,
                month: Array1[1] ,
                year : Array1[0].substr(2,2),
                yearelect : Array1[0].substr(0,2),
              }
            })
        }
    },
    actions: {
        async LoadArticlesResume({ commit }) {
            return new Promise((resolve, reject) => {
                Axios.get('api/v1/member/load-articles')
                    .then(response => {
                        commit('SET_LOAD_ARTECLES', response.data.data)
                        resolve(response)
                    })
                    .catch(error => reject(error))
            });
        },
        async deleteArticleResume( {commit} , payload ) {
            axios.delete(`api/v1/member/load-articles/${payload.id}`)
                .then(
                    commit( 'Delete_ARTICLE_RESUME' , payload.index)
                )
                .catch ( error => {
                    console.log(error)
                })
        }

    }
}
