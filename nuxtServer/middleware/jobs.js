export default function ({route , redirect , next}) {
  if(Object.keys(route.query).length != 0)
  {
    console.log(route.query.job1)
    if(route.query.job1 && route.query.job2 && route.query.job1 != ''  && route.query.job2 != '')
    {
      return next
    }
    else
     return  redirect( '/filterJobs' )
  }
  else
    return  redirect( '/filterJobs' )
}
