<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/Upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yqCk7EzUHfwRTFW7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/UploadBanner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I8flTF1rVFE7tzdw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xV3bvR3pqXbH74XS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/login/check-mobile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nIcmahvDNwHLubwk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/login/check-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EW0ePK5k0wl5dDcO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TgcZg7IcuRzJOvPG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/login-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Zj9U4bPU1VkdBKpq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/send-sms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nbenMzLx06tWzNdX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/login-sms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::n5UPrp35PRoNBKSx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/fileupload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t1gCKdGf3YlPMKrk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/cooperation_type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cooperation_type.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cooperation_type.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/document' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'document.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/fild_study' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fild_study.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'fild_study.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/gender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gender.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'gender.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/age' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'age.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'age.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/history_job' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'history_job.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'history_job.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/money' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'money.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'money.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/soldier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'soldier.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'soldier.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/activity_company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity_company.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activity_company.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/center-job' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'center-job.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'center-job.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/group-levels' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'group-levels.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'group-levels.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/languge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languge.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'languge.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/certificates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'certificates.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'certificates.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/effect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'effect.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'effect.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/social-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social-network.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social-network.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/advertising' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertising.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'advertising.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/staff/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U3ruJ3f2HVEyRqOe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/province' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/city-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GfkwovcWKnrNjhpL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/instituteList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QsMFxJbFiSLNErA7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/list-jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W3LRT1uD6XP3Kvtn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/get-list-jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::csg6wKjxzuTc9hZ1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'status.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'status.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/behavioralSkill/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y9iKvvApuwPDVzPk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/posibility/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PWQqLONuNynuYqCU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-pdf-options' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZU7BQiS5T27AX0qS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getNoticedCompany' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OUl8w10dnGxgobGQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JxENzmot728KoVyB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EcY2yOza5ipNP0pM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/Advertising' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Advertising.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'Advertising.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getCompany' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q0ieqQ0iVk8UJGFX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getArcheiveAd' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ychrv2PHF98C1BEf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/company/staff/requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EKpJ2E6VfkQa8Bdu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/user/report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'report.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zP9FohFXhMq0Qoga',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/user-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-report.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-report.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/user-block' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-block.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-block.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobs.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/category-jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category-jobs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category-jobs.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/category-works' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category-works.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category-works.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/advertising-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertising-admin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'advertising-admin.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/behavioralSkill' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'behavioralSkill.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'behavioralSkill.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/activityCompany' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityCompany.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activityCompany.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/company-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-admin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company-admin.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/getCountDetailedData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::16X62m7YuYeikCJc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/special-advertising' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'special-advertising.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'special-advertising.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/company-notice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-notice.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company-notice.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/list/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PzPdOkpxuKUs3KVM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/list/resumes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FvDZEH5FTKwbJC9C',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/telegram/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ePRCq4lUi76TdvLg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/telegram/advertisings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VzOQSHkACsD1iC3L',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/company/remindSMS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0IAzcwgJVUBGeMQz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/admin/resume/remindSMS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5VXCW4v5nsX6TyAO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/site/member/resume-base' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0hf9sDgAEBM3NW1f',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/site/member/download-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z3WKSuEyPpf4h43q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-base' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-base.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-base.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-base/contact/change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TOCq9rETiRjFZT4M',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-record-study' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-study.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-study.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/create-update-record-study' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o2kMERNUyBbKwGuX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/create-update-record-jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jvhzgEWEVOAhdP24',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-record-job' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-job.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-job.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-langauge' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-langauge.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-langauge.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/skill-insert' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skill-insert.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'skill-insert.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/load-experimenta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tIgZNA24ghiBKtxH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-experimenta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-experimenta.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-experimenta.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/certificates-resume' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'certificates-resume.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'certificates-resume.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/honors-resume' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'honors-resume.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'honors-resume.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/load-project' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load-project.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'load-project.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/load-articles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load-articles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'load-articles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/social-resume' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social-resume.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social-resume.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GX5iFddtjwioK0fc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/experimenta' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'experimenta.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'experimenta.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/ads/like' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N4q88jSiUsrZ1sYU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/resume-result' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g3O60EXhdJgYiFkb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::f7NIS7oC2oKsaCTE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/pdf-theme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pdf-theme.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pdf-theme.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/pdfChanges' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lJ33JrLBtAwqJP2h',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/getPdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SsQs6NGkttPiZMmH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/advertizing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rKSF76Ohx5jRIscI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/member/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CadW1yaxkWsnKJah',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/api/v1/(?|a(?|utologin\\-company/([^/]++)(*:148)|ge/([^/]++)(?|(*:170))|ctivity(?|_company/([^/]++)(?|(*:209))|Company/([^/]++)(?|(*:237)))|d(?|min/user\\-(?|report/([^/]++)(?|(*:282))|block/([^/]++)(?|(*:308)))|vertising\\-admin/([^/]++)(?|(*:346))))|telegram/(?|advertising/([^/]++)(*:389)|resume/([^/]++)(*:412))|c(?|o(?|operation_type/([^/]++)(?|(*:455))|mpany(?|/([^/]++)(?|(*:484))|\\-(?|admin/([^/]++)(?|(*:515))|notice/([^/]++)(?|(*:542)))))|e(?|nter\\-job/([^/]++)(?|(*:579))|rtificates/([^/]++)(?|(*:610)))|ity/([^/]++)(*:632)|ategory\\-(?|jobs/([^/]++)(?|(*:668))|works/([^/]++)(?|(*:694))))|document/([^/]++)(?|(*:725))|fild_study/([^/]++)(?|(*:756))|g(?|e(?|nder/([^/]++)(?|(*:789))|tCompanyJob/([^/]++)(*:818))|roup\\-levels/([^/]++)(?|(*:851)))|history_job/([^/]++)(?|(*:884))|m(?|oney/([^/]++)(?|(*:913))|ember/(?|resume\\-(?|re(?|sult\\-pdf/([^/]++)(*:965)|cord\\-(?|study/([^/]++)(?|(*:999))|job/([^/]++)(?|(*:1023))))|base/([^/]++)(?|(*:1051))|langauge/([^/]++)(?|(*:1081))|experimenta/([^/]++)(?|(*:1114)))|update\\-insert\\-resume/([^/]++)(*:1156)|s(?|kill\\-insert/([^/]++)(?|(*:1193))|ocial\\-resume/([^/]++)(?|(*:1228)))|certificates\\-resume/([^/]++)(?|(*:1271))|honors\\-resume/([^/]++)(?|(*:1307))|load\\-(?|project/([^/]++)(?|(*:1345))|articles/([^/]++)(?|(*:1375)))|experimenta/([^/]++)(?|(*:1409))|ad(?|s/like/([^/]++)(?|(*:1442))|vertizing/([^/]++)(*:1470))|pdf\\-theme/([^/]++)(?|(*:1502))))|s(?|o(?|ldier/([^/]++)(?|(*:1539))|cial\\-network/([^/]++)(?|(*:1574)))|tatus/([^/]++)(?|(*:1602))|ite/(?|pdfResult/([^/]++)(*:1637)|company/send\\-request/([^/]++)/([^/]++)(*:1685)|member/send\\-resume/([^/]++)(*:1722))|pecial\\-advertising/([^/]++)(?|(*:1763)))|l(?|anguge/([^/]++)(?|(*:1796))|ist\\-(?|jobs\\-category/([^/]++)(*:1837)|work\\-category/([^/]++)(*:1869)))|effect/([^/]++)(?|(*:1898))|user/(?|advertising/(?|([^/]++)(?|(*:1942))|get(?|Same/([^/]++)(*:1971)|(*:1980))|city/([^/]++)(*:2003))|staff/getSame/([^/]++)(*:2035)|report/([^/]++)(?|(*:2062)))|province/([^/]++)(?|(*:2093))|SiteCompany/([^/]++)(*:2123)|Advertising/([^/]++)(?|(*:2155))|res(?|toreAd/([^/]++)(*:2186)|umes/([^/]++)(?|(*:2211))|Ad/([^/]++)/([^/]++)(*:2241))|jobs/([^/]++)(?|(*:2267))|behavioralSkill/([^/]++)(?|(*:2304))|CAdvertisings/([^/]++)(*:2336))|/(.*)(*:2351))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      148 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::49bvI9mwZ1DNy2zP',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      170 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'age.show',
          ),
          1 => 
          array (
            0 => 'age',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'age.update',
          ),
          1 => 
          array (
            0 => 'age',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'age.destroy',
          ),
          1 => 
          array (
            0 => 'age',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity_company.show',
          ),
          1 => 
          array (
            0 => 'activity_company',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activity_company.update',
          ),
          1 => 
          array (
            0 => 'activity_company',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'activity_company.destroy',
          ),
          1 => 
          array (
            0 => 'activity_company',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      237 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityCompany.show',
          ),
          1 => 
          array (
            0 => 'activityCompany',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activityCompany.update',
          ),
          1 => 
          array (
            0 => 'activityCompany',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'activityCompany.destroy',
          ),
          1 => 
          array (
            0 => 'activityCompany',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      282 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-report.show',
          ),
          1 => 
          array (
            0 => 'user_report',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-report.update',
          ),
          1 => 
          array (
            0 => 'user_report',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'user-report.destroy',
          ),
          1 => 
          array (
            0 => 'user_report',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-block.show',
          ),
          1 => 
          array (
            0 => 'user_block',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-block.update',
          ),
          1 => 
          array (
            0 => 'user_block',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'user-block.destroy',
          ),
          1 => 
          array (
            0 => 'user_block',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      346 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertising-admin.show',
          ),
          1 => 
          array (
            0 => 'advertising_admin',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'advertising-admin.update',
          ),
          1 => 
          array (
            0 => 'advertising_admin',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'advertising-admin.destroy',
          ),
          1 => 
          array (
            0 => 'advertising_admin',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5IjX0y9cvNh8Y677',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qqP94nHXvS8TVGnU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cooperation_type.show',
          ),
          1 => 
          array (
            0 => 'cooperation_type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cooperation_type.update',
          ),
          1 => 
          array (
            0 => 'cooperation_type',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'cooperation_type.destroy',
          ),
          1 => 
          array (
            0 => 'cooperation_type',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      484 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company.show',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company.update',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'company.destroy',
          ),
          1 => 
          array (
            0 => 'company',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      515 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-admin.show',
          ),
          1 => 
          array (
            0 => 'company_admin',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company-admin.update',
          ),
          1 => 
          array (
            0 => 'company_admin',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'company-admin.destroy',
          ),
          1 => 
          array (
            0 => 'company_admin',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      542 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-notice.show',
          ),
          1 => 
          array (
            0 => 'company_notice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'company-notice.update',
          ),
          1 => 
          array (
            0 => 'company_notice',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'company-notice.destroy',
          ),
          1 => 
          array (
            0 => 'company_notice',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      579 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'center-job.show',
          ),
          1 => 
          array (
            0 => 'center_job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'center-job.update',
          ),
          1 => 
          array (
            0 => 'center_job',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'center-job.destroy',
          ),
          1 => 
          array (
            0 => 'center_job',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'certificates.show',
          ),
          1 => 
          array (
            0 => 'certificate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'certificates.update',
          ),
          1 => 
          array (
            0 => 'certificate',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'certificates.destroy',
          ),
          1 => 
          array (
            0 => 'certificate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1oSAiyAAzMjOL0Qt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category-jobs.show',
          ),
          1 => 
          array (
            0 => 'category_job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category-jobs.update',
          ),
          1 => 
          array (
            0 => 'category_job',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'category-jobs.destroy',
          ),
          1 => 
          array (
            0 => 'category_job',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      694 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category-works.show',
          ),
          1 => 
          array (
            0 => 'category_work',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category-works.update',
          ),
          1 => 
          array (
            0 => 'category_work',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'category-works.destroy',
          ),
          1 => 
          array (
            0 => 'category_work',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.show',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'document.update',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'document.destroy',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fild_study.show',
          ),
          1 => 
          array (
            0 => 'fild_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'fild_study.update',
          ),
          1 => 
          array (
            0 => 'fild_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'fild_study.destroy',
          ),
          1 => 
          array (
            0 => 'fild_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      789 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gender.show',
          ),
          1 => 
          array (
            0 => 'gender',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'gender.update',
          ),
          1 => 
          array (
            0 => 'gender',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'gender.destroy',
          ),
          1 => 
          array (
            0 => 'gender',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      818 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gCNojwoQTduwFAyd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      851 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'group-levels.show',
          ),
          1 => 
          array (
            0 => 'group_level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'group-levels.update',
          ),
          1 => 
          array (
            0 => 'group_level',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'group-levels.destroy',
          ),
          1 => 
          array (
            0 => 'group_level',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      884 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'history_job.show',
          ),
          1 => 
          array (
            0 => 'history_job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'history_job.update',
          ),
          1 => 
          array (
            0 => 'history_job',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'history_job.destroy',
          ),
          1 => 
          array (
            0 => 'history_job',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'money.show',
          ),
          1 => 
          array (
            0 => 'money',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'money.update',
          ),
          1 => 
          array (
            0 => 'money',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'money.destroy',
          ),
          1 => 
          array (
            0 => 'money',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZbstWfeH20UTGX9v',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      999 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-study.show',
          ),
          1 => 
          array (
            0 => 'resume_record_study',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-study.update',
          ),
          1 => 
          array (
            0 => 'resume_record_study',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-study.destroy',
          ),
          1 => 
          array (
            0 => 'resume_record_study',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-job.show',
          ),
          1 => 
          array (
            0 => 'resume_record_job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-job.update',
          ),
          1 => 
          array (
            0 => 'resume_record_job',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'resume-record-job.destroy',
          ),
          1 => 
          array (
            0 => 'resume_record_job',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-base.show',
          ),
          1 => 
          array (
            0 => 'resume_base',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-base.update',
          ),
          1 => 
          array (
            0 => 'resume_base',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'resume-base.destroy',
          ),
          1 => 
          array (
            0 => 'resume_base',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-langauge.show',
          ),
          1 => 
          array (
            0 => 'resume_langauge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-langauge.update',
          ),
          1 => 
          array (
            0 => 'resume_langauge',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'resume-langauge.destroy',
          ),
          1 => 
          array (
            0 => 'resume_langauge',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1114 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resume-experimenta.show',
          ),
          1 => 
          array (
            0 => 'resume_experimentum',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resume-experimenta.update',
          ),
          1 => 
          array (
            0 => 'resume_experimentum',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'resume-experimenta.destroy',
          ),
          1 => 
          array (
            0 => 'resume_experimentum',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KHQQAcvMo6SEsxkH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1193 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'skill-insert.show',
          ),
          1 => 
          array (
            0 => 'skill_insert',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'skill-insert.update',
          ),
          1 => 
          array (
            0 => 'skill_insert',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'skill-insert.destroy',
          ),
          1 => 
          array (
            0 => 'skill_insert',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social-resume.show',
          ),
          1 => 
          array (
            0 => 'social_resume',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social-resume.update',
          ),
          1 => 
          array (
            0 => 'social_resume',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'social-resume.destroy',
          ),
          1 => 
          array (
            0 => 'social_resume',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'certificates-resume.show',
          ),
          1 => 
          array (
            0 => 'certificates_resume',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'certificates-resume.update',
          ),
          1 => 
          array (
            0 => 'certificates_resume',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'certificates-resume.destroy',
          ),
          1 => 
          array (
            0 => 'certificates_resume',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'honors-resume.show',
          ),
          1 => 
          array (
            0 => 'honors_resume',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'honors-resume.update',
          ),
          1 => 
          array (
            0 => 'honors_resume',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'honors-resume.destroy',
          ),
          1 => 
          array (
            0 => 'honors_resume',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1345 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load-project.show',
          ),
          1 => 
          array (
            0 => 'load_project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'load-project.update',
          ),
          1 => 
          array (
            0 => 'load_project',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'load-project.destroy',
          ),
          1 => 
          array (
            0 => 'load_project',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1375 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load-articles.show',
          ),
          1 => 
          array (
            0 => 'load_article',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'load-articles.update',
          ),
          1 => 
          array (
            0 => 'load_article',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'load-articles.destroy',
          ),
          1 => 
          array (
            0 => 'load_article',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'experimenta.show',
          ),
          1 => 
          array (
            0 => 'experimentum',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'experimenta.update',
          ),
          1 => 
          array (
            0 => 'experimentum',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'experimenta.destroy',
          ),
          1 => 
          array (
            0 => 'experimentum',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::et5qEb14fMvUhnrE',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CQkdKUr8ZrTSVdkk',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OqNHH37AYafMTSBk',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pdf-theme.show',
          ),
          1 => 
          array (
            0 => 'pdf_theme',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pdf-theme.update',
          ),
          1 => 
          array (
            0 => 'pdf_theme',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'pdf-theme.destroy',
          ),
          1 => 
          array (
            0 => 'pdf_theme',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'soldier.show',
          ),
          1 => 
          array (
            0 => 'soldier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'soldier.update',
          ),
          1 => 
          array (
            0 => 'soldier',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'soldier.destroy',
          ),
          1 => 
          array (
            0 => 'soldier',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social-network.show',
          ),
          1 => 
          array (
            0 => 'social_network',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social-network.update',
          ),
          1 => 
          array (
            0 => 'social_network',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'social-network.destroy',
          ),
          1 => 
          array (
            0 => 'social_network',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'status.show',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'status.update',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'status.destroy',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b29hN7hkB5Xc31VH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AVdRpoB5Tm8uSdZQ',
          ),
          1 => 
          array (
            0 => 'company',
            1 => 'BaseResume',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NpOlMxAhTJbDn6N2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'special-advertising.show',
          ),
          1 => 
          array (
            0 => 'special_advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'special-advertising.update',
          ),
          1 => 
          array (
            0 => 'special_advertising',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'special-advertising.destroy',
          ),
          1 => 
          array (
            0 => 'special_advertising',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'languge.show',
          ),
          1 => 
          array (
            0 => 'languge',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'languge.update',
          ),
          1 => 
          array (
            0 => 'languge',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'languge.destroy',
          ),
          1 => 
          array (
            0 => 'languge',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jj3oQ3XxDEg4j2j9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1869 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u7yuhEgJUEl4D1NG',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'effect.show',
          ),
          1 => 
          array (
            0 => 'effect',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'effect.update',
          ),
          1 => 
          array (
            0 => 'effect',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'effect.destroy',
          ),
          1 => 
          array (
            0 => 'effect',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1942 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertising.show',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'advertising.update',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'advertising.destroy',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b54HMlRP2xjwmXfX',
          ),
          1 => 
          array (
            0 => 'Adertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1980 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G0hE04i4pdy2Oj9s',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2003 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kx4W0W1dIU72qfuK',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2035 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jIuERVFF7PEJVz6E',
          ),
          1 => 
          array (
            0 => 'staff',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.show',
          ),
          1 => 
          array (
            0 => 'report',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'report.update',
          ),
          1 => 
          array (
            0 => 'report',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'report.destroy',
          ),
          1 => 
          array (
            0 => 'report',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2093 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'province.show',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'province.update',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'province.destroy',
          ),
          1 => 
          array (
            0 => 'province',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V44iHd0gQSD9MaGS',
          ),
          1 => 
          array (
            0 => 'Comapny',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Advertising.show',
          ),
          1 => 
          array (
            0 => 'Advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'Advertising.update',
          ),
          1 => 
          array (
            0 => 'Advertising',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'Advertising.destroy',
          ),
          1 => 
          array (
            0 => 'Advertising',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2186 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y81nu63ACU7ZMfoG',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2211 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PcGulmw6vYks6lUV',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JkvOOkqaUxZS87ml',
          ),
          1 => 
          array (
            0 => 'advertising',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vfW6XWET1EEo9Puw',
          ),
          1 => 
          array (
            0 => 'advertising',
            1 => 'BaseResume',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobs.show',
          ),
          1 => 
          array (
            0 => 'job',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobs.update',
          ),
          1 => 
          array (
            0 => 'job',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'jobs.destroy',
          ),
          1 => 
          array (
            0 => 'job',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'behavioralSkill.show',
          ),
          1 => 
          array (
            0 => 'behavioralSkill',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'behavioralSkill.update',
          ),
          1 => 
          array (
            0 => 'behavioralSkill',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'behavioralSkill.destroy',
          ),
          1 => 
          array (
            0 => 'behavioralSkill',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N4Mf8iC5RTB6lyIT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kzxq66DYx9Q71gz6',
          ),
          1 => 
          array (
            0 => 'any',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yqCk7EzUHfwRTFW7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/Upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@Upload',
        'controller' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@Upload',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::yqCk7EzUHfwRTFW7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I8flTF1rVFE7tzdw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/UploadBanner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@UploadBanner',
        'controller' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@UploadBanner',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::I8flTF1rVFE7tzdw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xV3bvR3pqXbH74XS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::xV3bvR3pqXbH74XS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nIcmahvDNwHLubwk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/login/check-mobile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@checkMobile',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@checkMobile',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::nIcmahvDNwHLubwk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EW0ePK5k0wl5dDcO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/login/check-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@CheckCode',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@CheckCode',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::EW0ePK5k0wl5dDcO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TgcZg7IcuRzJOvPG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TgcZg7IcuRzJOvPG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Zj9U4bPU1VkdBKpq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/login-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@LoginUser',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@LoginUser',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Zj9U4bPU1VkdBKpq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::49bvI9mwZ1DNy2zP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/autologin-company/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@autoLoginCompany',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@autoLoginCompany',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::49bvI9mwZ1DNy2zP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nbenMzLx06tWzNdX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/send-sms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@sendSMS',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@sendSMS',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::nbenMzLx06tWzNdX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::n5UPrp35PRoNBKSx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/login-sms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@loginSMS',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LoginController@loginSMS',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::n5UPrp35PRoNBKSx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5IjX0y9cvNh8Y677' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/telegram/advertising/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\TelegramController@storeAdvertisingMessage',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\TelegramController@storeAdvertisingMessage',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::5IjX0y9cvNh8Y677',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qqP94nHXvS8TVGnU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/telegram/resume/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\TelegramController@storeMessage',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\TelegramController@storeMessage',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qqP94nHXvS8TVGnU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t1gCKdGf3YlPMKrk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/fileupload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@UploadFile',
        'controller' => 'App\\Http\\Controllers\\v1\\Upload\\UploadController@UploadFile',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::t1gCKdGf3YlPMKrk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cooperation_type.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cooperation_type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'cooperation_type.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cooperation_type.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/cooperation_type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'cooperation_type.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cooperation_type.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/cooperation_type/{cooperation_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'cooperation_type.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cooperation_type.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/cooperation_type/{cooperation_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'cooperation_type.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cooperation_type.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/cooperation_type/{cooperation_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'cooperation_type.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\CooperationTypeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/document',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'document.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/document',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'document.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'document.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'document.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'document.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\DocumentController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fild_study.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/fild_study',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'fild_study.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fild_study.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/fild_study',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'fild_study.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fild_study.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/fild_study/{fild_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'fild_study.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fild_study.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/fild_study/{fild_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'fild_study.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fild_study.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/fild_study/{fild_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'fild_study.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\FildStudyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gender.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/gender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'gender.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gender.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/gender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'gender.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gender.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/gender/{gender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'gender.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gender.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/gender/{gender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'gender.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gender.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/gender/{gender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'gender.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\GenderController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'age.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/age',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'age.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'age.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/age',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'age.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'age.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/age/{age}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'age.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'age.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/age/{age}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'age.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'age.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/age/{age}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'age.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\AgeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history_job.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/history_job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'history_job.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history_job.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/history_job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'history_job.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history_job.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/history_job/{history_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'history_job.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history_job.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/history_job/{history_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'history_job.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history_job.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/history_job/{history_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'history_job.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\HistoryController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'money.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/money',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'money.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'money.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/money',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'money.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'money.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/money/{money}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'money.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'money.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/money/{money}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'money.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'money.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/money/{money}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'money.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\MoneyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'soldier.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/soldier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'soldier.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'soldier.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/soldier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'soldier.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'soldier.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/soldier/{soldier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'soldier.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'soldier.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/soldier/{soldier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'soldier.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'soldier.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/soldier/{soldier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'soldier.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SoldierController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_company.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/activity_company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'activity_company.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_company.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/activity_company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'activity_company.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_company.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/activity_company/{activity_company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'activity_company.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_company.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/activity_company/{activity_company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'activity_company.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_company.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/activity_company/{activity_company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'activity_company.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\ActivityCompanyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'center-job.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/center-job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'center-job.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'center-job.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/center-job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'center-job.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'center-job.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/center-job/{center_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'center-job.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'center-job.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/center-job/{center_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'center-job.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'center-job.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/center-job/{center_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'center-job.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCenterController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group-levels.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/group-levels',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'group-levels.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group-levels.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/group-levels',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'group-levels.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group-levels.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/group-levels/{group_level}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'group-levels.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group-levels.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/group-levels/{group_level}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'group-levels.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'group-levels.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/group-levels/{group_level}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'group-levels.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\GroupLevelsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languge.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/languge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'languge.index',
        'uses' => 'App\\Http\\Controllers\\v1\\language\\languageController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\language\\languageController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languge.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/languge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'languge.store',
        'uses' => 'App\\Http\\Controllers\\v1\\language\\languageController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\language\\languageController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languge.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/languge/{languge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'languge.show',
        'uses' => 'App\\Http\\Controllers\\v1\\language\\languageController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\language\\languageController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languge.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/languge/{languge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'languge.update',
        'uses' => 'App\\Http\\Controllers\\v1\\language\\languageController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\language\\languageController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'languge.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/languge/{languge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'languge.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\language\\languageController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\language\\languageController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/certificates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'certificates.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/certificates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'certificates.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/certificates/{certificate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'certificates.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/certificates/{certificate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'certificates.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/certificates/{certificate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'certificates.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Certificates\\CertificatesController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effect.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/effect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'effect.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effect.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/effect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'effect.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effect.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/effect/{effect}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'effect.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effect.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/effect/{effect}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'effect.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'effect.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/effect/{effect}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'effect.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Effect\\EffectController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-network.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/social-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'social-network.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-network.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/social-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'social-network.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-network.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/social-network/{social_network}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'social-network.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-network.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/social-network/{social_network}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'social-network.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-network.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/social-network/{social_network}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'social-network.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\SocialNetworkController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'advertising.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'advertising.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/advertising/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'advertising.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/user/advertising/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'advertising.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/user/advertising/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'advertising.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b54HMlRP2xjwmXfX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/advertising/getSame/{Adertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@getSimailar',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@getSimailar',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::b54HMlRP2xjwmXfX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G0hE04i4pdy2Oj9s' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/advertising/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::G0hE04i4pdy2Oj9s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kx4W0W1dIU72qfuK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/advertising/city/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@getByCity',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\AdvertisingController@getByCity',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::kx4W0W1dIU72qfuK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::U3ruJ3f2HVEyRqOe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/staff/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::U3ruJ3f2HVEyRqOe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jIuERVFF7PEJVz6E' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/staff/getSame/{staff}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@getSimailar',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@getSimailar',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::jIuERVFF7PEJVz6E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'province.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/province',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'province.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'province.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/province',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'province.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'province.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/province/{province}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'province.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'province.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/province/{province}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'province.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'province.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/province/{province}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'province.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\ProvinceController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1oSAiyAAzMjOL0Qt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/city/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\CityController@List',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\CityController@List',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::1oSAiyAAzMjOL0Qt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GfkwovcWKnrNjhpL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/city-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Map\\CityController@ListAll',
        'controller' => 'App\\Http\\Controllers\\v1\\Map\\CityController@ListAll',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::GfkwovcWKnrNjhpL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QsMFxJbFiSLNErA7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/instituteList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Possibilities\\InstituteController@Institute',
        'controller' => 'App\\Http\\Controllers\\v1\\Possibilities\\InstituteController@Institute',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::QsMFxJbFiSLNErA7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::W3LRT1uD6XP3Kvtn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/list-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobController@List',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobController@List',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::W3LRT1uD6XP3Kvtn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::csg6wKjxzuTc9hZ1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/get-list-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobController@List',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobController@List',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::csg6wKjxzuTc9hZ1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jj3oQ3XxDEg4j2j9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/list-jobs-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\JobCategoryController@ListCategory',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\JobCategoryController@ListCategory',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::jj3oQ3XxDEg4j2j9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::u7yuhEgJUEl4D1NG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/list-work-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Job\\CategoryWorkController@ListCategory',
        'controller' => 'App\\Http\\Controllers\\v1\\Job\\CategoryWorkController@ListCategory',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::u7yuhEgJUEl4D1NG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'status.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'status.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/status/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'status.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/status/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'status.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/status/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'as' => 'status.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\statusListController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Y9iKvvApuwPDVzPk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/behavioralSkill/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\behavioralSkillController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\behavioralSkillController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Y9iKvvApuwPDVzPk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PWQqLONuNynuYqCU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/posibility/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\PossibilityController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\PossibilityController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PWQqLONuNynuYqCU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V44iHd0gQSD9MaGS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/SiteCompany/{Comapny}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\Company\\CompanyController@get',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\Company\\CompanyController@get',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::V44iHd0gQSD9MaGS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b29hN7hkB5Xc31VH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/site/pdfResult/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\Resume\\resultController@get',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\Resume\\resultController@get',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::b29hN7hkB5Xc31VH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZU7BQiS5T27AX0qS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-pdf-options',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@resultPdfOptions',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@resultPdfOptions',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ZU7BQiS5T27AX0qS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OUl8w10dnGxgobGQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/getNoticedCompany',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\HomeController@getNoticedCompany',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\HomeController@getNoticedCompany',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::OUl8w10dnGxgobGQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JxENzmot728KoVyB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\LogoutCntroller@logout',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\LogoutCntroller@logout',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::JxENzmot728KoVyB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EcY2yOza5ipNP0pM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\User\\UserController@user',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\UserController@user',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::EcY2yOza5ipNP0pM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Advertising.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/Advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'Advertising.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Advertising.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/Advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'Advertising.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Advertising.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/Advertising/{Advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'Advertising.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Advertising.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/Advertising/{Advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'Advertising.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Advertising.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/Advertising/{Advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'Advertising.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'company.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'company.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'company.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'company.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/company/{company}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'as' => 'company.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q0ieqQ0iVk8UJGFX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/getCompany',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@getCompany',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@getCompany',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Q0ieqQ0iVk8UJGFX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ychrv2PHF98C1BEf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/getArcheiveAd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@GetArchieved',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@GetArchieved',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ychrv2PHF98C1BEf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Y81nu63ACU7ZMfoG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/restoreAd/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@restore',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\AdvertisingController@restore',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Y81nu63ACU7ZMfoG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PcGulmw6vYks6lUV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/resumes/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@getResumes',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@getResumes',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PcGulmw6vYks6lUV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JkvOOkqaUxZS87ml' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/resumes/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@changeStatus',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::JkvOOkqaUxZS87ml',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gCNojwoQTduwFAyd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/getCompanyJob/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@getJobs',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\CompanyController@getJobs',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::gCNojwoQTduwFAyd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vfW6XWET1EEo9Puw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/resAd/{advertising}/{BaseResume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@getSpecificResume',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Advertising\\StatusController@getSpecificResume',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::vfW6XWET1EEo9Puw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AVdRpoB5Tm8uSdZQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/site/company/send-request/{company}/{BaseResume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\StaffController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::AVdRpoB5Tm8uSdZQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EKpJ2E6VfkQa8Bdu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company/staff/requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'verifyAccess',
          2 => 'auth:api',
          3 => 'scope:Company',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Company\\Staff\\resumeController@getResumeRequest',
        'controller' => 'App\\Http\\Controllers\\v1\\Company\\Staff\\resumeController@getResumeRequest',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::EKpJ2E6VfkQa8Bdu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'as' => 'report.index',
        'uses' => 'App\\Http\\Controllers\\v1\\User\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\ReportController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/user/report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'as' => 'report.store',
        'uses' => 'App\\Http\\Controllers\\v1\\User\\ReportController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\ReportController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/user/report/{report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'as' => 'report.show',
        'uses' => 'App\\Http\\Controllers\\v1\\User\\ReportController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\ReportController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/user/report/{report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'as' => 'report.update',
        'uses' => 'App\\Http\\Controllers\\v1\\User\\ReportController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\ReportController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/user/report/{report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'as' => 'report.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\User\\ReportController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\User\\ReportController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zP9FohFXhMq0Qoga' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Auth\\AuthController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\v1\\Auth\\AuthController@updatePassword',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::zP9FohFXhMq0Qoga',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZbstWfeH20UTGX9v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-result-pdf/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Company,Admin,Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@resultPdf',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@resultPdf',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ZbstWfeH20UTGX9v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-report.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/user-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-report.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-report.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/admin/user-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-report.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-report.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/user-report/{user_report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-report.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-report.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/admin/user-report/{user_report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-report.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-report.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/admin/user-report/{user_report}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-report.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\ReportController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-block.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/user-block',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-block.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-block.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/admin/user-block',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-block.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-block.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/user-block/{user_block}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-block.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-block.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/admin/user-block/{user_block}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-block.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-block.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/admin/user-block/{user_block}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'user-block.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BlockController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'jobs.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'jobs.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/jobs/{job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'jobs.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobs.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/jobs/{job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'jobs.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobs.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/jobs/{job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'jobs.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\JobController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-jobs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/category-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-jobs.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-jobs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/category-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-jobs.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-jobs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/category-jobs/{category_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-jobs.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-jobs.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/category-jobs/{category_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-jobs.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-jobs.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/category-jobs/{category_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-jobs.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategoryJobController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-works.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/category-works',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-works.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-works.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/category-works',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-works.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-works.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/category-works/{category_work}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-works.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-works.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/category-works/{category_work}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-works.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-works.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/category-works/{category_work}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'category-works.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Job\\CategryWorkController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising-admin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/advertising-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'advertising-admin.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising-admin.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/advertising-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'advertising-admin.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising-admin.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/advertising-admin/{advertising_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'advertising-admin.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising-admin.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/advertising-admin/{advertising_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'advertising-admin.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertising-admin.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/advertising-admin/{advertising_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'advertising-admin.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'behavioralSkill.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/behavioralSkill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'behavioralSkill.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'behavioralSkill.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/behavioralSkill',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'behavioralSkill.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'behavioralSkill.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/behavioralSkill/{behavioralSkill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'behavioralSkill.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'behavioralSkill.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/behavioralSkill/{behavioralSkill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'behavioralSkill.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'behavioralSkill.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/behavioralSkill/{behavioralSkill}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'behavioralSkill.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\behavioralSkillController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityCompany.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/activityCompany',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'activityCompany.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityCompany.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/activityCompany',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'activityCompany.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityCompany.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/activityCompany/{activityCompany}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'activityCompany.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityCompany.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/activityCompany/{activityCompany}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'activityCompany.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityCompany.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/activityCompany/{activityCompany}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'activityCompany.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\ActivityCompanyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-admin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-admin.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-admin.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/company-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-admin.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-admin.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company-admin/{company_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-admin.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-admin.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/company-admin/{company_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-admin.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-admin.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/company-admin/{company_admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-admin.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\CompanyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::16X62m7YuYeikCJc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/getCountDetailedData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\AdminPanelController@getCountDatas',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\AdminPanelController@getCountDatas',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::16X62m7YuYeikCJc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N4Mf8iC5RTB6lyIT' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/CAdvertisings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@updateAds',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\AdvertisingController@updateAds',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::N4Mf8iC5RTB6lyIT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'special-advertising.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/special-advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'special-advertising.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'special-advertising.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/special-advertising',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'special-advertising.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'special-advertising.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/special-advertising/{special_advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'special-advertising.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'special-advertising.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/special-advertising/{special_advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'special-advertising.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'special-advertising.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/special-advertising/{special_advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'special-advertising.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Advertising\\specialAdvertisingController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-notice.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company-notice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-notice.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-notice.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/company-notice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-notice.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-notice.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/company-notice/{company_notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-notice.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-notice.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/company-notice/{company_notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-notice.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-notice.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/company-notice/{company_notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'as' => 'company-notice.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Company\\companyNoticeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PzPdOkpxuKUs3KVM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/list/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@getUser',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@getUser',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PzPdOkpxuKUs3KVM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FvDZEH5FTKwbJC9C' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/list/resumes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@getResumes',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@getResumes',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::FvDZEH5FTKwbJC9C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ePRCq4lUi76TdvLg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/telegram/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\UsersController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\UsersController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ePRCq4lUi76TdvLg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VzOQSHkACsD1iC3L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/admin/telegram/advertisings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\AdvertisingController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\Telegram\\AdvertisingController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::VzOQSHkACsD1iC3L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0IAzcwgJVUBGeMQz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/admin/company/remindSMS',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@remindSMS',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@remindSMS',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::0IAzcwgJVUBGeMQz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5VXCW4v5nsX6TyAO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/admin/resume/remindSMS',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@remindResumeSMS',
        'controller' => 'App\\Http\\Controllers\\v1\\Admin\\User\\BaseResumeController@remindResumeSMS',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::5VXCW4v5nsX6TyAO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0hf9sDgAEBM3NW1f' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/site/member/resume-base',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::0hf9sDgAEBM3NW1f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NpOlMxAhTJbDn6N2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/site/member/send-resume/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::NpOlMxAhTJbDn6N2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z3WKSuEyPpf4h43q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/site/member/download-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@download',
        'controller' => 'App\\Http\\Controllers\\v1\\Site\\Member\\BaseController@download',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Z3WKSuEyPpf4h43q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-base.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-base',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-base.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-base.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-base',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-base.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-base.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-base/{resume_base}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-base.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-base.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/resume-base/{resume_base}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-base.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-base.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/resume-base/{resume_base}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-base.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KHQQAcvMo6SEsxkH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/update-insert-resume/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@InsertUpdateResume',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@InsertUpdateResume',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::KHQQAcvMo6SEsxkH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TOCq9rETiRjFZT4M' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/member/resume-base/contact/change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@disableContacts',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@disableContacts',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TOCq9rETiRjFZT4M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-study.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-record-study',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-study.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-study.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-record-study',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-study.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-study.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-record-study/{resume_record_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-study.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-study.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/resume-record-study/{resume_record_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-study.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-study.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/resume-record-study/{resume_record_study}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-study.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::o2kMERNUyBbKwGuX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/create-update-record-study',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@UpdateCreateRecordStudy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordStudyController@UpdateCreateRecordStudy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::o2kMERNUyBbKwGuX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jvhzgEWEVOAhdP24' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/create-update-record-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@UpdateCreateRecordJobs',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@UpdateCreateRecordJobs',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::jvhzgEWEVOAhdP24',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-job.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-record-job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-job.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-job.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-record-job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-job.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-job.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-record-job/{resume_record_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-job.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-job.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/resume-record-job/{resume_record_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-job.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-record-job.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/resume-record-job/{resume_record_job}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-record-job.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\RecordJobController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-langauge.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-langauge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-langauge.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-langauge.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-langauge',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-langauge.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-langauge.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-langauge/{resume_langauge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-langauge.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-langauge.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/resume-langauge/{resume_langauge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-langauge.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-langauge.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/resume-langauge/{resume_langauge}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-langauge.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\LangaugeResumeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'skill-insert.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/skill-insert',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'skill-insert.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'skill-insert.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/skill-insert',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'skill-insert.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'skill-insert.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/skill-insert/{skill_insert}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'skill-insert.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'skill-insert.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/skill-insert/{skill_insert}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'skill-insert.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'skill-insert.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/skill-insert/{skill_insert}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'skill-insert.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tIgZNA24ghiBKtxH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/load-experimenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@LoadExperimentalResume',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SkillController@LoadExperimentalResume',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::tIgZNA24ghiBKtxH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-experimenta.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-experimenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-experimenta.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-experimenta.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-experimenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-experimenta.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-experimenta.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-experimenta/{resume_experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-experimenta.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-experimenta.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/resume-experimenta/{resume_experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-experimenta.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resume-experimenta.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/resume-experimenta/{resume_experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'resume-experimenta.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates-resume.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/certificates-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'certificates-resume.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates-resume.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/certificates-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'certificates-resume.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates-resume.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/certificates-resume/{certificates_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'certificates-resume.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates-resume.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/certificates-resume/{certificates_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'certificates-resume.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'certificates-resume.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/certificates-resume/{certificates_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'certificates-resume.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\CertificatesController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'honors-resume.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/honors-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'honors-resume.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'honors-resume.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/honors-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'honors-resume.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'honors-resume.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/honors-resume/{honors_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'honors-resume.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'honors-resume.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/honors-resume/{honors_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'honors-resume.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'honors-resume.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/honors-resume/{honors_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'honors-resume.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\HonorsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-project.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/load-project',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-project.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-project.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/load-project',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-project.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-project.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/load-project/{load_project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-project.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-project.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/load-project/{load_project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-project.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-project.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/load-project/{load_project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-project.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ProjectController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-articles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/load-articles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-articles.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-articles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/load-articles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-articles.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-articles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/load-articles/{load_article}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-articles.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-articles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/load-articles/{load_article}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-articles.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load-articles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/load-articles/{load_article}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'load-articles.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ArticlessController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-resume.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/social-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'social-resume.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-resume.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/social-resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'social-resume.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-resume.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/social-resume/{social_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'social-resume.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-resume.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/social-resume/{social_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'social-resume.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social-resume.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/social-resume/{social_resume}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'social-resume.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GX5iFddtjwioK0fc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@updateResume',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\SocialNetworkResumeController@updateResume',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::GX5iFddtjwioK0fc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'experimenta.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/experimenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'experimenta.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'experimenta.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/experimenta',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'experimenta.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'experimenta.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/experimenta/{experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'experimenta.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'experimenta.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/experimenta/{experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'experimenta.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'experimenta.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/experimenta/{experimentum}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'experimenta.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\ExperimentalController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::N4q88jSiUsrZ1sYU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/ads/like',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@getAll',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@getAll',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::N4q88jSiUsrZ1sYU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::et5qEb14fMvUhnrE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/ads/like/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@like',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@like',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::et5qEb14fMvUhnrE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CQkdKUr8ZrTSVdkk' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/ads/like/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@dislike',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Favorites\\FavoriteControllers@dislike',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::CQkdKUr8ZrTSVdkk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g3O60EXhdJgYiFkb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/resume-result',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@result',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@result',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::g3O60EXhdJgYiFkb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::f7NIS7oC2oKsaCTE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/resume-result',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@pdfMaker',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\BaseController@pdfMaker',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::f7NIS7oC2oKsaCTE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf-theme.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/pdf-theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'pdf-theme.index',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@index',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@index',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf-theme.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/pdf-theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'pdf-theme.store',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@store',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@store',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf-theme.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/pdf-theme/{pdf_theme}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'pdf-theme.show',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@show',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@show',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf-theme.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/member/pdf-theme/{pdf_theme}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'pdf-theme.update',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@update',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@update',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf-theme.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/member/pdf-theme/{pdf_theme}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'as' => 'pdf-theme.destroy',
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@destroy',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfController@destroy',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1/member',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lJ33JrLBtAwqJP2h' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/pdfChanges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfResumeController@change',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfResumeController@change',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::lJ33JrLBtAwqJP2h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SsQs6NGkttPiZMmH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/member/getPdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfResumeController@getOptions',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\Resume\\pdfResumeController@getOptions',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::SsQs6NGkttPiZMmH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rKSF76Ohx5jRIscI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/advertizing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\MemberRequest\\AdvertizingController@getAdvertizing',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\MemberRequest\\AdvertizingController@getAdvertizing',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::rKSF76Ohx5jRIscI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OqNHH37AYafMTSBk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/advertizing/{advertising}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\MemberRequest\\AdvertizingController@showAdvertizing',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\MemberRequest\\AdvertizingController@showAdvertizing',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::OqNHH37AYafMTSBk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CadW1yaxkWsnKJah' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/member/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'scope:Member',
        ),
        'uses' => 'App\\Http\\Controllers\\v1\\Member\\CompanyRequest\\CompanyController@getCompanies',
        'controller' => 'App\\Http\\Controllers\\v1\\Member\\CompanyRequest\\CompanyController@getCompanies',
        'namespace' => 'App\\Http\\Controllers\\v1',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::CadW1yaxkWsnKJah',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Kzxq66DYx9Q71gz6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{any}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\BaseController@index',
        'controller' => 'App\\Http\\Controllers\\BaseController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Kzxq66DYx9Q71gz6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'any' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
