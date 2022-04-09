export default function ({route , redirect , next}) {
  if(Object.keys(route.query).length != 0)
  {
    console.log(route.query)
    if(route.query.job1 && route.query.job2 && route.query.province
      && route.query.job1 != ''  && route.query.job2 != '' && route.query.province != '')
    {
      return next
    }
    else
      return  redirect( '/filterStaffs' )
  }
  else
    return  redirect( '/filterStaffs' )
}
