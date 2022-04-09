export default function ({ redirect , app }){
    if( app.$cookies.get('token') == null || app.$cookies.get('role') != 'Admin'  ){
        return redirect('/login')
    }
}
