@extends('dashboard')
@section('admin')


    <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Listesi ve Rol Atama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .role-select {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
        }
        .assign-button {
            padding: 7px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .assign-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Kullanıcı Listesi ve Rol Atama</h2>

<table>
    <thead>
    <tr>
        <th>Kullanıcı Adı</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Rol atama</th>
        <th>İşlem</th>
    </tr>
    </thead>
    <tbody id="user-list">
    @foreach($users as $user)
        <tr><form action="{{route('changeroles', ['user_id' => $user->id])}}" method="get">
            <th>{{$user->name}}</th>
            <th>{{$user->email}}</th>
            <th>{{ $user->getRoleNames()->first() }}</th>

            <th><select name="roles" class="role-select">
                    @foreach($roles as $role)
                   <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select></th>
            <th><button type="submit" class="assign-button" >Atama Yap</button></th></form>
        </tr>

    @endforeach
    </tbody>
</table>


</body>
</html>







@endsection
