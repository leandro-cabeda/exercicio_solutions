<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class HomeController extends Controller
{

	/**
	* Create a new controller instance.
	     *
	     * @return void
	     */
	    public function __construct()
	    {
		$this->middleware('guest')->except('logout');
	}


	/**
	* Show the application dashboard.
	     *
	     * @return \Illuminate\Contracts\Support\Renderable
	     */
	    public function index()
	    {
		//r		eturn view('home');
		$usuario="";
		return view("welcome")->with("usuario",$usuario);
	}


	/**
	*
	    * @param  \Illuminate\Http\Request  $request
		* @return \Illuminate\Http\Response
	*/
	public function login(Request $request)
	{
        $usuario=Usuario::all()->where("senha","=",$request->senha)->first();
		//$		usuario=Usuario::find($request->all());

		if(!$usuario)
		{
			return redirect()
							->back()
							->with('error', 'Falha ao realizar login')
							->withInput();
		}
		return view("welcome")->with("usuario",$usuario);
	}
}
