<?php

Route::group([
        'prefix'        => 'admin/testpackage',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'ACME\TestPackage\Http\Controllers\Admin\TestPackageController@index')->defaults('_config', [
            'view' => 'testpackage::admin.index',
        ])->name('admin.testpackage.index');

});