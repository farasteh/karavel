export default function isCompany ({ next, store }){
    if(localStorage.getItem('role') == 'NotCompany') {
        return next({name : 'RegisterCompany'})
    }
    else if( localStorage.getItem('token') == null || localStorage.getItem('role') != 'Company' ){
        return next({
            name : 'RegisterLogin' ,
            params : { type: 'Company' }
        })
    }
    return next()
}
