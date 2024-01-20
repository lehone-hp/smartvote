<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Testimonials";
        $data['testimonials'] = \App\Models\Testimonial::paginate(20);
        return view('lite.testimonials.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New testimonial";
        return view('lite.testimonials.create')->with($data);
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

        $uploadDirectory = public_path() . '/images/testimonials/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'link' => 'required',
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

        $testimonial = new \App\Models\Testimonial();
        $testimonial->name = $request->input('name');
        $testimonial->image = $image;
        $testimonial->thumb = $thumb;
        $testimonial->content = $request->input('content');
        $testimonial->save();
        return redirect()->to('admin/testimonials')->with('s', "Testimonial was saved ");
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

	    $data['title'] = "Show testimonial" . $langTitle;
	    $data['testimonial'] = \App\Models\Testimonial::find($id);
	    return view('lite.testimonials.show')->with($data);
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

        $data['title'] = "Edit testimonial" . $langTitle;
        $data['testimonial'] = \App\Models\Testimonial::find($id);
        return view('lite.testimonials.edit')->with($data);
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

        $uploadDirectory = public_path() . '/images/testimonials/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'link' => 'required',
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

        $testimonial = \App\Models\Testimonial::find($id);
        $testimonial->name = $request->input('name');

        if ($request->hasFile('image')) {
            $testimonial->image = $image;
            $testimonial->thumb = $thumb;
        }

        if ($request->input('lang') == "en") {
            $testimonial->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $testimonial->content_fr = $request->input('content');
        }
        $testimonial->save();
        return redirect()->back()->with('s', "Testimonial was updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::find($id)->delete();
	    return redirect()->to('admin/testimonials')->with('s', "Testimonial deleted");
    }
}
