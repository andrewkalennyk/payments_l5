В composer.json добавляем в блок require

 "vis-a-vis/payments": "dev-master"
Выполняем

composer update
Добавляем в app.php в массив providers

  Vis\Payments\PaymentsServiceProvider::class,

Публикуем конфиги 

php artisan vendor:publish --tag=payments --force

Использование сверху

    use Vis\Payments\Payments;
вызов

    $payment = new Payments('paymaster', array(
                'orderId' => 'Ваш сайт'.$orderNew->id, /*айди заказа*/
                'amount'  => number_format($count, 2,'.',''),
                'description'   => 'Заказ с сайта')
    );
    $payment = $payment->init();
    if ($payment->redirectRoute) {
        return redirect()->route($payment->redirectRoute, ['paymaster'])->with('payment',$payment->paymentInfo);
    }
