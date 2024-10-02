<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications()->get();

        // Limpiar notificaciones
        auth()->user()->unreadNotifications()->get()->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones
        ]);
    }
}
