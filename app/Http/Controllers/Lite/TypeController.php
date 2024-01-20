<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Types for services";
        $data['types'] = \App\Models\Type::paginate(20);
        return view('lite.types.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "Add service type";
        return view('lite.types.create')->with($data);
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

        $page = new \App\Models\Type();
        $page->title = $request->input('name');
        $page->save();

        return redirect()->to('admin/types');
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
	    $data['title'] = "Show service type " . $langTitle;
	    $data['type'] = \App\Models\Type::find($id);
	    return view('lite.types.show')->with($data);
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
        $data['title'] = "Edit service type " . $langTitle;
        $data['type'] = \App\Models\Type::find($id);
        return view('lite.types.edit')->with($data);
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

        $type = \App\Models\Type::find($id);
        if ($request->input('lang') == "en") {
            $type->title = $request->input('name');
        }

        if ($request->input('lang') == "fr") {
            $type->title_fr = $request->input('name');
        }

        $type->save();

        return redirect()->to('admin/types')->with('s', "Update was done !");
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
        $type = \App\Models\Type::find($id);
        $type->delete();
        return redirect()->to('admin/types')->with('s', "Type deleted");
    }
}
