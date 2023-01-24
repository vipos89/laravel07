<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cookie;

    class CatalogController extends Controller
    {
        public function catalog(Request $request)
        {
            $categoriesForSearch = $request->input('category_filter', []);
            $cartProducts = [];
            //
            $products = Product::query()
                ->active()
                ->filter($categoriesForSearch)
                ->paginate();

            $categories = Category::with('products')->get();

            return view('catalog.catalog', compact('products', 'categories'));
        }

        public function category(Request $request, Category $category)
        {
            $products = $category->products()
                ->where('status', 1)
                ->paginate();

            return view('catalog.catalog', compact('products', 'category'));
        }

        public function product()
        {
        }
    }
