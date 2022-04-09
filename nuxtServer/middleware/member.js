
export default function ({ redirect , app }){
    // store.getters.memberRole != 'Member'
    if(app.$cookies.get('role') == 'NotMember')
    {
      return redirect('/register/member')
    }
    else if(app.$cookies.get('token') == null || app.$cookies.get('role') != 'Member' ){
      return redirect('/users/login-register/Member')
    }
}
