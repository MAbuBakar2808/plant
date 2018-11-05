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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
Auth::routes();

Route::group(['middleware' => 'auth'], function(){

Route::get('/home', function () { return view('index'); });
Route::get('/', 'HomeController@index');

//City Routes
Route::get('cities','CityController@index')->name('cities');
Route::get('cities/create','CityController@create')->name('cities.create');
Route::post('cities/store','CityController@store')->name('cities.store');
Route::get('cities/edit/{id}','CityController@edit')->name('cities.edit');
Route::post('cities/update/{id}','CityController@update')->name('cities.update');
Route::get('cities/delete/{id}','CityController@destroy')->name('cities.delete');

//Zone Routes
Route::get('zones','ZoneController@index')->name('zones');
Route::get('zones/create','ZoneController@create')->name('zones.create');
Route::post('zones/store','ZoneController@store')->name('zones.store');
Route::get('zones/edit/{id}','ZoneController@edit')->name('zones.edit');
Route::post('zones/update/{id}','ZoneController@update')->name('zones.update');
Route::get('zones/delete/{id}','ZoneController@destroy')->name('zones.delete');

//Area Routes
Route::get('areas','AreaController@index')->name('areas');
Route::get('areas/create','AreaController@create')->name('areas.create');
Route::post('areas/store','AreaController@store')->name('areas.store');
Route::get('areas/edit/{id}','AreaController@edit')->name('areas.edit');
Route::post('areas/update/{id}','AreaController@update')->name('areas.update');
Route::get('areas/delete/{id}','AreaController@destroy')->name('areas.delete');

//Sale_Contract Routes
Route::get('sale-contract','SaleContractController@index')->name('sale-contract');
Route::get('sale-contract/create','SaleContractController@create')->
name('sale-contract.create');
Route::post('sale-contract/store','SaleContractController@store')->name('sale-contract.store');
Route::get('sale-contract/edit/{id}','SaleContractController@edit')->name('sale-contract.edit');
Route::post('sale-contract/update/{id}','SaleContractController@update')->
name('sale-contract.update');
Route::get('sale-contract/delete/{id}','SaleContractController@destroy')->
name('sale-contract.delete');
Route::get('transporters','TransporterController@index')->name('transporters');
Route::get('transporter/create','TransporterController@create')->name('transporter.create');
Route::post('transporter/store','TransporterController@store')->name('transporter.store');
Route::get('transporter/delete/{id}','TransporterController@destroy')->name('transporter.delete');

//Distributors Routes
Route::get('distributors','DistributorController@index')->name('distributors');
Route::get('distributor/create','DistributorController@create')->name('distributor.create');
Route::post('distributor/store','DistributorController@store')->name('distributor.store');
Route::get('distributor/edit/{id}','DistributorController@edit')->name('distributor.edit');
Route::post('distributor/update/{id}','DistributorController@update')->name('distributor.update');
Route::get('distributor/delete/{id}','DistributorController@destroy')->name('distributor.delete');
//Retail Sale Routes
Route::get('retail-sale/create','RetailSaleController@create')->name('retail-sale.create');
//Route::post('retail-sale/getdata','RetailSaleController@store_data')->name('retail-sale.getdata');
Route::get('retail-sale/getPlant','RetailSaleController@getPlant')->name('retail-sale.getPlant');
Route::get('retail-sale/getplantdata/{id}','RetailSaleController@getPlantData')->name('retail-sale.getplantdata');
Route::post('retail-sale/store','RetailSaleController@store')->name('retail-sale.store');
//Route::get('retail-sale/report','RetailSaleController@report_send')->name('retail-sale.report');
Route::get('retail-sale/report_date','RetailSaleController@report_date')->name('retail-sale.report_date');
Route::any('retail-sale/senddate','RetailSaleController@report_date_send')->name('retail-sale.senddate');
Route::get('retail-sale/datepdf','RetailSaleController@pdfdate')->name('retail-sale.datepdf');

Route::get('retail-sale/report_customer','RetailSaleController@report_distributor')->name('retail-sale.report_customer');
Route::any('retail-sale/sendreport','RetailSaleController@send_report')->name('retail-sale.sendreport');
Route::get('retail-sale/distpdf','RetailSaleController@pdfdist')->name('retail-sale.distpdf');

Route::get('retail-sale/report_plant','RetailSaleController@report_plant')->name('retail-sale.report_plant');
Route::any('retail-sale/sendplant','RetailSaleController@report_plant_send')->name('retail-sale.sendplant');
Route::get('retail-sale/plantpdf','RetailSaleController@pdfplant')->name('retail-sale.plantpdf');
// Route::get('retail-sale/getPlantList')->name('');


//Plant Routes
Route::get('plants','PlantController@index')->name('plants');
Route::get('plant/create','PlantController@create')->name('plant.create');
Route::post('plant/store','PlantController@store')->name('plant.store');
Route::get('plant/edit/{id}','PlantController@edit')->name('plant.edit');
Route::post('plant/update/{id}','PlantController@update')->name('plant.update');
Route::get('plant/delete/{id}','PlantController@destroy')->name('plant.delete');

//Inward Gate Pass
Route::get('inward-gate','IgpassController@index')->name('inward-gate');
Route::get('inward-gate/create','IgpassController@create')->name('inward-gate.create');
Route::post('inward-gate/store','IgpassController@store')->name('inward-gate.store');
Route::get('inward-gate/edit/{id}','IgpassController@edit')->name('inward-gate.edit');
Route::post('inward-gate/update/{id}','IgpassController@update')->name('inward-gate.update');
Route::get('inward-gate/delete/{id}','IgpassController@destroy')->name('inward-gate.delete');
Route::get('inward-gate/report','IgpassController@report_create')->name('inward-gate.report');
Route::any('inward-gate/sendreport','IgpassController@report_send')->name('inward-gate.sendreport');
Route::get('inward-gate/pdf','IgpassController@pdfpage')->name('inward-gate.pdf');


//Inward Gate Pass Cylinder Filling
Route::get('igp-cylfill','IgpcylfillController@index')->name('igp-cylfill');
Route::get('igp-cylfill/create','IgpcylfillController@create')->name('igp-cylfill.create');
Route::post('igp-cylfill/store','IgpcylfillController@store')->name('igp-cylfill.store');
Route::get('igp-cylfill/get-Token','IgpcylfillController@getMaxToken')->name('igp-cylfill.get-Token');
Route::get('igp-cylfill/edit/{id}','IgpcylfillController@edit')->name('igp-cylfill.edit');
Route::post('igp-cylfill/update/{id}','IgpcylfillController@update')->name('igp-cylfill.update');
Route::get('igp-cylfill/delete/{id}','IgpcylfillController@destroy')->name('igp-cylfill.delete');
Route::get('igp-cylfill/report','IgpcylfillController@report_send')->name('igp-cylfill.report');
Route::get('igp-cylfill/report_customer','IgpcylfillController@report_distributor')->name('igp-cylfill.report_customer');
Route::any('igp-cylfill/sendreport','IgpcylfillController@send_report')->name('igp-cylfill.sendreport');
Route::get('igp-cylfill/distpdf','IgpcylfillController@pdfdist')->name('igp-cylfill.distpdf');

Route::get('igp-cylfill/report_plant','IgpcylfillController@report_plant')->name('igp-cylfill.report_plant');
Route::any('igp-cylfill/sendplant','IgpcylfillController@report_plant_send')->name('igp-cylfill.sendplant');
Route::get('igp-cylfill/plantpdf','IgpcylfillController@pdfplant')->name('igp-cylfill.plantpdf');

Route::get('igp-cylfill/report_date','IgpcylfillController@report_date')->name('igp-cylfill.report_date');
Route::any('igp-cylfill/senddate','IgpcylfillController@report_date_send')->name('igp-cylfill.senddate');
Route::get('igp-cylfill/datepdf','IgpcylfillController@pdfdate')->name('igp-cylfill.datepdf');

//Distributors Routes
Route::get('suppliers','SupplierController@index')->name('suppliers');
Route::get('supplier/create','SupplierController@create')->name('supplier.create');
Route::post('supplier/store','SupplierController@store')->name('supplier.store');

Route::get('supplier/edit/{id}','SupplierController@edit')->name('supplier.edit');
Route::post('supplier/update/{id}','SupplierController@update')->name('supplier.update');
Route::get('supplier/delete/{id}','SupplierController@destroy')->name('supplier.delete');

//Sale_Contract Routes
Route::get('purchase-contract','PurchaseContractController@index')->name('purchase-contract');
Route::get('purchase-contract/create','PurchaseContractController@create')->
name('purchase-contract.create');
Route::post('purchase-contract/store','PurchaseContractController@store')->name('purchase-contract.store');
Route::get('purchase-contract/edit/{id}','PurchaseContractController@edit')->name('purchase-contract.edit');
Route::post('purchase-contract/update/{id}','PurchaseContractController@update')->
name('purchase-contract.update');
Route::get('purchase-contract/delete/{id}','PurchaseContractController@destroy')->
name('purchase-contract.delete');
});
