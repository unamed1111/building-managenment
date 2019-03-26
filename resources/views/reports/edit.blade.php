@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <form action="{{route('maintenances.update',$maintenance->id)}}" method="POST" >
                        @csrf
                    <div class="form-group {{ $errors->has('description') ? 'has-danger' : ''}}">
                        <label for="description" class="col-form-label">Mô tả nghiệp vụ:</label>
                        <input type="text" class="form-control" placeholder="Mô tả nghệp vụ" name="description" id="description" value="{{old('description',$maintenance->description)}}"> 
                        @if ($errors->has('description'))
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('device_id') ? 'has-danger' : ''}}">
                        <label for="device_id" class="col-form-label">Mã thiết bị:</label>
                        <input type="number" class="form-control" placeholder="mã thiết bị" name="device_id" id="device_id" value="{{old('device_id',$maintenance->device_id)}}"> 
                        @if ($errors->has('device_id'))
                            <small class="text-danger">{{ $errors->first('device_id') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('time_start') ? 'has-danger' : ''}}">
                        <label for="time_start" class="col-form-label">Ngày bắt đầu:</label>
                        <input type="date" class="form-control" name="time_start" id="time_start" value="{{old('time_start',$maintenance->time_start)}}"> 
                        @if ($errors->has('time_start'))
                            <small class="text-danger">{{ $errors->first('time_start') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('time_end') ? 'has-danger' : ''}}">
                        <label for="time_end" class="col-form-label">Ngày kết thúc:</label>
                        <input type="date" class="form-control" name="time_end" placeholder="Tầng" id="time_end" value="{{old('time_end',$maintenance->time_end)}}"> 
                        @if ($errors->has('time_end'))
                            <small class="text-danger">{{ $errors->first('time_end') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('cost') ? 'has-danger' : ''}}">
                        <label for="cost" class="col-form-label">Chi Phí:</label>
                        <input type="number" class="form-control" name="cost" placeholder="Tầng" id="cost" value="{{old('cost',$maintenance->cost)}}"> 
                        @if ($errors->has('cost'))
                            <small class="text-danger">{{ $errors->first('cost') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('maintenances.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
                </div>
            </div>
        </div>
    </div>
@endsection