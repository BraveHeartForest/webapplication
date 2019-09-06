<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploader = \App\Uploader::orderBy('created_at', 'desc')->paginate(5);
        return view('uploader.index')->with('uploaders',$uploader);
    }
    
    public function confirm(\App\Http\Requests\UploaderRequest $req)
    {
    $username = $req->username;
    $thum_name = uniqid("THUM_") . "." . $req->file('thum')->guessExtension(); // TMPファイル名
    $req->file('thum')->move(public_path() . "/img/tmp", $thum_name);
    $thum = "/img/tmp/".$thum_name;
  
    $hash = array(
    'thum' => $thum,
    'username' => $username,
    );
  
    return view('uploader.confirm')->with($hash);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
