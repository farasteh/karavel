export default function ({ redirect ,  app }) {
    if( app.$cookies.get('token') != null &&  app.$cookies.get('role') == 'NotCompany') {
      return redirect('/register/company')
    }
    else if( app.$cookies.get('token') != null && app.$cookies.get('role') == 'NotMember') {
      return redirect('/register/member')
    }
    else if(  app.$cookies.get('token') == null ){
      return redirect( '/users/login-register/Member')

    }
}
