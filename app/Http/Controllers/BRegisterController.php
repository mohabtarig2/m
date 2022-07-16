<?php

namespace App\Http\Controllers;

use App\achivement;
use App\CompanyFile;
use App\Http\Controllers\Controller;
use App\models\companies;
use App\municipality;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class BRegisterController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function bcreate(Request $request)
    {

        
    //   return $request;

        // $ruels = $this->getRules($request);
        // $messages = $this->getMessage($request);


        // // $valditor = Validator::make($data->all(),$ruels,$messages);

        // // if($valditor->fails()){
        // //     $errors =  response()->json(['errors' => $valditor->errors()], 401);
        // //     return $errors;
        // // }



         $user  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'avatar' => $request->pathAvatar,
            'role_id' => $request->Categories,
            'password' => Hash::make($request->password),
        ]);


         companies::create([
            'about_us' => $request->about,
            'phone' => $request->phone,
            'emirates' => $request->emirates,
            'date_create' => $request->date_create,
            'manager_ar' => $request->manger_ar,
            'manager_en' => $request->manger_en,
            'company_ar' => $request->Company_ar,
            'company_en' => $request->Company_en,
            'user_id' => $user->id,

        ]);

        if($request->Categories ==6 || $request->Categories==1){
        municipality::create([
           
            'path' => $request->pathMunici,
            'user_id' => $user->id,

        ]);
    }



        

        $fileUpload = new achivement();

            $fileUpload->name = $request->pathAchive;
            $fileUpload->path = $request->pathAchive;
            $fileUpload->user_id = $user->id;
            $fileUpload->AchiveThreeYears = $request->AchiveThreeYears;
            $fileUpload->AchiveSinceCreate = $request->AchiveSinceCreate;
   
            $fileUpload->save();

            $fileUpload = new CompanyFile();

    
   
   
                $fileUpload->name = $request->pathlicence;
                $fileUpload->path =  $request->pathlicence;
                $fileUpload->user_id =  $user->id;;
                $fileUpload->save();
   
   
            return response()->json(['success'=>'File uploaded Register.']);
   
   
   



    }

    protected function getRules(){


        return $ruels = [
            'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:255|unique:users|digits:10',
        'email' => 'required|string|email|max:255|unique:users',
        'password' =>'required|string|min:8|confirmed',
        'Categories' => 'required|integer',


        ];




    }

    protected function getMessage(){

        return  $messages =[
            'name.required'=> __(' name required'),
            'mobile.required'=> __(' mobile required'),
            'mobile.regex'=> __(' mobile Number'),
            'email.unique'=> __('messages.offer name unique'),
            'password.required'=> __('password name riqured'),
            'Categories.required'=> __('Categories is required'),
          //  'password.regex'=>_(' uppercase characters (A – Z)  lowercase characters (a – z) - Base 10 digits (0 – 9)')


        ];
    }


}
