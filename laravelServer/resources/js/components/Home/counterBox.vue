<template>
    <div class="row">
        <div class="col-12  col-md-3 col-sm-6">
            <div class="d-flex flex-column justify-content-center align-items-center" style="color: #777">
                <span class="counter-block d-flex justify-content-center align-items-center">
                      <v-employee-icon></v-employee-icon>
                </span>
                <h6 style="text-transform: uppercase;font-weight: 300;letter-spacing: 1px;font-size: 1rem;margin: 10px 0 0;">
                    تعداد کارمندها
                </h6>
                <h3 class="mt-4">{{ count.base }}</h3>
            </div>
        </div>
        <div class="col-12  col-md-3 col-sm-6">
            <div class="d-flex flex-column justify-content-center align-items-center" style="color: #777">
                <span class="counter-block d-flex justify-content-center align-items-center">
                    <v-company-icon></v-company-icon>
                </span>
                <h6 style="text-transform: uppercase;font-weight: 300;letter-spacing: 1px;font-size: 1rem;margin: 10px 0 0;">
                    تعداد شرکت ها
                </h6>
                <h3 class="mt-4">{{ count.company }}</h3>
            </div>
        </div>
        <div class="col-12  col-md-3 col-sm-6">
            <div class="d-flex flex-column justify-content-center align-items-center" style="color: #777">
                <span class="counter-block d-flex justify-content-center align-items-center">
                    <v-applied-icon></v-applied-icon>
                </span>
                <h6 style="text-transform: uppercase;font-weight: 300;letter-spacing: 1px;font-size: 1rem;margin: 10px 0 0;">
                    تعداد آگهی ها
                </h6>
                <h3 class="mt-4">{{ count.activeAds }}</h3>
            </div>
        </div>
        <div class="col-12  col-md-3 col-sm-6">
            <div class="d-flex flex-column justify-content-center align-items-center" style="color: #777">
                <span class="counter-block d-flex justify-content-center align-items-center">
                    <v-advertising-icon></v-advertising-icon>
                </span>
                <h6 style="text-transform: uppercase;font-weight: 300;letter-spacing: 1px;font-size: 1rem;margin: 10px 0 0;">
                    تعداد استخدامی ها
                </h6>
                <h3 class="mt-4">{{ count.applied }}</h3>
            </div>
        </div>
    </div>
</template>

<script>

import applied from '../icon/applied'
import advetising from '../icon/advertiisng'
import company from '../icon/company';
import employee from '../icon/employee'

export default {
    props : ['count'] ,
    components :  {
        'v-applied-icon' : applied ,
        'v-advertising-icon' : advetising ,
        'v-company-icon'  : company ,
        'v-employee-icon'  :employee
    },
    name: "counterBox" ,
}
</script>

<style scoped>
.counter-block {
    width: 70px;
    height: 70px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    padding: 10px;
    border-radius: 50%;
}
</style>
