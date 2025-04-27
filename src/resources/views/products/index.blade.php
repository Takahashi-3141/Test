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

        <section class="products">
            <button class="add-product">+ 商品を追加</button>

            <div class="grid">
                @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('images/' . $product['img']) }}" alt="{{ $product['name'] }}">
                    <p>{{ $product['name'] }}</p>
                    <span>¥{{ $product['price'] }}</span>
                </div>
                @endforeach
            </div>
            @foreach ($products as $product)
            <div class="card">
                <img src="{{ \Storage::url($product->images)  }}" alt="{{ $product->name }}">
                <p>{{ $product->name }}</p>
                <p>¥{{ number_format($product->price) }}</p>
                <a href="{{ route('products.edit', $product) }}">編集</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </div>
            @endforeach

            <div class="pagination">
                {{ $products->links() }}
                <button>&lt;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>&gt;</button>
            </div>

        </section>
    </main>
</body>

</html>