@extends('dashboard')
@section('admin')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">Notifications</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Başlık</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">İçerik</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Okundu</th>
            <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">İşlemler</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($notifications as $notification)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$notification->title}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$notification->content}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">@if($notification->seen==0) Hayır @else Evet @endif</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button onclick="detayGetir({{$notification->id}})"  data-modal-target="default-modal" data-modal-toggle="default-modal"  class="text-indigo-600 hover:text-indigo-900">Oku</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>




    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 id="notification_title" class="text-xl font-semibold text-gray-900 dark:text-white">

                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p id="notification_content" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">

                    </p>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function detayGetir(id){
            $.ajax({
                url: '/user/notification/detail/' + id,  // JSON verisini döndüren endpoint
                method: 'GET',
                dataType: 'json',
                success: function(response) {

                    $('#notification_title').html(response.title);
                    $('#notification_content').html(response.content);
                },
                error: function() {
                        alert("hata");
                }
            });
        }
    </script>



    <script>
        $(document).ready(function() {
            // Modalı açma
            $('#openModal').on('click', function() {
                // AJAX isteği gönder
                $.ajax({
                    url: '/user/notification/detail/6',  // JSON verisini döndüren endpoint
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // JSON verisini işleyin ve modal içerisine ekleyin
                        var content = `
                    <strong>Başlık:</strong> ${response.title}<br>
                    <strong>İçerik:</strong> ${response.content}<br>
                `;
                        $('#modalContent').html(content);

                        // Modalı göster
                        $('#dataModal').removeClass('hidden');
                    },
                    error: function() {
                        $('#modalContent').html('Veri alınırken bir hata oluştu.');
                        $('#dataModal').removeClass('hidden');
                    }
                });
            });

            // Modalı kapatma
            $('#closeModal, #closeButton').on('click', function() {
                $('#dataModal').addClass('hidden');
            });
        });
    </script>

</div>

</body>
</html>







@endsection
