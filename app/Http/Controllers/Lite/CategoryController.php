<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Categories for blog posts";
        $data['categories'] = \App\Models\Category::orderBy('id', 'desc')->paginate(20);
        return view('lite.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "Add Category";
        return view('lite.categories.create')->with($data);
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $page = new \App\Models\Category();
        $page->title = $request->input('name');
        $page->save();

        return redirect()->to('admin/categories');
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
	    // return $data['lang'];
	    $data['title'] = "Show category" . $langTitle;
	    $data['category'] = \App\Models\Category::find($id);
	    return view('lite.categories.show')->with($data);
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
        // return $data['lang'];
        $data['title'] = "Edit category" . $langTitle;
        $data['category'] = \App\Models\Category::find($id);
        return view('lite.categories.edit')->with($data);
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = \App\Models\Category::find($id);
        if ($request->input('lang') == "en") {
            $category->title = $request->input('name');
        }

        if ($request->input('lang') == "fr") {
            $category->title_fr = $request->input('name');
        }

        $category->save();

        return redirect()->to('admin/categories')->with('s', "Update was done !");
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
        $category = \App\Models\Category::find($id);
        $category->delete();
        return redirect()->to('admin/categories')->with('s', "Category deleted");
    }
}
