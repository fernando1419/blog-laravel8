<div class="card">

   {{-- {{ $search }} --}}
   <div class="card-header">
      <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Enter post name...">
   </div>

   @if ($posts->count())
      <div class="card-body">
         <table class="table table-striped table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th colspan="2"></th>
               </tr>
            </thead>
            <tbody>
               @foreach ($posts as $post)
                  <tr>
                     <td> {{ $post->id }} </td>
                     <td> {{ $post->name }} </td>
                     <td width="10px">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                     </td>
                     <td width="10px">
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
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

      <div>
         {{-- {{ $posts->links() }} --}}
         {{ $posts->links() }}
      </div>
   @else
      <div class="card-body text-center">
         <h5> No posts matched the search criteria. </h5>
      </div>
   @endif

</div>
