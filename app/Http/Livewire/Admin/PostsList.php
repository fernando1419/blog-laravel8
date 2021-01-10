<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
   use WithPagination;

   protected $paginationTheme = 'bootstrap';

   public $search; // reactive property (wire:model)

   public function updatingSearch() // is called each time it looks for something.
   {
      $this->resetPage();
   }

   public function render()
   {
      $posts = Post::where('user_id', auth()->user()->id)
                  ->where('name', 'LIKE', '%' . $this->search . '%')
                  ->latest('id')
                  ->paginate();

      return view('livewire.admin.posts-list', compact('posts'));
   }
}
