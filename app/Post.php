<?php
namespace App;
class Post
{
    public function getPosts($session)
    {
        if (!$session->has('posts')) {
            getDummyPosts($session)
        }
        return $session->get('posts');
    }

    private function getDummyPosts($session){
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