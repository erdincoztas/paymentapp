<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationCreate;
use App\Models\notifications;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class NotificationController extends Controller
{
    public function notifications(){
        $users =User::all();
        $notifications= notifications::with('user')->get();
        return view('layouts.notifications',compact('users','notifications'));

    }

    public function notificationsCreate(NotificationCreate $request)
    {
        /*$request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ], [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'content.required' => 'İçerik alanı zorunludur.',
            'content.min' => 'İçerik en az 10 karakter olmalıdır.',
            'success'=> 'Bildirim başarıyla olusturuldu',
        ]);*/

        $user= $request->input('user');
        $title= $request->input('title');
        $content= $request->input('content');

        $insert = notifications::create([
            'title' => $title,
            'content'=> $content,
            'user_id' => $user
        ]);

        return redirect('notifications')->with('success','Notification created successfully');

    }

    public function notificationsDelete(Request $request, $id)
    {
        $notificationId = $request->input('notification_id');

        $notification = notifications::find($notificationId);

        if ($notification) {
            $notification->delete();
            return redirect()->back()->with('success', 'Bildirim başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Bildirim bulunamadı.');
        }

    }


public function UserNotification()
{$user = Auth::user();
    $notifications = notifications::where('user_id', $user->id)->get();

    return view('layouts.userNotifications',compact('notifications'));


}

public function notificationDetail($id)
{
$notification = notifications::where('id',$id)->first();

return response()->json($notification);

}


}
