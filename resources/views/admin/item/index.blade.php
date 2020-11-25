@extends('layouts.app')

@section('title','Item')
    
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('item.create')}}" class="btn btn-info">Create New</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">All Items</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table" style="width:100%">
                  <thead class=" text-primary">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach ($items as $key=>$item)
                          <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $item->name}}</td>
                              <td><img  src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive img-thumbnail"
                                style="width: 100x; height: 100px;" alt=""></td>
                              <td>{{ $item->category->name}}</td>
                              <td>{{ $item->description}}</td>
                              <td>{{ $item->price}}</td>
                              <td>{{ $item->created_at}}</td>
                              <td>
                                  <a href="{{route('item.edit',$item->id)}}" class="btn btn-info btn-sm">
                                  <i class="material-icons">mode_edit</i></a>

                                  <form id="delete-form-{{ $item->id }}" action="{{route('item.destroy',$item->id)}}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want to delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $item->id }}').submit();
                                }else{
                                  event.preventDefault();
                                }"><i class="material-icons">delete</i></button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#table').DataTable();
         } );
    </script>
@endpush