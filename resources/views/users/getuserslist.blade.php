@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')       
    
    <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> 
                      
                                
   @if (session('success'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
        </div>
    @endif                             
                                
  
	
	<div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
				
				@foreach ($users as $user)	
				<tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }} {{ $user->email }}</td>
                  <td>
				    {{ $user->getDirectPermissions() }} 
					{{ $user->getAllPermissions() }}
					{{ $user->getRoleNames() }}
					
                  </td>
                  <td>
				  <a href="{{ route('user.edit',$user->id) }}" class="btn btn-success btn-sm">
				  <span class="glyphicon glyphicon-plus"></span>Edit </a>
                                  
				  <!--<a href="{{action('UserController@edit', $user->id)}}" class="btn btn-warning">Edit</a>-->
				  </td>
                </tr>
				@endforeach
                
      
				
              </tbody></table>
            </div>
@stop