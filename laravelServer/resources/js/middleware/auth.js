export default function auth ({ next, store }) {
    if(localStorage.getItem('token') != null && localStorage.getItem('role') == 'NotCompany') {
        return next({name : 'RegisterCompany'})
    }
    else if(localStorage.getItem('token') != null && localStorage.getItem('role') == 'NotMember') {
        return next({name : 'RegisterMember'})
    }
    else if( localStorage.getItem('token') == null ){
        return next({
            name : 'RegisterLogin' ,
            params : { type: 'Member' }
        })
    }
    return next()
}
