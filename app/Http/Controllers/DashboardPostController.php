<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboard_posts', [
            'title' => 'Dashboard Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->get()
        ]);
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
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required|unique:posts',
            'user_id' => 'required',
            'img' => 'required|image'
        ]);

        $validateData['img'] = $request->file('img')->store('post_img', ['disk' => 'public']);
        // isi parameter yg ada di function store() adalah nama folder yang ingin disimpan sebuah filenya

        $validateData['slug'] = $request->slug . '_' . $validateData['title'];

        Post::create($validateData);
        return back()->with('success', 'Post Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.dashboard_post', [
            'title' => 'Admin Single Post',
            'post' => $post
        ]);
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
    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'img' => 'image'
        ]);

        $single_post = Post::firstWhere('slug', $post->slug);
        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('post_img', ['disk' => 'public']);
            Storage::disk('public')->delete($single_post->img);
        }

        Post::where('slug', $post->slug)->update($validateData);
        return back()->with('success', 'Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $single_post = Post::firstWhere('slug', $post->slug);
        Storage::disk('public')->delete($single_post->img);

        Post::where('slug', $post->slug)->delete();

        return redirect('/dashboard/posts')->with('success', 'Post Has Been Deleted');
    }
}
