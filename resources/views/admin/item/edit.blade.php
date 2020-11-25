@extends('layouts.app')

@section('title','Category')
    
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        
            @include('layouts.partial.msg')
        
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Edit Item</h4>
            </div>
            <div class="card-body">
                <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Item</label>
                      <select name="category" class="form-control">
                        @foreach ($categories as $category)
                            <option {{$category->id == $item->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$item->name}}">
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <textarea name="description" class="form-control">{{$item->description}}</textarea>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="number" class="form-control" name="price" value="{{$item->price}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <label class="bmd-label-floating">Image</label>
                    <input type="file" name="image">
                </div>
              </div>
                <a href="{{route('category.index')}}" class="btn btn-warning btn-sm">Back</a>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </form>
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