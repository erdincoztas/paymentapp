<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Detayları</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Sipariş Detayları</h2>
    <div class="mb-4">
        <p class="text-gray-700"><strong>Satıcı :</strong> {{ $product->user->name }}</p>
        <p class="text-gray-700"><strong>Ürün Adı:</strong> {{ $product->product_name }}</p>
        <p class="text-gray-700"><strong>Fiyat:</strong> {{ $product->product_price }} TL</p>
    </div>
    <form action="" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="mb-4">
            <label for="customer_name" class="block text-gray-700">Müşteri İsim Soyisim:</label>
            <input type="text" id="customer_name" name="customer_name" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="customer_address" class="block text-gray-700">Adres:</label>
            <textarea id="customer_address" name="customer_address" class="w-full px-3 py-2 border rounded-lg" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Siparişi Tamamla</button>
        </div>
    </form>
</div>
</body>
</html>
