@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
      <a href="" class="btn btn-primary mb-2">Add User</a>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
              {{-- Ubah pake forelse --}}
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                <a href="{{route('user.show', $user)}}" class="btn btn-primary">Show</a>
                  <button href="" class="btn btn-danger" id="delete">Delete</button>
                </td>
            </tr>
            @empty
                <tr>
                  <td colspan="4" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
               
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>

  <form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="" style="display:none">
  </form>
@endsection

@push('extra-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $('button#delete').on('click', function(e){
      e.preventDefault();
      var href = $(this).attr('href');
      // var title = $(this).data('title');

      swal({
          title: "Kamu yakin untuk hapus data ini?",
          text: "Data yang dihapus tidak bisa dikembalikan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              document.getElementById('deleteForm').action = href;
              document.getElementById('deleteForm').submit();
              swal("Data dihapus!", {
              icon: "success",
              });
          }
      });
  });
</script>
@endpush