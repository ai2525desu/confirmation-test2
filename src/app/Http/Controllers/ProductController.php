<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    // 商品一覧画面
    public function list()
    {
        $products = Product::paginate(6);
        return view('product-list', compact('products'));
    }

    // 検索機能
    public function search(Request $request)
    {
        // 検索のローカルスコープ使用

        // 並び替え機能
        $query = Product::query();
        if ($request->sort === 'expensive') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort === 'cheap') {
            $query->orderBy('price', 'asc');
        }
        $products = $query->paginate(6)->appends($request->query());
        return view('product-list', compact('products'));
    }

    // 登録画面
    public function store(ProductRequest $request)
    {
        return view('register');
    }

    // 詳細画面
    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        $seasons = Season::all();
        return view('detail', compact('product', 'seasons'));
    }

    // 更新機能：update
    public function update(ProductRequest $request) {}

    // 削除機能:delete
    public function delete(Request $request) {}
}
