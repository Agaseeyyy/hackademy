<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog as BlogModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination; 

class ManageBlog extends Component
{
    use WithFileUploads;
    use WithPagination; 

    public $isEdit = false;
    public $showModal = false;
    public $title, $content, $postId, $message;
    public $image; 
    public $search = ''; 

    protected $paginationTheme = 'tailwind'; // Tailwind theme for pagination

    // Reset pagination when search is updated
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()  {
        $this->isEdit = false;
        $this->showModal = true;
        $this->reset(['title', 'content', 'postId', 'image']); // Reset fields when creating
        $this->resetValidation(); // Reset validation errors
    }

    public function edit($id) {
        $post = BlogModel::findOrFail($id);
        $this->isEdit = true;
        $this->showModal = true;
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = null; // Reset image preview when editing
        $this->resetValidation(); // Reset validation errors
    }

    public function submit() {
        // Validate with image requirement
        $data = $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // Make image optional on edit, required on create
            'image' => $this->isEdit ? 'nullable|image|max:2048' : 'required|image|max:2048'
        ]);

        // Handle image upload logic
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('blog-images', 'public');
        }

        if ($this->isEdit) {
            $updatePost = BlogModel::findOrFail($this->postId);

            // Prepare data for update (exclude image initially)
            $updateData = [
                'title' => $data['title'],
                'content' => $data['content'],
            ];

            // Handle image update
            if ($imagePath) {
                // Delete old image if it exists and a new one is uploaded
                if ($updatePost->image_url && Storage::disk('public')->exists($updatePost->image_url)) {
                    Storage::disk('public')->delete($updatePost->image_url);
                }
                $updateData['image_url'] = $imagePath; // Add new image path to update data
            }

            $updatePost->update($updateData);
            session()->flash('message', 'Post updated successfully!');

        } else {
            // Create post with image_url included
            BlogModel::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'image_url' => $imagePath // Store the path from the upload
            ]);
            session()->flash('message', 'Post added successfully!');
        }

        $this->showModal = false;
        $this->reset(['title', 'content', 'postId', 'image', 'isEdit']); // Reset all relevant fields
    }

    public function delete($id) {
        $deletePost = BlogModel::findOrFail($id);

        // Delete the image file when deleting post
        if ($deletePost->image_url && Storage::disk('public')->exists($deletePost->image_url)) {
            Storage::disk('public')->delete($deletePost->image_url);
        }

        $deletePost->delete();
        session()->flash('message', 'Post deleted successfully!');
    }

    public function render()
    {
        // Fetch all posts initially to calculate total views correctly
        $allPosts = BlogModel::all();
        $totalViews = $allPosts->sum('views');

        // Fetch paginated posts with search filter
        $posts = BlogModel::where(function($query) {
                            $query->where('title', 'like', '%'.$this->search.'%')
                                  ->orWhere('content', 'like', '%'.$this->search.'%');
                        })
                        ->latest() // Order by latest
                        ->paginate(10); // Paginate results

        return view('livewire.admin.manage-blog', [
            'posts' => $posts,
            'totalPosts' => $allPosts->count(), // Pass total count separately if needed for stats
            'totalViews' => $totalViews
        ]);
    }
}
