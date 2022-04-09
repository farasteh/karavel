export default function ({ redirect , app }){

    if( app.$cookies.get('role') != 'NotCompany' ){
      return redirect('/')
    }
}
