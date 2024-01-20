<?php

namespace App\Http\Controllers\Lite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Team members";
        $data['members'] = \App\Models\Team::paginate(20);
        return view('lite.team.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = "New team member";
        return view('lite.team.create')->with($data);
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

        $uploadDirectory = public_path() . '/images/members/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'position' => 'required',
            'facebook' => 'nullable|active_url',
            'twitter' => 'nullable|active_url',
            'linkedin' => 'nullable|active_url',
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

        $member = new \App\Models\Team();
        $member->name = $request->input('name');
        $member->image = $image;
        $member->thumb = $thumb;
        $member->position = $request->input('position');
        $member->facebook = $request->input('facebook');
        $member->twitter = $request->input('twitter');
        $member->linkedin = $request->input('linkedin');
        $member->save();
        return redirect()->to('admin/teams')->with('s', "Client was saved ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $data['title'] = "Show team member";
	    $data['member'] = \App\Models\Team::find($id);
	    return view('lite.team.show')->with($data);
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

        $data['title'] = "Edit team member";
        $data['member'] = \App\Models\Team::find($id);
        return view('lite.team.edit')->with($data);
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

        $uploadDirectory = public_path() . '/images/members/';

        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jpg|max:1024',
            'position' => 'required',
            'facebook' => 'nullable|active_url',
            'twitter' => 'nullable|active_url',
            'linkedin' => 'nullable|active_url',
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

        $member = \App\Models\Team::find($id);
        $member->name = $request->input('name');

        if ($request->hasFile('image')) {
            $member->image = $image;
            $member->thumb = $thumb;
        }

        $member->position = $request->input('position');
        $member->facebook = $request->input('facebook');
        $member->twitter = $request->input('twitter');
        $member->linkedin = $request->input('linkedin');
        $member->save();
        return redirect()->back()->with('s', "Team member was updated ");
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
        \App\Models\Team::find($id)->delete();
        return redirect()->to('admin/teams')->with('s', "Team was successfully deleted");
    }
}
