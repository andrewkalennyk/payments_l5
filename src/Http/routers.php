<?php
/*Route::group (['middleware' => ['web']], function () {*/
    Route::group (['prefix' => '/order'],
        function () {
            Route::get('/redirect/{type}', [
                'middleware' => 'web',
                'as' => 'order_redirect',
                'uses' => 'Vis\Payments\Controllers\PaymentController@showPaymentRedirect'
            ]);

            Route::post('/paymaster-pay-response', [
                'middleware' => 'web',
                'uses' => 'Vis\Payments\Controllers\PaymentController@getResponse'
            ]);

        });
/*});*/
