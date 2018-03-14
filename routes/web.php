<?php

route::get('/', 'WebsiteController@index')->name('website-index');
route::get('about', 'WebsiteController@about')->name('website-about');
route::get('foot-spa-treatments', 'WebsiteController@footSpaTreatments')->name('websiteFootSpaTreatments');
route::get('hair-fashion-treatments', 'WebsiteController@hairFashionTreatments')->name('websiteHairFashionTreatments');

Auth::routes();

route::group(['middleware' => 'auth'], function() {
	//admin dashboard
	route::get('admin-dashboard', 'DashboardController@adminDashboard')->name('adminDashboard');
	//customer dashboard
	route::get('customer-dashboard', 'DashboardController@customerDashboard')->name('customerDashboard');
	//employee dashboard
	route::get('employee-dashboard', 'DashboardController@employeeDashboard')->name('employeeDashboard');

	//redirect dashboard
	route::get('/dashboard', 'DashboardController@redirectToDashboard')->name('redirectToDashboard');

	//Admin
	route::resource('users', 'UsersController'); //USERS
	route::resource('roles', 'RolesController'); //ROLES
	route::resource('services', 'ServicesController'); //SERVICES
	route::resource('service-type', 'ServiceTypeController'); //SERVICE TYPES
	route::resource('employees', 'EmployeesController'); //EMPLOYEES
	route::resource('walk-in', 'WalkinController'); //WALKINS
	route::resource('expertise', 'ExpertiseController'); //EXPERTISE
	route::resource('salary', 'SalaryController'); //EMPLOYEE SALARY

	//commissions
	route::get('admin/employee-commissions', 'CommissionsController@viewAllCommissions')->name('viewAllCommissions');

	//commission settings
	route::get('admin/commission/settings', 'CommissionsController@editCommissionSettings')
	->name('editCommissionSettings');

	route::post('admin/commission/settings', 'CommissionsController@updateCommissionSettings')
	->name('updateCommissionSettings');

	//vat settings
	route::get('admin/vat/settings', 'VatController@editVatSettings')
	->name('editVatSettings');

	route::post('admin/vat/settings', 'VatController@updateVatSettings')
	->name('updateVatSettings');

	//walkin pay
	route::get('walk-in/pay/{walkin_id}','WalkinController@walkinPay')->name('walkinPay');
	route::post('walk-in/pay/store','WalkinController@walkinPayStore')->name('walkinPayStore');

	//reservation
	//home service
	route::get('reservation/home-service/create', 'ReservationsController@addHomeServiceReservation')
	->name('addHomeServiceReservation');

	route::post('reservation/home-service/store', 'ReservationsController@storeHomeServiceReservation')
	->name('storeHomeServiceReservation');

	//on spa
	route::get('reservation/on-spa/create', 'ReservationsController@addOnSpaReservation')
	->name('addOnSpaReservation');

	route::post('reservation/on-spa/store', 'ReservationsController@storeOnSpaReservation')
	->name('storeOnSpaReservation');

	route::get('reservation/all', 'ReservationsController@viewAllReservations')->name('viewAllReservations');

	route::get('reservation/approve/{reservation_id}', 'ReservationsController@adminApproveReservation')
	->name('adminApproveReservation');

	route::get('reservation/cancel/{reservation_id}', 'ReservationsController@adminCancelReservation')
	->name('adminCancelReservation');

	//billing
	route::get('admin/billing/all', 'BillingController@adminViewBilling')->name('adminViewBilling');

	//payment
	route::get('admin/payment/all', 'PaymentController@adminViewAllPayments')->name('adminViewAllPayments');
	route::get('admin/billing/pay/{billing_id}', 'PaymentController@adminPayBilling')->name('adminPayBilling');
	route::post('admin/billing/pay/store', 'PaymentController@adminPayBillingStore')->name('adminPayBillingStore');

	//CUSTOMERS //Reservations //Home Service
	route::get('customer/reservation/all', 'CustomerReservationController@viewAllReservations')->name('customerViewAllReservations');

	route::get('customer/reservation/cancel/{reservation_id}', 'CustomerReservationController@customerCancelReservation')->name('customerCancelReservation');

	route::get('customer/reservation/home-service/create', 'CustomerReservationController@addHomeServiceReservation')->name('customerAddHomeServiceReservation');

	route::post('customer/reservation/home-service/store', 'CustomerReservationController@storeHomeServiceReservation')->name('storeCustomerHomeServiceReservation');

	route::get('customer/reservation/on-spa/create', 'CustomerReservationController@addOnSpaReservation')->name('customerAddOnSpaReservation');

	route::post('customer/reservation/on-spa/store', 'CustomerReservationController@storeOnSpaReservation')
		->name('customerStoreOnSpaReservation');

	//customer payments
	route::get('customer/payment/all', 'CustomerPaymentsController@customerViewAllPayments')
		->name('customerViewAllPayments');

	//Employee //reservations
	route::get('employee/reservation/all', 'EmployeeReservationsController@viewAllReservations')->name('employeeViewAllReservations');

	route::get('employee/reservation/approve/{reservation_id}', 'EmployeeReservationsController@employeeApproveReservation')
		->name('employeeApproveReservation');

	route::get('employee/reservation/cancel/{reservation_id}', 'EmployeeReservationsController@employeeCancelReservation')
		->name('employeeCancelReservation');

	//commissions
	route::get('employee/commissions', 'EmployeeCommissionsController@viewAllCommissions')
		->name('employeeViewAllCommissions');

	//RECEIPTS
	//WALK-IN
	route::get('walkin/receipt/{walkin_id}/{amount_paid}/{change}', 'ReceiptController@viewWalkinReceipt')->name('viewWalkinReceipt');

	//RESERVATION
	route::get('reservation/receipt/{billing_id}/{amount_paid}/{change}', 'ReceiptController@viewReservationReceipt')->name('viewReservationReceipt');

	//INFRACTIONS
	route::get('admin/employee/infractions', 'InfractionsController@viewEmployeeInfractions')->name('viewEmployeeInfractions');

	route::get('admin/employee/infractions/create', 'InfractionsController@create')->name('createEmployeeInfraction');
	route::post('admin/employee/infractions/store', 'InfractionsController@store')->name('storeEmployeeInfraction');
	route::get('admin/employee/infractions/{id}', 'InfractionsController@destroy')->name('destroyEmployeeInfraction');

	route::get('employee/infractions', 'EmployeeInfractionsController@index')->name('employeeInfractions');
	
});
