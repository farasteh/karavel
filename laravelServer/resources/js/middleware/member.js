
export default function isMember ({ next, store }){
    // store.getters.memberRole != 'Member'
    if(localStorage.getItem('role') == 'NotMember')
    {
        return next({name : 'RegisterMember'})
    }
    else if(localStorage.getItem('token') == null || localStorage.getItem('role') != 'Member' ){
        console.log(localStorage.getItem('role'))
        return next({
            name : 'RegisterLogin' ,
            params : { type: 'Member' }
        })
    }
    return next()
}
