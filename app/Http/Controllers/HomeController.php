<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    
	}
	
	
	
	
	
	
	
	public function createRoles()    {
        $role = Role::create(['name' => 'writer']);
		$permission = Permission::create(['name' => 'edit articles']);
		echo 'done';
    }
	public function createAdmin()    {
        $role = Role::create(['name' => 'admin']);
		$permission = Permission::create(['name' => 'edit all']);
		echo 'done';
    }
	public function createEditor()    {
        $role = Role::create(['name' => 'editor']);
		$permission = Permission::create(['name' => 'edit costam']);
		echo 'done';
    }
	
}
