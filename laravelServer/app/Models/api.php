<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->namespace('App\Http\Controllers\v1')->group(function (){

    Route::post('/Upload', 'Upload\UploadController@Upload');

    Route::group( [ 'middleware' => [ 'verifyAccess' ] ], function () {
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/login/check-mobile', 'Auth\LoginController@checkMobile');
        Route::post('/login/check-code', 'Auth\LoginController@CheckCode');
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login-user', 'Auth\LoginController@LoginUser');
        Route::get('/autologin-company/{token}', 'Auth\LoginController@autoLoginCompany');
        Route::post('/send-sms', 'Auth\LoginController@sendSMS');
        Route::post('/login-sms', 'Auth\LoginController@loginSMS');

//        Route::get('/telegram/update' , 'Admin\Telegram\TelegramController@updatedActivity');
        Route::get('/telegram/advertising/{id}' , 'Admin\Telegram\TelegramController@storeAdvertisingMessage');
        Route::get('/telegram/resume/{id}' , 'Admin\Telegram\TelegramController@storeMessage');


        Route::post('/fileupload', 'Upload\UploadController@UploadFile');

        Route::apiResource('/cooperation_type', 'Possibilities\CooperationTypeController');
        Route::apiResource('/document', 'Possibilities\DocumentController');
        Route::apiResource('/fild_study', 'Possibilities\FildStudyController');
        Route::apiResource('/gender', 'Possibilities\GenderController');
        Route::apiResource('/age', 'Possibilities\AgeController');
        Route::apiResource('/history_job', 'Possibilities\HistoryController');
        Route::apiResource('/money', 'Possibilities\MoneyController');
        Route::apiResource('/soldier', 'Possibilities\SoldierController');
        Route::apiResource('/activity_company', 'Possibilities\ActivityCompanyController');
        Route::apiResource('/center-job', 'Job\JobCenterController');
        Route::apiResource('/group-levels', 'Job\GroupLevelsController');
        Route::apiResource('/languge', 'language\languageController');
        Route::apiResource('/certificates', 'Certificates\CertificatesController');
        Route::apiResource('/effect', 'Effect\EffectController');
        Route::apiResource('/social-network', 'Possibilities\SocialNetworkController');

//    Route::apiResource('/user/advertising', 'User\AdvertisingController');
        Route::apiResource('/user/advertising', 'Site\AdvertisingController');
        Route::get('/user/advertising/getSame/{Adertising}', 'Site\AdvertisingController@getSimailar');
        Route::post('/user/advertising/get', 'Site\AdvertisingController@index');
        Route::get('/getCountData', 'Site\HomeController@getCount');
        Route::get('/getNoticedCompany', 'Site\HomeController@getNoticedCompany');


        Route::apiResource('/province', 'Map\ProvinceController');
        Route::get('/city/{id}', 'Map\CityController@List');
        Route::get('/city-all', 'Map\CityController@ListAll');
        Route::get('/instituteList', 'Possibilities\InstituteController@Institute');

        Route::post('/register', 'Auth\RegisterController@register');
        Route::get('/list-jobs', 'Job\JobController@List');
        Route::get('/get-list-jobs', 'Job\JobController@List');
        Route::get('/list-jobs-category/{id}', 'Job\JobCategoryController@ListCategory');
        Route::get('/list-work-category/{id}', 'Job\CategoryWorkController@ListCategory');
        Route::apiResource('/status', 'Company\statusListController');
        Route::get('/behavioralSkill/company', 'Company\Advertising\behavioralSkillController@index');
        Route::get('/posibility/company', 'Company\Advertising\PossibilityController@index');

        //Route::get('/possibilities', 'Possibilities\PossibilitiesController@List');

        Route::get('/SiteCompany/{Comapny}' , 'Site\Company\CompanyController@get');

        Route::group( [ 'middleware' => [ 'verifyAccess' , 'auth:api', 'scope:Company' ] ], function () {

            Route::get( 'logout', 'Auth\LogoutCntroller@logout' );
            Route::get('/user', 'User\UserController@user');
            Route::apiResource('Advertising', 'Company\Advertising\AdvertisingController');
            Route::apiResource('/company', 'Company\CompanyController');
            Route::get('/getCompany', 'Company\CompanyController@getCompany');
            Route::get('/getArcheiveAd', 'Company\Advertising\AdvertisingController@GetArchieved');
            Route::get('/restoreAd/{advertising}', 'Company\Advertising\AdvertisingController@restore');

            Route::get('resumes/{advertising}' , 'Company\Advertising\StatusController@getResumes' );
            Route::put('resumes/{advertising}' , 'Company\Advertising\StatusController@changeStatus' );
            Route::get('/getCompanyJob/{id}' , 'Company\CompanyController@getJobs');

            Route::get('/resAd/{advertising}/{BaseResume}' , 'Company\Advertising\StatusController@getSpecificResume');
        });

        Route::group( [ 'middleware' => [ 'auth:api', 'scope:Company,Admin,Member'] ], function () {
            Route::get('/user', 'User\UserController@user');
            Route::apiResource('/user/report', 'User\ReportController');
            Route::post('/update-password','Auth\AuthController@updatePassword' );
            Route::get('/site/pdfResult/{id}' , 'Site\Resume\resultController@get');
            Route::get('member/resume-result-pdf/{id}' , 'Member\Resume\BaseController@resultPdf' );
            Route::post('member/resume-pdf-options' , 'Member\Resume\BaseController@resultPdfOptions' );
        });
        Route::group( [ 'middleware' => [ 'auth:api', 'scope:Admin' ] ], function () {

            Route::apiResource('/admin/user-report', 'Admin\User\ReportController');
            Route::apiResource('/admin/user-block', 'Admin\User\BlockController');

            Route::apiResource('jobs', 'Admin\Job\JobController');
            Route::apiResource('category-jobs', 'Admin\Job\CategoryJobController');
            Route::apiResource('category-works', 'Admin\Job\CategryWorkController');
            Route::apiResource('advertising-admin', 'Admin\Advertising\AdvertisingController');
            Route::apiResource('behavioralSkill', 'Admin\Advertising\behavioralSkillController');
            Route::apiResource('activityCompany', 'Admin\ActivityCompanyController');
            Route::apiResource('company-admin', 'Admin\Company\CompanyController');

            Route::get('getCountDetailedData', 'Admin\AdminPanelController@getCountDatas');
            Route::put('CAdvertisings/{id}', 'Admin\Advertising\AdvertisingController@updateAds');
            Route::apiResource('special-advertising', 'Admin\Advertising\specialAdvertisingController');
            Route::apiResource('company-notice', 'Admin\Company\companyNoticeController');

            Route::get('/admin/list/users' , 'Admin\User\BaseResumeController@getUser') ;
            Route::get('/admin/list/resumes' , 'Admin\User\BaseResumeController@getResumes') ;
            Route::get('/admin/telegram/users' , 'Admin\Telegram\UsersController@index') ;
            Route::get('/admin/telegram/advertisings' , 'Admin\Telegram\AdvertisingController@index') ;
            Route::post('/admin/company/remindSMS' , 'Admin\User\BaseResumeController@remindSMS');

        });
        Route::group( [ 'middleware' => [ 'auth:api', 'scope:Member'] ], function () {

            Route::get('site/member/resume-base' , 'Site\Member\BaseController@index');
            Route::post('site/member/send-resume/{id}' , 'Site\Member\BaseController@store');
            Route::get('site/member/download-pdf' , 'Site\Member\BaseController@download');

            Route::apiResource('member/resume-base', 'Member\Resume\BaseController');
            Route::post('member/update-insert-resume/{id}', 'Member\Resume\BaseController@InsertUpdateResume');


            Route::apiResource('member/resume-record-study', 'Member\Resume\RecordStudyController');
            Route::post('member/create-update-record-study', 'Member\Resume\RecordStudyController@UpdateCreateRecordStudy');
            Route::post('member/create-update-record-jobs', 'Member\Resume\RecordJobController@UpdateCreateRecordJobs');
            Route::apiResource('member/resume-record-job', 'Member\Resume\RecordJobController');
            Route::apiResource('member/resume-langauge', 'Member\Resume\LangaugeResumeController');
            Route::apiResource('member/skill-insert', 'Member\Resume\SkillController');
            Route::get('member/load-experimenta', 'Member\Resume\SkillController@LoadExperimentalResume');
            Route::apiResource('member/resume-experimenta', 'Member\Resume\ExperimentalController');
            Route::apiResource('member/certificates-resume', 'Member\Resume\CertificatesController');
            Route::apiResource('member/honors-resume', 'Member\Resume\HonorsController');
            Route::apiResource('member/load-project', 'Member\Resume\ProjectController');
            Route::apiResource('member/load-articles', 'Member\Resume\ArticlessController');
            Route::apiResource('member/social-resume', 'Member\Resume\SocialNetworkResumeController');
            Route::post('member/resume-update'  , 'Member\Resume\SocialNetworkResumeController@updateResume' );
            Route::apiResource('member/experimenta', 'Member\Resume\ExperimentalController');
            // site member resume
            Route::get('member/ads/like' , 'Member\Favorites\FavoriteControllers@getAll' );
            Route::post('member/ads/like/{advertising}' , 'Member\Favorites\FavoriteControllers@like' );
            Route::delete('member/ads/like/{advertising}' , 'Member\Favorites\FavoriteControllers@dislike' );

            Route::get('member/resume-result' , 'Member\Resume\BaseController@result' );

            Route::post('member/resume-result' , 'Member\Resume\BaseController@pdfMaker' );
            Route::post('member/resume-result' , 'Member\Resume\BaseController@pdfMaker' );

            Route::apiResource('member/pdf-theme', 'Member\Resume\pdfController');
            Route::post('member/pdfChanges' , 'Member\Resume\pdfResumeController@change');
            Route::post('member/getPdf' , 'Member\Resume\pdfResumeController@getOptions');

            //member requests
            Route::get('member/advertizing' , 'Member\MemberRequest\AdvertizingController@getAdvertizing');
            Route::get('member/advertizing/{advertising}' , 'Member\MemberRequest\AdvertizingController@showAdvertizing');
        });
    });


});

