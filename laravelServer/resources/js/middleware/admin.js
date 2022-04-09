export default function isAdmin ({ next, store }){
    if( localStorage.getItem('token') == null || localStorage.getItem('role') != 'Admin'  ){
        return next({
            name : 'Login'
        })
    }
    return next()
}
