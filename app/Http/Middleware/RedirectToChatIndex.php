<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Chat;

class RedirectToChatIndex
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $chat = Chat::find($request->record);
        // dd($chat);
        // Check if the current route matches 'admin.chats.edit'
        // Check if the current route matches 'admin.chats.edit'
    if (Route::is('filament.admin.resources.chats.edit')) {

        // Redirect to the chat index route with the receiverId parameter
        return redirect()->route('chat.index', ['receiverId' => $chat->receiver_id]);
    }

        

        // Continue with the request if the condition is not met
        return $next($request);
    }
}
