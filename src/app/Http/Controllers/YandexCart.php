<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YooKassa\Client;


class YandexCart extends Controller
{
    public function yandex(Request $request)
    {
        //        $total = $request->total;
        //        $client = new Client();
        //        $client->setAuth('909205', 'test_Tvv70YjCAqz79lslLXJ4SXR0yigfEH8JQwZczdPBZiY');
        //        $payment = $client->createPayment(
        //            array(
        //                'amount' => array(
        //                    'value' => $total,
        //                    'currency' => 'RUB',
        //                ),
        //                'confirmation' => array(
        //                    'type' => 'redirect',
        //                    'return_url' => 'https://orbita-stroy.com/shop/cart',
        //                ),
        //                'capture' => false,
        //                'description' => 'Оплата заказа с сайта',
        //            ),
        //            uniqid('', true)
        //        );
        //
        //        return redirect($payment->getConfirmation()->getConfirmationUrl());


        $totalSum = $request->totalSum;

        $client = new Client();
        $client->setAuth('909205', 'test_Tvv70YjCAqz79lslLXJ4SXR0yigfEH8JQwZczdPBZiY');
        $payment = $client->createPayment(
            array(
                'amount' => array(
                    'value' => $totalSum,
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => 'https://orbita-stroy.com',
                ),
                'capture' => true,
                'description' => 'Заказ №1',
            ),
            uniqid('', true)
        );

        return $payment;
    }

}
