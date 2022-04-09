export default function memberNotCompelete ({ next, store }){

    if( localStorage.getItem('role') != 'NotMember' ){
        return next({name : 'Home'})
    }
    return next()
}
