<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $auth_id = Auth::user()->id;
        $channels = Channel::where('user_id', '=', $auth_id)->get();

        return view('channels.mypage',[ 'auth' => $auth ],[ 'channels' => $channels ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $auth = Auth::user();

        return view('channels.register_edit',[ 'auth' => $auth ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $auth = Auth::user();

        // リクエストデータ受取
        $form = $request->all();

        if($request->hasFile('avatar')){
            $avatar=request()->file('avatar')->getClientOriginalName();
            request()->file('avatar')->storeAs('public/images', $avatar);
            $form['avatar'] = $avatar;
        } else {
            unset($form['avatar']);
        }

        // フォームトークン削除
        unset($form['_token']);

        // レコードアップデート
        $auth->fill($form)->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
