<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品一覧 - mogitate</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <h1 class="logo">mogitate</h1>
    </header>

    <main>
        @section('sidebar')
        <aside class="sidebar">
            <h2>商品一覧</h2>

            <form method="GET" action="{{ route('products.index') }}">
                <input type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
                <button class="search-btn">検索</button>

                <h3>価格順で表示</h3>
                <select name="sort" onchange="this.form.submit()">
                    <option value="">価格で並べ替え</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>安い順</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>高い順</option>
                </select>
            </form>
        </aside>
        @show

        @extends('layouts.app')

        @section('content')

        <section class="products">
            <div class="add-product-button">
                <a href="{{ route('products.create') }}" class="btn-add-product">＋ 商品を追加</a>
            </div>

            <div class="products-container">
                @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ route('products.detail', $product->id) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                    </a>
                    <div class="product-details">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">¥{{ number_format($product->price) }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            <div class="pagination">
                {{ $products->links() }}
            </div>
        </section>
    </main>
</body>

</html>