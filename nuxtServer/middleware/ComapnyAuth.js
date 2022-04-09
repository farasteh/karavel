export default function({ next, redirect  ,route , app }) {
    if ( Object.keys(route.query).length != 0) {
        if( route.query.notice)
        {
          return next
         }
    }
    else {
        if(app.$cookies.get('token') != null && app.$cookies.get('role') == 'NotCompany') {
          return redirect('/register/company')
        }
        else if(app.$cookies.get('token') != null && app.$cookies.get('role') == 'NotMember') {
          return redirect('/register/member')
        }
        else if( app.$cookies.get('token') == null ){
          return redirect('/users/login-register/Member' )
         }
     }
}
