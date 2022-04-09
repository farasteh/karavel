import Axios from "axios"

export default {
    state: {
        Step: '1'
    },
    mutations :{
        NumberStep(state,number){
            state.Step = number;
        }
    }
}
