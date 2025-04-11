<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
   
class RegisterController extends BaseController
{

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'email' => 'required|email|unique:users,email|min:3',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password|min:8',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            /** @var \App\Models\User $user **/
            $user = Auth::user(); 
            $user->tokens()->delete();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function logout(Request $request) {
      
            $user = User::find($request->id); 
            $user->tokens()->where('id', $request->token)->delete();
            $success['id'] =  $request->id;
   
            return $this->sendResponse($success, 'User logout successfully. Token cleared.');
  
    }

    // public function forgotPassword(Request $request) {
    //     $request->validate(['email' => 'required|email|exists:users,email']);
    //     $user = User::where('email', $request->email)->first();
    
    //     // Generate a token for resetting password
    //     $token = Str::random(60);
    //     $user->reset_token = $token; // ensure your users table has a 'reset_token' field
    //     $user->save();
    
    //     // Send an email to the user with the reset link
    //     Mail::to($user->email)->send(new ResetPasswordMail($user->name, $token));
    
    //     return $this->sendResponse([], 'Reset password link sent.');
    // }

    // public function resetPassword($token) {
    //     $user = User::where('reset_token', $token)->firstOrFail();
    
    //     // Generate a new random password
    //     $newPassword = Str::random(10); // Or use a more sophisticated method
    //     $user->password = bcrypt($newPassword);
    //     $user->reset_token = null; // Reset the token
    //     $user->save();
    
    //     // Send the new password to the user
    //     Mail::to($user->email)->send(new NewPasswordMail($user->name, $newPassword));
    
    //     return $this->sendResponse([], 'New password has been sent to your email.');
    // }
    
}