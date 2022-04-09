export const state = () => ({
  pdfThemes: {},
})

export const mutations = {
  SET_PDF(state, pdfThemes) {
    state.pdfThemes = pdfThemes
  }
}


export const actions = {
  async LoadPdfThemes(state) {
    this.$axios.get('api/v1/member/pdf-theme')
      .then(response => {
        state.commit('SET_PDF', response.data.data)
      })
      .catch(error => console.log(error))
  }
}
