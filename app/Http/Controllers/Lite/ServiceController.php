<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Services";
        $data['services'] = \App\Models\Service::paginate(20);
        return view('lite.services.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New service";
        $data['services'] = \App\Models\Service::all();
        $data['types'] = \App\Models\Type::all();
        return view('lite.services.create')->with($data);
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
        $uploadDirectory = public_path() . '/images/services/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'type' => 'required',
        ]);

        $image = "image_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

        $thumb = "thumb_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

        //return $thumb;

        Image::make($request
                ->file('image')
                ->move($uploadDirectory, $image))
            ->fit(800, 500)
            ->save();

        \File::copy($uploadDirectory . $image, $uploadDirectory . $thumb);

        Image::make($uploadDirectory . $thumb)
            ->fit(200, 100)
            ->save();

        $service = new \App\Models\Service();
        $service->title = $request->input('name');
        $service->image = $image;
        $service->thumb = $thumb;
        $service->content = $request->input('content');
        $service->type_id = $request->input('type');
        $service->save();

        return redirect()->to('admin/services')->with('s', "Service was saved !");

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

	    $data['title'] = "Show service" . $langTitle;
	    $data['types'] = \App\Models\Type::all();
	    $data['service'] = \App\Models\Service::find($id);
	    return view('lite.services.show')->with($data);
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

        $data['title'] = "Edit service" . $langTitle;
        $data['types'] = \App\Models\Type::all();
        $data['service'] = \App\Models\Service::find($id);
        return view('lite.services.edit')->with($data);
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
        $uploadDirectory = public_path() . '/images/services/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'type' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $image = "image_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

            $thumb = "thumb_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();
        }

        if ($request->hasFile('image')) {
            Image::make($request
                    ->file('image')
                    ->move($uploadDirectory, $image))
                ->fit(800, 500)
                ->save();

            \File::copy($uploadDirectory . $image, $uploadDirectory . $thumb);

            Image::make($uploadDirectory . $thumb)
                ->fit(200, 100)
                ->save();
        }

        $service = \App\Models\Service::find($id);
        if ($request->hasFile('image')) {
            $service->image = $image;
            $service->thumb = $thumb;
        }

        if ($request->input('lang') == "en") {
            $service->title = $request->input('name');
            $service->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $service->title_fr = $request->input('name');
            $service->content_fr = $request->input('content');
        }

        $service->type_id = $request->input('type');
        $service->save();

        return redirect()->back();
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
        \App\Models\Service::find($id)->delete();
        return redirect()->to('admin/services')->with('s', "Service was deleted");
    }
}
