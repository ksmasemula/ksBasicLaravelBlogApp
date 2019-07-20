<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
class PostController extends Controller
{
    //Display all blog posts in model
    public function getIndex(Store $session){
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index',['posts'=>$posts]);
    }
    //Display all Posts in Admin view
    public function getAdminIndex(Store $session){
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('admin.index',['posts'=>$posts]);
    }
    //Display a single Posts from Post model
    public function getPost(Store $session,$id){
        $post = new Post();
        $posts = $post->getPost($session,$id);
        return view('post.index',['posts'=>$posts]);
    }
    //Display  in Admin create view
    public function getAdminCreate(){
        
        return view('admin.create');
    }
    //Display  in Admin Edit view and populate fields with retrieved data from post model
    public function getAdminEdit(Store $session,$id){
        $post = new Post();
        $post = $post->getPost($session,$id);
        return view('admin.edit',['post'=>$post,'postId'=>$id]);
    }
    //Display all Posts in Admin view
    public function postAdminCreate(Store $session,Request $request){
        $this->validate($request->all(),[
            'title'=>  'required|min:5',
            'content'=>  'required|min:5'
        ]);
        $post = new Post();
        $post->addPost($session, $request->input('title'), $request->input('content'));
        return redirect()->
        route('admin.index')->
        with('info', 'Post created ,new Title : '.$request->input('title'));
    }
    //Display all Posts in Admin view
    public function postAdminUpdate(Store $session,Request $request){
        $this->validate($request->all(),[
            'title'=>  'required|min:5',
            'content'=>  'required|min:5'
        ]);
        $post = new Post();
        $post->EditPost($session,$request->input('id'), $request->input('title'), $request->input('content'));
        return redirect()->
        route('admin.index')->
        with('info', 'Post created ,new Title : '.$request->input('title'));
    }
}
