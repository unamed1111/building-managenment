@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <form action="{{route('reports.store')}}" method="POST" >
                        @csrf
                    <div class="form-group {{ $errors->has('title') ? 'has-danger' : ''}}">
                        <label for="title" class="col-form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" id="title" value="{{old('title')}}"> 
                        @if ($errors->has('title'))
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-danger' : ''}}">
                        <label for="content" class="col-form-label">Nội dung:</label>
                        <input type="text" class="form-control" placeholder="Nội dung" name="content" id="content" value="{{old('content')}}"> 
                        @if ($errors->has('content'))
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('reports.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
                </div>
            </div>
        </div>
    </div>
@endsection