<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'user'=>[
        'blocked'=>[
            'massage' => 'کار بر محترم اکانت شما توسط پشتیبانی مصدود شده'
        ],
        'login'=>[
            'massage' => 'رمز ورود یا ایمیل شما اشتباه می باشد'
        ],
        'register'=>[
          'massage_true' => 'ثبت نام شما با موفقیت انجام شد'
        ],
        'token'=>[
            'massage_error' => 'صفحه مورد نظر منقضی شده است.',
            'massage_success' => 'ورود شما با موفقیت انجام شد.'
        ],
        'check_mobile' =>[
            'massage_true_send' => 'شماره تلفن و احرازهویت دو مرحلهای شما تایید شد.',
            'massage_false_send' => 'شماره تلفن و احرازهویت دو مرحلهای شما تایید نشد.',
        ]
    ],
];
