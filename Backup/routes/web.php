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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
    Route::group(
    [
        'prefix' => 'customertables','middleware' => 'auth'
    ], function () {

        Route::get('/', 'CustomertablesController@index')
             ->name('customertables.customertables.index');

        Route::get('/create','CustomertablesController@create')
             ->name('customertables.customertables.create');

        Route::get('/show/{customertables}','CustomertablesController@show')
             ->name('customertables.customertables.show')
             ->where('id', '[0-9]+');

        Route::get('/{customertables}/edit','CustomertablesController@edit')
             ->name('customertables.customertables.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'CustomertablesController@store')
             ->name('customertables.customertables.store');

        Route::put('customertables/{customertables}', 'CustomertablesController@update')
             ->name('customertables.customertables.update')
             ->where('id', '[0-9]+');

        Route::delete('/customertables/{customertables}','CustomertablesController@destroy')
             ->name('customertables.customertables.destroy')
             ->where('id', '[0-9]+');

        Route::get('/customertablesImport', 'CustomertablesController@customertablesImport')
             ->name('customertables.customertables.customertablesImport');

        Route::post('/customertablesExcelImport', 'CustomertablesController@customertablesExcelImport')
             ->name('customertables.customertables.customertablesExcelImport');

        Route::get('/customertablesDownload', 'CustomertablesController@customertablesDownload')
             ->name('customertables.customertables.customertablesDownload');

        Route::get('/pincodesearch', 'CustomertablesController@pincodesearch')
             ->name('pincodesearch');

        Route::get('/get-customers','CustomertablesController@getCustomers')->name('get-customers');
        Route::get('/get-mapped-products','CustomertablesController@getMappedProducts')->name('customertables.get-mapped-products');
    });

    Route::group(
    [
        'prefix' => 'locations','middleware' => 'auth'
    ], function () {

        Route::get('/', 'LocationsController@index')
             ->name('locations.location.index');

        Route::get('/create','LocationsController@create')
             ->name('locations.location.create');

        Route::get('/show/{location}','LocationsController@show')
             ->name('locations.location.show')
             ->where('id', '[0-9]+');

        Route::get('/{location}/edit','LocationsController@edit')
             ->name('locations.location.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'LocationsController@store')
             ->name('locations.location.store');

        Route::put('location/{location}', 'LocationsController@update')
             ->name('locations.location.update')
             ->where('id', '[0-9]+');

        Route::delete('/location/{location}','LocationsController@destroy')
             ->name('locations.location.destroy')
             ->where('id', '[0-9]+');

        Route::get('/locationImport', 'LocationsController@locationImport')
             ->name('locations.location.locationImport');

        Route::post('/locationExcelImport', 'LocationsController@locationExcelImport')
             ->name('locations.location.locationExcelImport');

        Route::get('/locationDownload', 'LocationsController@locationDownload')
             ->name('locations.location.locationDownload');

    });

    Route::group(
    [
        'prefix' => 'uoms','middleware' => 'auth'
    ], function () {

        Route::get('/', 'UomsController@index')
             ->name('uoms.uom.index');

        Route::get('/create','UomsController@create')
             ->name('uoms.uom.create');

        Route::get('/show/{uom}','UomsController@show')
             ->name('uoms.uom.show')
             ->where('id', '[0-9]+');

        Route::get('/{uom}/edit','UomsController@edit')
             ->name('uoms.uom.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'UomsController@store')
             ->name('uoms.uom.store');

        Route::put('uom/{uom}', 'UomsController@update')
             ->name('uoms.uom.update')
             ->where('id', '[0-9]+');

        Route::delete('/uom/{uom}','UomsController@destroy')
             ->name('uoms.uom.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'taxtypes','middleware' => 'auth'
    ], function () {

        Route::get('/', 'TaxtypesController@index')
             ->name('taxtypes.taxtypes.index');

        Route::get('/create','TaxtypesController@create')
             ->name('taxtypes.taxtypes.create');

        Route::get('/show/{taxtypes}','TaxtypesController@show')
             ->name('taxtypes.taxtypes.show')
             ->where('id', '[0-9]+');

        Route::get('/{taxtypes}/edit','TaxtypesController@edit')
             ->name('taxtypes.taxtypes.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'TaxtypesController@store')
             ->name('taxtypes.taxtypes.store');

        Route::put('taxtypes/{taxtypes}', 'TaxtypesController@update')
             ->name('taxtypes.taxtypes.update')
             ->where('id', '[0-9]+');

        Route::delete('/taxtypes/{taxtypes}','TaxtypesController@destroy')
             ->name('taxtypes.taxtypes.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'products','middleware' => 'auth'
    ], function () {

        Route::get('/', 'ProductsController@index')
             ->name('products.products.index');

        Route::get('/create','ProductsController@create')
             ->name('products.products.create');

        Route::get('/show/{products}','ProductsController@show')
             ->name('products.products.show')
             ->where('id', '[0-9]+');

        Route::get('/{products}/edit','ProductsController@edit')
             ->name('products.products.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'ProductsController@store')
             ->name('products.products.store');

        Route::put('products/{products}', 'ProductsController@update')
             ->name('products.products.update')
             ->where('id', '[0-9]+');

        Route::delete('/products/{products}','ProductsController@destroy')
             ->name('products.products.destroy')
             ->where('id', '[0-9]+');

        Route::get('/productsImport', 'ProductsController@productsImport')
             ->name('products.products.productsImport');

        Route::post('/productsExcelImport', 'ProductsController@productsExcelImport')
             ->name('products.products.productsExcelImport');

        Route::post('importExcel', 'ProductsController@importExcel')->name('importExcel');

        Route::get('/productsDownload', 'ProductsController@productsDownload')
             ->name('products.products.productsDownload');

        Route::get('/getproductlist/{id}', 'ProductsController@getproductlist')
             ->name('products.products.getproductlist');

        Route::get('/get_product', 'ProductsController@get_product')
             ->name('get_product');




    });

    Route::group(
    [
        'prefix' => 'vchtypes','middleware' => 'auth'
    ], function () {

        Route::get('/', 'VchtypesController@index')
             ->name('vchtypes.vchtypes.index');

        Route::get('/create','VchtypesController@create')
             ->name('vchtypes.vchtypes.create');

        Route::get('/show/{vchtypes}','VchtypesController@show')
             ->name('vchtypes.vchtypes.show')
             ->where('id', '[0-9]+');

        Route::get('/{vchtypes}/edit','VchtypesController@edit')
             ->name('vchtypes.vchtypes.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'VchtypesController@store')
             ->name('vchtypes.vchtypes.store');

        Route::put('vchtypes/{vchtypes}', 'VchtypesController@update')
             ->name('vchtypes.vchtypes.update')
             ->where('id', '[0-9]+');

        Route::delete('/vchtypes/{vchtypes}','VchtypesController@destroy')
             ->name('vchtypes.vchtypes.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'companies','middleware' => 'auth'
    ], function () {

        Route::get('/', 'CompaniesController@index')
             ->name('companies.company.index');

        Route::get('/create','CompaniesController@create')
             ->name('companies.company.create');

        Route::get('/show/{company}','CompaniesController@show')
             ->name('companies.company.show')
             ->where('id', '[0-9]+');

        Route::get('/{company}/edit','CompaniesController@edit')
             ->name('companies.company.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'CompaniesController@store')
             ->name('companies.company.store');

        Route::put('company/{company}', 'CompaniesController@update')
             ->name('companies.company.update')
             ->where('id', '[0-9]+');

        Route::delete('/company/{company}','CompaniesController@destroy')
             ->name('companies.company.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'clientcompanies','middleware' => 'auth'
    ], function () {

        Route::get('/', 'ClientcompaniesController@index')
             ->name('clientcompanies.clientcompany.index');

        Route::get('/create','ClientcompaniesController@create')
             ->name('clientcompanies.clientcompany.create');

        Route::get('/show/{clientcompany}','ClientcompaniesController@show')
             ->name('clientcompanies.clientcompany.show')
             ->where('id', '[0-9]+');

        Route::get('/{clientcompany}/edit','ClientcompaniesController@edit')
             ->name('clientcompanies.clientcompany.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'ClientcompaniesController@store')
             ->name('clientcompanies.clientcompany.store');

        Route::put('clientcompany/{clientcompany}', 'ClientcompaniesController@update')
             ->name('clientcompanies.clientcompany.update')
             ->where('id', '[0-9]+');

        Route::delete('/clientcompany/{clientcompany}','ClientcompaniesController@destroy')
             ->name('clientcompanies.clientcompany.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'salesheaders','middleware' => 'auth'
    ], function () {

    Route::post('/salesreportdownload', 'reportController@salesreportdownload')
             ->name('salesreport.download');

        Route::get('/', 'SalesheadersController@index')
             ->name('salesheaders.salesheader.index');

        Route::get('/create','SalesheadersController@create')
             ->name('salesheaders.salesheader.create');

        Route::get('/show/{salesheader}','SalesheadersController@show')
             ->name('salesheaders.salesheader.show')
             ->where('id', '[0-9]+');

        Route::get('/{salesheader}/edit','SalesheadersController@edit')
             ->name('salesheaders.salesheader.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'SalesheadersController@store')
             ->name('salesheaders.salesheader.store');

         Route::post('forgetsession', 'InvoiceController@sessionforget')
             ->name('session.forget');

        Route::post('/importExcelstore', 'InvoiceController@importExcelstore')
             ->name('salesheaders.salesheader.importExcelstore');

        Route::put('salesheader/{salesheader}', 'SalesheadersController@update')
             ->name('salesheaders.salesheader.update')
             ->where('id', '[0-9]+');

        Route::delete('/salesheader/{salesheader}','SalesheadersController@destroy')
             ->name('salesheaders.salesheader.destroy')
             ->where('id', '[0-9]+');

        Route::post('importExcel', 'InvoiceController@importExcel')->name('salesheaders.salesheader.importExcel');
         // Route::get('/delete/{salesheader}','SalesheadersController@destroy')
         //     ->name('salesheaders.salesheader.destroy')
         //     ->where('id', '[0-9]+');

        Route::get('/getcustomers/{id}', 'SalesheadersController@getcustomers')
             ->name('salesheaders.salesheader.getcustomers');

        Route::get('/getpono/{cuscode}', 'SalesheadersController@getpono')
            ->name('salesheaders.salesheader.getpono');

        Route::get('/podetails/{pono}', 'SalesheadersController@podetails')
            ->name('salesheaders.salesheader.podetails');

        Route::get('/Import', 'SalesheadersController@Import')
             ->name('salesheaders.salesheader.Import');

        Route::post('/ExcelImport', 'SalesheadersController@ExcelImport')
             ->name('salesheaders.salesheader.ExcelImport');

        // Route::post('importExcel', 'SalesheadersController@importExcel')->name('importExcel');

        Route::get('/Download', 'SalesheadersController@exportDownload')
             ->name('salesheaders.salesheader.Download');

        Route::get('/Downloadpdf', 'SalesheadersController@Downloadpdf')
             ->name('salesheaders.salesheader.Downloadpdf');

    });

    Route::group(
    [
        'prefix' => 'salesdetails','middleware' => 'auth'
    ], function () {

        Route::get('/', 'SalesdetailsController@index')
             ->name('salesdetails.salesdetails.index');

        Route::get('/create','SalesdetailsController@create')
             ->name('salesdetails.salesdetails.create');

        Route::get('/show/{salesdetails}','SalesdetailsController@show')
             ->name('salesdetails.salesdetails.show')
             ->where('id', '[0-9]+');

        Route::get('/{salesdetails}/edit','SalesdetailsController@edit')
             ->name('salesdetails.salesdetails.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'SalesdetailsController@store')
             ->name('salesdetails.salesdetails.store');

        Route::put('salesdetails/{salesdetails}', 'SalesdetailsController@update')
             ->name('salesdetails.salesdetails.update')
             ->where('id', '[0-9]+');

        Route::delete('/salesdetails/{salesdetails}','SalesdetailsController@destroy')
             ->name('salesdetails.salesdetails.destroy')
             ->where('id', '[0-9]+');

    });


    Route::group(
    [
        'prefix' => 'reports','middleware' => 'auth'
    ], function () {

        Route::get('salesreports/', 'reportController@salesreports')->name('salesreports');
        Route::get('salewisesreports/', 'reportController@salewisesreports')->name('salewisesreports');

        Route::get('/customerwiseReports/', 'reportController@customerwisereport')
             ->name('customerwiseReports');

         Route::get('customerwisereport/', 'reportController@getcustomerwisereportdata')
             ->name('get.customerwisereport.data');

        Route::get('/locationwiseReports/', 'reportController@locationwisereport')
             ->name('locationwiseReports');

         Route::get('locationwisereport/', 'reportController@getlocationwisereportdata')
             ->name('get.locationwisereport.data');

        Route::get('/productwiseReports/', 'reportController@productwisereports')
             ->name('productwisereports');

         Route::get('productwisereports/', 'reportController@getproductwisereportsdata')
             ->name('get.productwisereports.data');

        // Route::get('/salespersonwiseReports/', 'reportController@salespersonwisereports')
        //      ->name('salespersonwisereports');

        //  Route::get('salespersonwisereports/', 'reportController@getsalespersonwisereportsdata')
        //      ->name('get.salespersonwisereports.data');

        // Route::get('/salesReports/', 'reportController@salesreports')
        //      ->name('salesreports');

        // Route::get('/salesReports/', 'reportController@getsalesreportsdata')
        //      ->name('get.saleswisereport.data');

        //  Route::get('salesreports/', 'reportController@getsalesreportsdata')
        //      ->name('get.salesreports.data');

        // Route::get('/salestypewiseReports/', 'reportController@salestypewisereports')
        //      ->name('salestypewisereports');

        //  Route::get('salestypewisereports/', 'reportController@getsalestypewisereportsdata')
        //      ->name('get.salestypewisereports.data');



    });

    Route::group(
    [
        'prefix' => 'emplayees','middleware' => 'auth'
    ], function () {

        Route::get('/', 'EmplayeesController@index')
             ->name('emplayees.emplayee.index');

        Route::get('/create','EmplayeesController@create')
             ->name('emplayees.emplayee.create');

        Route::get('/show/{emplayee}','EmplayeesController@show')
             ->name('emplayees.emplayee.show')
             ->where('id', '[0-9]+');

        Route::get('/{emplayee}/edit','EmplayeesController@edit')
             ->name('emplayees.emplayee.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'EmplayeesController@store')
             ->name('emplayees.emplayee.store');

        Route::put('emplayee/{emplayee}', 'EmplayeesController@update')
             ->name('emplayees.emplayee.update')
             ->where('id', '[0-9]+');

        Route::delete('/emplayee/{emplayee}','EmplayeesController@destroy')
             ->name('emplayees.emplayee.destroy')
             ->where('id', '[0-9]+');

    });


    Route::group(
    [
        'prefix' => 'drop_downs','middleware' => 'auth'
    ], function () {

        Route::get('/', 'DropDownsController@index')
             ->name('drop_downs.drop_downs.index');

        Route::get('get-dropDowns-dt-data', ['as'=>'get.dropDowns.data','uses'=>'DropDownsController@getIndexData']);

        Route::get('/create','DropDownsController@create')
             ->name('drop_downs.drop_downs.create');

        Route::get('/show/{dropDowns}','DropDownsController@show')
             ->name('drop_downs.drop_downs.show')
             ->where('id', '[0-9]+');

        Route::get('/{dropDowns}/edit','DropDownsController@edit')
             ->name('drop_downs.drop_downs.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'DropDownsController@store')
             ->name('drop_downs.drop_downs.store');

        Route::put('drop_downs/{dropDowns}', 'DropDownsController@update')
             ->name('drop_downs.drop_downs.update')
             ->where('id', '[0-9]+');

        Route::delete('/drop_downs/{dropDowns}','DropDownsController@destroy')
             ->name('drop_downs.drop_downs.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'poheaders','middleware' => 'auth'
    ], function () {

        Route::get('/', 'PoheadersController@index')
             ->name('poheaders.poheader.index');

        Route::get('/create','PoheadersController@create')
             ->name('poheaders.poheader.create');

        Route::get('/show/{poheader}','PoheadersController@show')
             ->name('poheaders.poheader.show')
             ->where('id', '[0-9]+');

        Route::get('/{poheader}/edit','PoheadersController@edit')
             ->name('poheaders.poheader.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'PoheadersController@store')
             ->name('poheaders.poheader.store');

        Route::put('poheader/{poheader}', 'PoheadersController@update')
             ->name('poheaders.poheader.update')
             ->where('id', '[0-9]+');

        Route::delete('/poheader/{poheader}','PoheadersController@destroy')
             ->name('poheaders.poheader.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'podetails','middleware' => 'auth'
    ], function () {

        Route::get('/', 'PodetailsController@index')
             ->name('podetails.podetails.index');

        Route::get('/create','PodetailsController@create')
             ->name('podetails.podetails.create');

        Route::get('/show/{podetails}','PodetailsController@show')
             ->name('podetails.podetails.show')
             ->where('id', '[0-9]+');

        Route::get('/{podetails}/edit','PodetailsController@edit')
             ->name('podetails.podetails.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'PodetailsController@store')
             ->name('podetails.podetails.store');

        Route::put('podetails/{podetails}', 'PodetailsController@update')
             ->name('podetails.podetails.update')
             ->where('id', '[0-9]+');

        Route::delete('/podetails/{podetails}','PodetailsController@destroy')
             ->name('podetails.podetails.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(
    [
        'prefix' => 'transports','middleware' => 'auth'
    ], function () {

        Route::get('/', 'TransportsController@index')
             ->name('transports.transport.index');

        Route::get('/create','TransportsController@create')
             ->name('transports.transport.create');

        Route::get('/show/{transport}','TransportsController@show')
             ->name('transports.transport.show')
             ->where('id', '[0-9]+');

        Route::get('/{transport}/edit','TransportsController@edit')
             ->name('transports.transport.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'TransportsController@store')
             ->name('transports.transport.store');

        Route::put('transport/{transport}', 'TransportsController@update')
             ->name('transports.transport.update')
             ->where('id', '[0-9]+');

        Route::delete('/transport/{transport}','TransportsController@destroy')
             ->name('transports.transport.destroy')
             ->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'print', 'middleware' => 'auth'], function() {

         Route::get('','printController@create')->name('print');
    Route::get('print_invo','printController@print_invoice')->name('print_invo');
        //Route::get('create/', 'transactionController@create')->name('transaction.create');
        Route::get('get-area-dt-data', ['as'=>'get.salesheaders.data','uses'=>'printController@getIndexData']);
        Route::post('barcode', 'printController@printbarcode')->name('print.printbarcode');

        Route::get('edit/{print}', 'printController@edit')->name('print.edit');
        Route::post('update/{print}', 'printController@update')->name('print.update');

        Route::get('destroy/{print}', 'printController@destroy')->name('print.destroy');

        Route::get('getinvoicenum', 'printController@getinvoicenum')->name('getinvoicenum');

        Route::post('checkinvoiceto', 'printController@checkinvoiceto')->name('checkinvoiceto');

        Route::get('/show/{print}','printController@show')->name('prints.print.show')->where('id', '[0-9]+');

    });

       Route::group(['prefix' => 'invoices', 'middleware' => 'auth'], function() {
       Route::get('', 'InvoiceController@index')->name('invoices');
       Route::get('create', 'InvoiceController@create')->name('invoices.create');

    });



    Route::group(['prefix' => 'roles', 'middleware' => 'auth'], function() {
        Route::get('', 'RolesController@index')->name('roles');

        Route::get('create', 'RolesController@create')->name('roles.create');
        Route::get('show/{roles}', 'RolesController@show')->name('roles.show');
        Route::post('store', 'RolesController@store')->name('roles.store');

        Route::get('edit/{roles}', 'RolesController@edit')->name('roles.edit');
        Route::post('update/{roles}', 'RolesController@update')->name('roles.update');

        Route::delete('destroy/{roles}', 'RolesController@destroy')->name('roles.destroy');

         Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    });


    Route::group(['prefix' => 'usersetting', 'middleware' => 'auth'], function() {
        Route::get('', 'usersettingController@index')->name('usersetting');

        Route::get('create/', 'usersettingController@create')->name('usersetting.create');
        Route::post('store', 'usersettingController@store')->name('usersetting.store');

        Route::get('edit/{usersetting}', 'usersettingController@edit')->name('usersetting.edit');
        Route::post('update/{usersetting}', 'usersettingController@update')->name('usersetting.update');

        Route::get('destroy/{usersetting}', 'usersettingController@destroy')->name('usersetting.destroy');

        Route::get('import', 'usersettingController@import')->name('user.import');
        Route::post('uploadUsers', 'usersettingController@uploadUsers')->name('uploadUsers');

        });


    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
    Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');


    Route::group(
    [
        'prefix' => 'configurations','middleware' => 'auth'
    ], function () {

        Route::get('/', 'ConfigurationsController@index')
             ->name('configurations.configurations.index');

        Route::get('get-configurations-dt-data', ['as'=>'get.configurations.data','uses'=>'ConfigurationsController@getIndexData']);

        Route::get('/create','ConfigurationsController@create')
             ->name('configurations.configurations.create');

        Route::get('/show/{configurations}','ConfigurationsController@show')
             ->name('configurations.configurations.show')
             ->where('id', '[0-9]+');

        Route::get('/{configurations}/edit','ConfigurationsController@edit')
             ->name('configurations.configurations.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'ConfigurationsController@store')
             ->name('configurations.configurations.store');

        Route::put('configurations/{configurations}', 'ConfigurationsController@update')
             ->name('configurations.configurations.update')
             ->where('id', '[0-9]+');

        Route::delete('/configurations/{configurations}','ConfigurationsController@destroy')
             ->name('configurations.configurations.destroy')
             ->where('id', '[0-9]+');

    });
    //modified by suriya 19-11-2019
    Route::resource('rate-master', 'RateMasterController')->only([
        'index','store','destroy'
    ])->middleware('auth');
    Route::get('get-mapped-products','RateMasterController@getMappedProducts')->name('rate-master.get-mapped-products')->middleware('auth');



    Route::group(
    [
        'prefix' => 'productmaps','middleware' => 'auth'
    ], function () {

        Route::get('/', 'ProductmapsController@index')
             ->name('productmaps.productmap.index');

        Route::get('/create','ProductmapsController@create')
             ->name('productmaps.productmap.create');

        Route::get('/show/{productmap}','ProductmapsController@show')
             ->name('productmaps.productmap.show')
             ->where('id', '[0-9]+');

        Route::get('/{productmap}/edit','ProductmapsController@edit')
             ->name('productmaps.productmap.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'ProductmapsController@store')
             ->name('productmaps.productmap.store');

        Route::put('productmap/{productmap}', 'ProductmapsController@update')
             ->name('productmaps.productmap.update')
             ->where('id', '[0-9]+');

        Route::delete('/productmap/{productmap}','ProductmapsController@destroy')
             ->name('productmaps.productmap.destroy')
             ->where('id', '[0-9]+');

        Route::get('/get-mapped-products','ProductmapsController@getMappedProducts')->name('productmaps.get-mapped-products');

    });


    Route::group(
    [
        'prefix' => 'ewaybill','middleware' => 'auth'
    ], function () {

        Route::get('/', 'EwaybillController@index')
             ->name('ewaybill.index');

        Route::get('/create','EwaybillController@create')
             ->name('ewaybill.create');

       Route::get('get-ewaybillinvoices-data', ['as'=>'get.ewaybillinvoices.data','uses'=>'EwaybillController@getallinvoices']);

       Route::get('getewayinvoicenum', 'EwaybillController@getewayinvoicenum')->name('getewayinvoicenum');
       Route::post('generateewaybillno', 'EwaybillController@generateewaybillno')->name('generateewaybillno');
       Route::get('printewaybillno/{id}', 'EwaybillController@printewaybillno')->name('printewaybillno');


       Route::get('/index', 'DigitalsignorController@index')->name('signor.index');
       Route::get('get-signor-dt-data', ['as'=>'get.signor.data','uses'=>'DigitalsignorController@getIndexData']);
       Route::get('get-readyforsignor-dt-data', ['as'=>'get.readyforsignor.data','uses'=>'DigitalsignorController@getIndexDatareadyforsigned']);
       Route::get('get-signed-dt-data', ['as'=>'get.signed.data','uses'=>'DigitalsignorController@getIndexDatasigned']);
       Route::post('sign', 'DigitalsignorController@SignPDF')->name('sign.pdf');
       Route::post('readytosign', 'DigitalsignorController@ReadyToSignPDF')->name('readytosign.pdf');
       Route::post('printsign', 'DigitalsignorController@PrintSignPDF')->name('print.sign.pdf');
       Route::get('getinvoicenumsigned', 'DigitalsignorController@getinvoicenumsigned')->name('getinvoicenumsigned');
       Route::get('/preview/{print}','DigitalsignorController@preview')->name('digital.print.preview')->where('id', '[0-9]+');
       Route::get('/downloadviabutton/{print}','DigitalsignorController@downloadviabutton')->name('digital.print.downloadviabutton')->where('id', '[0-9]+');
       Route::get('/previewunsigned/{print}','DigitalsignorController@previewunsigned')->name('digital.print.previewunsigned')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'config', 'middleware' => 'auth'], function() {
        Route::get('', 'ConfigController@create')->name('config');

       // Route::get('create/', 'ConfigController@create')->name('config.create');
        Route::post('store', 'ConfigController@store')->name('config.store');

        Route::get('edit/{config}', 'ConfigController@edit')->name('config.edit');
        Route::post('update/{config}', 'ConfigController@update')->name('config.update');

        Route::get('destroy/{config}', 'ConfigController@destroy')->name('config.destroy');


    });

    Route::group(
    [
        'prefix' => 'quotations','middleware' => 'auth'
    ], function () {

        Route::get('/', 'QuotationsController@index')
             ->name('quotations.quotation.index');

        Route::get('/create','QuotationsController@create')
             ->name('quotations.quotation.create');

        Route::get('/show/{quotation}','QuotationsController@show')
             ->name('quotations.quotation.show')
             ->where('id', '[0-9]+');

        Route::get('/{quotation}/edit','QuotationsController@edit')
             ->name('quotations.quotation.edit')
             ->where('id', '[0-9]+');

        Route::post('/', 'QuotationsController@store')
             ->name('quotations.quotation.store');

        Route::put('quotation/{quotation}', 'QuotationsController@update')
             ->name('quotations.quotation.update')
             ->where('id', '[0-9]+');

        Route::delete('/quotation/{quotation}','QuotationsController@destroy')
             ->name('quotations.quotation.destroy')
             ->where('id', '[0-9]+');

    });

Route::group(
[
    'prefix' => 'material_details','middleware' => 'auth'
], function () {

    Route::get('/', 'MaterialDetailsController@index')
         ->name('material_details.material_detail.index');

	Route::get('get-materialDetail-dt-data', ['as'=>'get.materialDetail.data','uses'=>'MaterialDetailsController@getIndexData']);

    Route::get('/create','MaterialDetailsController@create')
         ->name('material_details.material_detail.create');

    Route::get('/show/{materialDetail}','MaterialDetailsController@show')
         ->name('material_details.material_detail.show')
         ->where('id', '[0-9]+');

    Route::get('/{materialDetail}/edit','MaterialDetailsController@edit')
         ->name('material_details.material_detail.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MaterialDetailsController@store')
         ->name('material_details.material_detail.store');

    Route::put('material_detail/{materialDetail}', 'MaterialDetailsController@update')
         ->name('material_details.material_detail.update')
         ->where('id', '[0-9]+');

    Route::delete('/material_detail/{materialDetail}','MaterialDetailsController@destroy')
         ->name('material_details.material_detail.destroy')
         ->where('id', '[0-9]+');
    Route::post('/material_detail/import','MaterialDetailsController@importExcel')
    ->name('material_details.material_detail.import-excel');
});


Route::group(
[
     'prefix' => 'digitalsign','middleware' => 'auth'
], 
function () 
{
     Route::get('/', 'DigitalsignController@index')
         ->name('digitalsign.index');
     Route::get('get-digitalsignor-dt-data', ['as'=>'get.digitalsignor.data','uses'=>'DigitalsignController@digitalsignor']); 
     Route::post('digitalsign', 'DigitalsignController@DigitalSignPDF')->name('digitalsign.pdf');  

     Route::get('get-digitalsigned-dt-data', ['as'=>'get.digitalsigned.data','uses'=>'DigitalsignController@digitalsigned']);

     Route::get('/signedpdf/{print}','DigitalsignController@signedpdf')->name('digital.print.signedpdf')->where('id', '[0-9]+'); 
});

Route::group(
[
     'prefix' => 'autoasn','middleware' => 'auth'
], 
function () 
{
     Route::get('/', 'AutoasnController@index')
         ->name('autoasn.index');
     Route::post('hmilpostdata', 'AutoasnController@postdata')->name('hmil.postdata');
     Route::get('get-hmilpostdata-dt-data', ['as'=>'get.hmilpostdata.data','uses'=>'AutoasnController@getIndexData']);
     Route::get('getsignedinvoicenum', 'AutoasnController@getsignedinvoicenum')->name('getsignedinvoicenum');
     Route::get('/deletechange/{hmilchange}','AutoasnController@deletemanualchange')->name('hmil.manual.deletechange')->where('id', '[0-9]+');
     Route::get('/change/{hmilchange}','AutoasnController@manualchange')->name('hmil.manual.change')->where('id', '[0-9]+');
});