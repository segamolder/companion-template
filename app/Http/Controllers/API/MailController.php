<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:51
 */

namespace App\Http\Controllers\API;


class MailController
{

    /**
     * MailController constructor.
     */
    public function __construct()
    {
        //TODO Сделать сервис отправки почты
    }

    public function sendVerificationEmail() {
        //TODO Отправить подтверждение почты
    }

    public function checkVerification() {
        //TODO Проверить подтверждена ли почта
    }
}
