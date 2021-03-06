@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href=""> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!--<form action="" method="POST">-->
   
      <form class="form-horizontal" method="POST" action="{{ route('books.store') }}" >
    	{{ csrf_field() }}


         <div class="row">
             
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
             
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
             
             
                    <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                        <label for="City">Choose Category</label>
                        <select name="category_id" class="form-control">
                        <option value ="">Choose Category</option>                
                          @if (isset($categories))
                            @foreach ($categories as $cat)
                            <option value ="{{$cat->id}}">{{ $cat->name }} </option>
                             @endforeach
                         @endif
                      </select>
                      </div>  
                    </div>  
		</div>


     <button type="submit" class="btn btn-primary">Save</button>
        </form>


@endsection