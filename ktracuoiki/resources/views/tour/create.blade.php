@extends('layouts.parents')
@section('main') 
    <div class="container"> 
        <h1>ADD TOUR</h1> 
        

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


        <form action="{{ route('tour.store') }}" method="POST"> 
            @csrf 

            <div class="form-group"> 
                <label for="roomnuber">Ten tour:</label> 
                <input type="text" class="form-control" id="name" name="name" value="" required> 
                @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="description">Ngay bat dau:</label> 
                <input type="date" class="form-control" id="description" name="description" value="" required> 
                @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="price">Ngay ket thuc:</label> 
                <input type="text" class="form-control" id="price" name="price" value="" required> 
                @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="store_name">gia:</label> 
                <input type="text" class="form-control" id="store_name" name="store_name" value="" required> 
                @error('store_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="store_name">ten dia diem du lich:</label> 
                <input type="text" class="form-control" id="store_name" name="store_name" value="" required> 
                @error('store_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 
            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Them</button> 
        </form> 
    </div> 
@endsection 