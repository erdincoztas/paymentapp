@extends('dashboard')
@section('admin')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bildirim Oluşturma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        select, input, textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .notification-list {
            margin-top: 30px;
        }

        .notification {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .notification h4 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .notification p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bildirim Oluşturma Sayfası</h2>
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <form id="notificationForm" action="{{Route('notificationsCreate')}}">
        <label for="user">Kullanıcı Seç:</label>
        <select id="user" name="user" required>
            <option value="">-- Kullanıcı Seç --</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>

        <label for="title">Başlık:</label>
        <input type="text" id="title" name="title" placeholder="Bildirim başlığı girin" required>

        <label for="content">İçerik:</label>
        <textarea id="content" name="content" placeholder="Bildirim içeriği girin" required></textarea>

        <button  type="submit">Bildirim Oluştur</button>
    </form>

    <div class="notification-list" id="notificationList">
        <h3>Oluşturulan Bildirimler</h3>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bildirim Listesi</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 20px;
                }

                .container {
                    max-width: 1000px;
                    margin: 0 auto;
                    background: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h2 {
                    text-align: center;
                    color: #333;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                table, th, td {
                    border: 1px solid #ddd;
                }

                th, td {
                    padding: 12px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                .btn-delete {
                    background-color: #dc3545;
                    color: white;
                    padding: 8px 12px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .btn-delete:hover {
                    background-color: #c82333;
                }
            </style>
        </head>
        <body>

        <div class="container">
            <h2>Bildirim Listesi</h2>

            <table>
                <thead>
                <tr>
                    <th>Başlık</th>
                    <th>İçerik</th>
                    <th>Okundu</th>
                    <th>Kime</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                <tr>
                    <td>{{$notification->title}}</td>
                    <td>{{$notification->content}}</td>
                    <td>@if($notification->seen ==0)Hayır @else Evet @endif</td>
                    <td>{{ $notification->user->name }}</td>
                    <td>  <form action="{{ route('notifications.delete', $notification->id) }}" >
                            @csrf
                            <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                            <button type="submit" class="btn-delete">Sil</button>
                        </form></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        </body>
        </html>

    </div>
</div>



</body>
</html>
@endsection
