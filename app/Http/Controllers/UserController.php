<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\Traits\ApiResponser;
use DB;

Class UserController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function getUsers(){
    
    $users = DB::connection('mysql')
    ->select("Select * from tblusers");
    
    return $this->successResponse($users);  
   
    }

    public function index(){

        $users = User::all();

        return $this->successResponse($users);
    }

    public function add(Request $request){
        $rules = [
            'fullname' => 'required|max:20',
            'password' => 'required|max:20',
            'email' => 'required|max:20',
        ];

        $this->validate($request, $rules);

        $user = User::create($request->all());

    return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        if($user){
            return $this->successResponse($user);
        }

            return $this->errorResponse("User id not found", Response::HTTP_NOT_FOUND);
        }

    public function update(Request $request, $id)  {
        $user = User::findOrFail($id);
        $user->update($request->all());
    
            return $this->successResponse($user, Response::HTTP_CREATED);
        }

    public function delete($id, Request $request)
        {
            $user = User::findOrFail($id);
            $user->delete($request->all());

            return $this->successResponse($user, Response::HTTP_OK);
        }

}