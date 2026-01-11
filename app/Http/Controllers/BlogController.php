<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');

        $postsQuery = Blog::query();

        if ($search) {
            $postsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $postsQuery->latest()->paginate(12); // Paginate results

        return view('visitors.blogs.index', [
            'posts' => $posts,
            'searchTerm' => $search // Pass search term to the view
        ]);
    }

    public function show($id) {
        $post = Blog::findOrFail($id);

        // Increment views count
        $post->increment('views');
        
        // Get related posts - without category filter
        $relatedPosts = Blog::where('id', '!=', $post->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        
        return view('visitors.blogs.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts
        ]);
    }
}
