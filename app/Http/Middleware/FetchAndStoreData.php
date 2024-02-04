<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Message;
use Illuminate\Support\Facades\Session;

class FetchAndStoreData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->fetchDataAndStoreInSession();
        return $next($request);
    }
    protected function fetchDataAndStoreInSession()
    {
        $unreadMessagesCount= Message::where('read',0)->get()->count();
          Session::put('unreadMessagesCount', $unreadMessagesCount);
         session(['storedData' => $unreadMessagesCount]);
         $getmessages = Message::latest()->take(4)->get();
         Session::put('getmessages', $getmessages);
         session(['getmessages' => $getmessages]);
    }

}
