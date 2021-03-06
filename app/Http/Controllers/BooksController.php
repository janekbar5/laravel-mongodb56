<?php


namespace App\Http\Controllers;
use App\Book;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;



class BooksController extends Controller

{
    protected $categoryObject;
    


    public function __construct()
    {
        $this->middleware('auth');
	//$this->categoryObject = $categoryObject;
    }
	
    public function getCategories(){
        //return $categories = Category::pluck('name', 'id');
        return $categories = Category::all();
    }
	
	
    
     
    public function index()
    {
        //$books = Book::all();
	//$books = Book::with('bookHasCategory')->get();
	$books = Book::paginate(10);
        //$categories = $this->getCategories();
        return view('books.index',compact('books'));
        //return view('books.index',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
			//return 'rrrrrrrrrrrrrrrrr';
    }


    public function create()
    {
        $categories = $this->getCategories();
        return view('books.create',compact('categories'));
    }


  
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'category_id' => 'required',
        ]);   
        $book = Book::create($request->all());
        
        //return redirect()->route('books.index')->with('success','Book created successfully.');
        return redirect()->route('books.edit', $book->id)->with('success', 'Successfully created!');
    }


    
    
    public function show($id)
    {
        $tags = Tag::all();
	$book = Book::find($id);
	return view('books.show',compact('book','tags'));
    }


    
    
    public function edit($id)	
    {
        $book = Book::find($id);
        $categories = $this->getCategories();
        $category = Category::find($book->category_id);
        $tags = Tag::all();
        //dd($tags);
	return view('books.edit',compact('book','categories','category','tags'));
    }


   
    
    
    
    public function update(Request $request, $id)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'category_id' => 'required',
        ]);

        $book = Book::find($id);
        $book->update($request->all());
        //dd($request->Input('tags'));
        $book->tags()->sync($request->Input('tags'));
        
        return redirect()->route('books.index')
                         ->with('success','Book updated successfully');
    }
    
    
    
    
    
    public function destroy($id)
    {
        
	$book = Book::find($id);
	$book->delete();
        return redirect()->route('books.index')->with('success','Book deleted successfully');
	
    }
	
	
	
	
}