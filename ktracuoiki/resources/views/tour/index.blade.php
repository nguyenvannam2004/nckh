@extends('layouts.parents')

@section('title','Truong dai hoc thuy loi');
    
@section('main')
<h3 class="text-center" style="margin-top:40px">LIST TOUR</h3>



@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<a href="{{ route('tour.create') }}" class="btn btn-success">ADD</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">NAME TOUR</th>
        <th scope="col">START_DATE</th>
        <th scope="col">END_DATE</th>
        <th scope="col">PRICE</th>
        <th scope="col">NAME DESTINATION</th>
        <th scope="col" colspan=3 class="text-center">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tour as $tours)
      <tr>
        <th scope="row">{{$tours->name}}</th>
        <td>{{$tours->start_date}}</td>
        <td>{{$tours->end_date}}</td>
        <td>{{$tours->price}}</td>
        <td>{{$tours->destinations->name}}</td>
        <td>
          <a href="{{route('tour.edit',$tours->id)}}"><i class="bi bi-pencil-square"></i></a>
        </td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$tours->id}}">
            <i class="bi bi-trash3-fill"></i>
          </button>

          <div class="modal fade" id="{{$tours->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="{{$tours->tourid}}">DELETE TOUR</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ARE YOU SURE YOU WANT TO DELETE THIS TOUR ? 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                  <form action="{{route('tour.destroy',$tours->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">DELETE</button>
                </form>
                </div>
              </div>
            </div>
          </div>

      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $tour->links('pagination::bootstrap-4') }}
  </div>
@endsection