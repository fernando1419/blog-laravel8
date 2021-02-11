<div class="card">

   <div class="card-header">
      <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Enter user name...">
   </div>

   @if ($users->count())
      <div class="card-body">
         <table class="table table-striped table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th colspan="2"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
                  <tr>
                     <td> {{ $user->id }} </td>
                     <td> {{ $user->name }} </td>
                     <td> {{ $user->email }} </td>
                     <td width="10px">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                     </td>
                     <td width="10px">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <div class="card-footer">
         {{ $users->links() }} {{-- these links don't work!!!!! --}}
      </div>

   @else
      <div class="card-body text-center">
         <h5> No users matched the search criteria. </h5>
      </div>
   @endif

</div>
