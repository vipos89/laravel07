<?php

    namespace App\Services;

    use App\Interfaces\ICurrencyInterface;

    class PriorBank implements ICurrencyInterface
    {

        public function getCurrency(string $currency, string $date)
        {
           dump(33333);
        }

        public function getAllCurrenciesOnDate(string $date)
        {
            dump(4444);
        }
    }