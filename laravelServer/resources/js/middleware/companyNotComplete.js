export default function companyNotComplete ({ next, store }){

    if( localStorage.getItem('role') != 'NotCompany' ){
        return next({name : 'Home'})
    }
    return next()
}
