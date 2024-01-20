<?php

namespace App\Http\Controllers\Lite;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Clients";
        $data['clients'] = \App\Models\Client::orderBy('id', 'desc')->paginate(20);
        return view('lite.clients.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New client";
        return view('lite.clients.create')->with($data);
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

        $uploadDirectory = public_path() . '/images/clients/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
        ]);

        $image = "image_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

        $thumb = "thumb_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

        //return $thumb;

        Image::make($request
                ->file('image')
                ->move($uploadDirectory, $image))
            ->fit(500, 500)
            ->save();

        \File::copy($uploadDirectory . $image, $uploadDirectory . $thumb);

        Image::make($uploadDirectory . $thumb)
            ->fit(100, 100)
            ->save();

        $client = new \App\Models\Client();
        $client->name = $request->input('name');
        $client->image = $image;
        $client->thumb = $thumb;
        $client->content = $request->input('content');
        $client->save();
        return redirect()->to('admin/clients')->with('s', "Client was saved ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
	    $langTitle = !$request->input('lang') ? " >> in English" : ">> en Français";

	    $data['lang'] = !$request->input('lang') ? "en" : $request->input('lang');
	    \App::setLocale($data['lang']);

	    $data['title'] = "Show client" . $langTitle;
	    $data['client'] = \App\Models\Client::find($id);
	    return view('lite.clients.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $langTitle = !$request->input('lang') ? " >> in English" : ">> en Français";

        $data['lang'] = !$request->input('lang') ? "en" : $request->input('lang');
        \App::setLocale($data['lang']);

        $data['title'] = "Edit client" . $langTitle;
        $data['client'] = \App\Models\Client::find($id);
        return view('lite.clients.edit')->with($data);
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
        //

        $uploadDirectory = public_path() . '/images/clients/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = "image_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

            $thumb = "thumb_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

            //return $thumb;

            Image::make($request
                    ->file('image')
                    ->move($uploadDirectory, $image))
                ->fit(500, 500)
                ->save();

            \File::copy($uploadDirectory . $image, $uploadDirectory . $thumb);

            Image::make($uploadDirectory . $thumb)
                ->fit(100, 100)
                ->save();
        }

        $client = \App\Models\Client::find($id);
        $client->name = $request->input('name');

        if ($request->hasFile('image')) {
            $client->image = $image;
            $client->thumb = $thumb;
        }

        if ($request->input('lang') == "en") {
            $client->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $client->content_fr = $request->input('content');
        }
        $client->save();
        return redirect()->back()->with('s', "Client was updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Client::find($id)->delete();
	    return redirect()->to('admin/clients')->with('s', "Client deleted");
    }
}
