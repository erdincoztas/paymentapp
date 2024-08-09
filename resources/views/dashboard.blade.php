<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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

                    @yield('admin')

                    </body>
                    </html>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
