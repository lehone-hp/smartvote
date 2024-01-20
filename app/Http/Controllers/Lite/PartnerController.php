<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Partners";
        $data['partners'] = \App\Models\Partner::paginate(20);
        return view('lite.partners.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New partner";
        return view('lite.partners.create')->with($data);
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

        $uploadDirectory = public_path() . '/images/partners/';

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

        $partner = new \App\Models\Partner();
        $partner->name = $request->input('name');
        $partner->image = $image;
        $partner->thumb = $thumb;
        $partner->content = $request->input('content');
        $partner->save();
        return redirect()->to('admin/partners')->with('s', "partner was saved ");
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

	    $data['title'] = "Show partner" . $langTitle;
	    $data['partner'] = \App\Models\Partner::find($id);
	    return view('lite.partners.show')->with($data);
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

        $data['title'] = "Edit partner" . $langTitle;
        $data['partner'] = \App\Models\Partner::find($id);
        return view('lite.partners.edit')->with($data);
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

        $uploadDirectory = public_path() . '/images/partners/';

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

        $partner = \App\Models\Partner::find($id);
        $partner->name = $request->input('name');

        if ($request->hasFile('image')) {
            $partner->image = $image;
            $partner->thumb = $thumb;
        }

        if ($request->input('lang') == "en") {
            $partner->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $partner->content_fr = $request->input('content');
        }
        $partner->save();
        return redirect()->back()->with('s', "Partner was updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partner::find($id)->delete();
	    return redirect()->to('admin/partners')->with('s', "Partner deleted");

    }
}
