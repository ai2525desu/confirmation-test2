<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Storage;

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
        $query = Product::query();

        $query->NameSearch($request->name);

        if ($request->sort === 'expensive') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort === 'cheap') {
            $query->orderBy('price', 'asc');
        }
        $products = $query->paginate(6)->appends($request->query());
        return view('product-list', compact('products'));
    }

    // 登録画面表示
    public function register()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    // 登録機能
    public function store(ProductRequest $request)
    {

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        if ($request->has('seasons')) {
            $product->seasons()->attach($request->input('seasons'));
        }
        return redirect('/products');
    }

    // 詳細画面
    public function detail($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view('detail', compact('product', 'seasons'));
    }

    // 更新機能
    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $oldImage = $product->image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        } else {
            $path = $request->input('existing_image');
        }

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $path,
        ]);

        $product->seasons()->sync($request->input('seasons', []));

        return redirect('/products')->with('');
    }

    // 削除機能
    public function delete($productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/products');
    }
}
