@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content') 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bikes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

   
    <table class="table table-bordered">
        <tr>
            
            <th>Img</th>
            <th>Name</th>            
            <th>Category</th>
            <th>Tags</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($books as $key=>$book)
            
	    <tr>
	        
                <td>
                   
                    @if ($book->imagesFront->count() > 0)
                        @foreach ($book->imagesFront as $image)			 
                            <img src="{{asset('gallery/images/thumbs_340/'.$image->file_name)}}" style="width:100px"/>
                        @endforeach 
                    @else
                            <img src="http://placehold.it/340x260" style="width:100px"/>
                    @endif
                                        
                </td>
	        <td>{{ $book->name }}</td>
	       
		<td>{{ $book->category()->first()->name }}</td>
                
                <td>
                    @foreach ($book->tags()->get() as $tag)
                    {{$tag->title}}
                    @endforeach  
                    
                    
                    
                   
                </td>
                
	        <td>
                   <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
	
	
	
	{!! $books->render() !!}
	


@endsection