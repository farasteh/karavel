@component('mail::message')
<div style="text-align: right !important;display: flex !important;justify-content: right;">
<p> کاربری با نام {{ $user->name  }} برای شما رزومه فرستاده است.  </p>
</div>
@component('mail::button',['url' => url('/#/login-token-company/'.$company->token)])
 <span>مشاهده رزومه</span>
@endcomponent

@endcomponent


