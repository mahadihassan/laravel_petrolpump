<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'entiInstaller'], function () {
    Route::get('installer',['as'=>'installer','uses'=>'InstallerController@getIndex']);
    Route::get('check-server',['as'=>'check-server','uses'=>'InstallerController@checkServer']);
    Route::get('check-permission',['as'=>'check-permission','uses'=>'InstallerController@checkPermission']);
    Route::get('check-database',['as'=>'check-database','uses'=>'InstallerController@checkDatabase']);
    Route::post('submit-database',['as'=>'submit-database','uses'=>'InstallerController@submitDatabase']);
    Route::get('check-purchase',['as'=>'check-purchase','uses'=>'InstallerController@checkPurchase']);
    Route::post('submit-purchase',['as'=>'submit-purchase','uses'=>'InstallerController@submitPurchase']);
});
Route::get('install-complete',['as'=>'install-complete','uses'=>'InstallerController@installComplete']);


Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);
Route::post('/submitContact','HomeController@submitContact');
Route::post('submit-subscribe',['as'=>'submit-subscribe','uses'=>'HomeController@submitSubscribe']);
Route::get('blog',['as'=>'blog','uses'=>'HomeController@getBlog']);
Route::get('terms-condition',['as'=>'terms-condition','uses'=>'HomeController@getTermCondition']);
Route::get('privacy-policy',['as'=>'privacy-policy','uses'=>'HomeController@getPrivacyPolicy']);
Route::get('blog-details/{slug}',['as'=>'blog-details','uses'=>'HomeController@detailsBlog']);
Route::get('category-blog/{slug}',['as'=>'category-blog','uses'=>'HomeController@categoryBlog']);
Route::get('/menu/{id}/{name}','HomeController@getMenu');
Route::get('about-us',['as'=>'about-us','uses'=>'HomeController@getAbout']);
Route::get('contact-us',['as'=>'contact-us','uses'=>'HomeController@getContact']);

Route::get('cron-fire',['as'=>'cron-fire','uses'=>'HomeController@submitCronJob']);




Auth::routes();

Route::get('user-dashboard',['as'=>'user-dashboard','uses'=>'UserController@getDashboard']);

Route::get('user-edit-profile',['as'=>'user-edit-profile','uses'=>'UserController@editProfile']);
Route::post('user-edit-profile',['as'=>'user-update-profile','uses'=>'UserController@updateProfile']);

Route::get('user-change-password',['as'=>'user-change-password','uses'=>'UserController@getChangePass']);
Route::post('user-change-password',['as'=>'user-change-password','uses'=>'UserController@postChangePass']);

Route::group(['prefix' => 'user'], function () {

    Route::get('email-verify',['as'=>'email-verify','uses'=>'Auth\VerifyUserController@emailVerify']);
    Route::post('verification-submit',['as'=>'verification-submit','uses'=>'Auth\VerifyUserController@submitVerify']);

    Route::post('email-resubmit',['as'=>'email-resubmit','uses'=>'Auth\VerifyUserController@emailResubmit']);

    Route::get('phone-verify',['as'=>'phone-verify','uses'=>'Auth\VerifyUserController@phoneVerify']);
    Route::post('phone-verification-submit',['as'=>'phone-verification-submit','uses'=>'Auth\VerifyUserController@submitPhoneVerify']);

    Route::post('phone-resubmit',['as'=>'phone-resubmit','uses'=>'Auth\VerifyUserController@phoneResubmit']);

    Route::get('new-signal',['as'=>'user-new-signal','uses'=>'UserController@newSignal']);
    Route::get('all-signal',['as'=>'user-all-signal','uses'=>'UserController@AllSignal']);
    Route::get('signal-view/{id}',['as'=>'user-signal-view','uses'=>'UserController@signalView']);

    Route::get('payment-method',['as'=>'chose-payment-method','uses'=>'UserController@chosePayment']);
    Route::post('submit-payment-method',['as'=>'submit-payment-method','uses'=>'UserController@submitPaymentMethod']);


    Route::get('transaction-log',['as'=>'user-transaction-log','uses'=>'UserController@transactionLog']);
/*
    Route::get('withdraw-now',['as'=>'user-withdraw-now','uses'=>'UserController@withdrawNow']);
    Route::get('withdraw-method/{id}',['as'=>'user-withdraw-method','uses'=>'UserController@withdrawMethod']);
    Route::get('check-withdraw/{av}/{amount}/{min}/{max}',['as'=>'check-withdraw','uses'=>'UserController@checkWithdraw']);
    Route::post('withdraw-confirm',['as'=>'user-withdraw-confirm','uses'=>'UserController@withdrawConfirm']);
    Route::get('withdraw-history',['as'=>'user-withdraw-history','uses'=>'UserController@withdrawHistory']);
*/

});


