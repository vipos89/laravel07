<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ICurrencyInterface;
use App\Jobs\ProcessPodcast;
use App\Mail\HelloMail;
use App\Models\User;
use App\Services\NbrbBank;
use App\Services\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class MailController extends Controller
{
    public function index(Request $request, ICurrencyInterface $bank){

        $bank->getAllCurrenciesOnDate('dddd');
        $bank->getCurrency('sd', 'dsf');

        $value = Cache::remember('users', 100, function () {
            return User::all();
        });





        return $value;
    }

}
