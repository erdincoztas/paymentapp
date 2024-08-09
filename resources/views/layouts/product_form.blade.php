@extends('dashboard')
@section('admin')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    <div id="urun-ekle" class="content">
        <h2>Ürün Ekle</h2>
        <div id="urun-ekle" class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4">Ürün Ekle</h2>
            <form class="bg-white p-6 rounded shadow-md" method="post"  action="{{route('Product.create')}}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="urun-adi">Ürün Adı</label>
                    <input type="text" id="product_name" name="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ürün Adı">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fiyat">Fiyat</label>
                    <input type="text" id="product_price" name="product_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fiyat">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Ekle
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
