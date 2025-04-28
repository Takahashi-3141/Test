<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();


        //条件があったら絞り込み
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->input('keyword') . '%');
        }

        if ($request->filled('sort')) {
            $query->orderBy('price', $request->input('sort'));
        }

        $products = Product::all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            // $products->images_path = $path;
        }

        // $products = Product::all();


        $products = $query->paginate(6);
        // $products = Product::orderBy('created_at', 'desc')->paginate(6); // ★6件ずつ取得

        return view('products.index', ['products' => $products]);
    }

    public function detail()
    {
        $products = Product::all();
        $products = Product::all();
        return view('products.detail', compact('product'));
    }

    public function create()
    {
        $products = Product::all();
        return view('products.create');
    }

    public function store(Request $request)
    {
        $form = $request->all();

        // $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'price' => ['required', 'integer'],
        //     'image' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'text'],

        // ]);

        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|max:2048', // 2MBまで
            'seasons' => 'required|array',
            'seasons.*' => 'in:春,夏,秋,冬',
            'description' => 'required|string|max:1000',
        ]);

        // 商品を新しく作成
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->seasons = implode(',', $validated['seasons']); // 複数選択なのでカンマ区切り保存

        // 画像アップロード
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image_path = $path;
        }

        $path = $request->file('image')->store('images', 'public');
        $validated['image'] = $path;

        $product->save();


        Product::create($validated);
        return redirect()->route('products.index')->with('success', '商品を追加しました');






        // }

        // public function edit(Product $product)
        // {
        //     return view('products.edit', compact('product'));
        // }

        // public function update(Request $request, Product $product)
        // {
        //     $validated = $request->validate([
        //         'name' => 'required|string|max:255',
        //         'price' => 'required|integer',
        //         'image' => 'nullable|image'
        //     ]);

        //     if ($request->hasFile('image')) {
        //         $path = $request->file('image')->store('images', 'public');
        //         $validated['image'] = $path;
        //     }

        //     $product->update($validated);
        //     return redirect()->route('products.index')->with('success', '商品を更新しました');
        // }

        // public function destroy(Product $product)
        // {
        //     $product->delete();
        //     return redirect()->route('products.index')->with('success', '商品を削除しました');
    }
}
