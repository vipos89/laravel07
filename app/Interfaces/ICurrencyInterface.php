<?php

    namespace App\Interfaces;

    interface ICurrencyInterface
    {
        public function getCurrency(string $currency, string $date);

        public function getAllCurrenciesOnDate(string $date);

    }