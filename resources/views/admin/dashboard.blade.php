@extends('layouts.app')

@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-secondary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category">Categories</p>
              <h3 class="card-title">{{$category}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-secondary">warning</i>
                <a href="javascript:;">Total Categories</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Items</p>
              <h3 class="card-title">{{$item}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <span>Total Items</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">chrome_reader_mode</i>
              </div>
              <p class="card-category">Reservations</p>
              <h3 class="card-title">{{$reservation->count()}}/{{$reservations}}</h3>
            </div>
            <div class="card-footer float-right">
              <div class="stats">
                <i class="material-icons">local_offer</i>Pending / Total
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Contacts</p>
              <h3 class="card-title">{{$contact}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">message</i> Total Message
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">

          @include('layouts.partial.msg')

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Reservations</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table" style="width:100%">
                  <thead class=" text-primary">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach ($reservationds as $key=>$reservationd)
                          <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $reservationd->name}}</td>
                              <td>{{ $reservationd->phone}}</td>
                              <td>
                                @if ($reservationd->status == true)
                                    <span class="label label-info">Confirmed</span>
                                @else
                                  <span class="label label-danger">Not Confirmed Yet</span>
                                @endif
                              </td>
                              <td>{{ $reservationd->created_at}}</td>
                              <td>

                                @if ($reservationd->status == false)
                                <form id="status-form-{{ $reservationd->id }}" action="{{ route('reservation.status',$reservationd->id) }}" method="POST" style="display: none;">
                                  @csrf
                                </form>
                              <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Did you confirmed by phone?')){
                                event.preventDefault();
                                document.getElementById('status-form-{{ $reservationd->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="material-icons">done</i></button>
                                @endif

                                  <form id="delete-form-{{ $reservationd->id }}" action="{{ route('reservation.destroy',$reservationd->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $reservationd->id }}').submit();
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


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">All Contact Messages</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table" style="width:100%">
                  <thead class=" text-primary">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Email</th>
                    <th>Sent At</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                      @foreach ($contacts as $key=>$contact)
                          <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $contact->name}}</td>
                              <td>{{ $contact->subject}}</td>
                              <td>{{ $contact->email}}</td>
                              <td>{{ $contact->created_at}}</td>
                              <td>
                                <a href="{{route('contact.show',$contact->id)}}" class="btn btn-info btn-sm">
                                  <i class="material-icons">details</i></a>

                                  <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure want t delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $contact->id }}').submit();
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
@endpush