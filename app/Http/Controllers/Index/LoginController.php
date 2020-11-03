<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Cookie;
use App\usermodel;
use App\hhmodel;
use Validator;

class LoginController extends Controller
{
	public function login()
	{
		return view('login');

	}

	public function captcha(Request $request)
	{
		ob_end_clean();
		$builder = new CaptchaBuilder;
		$builder->build();
		
		$request->session()->put('captcha',$builder->getPhrase());
		//return response('')->withCookie('captcha', 'value', 60);

		header('Content-type: image/jpeg');
		$builder->output();
	}

	/**
	*@param 
	*@return obj
	*/
	public function verification(Request $request)
	{
		$captcha=$request->session()->get('captcha');
		dd(Cookie::get('captcha'));

	}

	public function hh(Request $request){
	//	 $this->validate($request,[
	//		'username'=>'required|min:2|max:16',	
	//		'password'=>'required|between:4,20',	
	//		'captcha'=>'required|size:6',	
	//	]);

            $validator = Validator::make($request->all(),[
			'username'=>'required|min:2|max:16',	
          	'password'=>'required|between:4,20',	
			'captcha'=>'required|size:6',	
        ]);
		
		if($validator->fails()){
			return redirect('/login')
				    ->withErrors($validator)
                    ->withInput();
		}
  
		
	}


	
	/**
	*@param 
	*@return obj
	*/
	public function text(Request $request,$id){
		switch ($id) {
			case '1=1':
				$data=hhmodel::find(2)->ydy()->get();
				dd($data);
				break;
			case '1=n':
				$data=hhmodel::find(1)->ydd()->get();
				dd($data);
				break;
			case 'n=1':
				$data=hhmodel::find(1)->ddy()->get();
				dd($data);
				break;
			case 'n=n':
				$data=usermodel::find(1)->ddd()->get();
				dd($data);
				break;
		}
	}

	
     
}

