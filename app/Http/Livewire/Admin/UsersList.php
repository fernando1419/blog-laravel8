<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
   use WithPagination;

   protected $paginationTheme = 'bootstrap';

   public $search;

   public function updatingSearch() // is called each time it looks for something. Reset Pagination for searching.
   {
      $this->resetPage();
   }

   public function render()
   {
      $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(5);

      return view('livewire.admin.users-list', compact('users'));
   }
}
