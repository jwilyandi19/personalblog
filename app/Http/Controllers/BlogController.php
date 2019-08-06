<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Carbon\Carbon;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();

        foreach($blogs as $blog){
            $temp = Carbon::parse($blog->created_at);
            $blog->created = $temp->diffForHumans();
        }

        $json = response()->json([
            'blogs' => $blogs,
        ]);
        return $json;

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
    public function store(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->id_user = session('user')['id_user'];
        $blog->save();
        $blogs = Blog::with('user')->get();

        foreach($blogs as $blogz){
            $temp = Carbon::parse($blogz->created_at);
            $blogz->created = $temp->diffForHumans();
        }

        $json = response()->json([
            'blogs' => $blogs,
        ]);

        return $json;
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
