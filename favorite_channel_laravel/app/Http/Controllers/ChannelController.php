<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    /**
        * ホームビュー遷移
        *
        * @param Request $request
        * @return Response
        */
        public function home(Request $request)
        {
            return view('channels.home');
        }
}
