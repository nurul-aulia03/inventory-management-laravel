
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 30px;
            color: #1f2937;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
        }
        h1 { margin-top: 0; }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }
        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 16px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .back { background: #6b7280; }
        .error { color: #b91c1c; }
    </style>
</head>
<body>
<div class="container">
    <h1>Tambah Produk</h1>
    <p>Masukkan informasi produk inventaris.</p>

    @if ($errors->any())
        <div class="error">
            <p>Periksa kembali data berikut:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label for="name">Nama Produk</label>
        <input id="name" name="name" value="{{ old('name') }}" required>

        <label for="sku">Kode Produk (SKU)</label>
        <input id="sku" name="sku" value="{{ old('sku') }}" required>

        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>

        <label for="purchase_price">Harga Beli (Rp)</label>
        <input id="purchase_price" type="number" name="purchase_price"
            min="0" value="{{ old('purchase_price', 0) }}" required>

        <label for="selling_price">Harga Jual (Rp)</label>
        <input id="selling_price" type="number" name="selling_price"
            min="0" value="{{ old('selling_price', 0) }}" required>

        <label for="stock">Stok Awal</label>
        <input id="stock" type="number" name="stock"
            min="0" value="{{ old('stock', 0) }}" required>

        <label for="minimum_stock">Batas Minimum Stok</label>
        <input id="minimum_stock" type="number" name="minimum_stock"
            min="0" value="{{ old('minimum_stock', 0) }}" required>

        <button type="submit">Simpan Produk</button>
        <a class="back" href="{{ route('products.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
