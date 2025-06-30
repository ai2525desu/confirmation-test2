<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    // 商品一覧画面
    public function list()
    {
        return view('product-list');
    }

    // 登録画面
    public function store()
    {
        return view('register');
    }
}
