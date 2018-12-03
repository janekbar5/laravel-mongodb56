@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>You are logged inccccccccccccccccc!</p>

<div class="box-body">
  <!--
    {{ $user }} <br>
    {{ $roles }} <br>

    getDirectPermissions {{ $user->getDirectPermissions() }} <br>
    getAllPermissions {{ $user->getAllPermissions() }}<br>
    getRoleNames {{ $user->getRoleNames() }}<br>
    pluck {{ $user->roles->pluck('name') }}<br>
    permissions {{ $user->permissions }}<br>


    getPermissionNames {{ $user->getPermissionNames() }}<br>


     @foreach($roles as $role)
    -- {{$role->name}} {{ $user->getRoleNames() }}
       
    <br>
        
     @endforeach
     
 -------------------------------------    

@hasallroles('writer|admin')
    I am both a writer and an admin!
@else
    I do not have all of these roles...
@endhasallroles

-----------------------------------<br>  
@foreach($user->getRoleNames() as $userrole)
           {{$userrole}}
@endforeach     
  
-->

        
    <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}


        <input type="hidden"  name="user_id" value="{{$user->id}}" >
        <div class="form-group">
               <select class="form-control" multiple="multiple" name="roles[]" id="roles">
                   @foreach($roles as $role)
                       <option value="{{$role->name}}" @foreach($user->getRoleNames() as $p) @if($role->name == $p)selected="selected"@endif @endforeach>{{$role->name}}</option>
                   @endforeach
               </select>                
       </div>
                

        <div class="form-group">
            <label for="inputAddress">Diaplayed Name</label>
            <input type="text" class="form-control" id="name" name="name" value="@if(!empty($user)){{ $user->name }}@endif" placeholder="Diaplayed name">
        </div>

        <div class="form-group">
            <label for="inputAddress2">Assigned email</label>
            <input type="text" class="form-control" id="email" name="email" value="@if(!empty($user)){{ $user->email }}@endif" placeholder="Assigned email">
        </div>





        <div class="row">   
            <button type="submit" class="btn btn-primary">Save</button>        
        </div>



    </form>





</div>
@stop

