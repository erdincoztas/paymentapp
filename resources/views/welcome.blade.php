<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basit Navbar ve Ürün Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .content {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="{{route('login')}}">Giriş yap</a>
    <a href="{{route('register')}}">kayıt Ol</a>
</div>

<div id="urun-ekle" class="content">
    <h2>Ürün Ekle</h2>
    <!-- Ürün ekleme formu buraya gelecek -->
</div>

<div id="urunler" class="content">
    <h2>Ürünler</h2>
    <table>
        <thead>
        <tr>
            <th>SATICI</th>
            <th>Ürün Adı</th>
            <th>Kategori</th>
            <th>Fiyat</th>
            <th>Stok</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->user->name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>

                <td><a href="{{route('siparisdetay', $product->id)}}">SATIN AL</a></td>
            </tr>
        @endforeach
        <!-- Daha fazla ürün buraya eklenebilir -->
        </tbody>
    </table>
</div>
</body>
</html>