Route::post('paypal-submit',['as'=>'paypal-submit','uses'=>'PaymentIPNController@paypalSubmit']);
Route::get('paypal-ipn',['as'=>'paypal-ipn','uses'=>'PaymentIPNController@paypalIpn']);

Route::post('perfect-ipn',['as'=>'perfect-ipn','uses'=>'PaymentIPNController@perfectIPN']);
Route::post('stripe-submit',['as'=>'stripe-submit','uses'=>'PaymentIPNController@submitStripe']);
Route::get('btc_ipn',['as'=>'btc_ipn','uses'=>'PaymentIPNController@btcIPN']);
Route::post('skrill-ipn',['as'=>'skrill-ipn','uses'=>'PaymentIPNController@skrillIPN']);
Route::post('coinpayment-ipn',['as'=>'coinpayment-ipn','uses'=>'PaymentIPNController@coinPaymentIPN']);

Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('admin-dashboard',['as'=>'dashboard','uses'=>'DashboardController@getDashboard']);

Route::group(['prefix' => 'admin'], function () {

    Route::get('edit-profile', ['as' => 'edit-profile', 'uses' => 'BasicSettingController@editProfile']);
    Route::post('edit-profile', ['as' => 'update-profile', 'uses' => 'BasicSettingController@updateProfile']);

    Route::get('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@getChangePass']);
    Route::post('change-password', ['as' => 'admin-change-password', 'uses' => 'BasicSettingController@postChangePass']);

    Route::get('basic-setting', ['as' => 'basic-setting', 'uses' => 'BasicSettingController@getBasicSetting']);
    Route::put('basic-general/{id}', ['as' => 'basic-update', 'uses' => 'BasicSettingController@putBasicSetting']);

    Route::get('email-setting', ['as' => 'email-setting', 'uses' => 'BasicSettingController@getEmailSetting']);
    Route::put('email-update/{id}', ['as' => 'email-update', 'uses' => 'BasicSettingController@putEmailSetting']);

    Route::get('database-backup',['as'=>'database-backup','uses'=>'BasicSettingController@getDatabaseBackup']);
    Route::get('backup-submit',['as'=>'backup-submit','uses'=>'BasicSettingController@submitDatabaseBackup']);
    Route::get('database-backup-download/{id}',['as'=>'database-backup-download','uses'=>'BasicSettingController@downloadDatabaseBackup']);

    Route::get('google-recaptcha',['as'=>'google-recaptcha','uses'=>'DashboardController@googleRecaptcha']);
    Route::put('recaptcha-update/{id}',['as'=>'recaptcha-update','uses'=>'DashboardController@updateRecaptcha']);

    Route::get('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@manageLogo']);
    Route::post('manage-logo', ['as' => 'manage-logo', 'uses' => 'WebSettingController@updateLogo']);

    Route::get('email-template',['as'=>'email-template','uses'=>'BasicSettingController@manageEmailTemplate']);
    Route::post('email-template',['as'=>'email-template','uses'=>'BasicSettingController@updateEmailTemplate']);

    Route::get('transaction-log',['as'=>'transaction-log','uses'=>'DashboardController@getTransactionLog']);

    Route::get('cron-job',['as'=>'cron-job','uses'=>'BasicSettingController@setCronJob']);

    Route::get('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@smsSetting']);
    Route::post('sms-setting',['as'=>'sms-setting','uses'=>'BasicSettingController@updateSmsSetting']);

    Route::get('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@getGoogleAnalytic']);
    Route::post('google-analytic',['as'=>'google-analytic','uses'=>'BasicSettingController@updateGoogleAnalytic']);

    Route::get('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@getLiveChat']);
    Route::post('live-chat',['as'=>'live-chat','uses'=>'BasicSettingController@updateLiveChat']);

    Route::get('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@manageTermsCondition']);
    Route::post('manage-terms',['as'=>'manage-terms','uses'=>'WebSettingController@updateTermsCondition']);

    Route::get('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@managePrivacyPolicy']);
    Route::post('manage-privacy',['as'=>'manage-privacy','uses'=>'WebSettingController@updatePrivacyPolicy']);

    Route::get('staff-request',['as'=>'staff-request','uses'=>'DashboardController@staffRequest']);

    Route::post('staff-request-approve',['as'=>'staff-request-approve','uses'=>'DashboardController@staffrequestApprove']);
    Route::post('staff-request-reject',['as'=>'staff-request-reject','uses'=>'DashboardController@staffrequestReject']);

    Route::get('user-create',['as'=>'user-create','uses'=>'DashboardController@createUser']);
    Route::post('user-create',['as'=>'user-create','uses'=>'DashboardController@submitUser']);
    Route::get('user-edit/{id}',['as'=>'user-edit','uses'=>'DashboardController@editUser']);
    Route::post('user-update',['as'=>'user-update','uses'=>'DashboardController@updateUser']);
    Route::delete('user-delete',['as'=>'user-delete','uses'=>'DashboardController@deleteUser']);
    Route::get('manage-user',['as'=>'manage-user','uses'=>'DashboardController@manageUser']);
    Route::post('user-block',['as'=>'user-block','uses'=>'DashboardController@blockUser']);
    Route::post('email-block',['as'=>'email-block','uses'=>'DashboardController@blockEmail']);
    Route::post('phone-block',['as'=>'phone-block','uses'=>'DashboardController@blockPhone']);

    Route::get('currency-widget',['as'=>'currency-widget','uses'=>'DashboardController@getCurrencyWidget']);
    Route::post('currency-widget',['as'=>'currency-widget','uses'=>'DashboardController@submitCurrencyWidget']);

    Route::get('manage-footer', ['as' => 'manage-footer', 'uses' => 'WebSettingController@manageFooter']);
    Route::put('manage-footer/{id}', ['as' => 'manage-footer-update', 'uses' => 'WebSettingController@updateFooter']);

    Route::get('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@manageSocial']);
    Route::post('manage-social',['as'=>'manage-social','uses'=>'WebSettingController@storeSocial']);
    Route::get('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@editSocial']);
    Route::put('manage-social/{product_id?}',['as'=>'social-edit','uses'=>'WebSettingController@updateSocial']);
    Route::delete('manage-social/{product_id?}',['as'=>'social-delete','uses'=>'WebSettingController@deleteSocial']);

    Route::get('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@createMenu']);
    Route::post('menu-create',['as'=>'menu-create','uses'=>'WebSettingController@storeMenu']);
    Route::get('menu-control',['as'=>'menu-control','uses'=>'WebSettingController@manageMenu']);
    Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenu']);
    Route::post('menu-update/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenu']);
    Route::delete('menu-delete',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenu']);

    Route::get('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@manageAbout']);
    Route::post('manage-about',['as'=>'manage-about','uses'=>'WebSettingController@updateAbout']);

    Route::get('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@manageSlider']);
    Route::post('manage-slider', ['as' => 'manage-slider', 'uses' => 'WebSettingController@storeSlider']);
    Route::delete('slider-delete', ['as' => 'slider-delete', 'uses' => 'WebSettingController@deleteSlider']);

    Route::get('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@createTestimonial']);
    Route::post('testimonial-create',['as'=>'testimonial-create','uses'=>'WebSettingController@submitTestimonial']);
    Route::get('testimonial-all',['as'=>'testimonial-all','uses'=>'WebSettingController@allTestimonial']);
    Route::get('testimonial-edit/{id}',['as'=>'testimonial-edit','uses'=>'WebSettingController@editTestimonial']);
    Route::put('testimonial-edit/{id}',['as'=>'testimonial-update','uses'=>'WebSettingController@updateTestimonial']);
    Route::delete('testimonial-delete',['as'=>'testimonial-delete','uses'=>'WebSettingController@deleteTestimonial']);

    Route::get('member-create',['as'=>'member-create','uses'=>'WebSettingController@createMember']);
    Route::post('member-create',['as'=>'member-create','uses'=>'WebSettingController@submitMember']);
    Route::get('member-all',['as'=>'member-all','uses'=>'WebSettingController@allMember']);
    Route::get('member-edit/{id}',['as'=>'member-edit','uses'=>'WebSettingController@editMember']);
    Route::put('member-edit/{id}',['as'=>'member-update','uses'=>'WebSettingController@updateMember']);
    Route::delete('member-delete',['as'=>'member-delete','uses'=>'WebSettingController@deleteMember']);

    Route::get('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@mangeBreadcrumb']);
    Route::post('manage-breadcrumb',['as'=>'manage-breadcrumb','uses'=>'WebSettingController@updateBreadcrumb']);

    Route::get('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@createSpeciality']);
    Route::post('speciality-create',['as'=>'speciality-create','uses'=>'WebSettingController@storeSpeciality']);
    Route::get('speciality-control',['as'=>'speciality-control','uses'=>'WebSettingController@manageSpeciality']);
    Route::get('speciality-edit/{id}',['as'=>'speciality-edit','uses'=>'WebSettingController@editSpeciality']);
    Route::post('speciality-update/{id}',['as'=>'speciality-update','uses'=>'WebSettingController@updateSpeciality']);
    Route::delete('speciality-delete',['as'=>'speciality-delete','uses'=>'WebSettingController@deleteSpeciality']);

    Route::get('manage-category',['as'=>'manage-category','uses'=>'CategoryController@manageCategory']);
    Route::post('manage-category',['as'=>'manage-category','uses'=>'CategoryController@storeCategory']);
    Route::get('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@editCategory']);
    Route::put('manage-category/{product_id?}',['as'=>'category-edit','uses'=>'CategoryController@updateCategory']);
    Route::delete('manage-category/{product_id?}','CategoryController@deleteItem');

    Route::get('post-create',['as'=>'post-create','uses'=>'PostController@create']);
    Route::post('post-create',['as'=>'post-create','uses'=>'PostController@store']);
    Route::get('post-all',['as'=>'post-all','uses'=>'PostController@index']);
    Route::get('post-edit/{id}',['as'=>'post-edit','uses'=>'PostController@edit']);
    Route::post('post-update',['as'=>'post-update','uses'=>'PostController@update']);
    Route::delete('post-delete',['as'=>'post-delete','uses'=>'PostController@destroy']);
    Route::post('post-publish',['as'=>'post-publish','uses'=>'PostController@publish']);


    Route::get('payment-method',['as'=>'payment-method','uses'=>'PaymentController@paymentMethod']);
    Route::post('payment-method',['as'=>'payment-method-update','uses'=>'PaymentController@updatePaymentMethod']);

    Route::get('withdraw-create',['as'=>'withdraw-create','uses'=>'WithdrawMethodController@createMethod']);
    Route::post('withdraw-create',['as'=>'withdraw-create','uses'=>'WithdrawMethodController@storeMethod']);
    Route::get('withdraw-method',['as'=>'withdraw-method','uses'=>'WithdrawMethodController@allMethod']);
    Route::get('withdraw-edit/{id}',['as'=>'withdraw-edit','uses'=>'WithdrawMethodController@editMethod']);
    Route::put('withdraw-edit/{id}',['as'=>'withdraw-update','uses'=>'WithdrawMethodController@updateMethod']);

    Route::get('withdraw-request',['as'=>'withdraw-request','uses'=>'WithdrawController@allRequest']);
    Route::get('withdraw-request-view/{custom}',['as'=>'withdraw-request-view','uses'=>'WithdrawController@requestView']);

    Route::post('withdraw-refund',['as'=>'withdraw-refund','uses'=>'WithdrawController@WithdrawRefund']);
    Route::post('withdraw-confirm',['as'=>'withdraw-confirm','uses'=>'WithdrawController@WithdrawConfirm']);

    Route::get('withdraw-request-refund',['as'=>'withdraw-request-refund','uses'=>'WithdrawController@getRequestRefund']);
    Route::get('withdraw-request-success',['as'=>'withdraw-request-success','uses'=>'WithdrawController@getRequestSuccess']);
    Route::get('withdraw-request-pending',['as'=>'withdraw-request-pending','uses'=>'WithdrawController@getRequestPending']);

    Route::get('manage-parallax',['as'=>'manage-parallax','uses'=>'WebSettingController@mangeParallax']);
    Route::post('manage-parallax',['as'=>'manage-parallax','uses'=>'WebSettingController@updateParallax']);

    Route::get('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@shortAbout']);
    Route::post('manage-shortAbout',['as'=>'manage-shortAbout','uses'=>'WebSettingController@updateShortAbout']);

    Route::get('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@createPartner']);
    Route::post('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@submitPartner']);
    Route::get('partner-all',['as'=>'partner-all','uses'=>'WebSettingController@allPartner']);
    Route::get('partner-edit/{id}',['as'=>'partner-edit','uses'=>'WebSettingController@editPartner']);
    Route::put('partner-edit/{id}',['as'=>'partner-update','uses'=>'WebSettingController@updatePartner']);
    Route::delete('partner-delete',['as'=>'partner-delete','uses'=>'WebSettingController@deletePartner']);
     //Branch Controller Route File
    Route::get('branch-create', 'BranchController@create')->name('branch-create');
    Route::post('branch-store', 'BranchController@store')->name('branch-store');
    Route::get('branch-index', 'BranchController@index')->name('branch-index');
    Route::get('branch-edit/{id}', 'BranchController@edit')->name('branch-edit');
    Route::post('branch-update/{id}', 'BranchController@update')->name('branch-update');
    Route::delete('branch-delete','BranchController@delete')->name('branch-delete');
     //Manager Controller Route File
    Route::get('manager-create', 'ManagerController@create')->name('manager-create');
    Route::post('manager-store', 'ManagerController@store')->name('manager-store');
    Route::get('manager-index', 'ManagerController@index')->name('manager-index');
    Route::get('manager-edit/{id}', 'ManagerController@edit')->name('manager-edit');
    Route::post('manager-update/{id}', 'ManagerController@update')->name('manager-update');
    Route::delete('manager-delete', 'ManagerController@delete')->name('manager-delete');
    Route::post('manager-reset', 'ManagerController@reset')->name('manager-reset');
    //fuel Controller Route File
    Route::get('fuel-create', 'FuelController@create')->name('fuel-create');
    Route::get('fuel-index', 'FuelController@index')->name('fuel-index');
    Route::get('fuel-edit/{id}', 'FuelController@FuelEdit')->name('fuel-edit');
    Route::post('fuel-update/{id}', 'FuelController@FuelUpdate')->name('fuel-update');
    Route::post('fuel-store', 'FuelController@store')->name('fuel-store');
    Route::delete('fuel-delete', 'FuelController@delete')->name('fuel-delete');

    //Fuel Mix Controller Route File
    Route::get('fuel-mix-create', 'FuelMixController@create')->name('fuel-mix-create');
    Route::post('fuel-mix-store', 'FuelMixController@store')->name('fuel-mix-store');
    Route::get('fuel-mix-index', 'FuelMixController@index')->name('fuel-mix-index');
    //StoreFuel Controller Route File
    Route::post('fuel-stores', 'StoreFuelController@store')->name('fuel-stores');
    Route::get('fuel-stroe-create', 'StoreFuelController@create')->name('fuel-store-create');
    Route::get('fuel-store-index', 'StoreFuelController@index')->name('fuel-store-index');
    Route::delete('store-delete', 'StoreFuelController@delete')->name('store-delete');
    //Seller Controller Route File
    Route::get('seller-create','SellerController@create')->name('seller-create');
    Route::post('seller-store','SellerController@store')->name('seller-store');
    Route::get('seller-index','SellerController@index')->name('seller-index');
    Route::get('seller-edit/{id}','SellerController@edit')->name('seller-edit');
    Route::post('seller-update/{id}','SellerController@update')->name('seller-update');
    Route::post('seller-change-password','SellerController@ChangePassword')->name('seller-change-password');
    Route::delete('seller-delete','SellerController@destroy')->name('seller-delete');
    //Expense Controller Route File
    Route::get('expense-create', 'ExpenseController@create')->name('expense-create');
    Route::post('expense-store', 'ExpenseController@store')->name('expense-store');
    Route::get('expense-index', 'ExpenseController@index')->name('expense-index');
    Route::delete('expense-delete', 'ExpenseController@destroy')->name('expense-delete');

    //Supplier Controller Route File
    Route::get('supplier-create', 'SupplierController@create')->name('supplier-create');
    Route::get('supplier-index', 'SupplierController@index')->name('supplier-index');
    Route::post('supplier-store', 'SupplierController@store')->name('supplier-store');
    Route::get('supplier-edit/{id}', 'SupplierController@edit')->name('supplier-edit');
    Route::post('supplier-update/{id}', 'SupplierController@update')->name('supplier-update');
    Route::delete('supplier-delete', 'SupplierController@destroy')->name('supplier-delete');
    Route::get('repayment', 'SupplierController@Repayment')->name('repayment');
    Route::post('repayment-store', 'SupplierController@PutRepayment')->name('repayment-store');
    Route::get('repayment-index', 'SupplierController@getRepayment')->name('repayment-index');
    Route::delete('repayment-delete', 'SupplierController@deleteRepayment')->name('repayment-delete');
    Route::get('get-supplier',['as'=>'get-supplier','uses'=>'SupplierController@getBalance']);

    //Balance Controller Route File
    Route::get('balance-create', 'BalanceController@create')->name('balance-create');
    Route::get('balance-index', 'BalanceController@index')->name('balance-index');
    Route::post('balance-store', 'BalanceController@store')->name('balance-store');
    Route::delete('balance-delete', 'BalanceController@destroy')->name('balance-delete');
    //Fuel Machine Controller Route File
    Route::get('machine-create', 'FuelMachineController@create')->name('machine-create');
    Route::get('machine-index', 'FuelMachineController@index')->name('machine-index');
    Route::post('machine-store', 'FuelMachineController@store')->name('machine-store');

    Route::get('load-create', 'LoadFuelController@create')->name('load-create');
    Route::get('load-index', 'LoadFuelController@index')->name('load-index');
    Route::post('load-store', 'LoadFuelController@store')->name('load-store');
    Route::get('get-fuel', 'LoadFuelController@getfuel')->name('get-fuel');
});


