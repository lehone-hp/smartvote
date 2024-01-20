<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Pages";
        $data['pages'] = \App\Models\Page::paginate(20);
        return view('lite.pages.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "Add Page";
        return view('lite.pages.create')->with($data);
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
            'content' => 'required',
        ]);

        $page = new \App\Models\Page();
        $page->title = $request->input('name');
        $page->content = $request->input('content');
        $page->save();

        return redirect()->to('admin/pages');
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
	    $data['title'] = "Show   page " . $langTitle;
	    $data['page'] = \App\Models\Page::find($id);
	    return view('lite.pages.show')->with($data);
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
        $data['title'] = "Edit page " . $langTitle;
        $data['page'] = \App\Models\Page::find($id);
        return view('lite.pages.edit')->with($data);
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
            'content' => 'required',
        ]);

        $page = \App\Models\Page::find($id);
        if ($request->input('lang') == "en") {
            $page->title = $request->input('name');
            $page->content = $request->input('content');
        }

        if ($request->input('lang') == "fr") {
            $page->title_fr = $request->input('name');
            $page->content_fr = $request->input('content');
        }

        $page->save();

        return redirect()->to('admin/pages')->with('s', "Update was done !");
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
        $page = \App\Models\Page::find($id);
        $page->delete();
        return redirect()->to('admin/pages')->with('s', "Page deleted");
    }
}
