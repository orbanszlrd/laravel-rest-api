<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Webcam;

class WebcamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Webcam::all();
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
            'name' => 'required',
            'slug' => 'required',
            'url' => 'required'
        ]);

        return Webcam::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Webcam::find($id);
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
        $webcam = Webcam::find($id);

        if ($webcam) {
            $webcam->update($request->all());
        }

        return $webcam;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webcam = Webcam::find($id);

        if ($webcam) {
            $webcam->delete();
        }

        return $webcam;
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $webcam = Webcam::where('name', 'like', '%' . $name . '%')->get();

        return $webcam;
    }
}
