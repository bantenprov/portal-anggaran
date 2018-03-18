<?php

Route::group(['prefix' => 'api/anggaran', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@index',
        'create'    => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@create',
        'show'      => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@show',
        'store'     => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@store',
        'edit'      => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@edit',
        'update'    => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@update',
        'destroy'   => 'Bantenprov\Anggaran\Http\Controllers\AnggaranController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('anggaran.index');
    Route::get('/create',       $controllers->create)->name('anggaran.create');
    Route::get('/{id}',         $controllers->show)->name('anggaran.show');
    Route::post('/',            $controllers->store)->name('anggaran.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('anggaran.edit');
    Route::put('/{id}',         $controllers->update)->name('anggaran.update');
    Route::delete('/{id}',      $controllers->destroy)->name('anggaran.destroy');
});
