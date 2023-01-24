<?php

    namespace App\Services;

    use App\Interfaces\ICurrencyInterface;

    class NbrbBank implements ICurrencyInterface
    {

        public function getCurrency(string $currency, string $date)
        {
            dump(1111);
        }

        public function getAllCurrenciesOnDate(string $date)
        {
            dump(2222);
        }
    }