@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => ['users.store'] ]) !!}
                                @include('users._form')
                                <!-- Submit Form Button -->
                                {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
                                <a href="{{route('users.index')}}" class="btn btn-danger" >Quay lại</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection