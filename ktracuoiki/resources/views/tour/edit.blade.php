@extends('layouts.parents') 
@section('main') 
    <div class="container"> 
        <h1>Sửa Thông Tin</h1> 
        <form action="{{ route('tour.update', $tour->id)}}" method="POST"> 
            @csrf 
            @method('PUT') 
            
            <div class="form-group"> 
                <label for="roomnuber">Ten tour:</label> 
                <input type="text" class="form-control" id="name" name="name" value="{{$tour->name}}" required> 
                @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="description">Ngay bat dau:</label> 
                <input type="text" class="form-control" id="description" name="description" value="{{$tour->description}}" required> 
                @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            </div> 

            <div class="form-group"> 
                <label for="price">Ngay ket thuc:</label> 
                <input type="text" class="form-control" id="price" name="price" value="{{$tour->price}}" required> 
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

        

            <button type="submit" class="btn btn-primary">Lưu</button> 
        </form> 
    </div> 
@endsection
