@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
      <a href="{{ route('article.create') }}" class="btn btn-primary mb-2">Add Aricle</a>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Penulis</th>
                <th>Aksi</th>
              </tr>
            </thead>
              {{-- Ubah pake forelse --}}
            @forelse ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ str_limit($article->content,60) }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                  <a href="{{ route('article.edit', $article)}}" class="btn btn-primary">Edit</a>
                  <button href="{{ route('article.destroy', $article)}}" class="btn btn-danger" id="delete">Delete</button>
                </td>`
            </tr>  )
            @empty
                <tr>
                  <td colspan="4" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
               
            </tbody>
          </table>
          {{ $articles->links() }}
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