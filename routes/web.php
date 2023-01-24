<?php


    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\CatalogController;
    use App\Http\Controllers\FirstController;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', [FirstController::class, 'index']);

    Route::get('test', function () {

       $response = Http::acceptJson()
        ->get('https://www.nbrb.by/api/exrates/rates?periodicity=0');
       dd($response->body());

       $client  = new \GuzzleHttp\Client([
           'base_uri' => 'https://www.nbrb.by'
       ]);
        try {
            $response = $client->post('/api/exrates/rates/431', [
                'query'=> [
                    'periodicity' => 0,
                    'onDate' => '2022-01-01'
                ]
            ]);

            dd(json_decode($response->getBody()->getContents(), true));
        } catch (Exception $exception){
            return response()
                ->json([
                    'message' => 'Something went wrong'
                ])
                ->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    });

    Route::get('catalog', [CatalogController::class, 'catalog']);
    Route::get('catalog/{category}/{product}', [CatalogController::class, 'product']);
    Route::get('catalog/{category}', [CatalogController::class, 'category'])
        ->name('catalog_category');

    Route::post('/add_to_cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [CartController::class, 'show']);
    Route::get('/cart_products', [CartController::class, 'getCartProducts']);

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::resource('categories', CategoryController::class)
            ->except('show');
        Route::resource('products', ProductController::class);
    });


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
