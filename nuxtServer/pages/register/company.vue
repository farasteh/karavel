<template>
<client-only>
  <AuthCreateCompany></AuthCreateCompany>
</client-only>

</template>

<script>
export  default  {
  layout : 'no-default' ,
  middleware : 'companyNotComplete'
}
</script>
