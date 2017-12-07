<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 2017/12/7
 * Time: 21:52
 */
namespace App\Billing;

class Stripe
{

    protected $key;

    public function __construct($key)
    {
        $this->key=$key;

    }


}