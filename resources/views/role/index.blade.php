@extends('layouts.master')
{{-- @section('title', 'Quản lý quyền') --}}
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                 <!-- Modal -->
                <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
                    <div class="modal-dialog" role="document">
                        {!! Form::open(['method' => 'post']) !!}

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="roleModalLabel">Phân Quyền</h4>
                            </div>
                            <div class="modal-body">
                                <!-- name Form Input -->
                                <div class="form-group @if ($errors->has('name')) has-error @endif">
                                    {!! Form::label('name', 'Quyền') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Tên Quyền']) !!}
                                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

                                <!-- Submit Form Button -->
                                {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <h3>Roles</h3>
                    </div>
                    <div class="col-md-7 page-action text-right">
                        @can('add_roles')
                            <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> Thêm quền</a>
                        @endcan
                    </div>
                </div>


                @forelse ($roles as $role)
                    {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

                    @if($role->name === 'Admin')
                        @include('shared._permissions', [
                                      'title' => $role->name,
                                      'options' => ['disabled'] ])
                    @else
                        @include('shared._permissions', [
                                      'title' => $role->name ,
                                      'model' => $role ])
                        @can('edit_roles')
                            {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
                        @endcan
                    @endif

                    {!! Form::close() !!}

                @empty
                    <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
                @endforelse
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection
