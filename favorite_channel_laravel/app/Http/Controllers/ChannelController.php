<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    /**
     * チャンネル一覧の表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->input()で検索時に入力した項目を取得します。
        $genre = $request->input('genre');
        $streaming_method = $request->input('streaming_method');
        $gender = $request->input('gender');
        $voice = $request->input('voice');
        $distributor = $request->input('distributor');
        $comment = $request->input('comment');
 
        $query = Channel::query();

        if ($genre != null) {
            $query->where('genre', $genre)->get();
        }

        if ($streaming_method != null) {
            $query->where('streaming', $streaming_method)->get();
        }

        if ($gender != null) {
            $query->where('gender', $gender)->get();
        }

        if ($voice != null) {
            $query->where('voice', $voice)->get();
        }

        if ($distributor != null) {
            $query->where('distributor', $distributor)->get();
        }

        if ($comment != null) {
            $query->where('comment', $comment)->get();
        }

        $channels = $query->orderBy('created_at', 'desc')->paginate(15);
        $auth = Auth::user();
        $auth_id = Auth::id();

        $channel_count = Channel::where('user_id', '=', $auth_id)->get()->count();
        
        return view('channels.channel', compact('channels','auth','channel_count'));   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels/edit_confirm');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|string',
                'url' => 'required|string',
                'comment' => 'required|string|max:100',
            ],
             [
                'name.required' => 'チャンネル名は必須項目です。',
                'url.required'  => 'チャンネルURLは必須項目です。',
                'comment.required'  => 'コメント欄は必須項目(100文字以内)です。',
             ]);

            $channel = new Channel;
            $channel->user_id = $request->user_id;
            $channel->name = $request->name;
            $channel->url = $request->url;
            $channel->genre = $request->genre;
            $channel->streaming_method = $request->streaming_method;
            $channel->gender = $request->gender;
            $channel->voice = $request->voice;
            $channel->distributor = $request->distributor;
            $channel->comment = $request->comment;
            $channel->save();

            return redirect()->route('channel.create');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::find($id);
        $user_id = Auth::id();

        if ($user_id !== $channel->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        return view("channels.channel_edit", [
            'channel' => $channel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $channel = Channel::find($id);

        $rules = [
            'name' => ['required', 'string'],
            'url' => ['required', 'string'],
            'comment' => ['required', 'string', 'max:100'],
        ];
        $this->validate($request, $rules);

        // リクエストデータ受取
        $form = $request->all();

        // フォームトークン削除
        unset($form['_token']);

        $channel->fill($form)->save();

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
        $channel = Channel::find($id);
        $auth_id = Auth::id();

        if ($auth_id !== $channel->user_id) {
            return redirect()->route('login')->with('error', '許可されていない操作です');
        };

        $channel->delete();

        return redirect()->route('user.index')->with('message', '削除しました。');
    }
}
