export default function ({  app , redirect }){
  console.log(app.$cookies.get('role'))
     if(app.$cookies.get('role') == 'NotCompany') {
         return redirect( '/register/company')
     }
     else if( app.$cookies.get('token') == null || app.$cookies.get('role') != 'Company' ){
       return redirect( '/users/login-register/Company' )
    }
}
