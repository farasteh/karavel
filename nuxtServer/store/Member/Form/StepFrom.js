export const state = () => ({
  Step: '1'
})

export const mutations = {
  NumberStep(state,number){
    state.Step = number;
  }
}
