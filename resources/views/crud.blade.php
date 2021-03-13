@extends('layouts.master')
@section('title')  
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
    <div>
        <a href="{{route('crud.tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
          <hr>
            @if (session('message'))
              <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                          <span>x</span>
                      </button>
                      {{ session('message')}}
                  </div>
              </div>  
            @endif
            <table class="table table-striped table-bordered table-sm">
              <tr>
                <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Action</th>
              </tr>
                  @foreach ($data_barang as $no => $data)
                    <tr>
                      <td>{{ $data_barang->firstItem()+$no}}</td>
                      <td>{{ $data->kode_barang}}</td>
                      <td>{{ $data->nama_barang}}</td> 
                        <td>
                          <a href="{{route('crud.edit',$data->id)}}" class="badge badge-success">Edit</a>
                          <a href="#" data-id="{{$data->id}}" class="badge badge-danger swal_confirm">
                              <form action="{{ route('crud.delete',$data->id) }}" id="delete{{$data->id}}" method="POST">
                                  @csrf
                                @method('delete')
                              </form>
                              Delete
                          </a>
                        </td>   
                    </tr>
                  @endforeach 
            </table>
        {{$data_barang->links()}}
      </div>
    </div>
</div>    
@endsection

@push('page-scripts')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@push('after-script')
  <script>
    $(".swal_confirm").click(function(e){   
    id = e.target.dataset.id;
      Swal.fire({
        title: 'Are you sure?'+id,
          text: "You won't be able to revert this!",
              icon: 'warning',
            showCancelButton: true,
          confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
          'Your file has been deleted.',
        'success')
      $(`#delete${id}`).submit();
    }
    else
    {
       
      }
     });
    });
</script>
@endpush