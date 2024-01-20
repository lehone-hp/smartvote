<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Blog posts";
        $data['posts'] = \App\Models\Post::orderBy('id', 'desc')->paginate(20);
        return view('lite.posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New post";
        $data['categories'] = \App\Models\Category::all();
        return view('lite.posts.create')->with($data);
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
        $uploadDirectory = public_path() . '/images/posts/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'category' => 'required',
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

        $post = new \App\Models\Post();
        $post->title = $request->input('name');
        $post->image = $image;
        $post->thumb = $thumb;
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->user_id = 1;
        $post->save();

        return redirect()->to('admin/posts')->with('s', "Post was saved !");

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

	    $data['title'] = "Show post" . $langTitle;
	    $data['categories'] = \App\Models\Category::all();
	    $data['post'] = \App\Models\Post::find($id);
	    return view('lite.posts.show')->with($data);
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

        $data['title'] = "Edit post" . $langTitle;
        $data['categories'] = \App\Models\Category::all();
        $data['post'] = \App\Models\Post::find($id);
        return view('lite.posts.edit')->with($data);
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
        $uploadDirectory = public_path() . '/images/posts/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'content' => 'required',
            'category' => 'required',
        ]);
	    if ($request->hasFile('image')) {
		    $image = "image_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();

		    $thumb = "thumb_" . date('D_H_m_s') . "_" . uniqid(8) . "." . $request->file('image')->getClientOriginalExtension();


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


        $post = \App\Models\Post::find($id);
        if ($request->hasFile('image')) {
            $post->image = $image;
            $post->thumb = $thumb;
        }

        if ($request->input('lang') == "en") {
            $post->title = $request->input('name');
            $post->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $post->title_fr = $request->input('name');
            $post->content_fr = $request->input('content');
        }

        $post->category_id = $request->input('category');
        $post->user_id = 1;
        $post->save();

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
    	Post::find($id)->delete();
    	return back();
    }
}
