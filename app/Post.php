<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','content'];
    public function getPosts($session)
    {

        if (!$session->has('posts')) {
            $this->createDummyPosts($session);
        }
        return $session->get('posts');
    }
    //Retrieve a Single post 
    public function getPost($session,$id)
    {
        if (!$session->has('posts')) {
            $this->createDummyPosts($session);
        }
        return $session->get('posts')[$id];
    }

    // Save a new post
    public function addPost($session,$title,$content)
    {
        if (!$session->has('posts')) {
            $this->createDummyPosts($session);
        }
        $posts= $session->get('posts');
        array_push($posts,['title'=>$title,'content'=>$content]);
        return $session->put('posts',$posts);
    }
    // Edit existing post
    public function editPost($session,$id,$title,$content)
    {
        if (!$session->has('posts')) {
            $this->createDummyPosts($session);
        }
        $posts= $session->get('posts');
        $posts[$id]=['title'=>$title,'content'=>$content];
        return $session->put('posts',$posts);
    }

    private function createDummyPosts($session){
        $posts=
        [
        
           [ 'title'=>'Learning Laravel',
            'content' => 'This blog post will get you right on track with Laravel!!!' 
           ],
           [
                'title'=>'Something Else',
                'content' => 'Some other content' 
           ]
        ];
        $session->put('posts',$posts);
    }
}