<?php
////
////namespace App\Http\Controllers\Admin;
////
////use App\Http\Controllers\Controller;
////use App\User;
////use Illuminate\Support\Facades\Validator;
////use Illuminate\Http\Request;
////
////class AuthController extends Controller
////{
////    //
////
////    protected function validator(array $data)
////    {
////        return Validator::make($data, [
////            'last_name' => 'required|string|max:255',
////            'first_name' => 'required|string|max:255',
////            'middle_name' => 'required|string|max:255',
////            'phone' => 'required|string|max:11|unique:users',
////            'email' => 'required|string|email|max:255|unique:users',
////            'password' => 'required|string|min:6|confirmed',
////        ]);
////    }
////
////
////    protected function create(array $data)
////    {
////        return User::create([
////            'last_name' => $data['last_name'],
////            'first_name' => $data['first_name'],
////            'middle_name' => $data['middle_name'],
////            'phone' => $data['phone'],
////            'email' => $data['email'],
////            'password' => bcrypt($data['password']),
////            'type' => User::DEFAULT_TYPE,
////        ]);
////    }
////}
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\User;
//use Illuminate\Mail\Message;
//use JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use Validator, DB, Hash, Mail, Illuminate\Support\Facades\Password;
//
//class AuthController extends Controller
//{
//    /**
//     * API Register
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function register(Request $request)
//    {
//        $credentials = $request->only('last_name', 'first_name', 'middle_name', 'phone', 'email', 'password');
//        $rules = [
//            'last_name' => 'required|string|max:255',
//            'first_name' => 'required|string|max:255',
//            'middle_name' => 'required|string|max:255',
//            'phone' => 'required|string|max:11|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6',
//            ];
//        $validator = Validator::make($credentials, $rules);
//        if ($validator->fails()) {
//            return response()->json(['success' => false, 'error' => $validator->messages()]);
//        }
//        $last_name = $request->last_name;
//        $first_name = $request->first_name;
//        $middle_name = $request->middle_name;
//        $phone = $request->phone;
//        $email = $request->email;
//        $password = $request->password;
//        User::create(['last_name' => $last_name, 'first_name' => $first_name, 'middle_name' => $middle_name, 'phone' => $phone, 'email' => $email, 'password' => Hash::make($password)]);
//        return $this->login($request);
//    }
//
//    /**
//     * API Login, on success return JWT Auth token
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//        $rules = [
//            'email' => 'required|email',
//            'password' => 'required',
//        ];
//        $validator = Validator::make($credentials, $rules);
//        if ($validator->fails()) {
//            return response()->json(['success' => false, 'error' => $validator->messages()]);
//        }
//        try {
//            // attempt to verify the credentials and create a token for the user
//            if (!$token = JWTAuth::attempt($credentials)) {
//                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials.'], 401);
//            }
//        } catch (JWTException $e) {
//            // something went wrong whilst attempting to encode the token
//            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
//        }
//        // all good so return the token
//        return response()->json(['success' => true, 'data' => ['token' => $token]]);
//    }
//
//    /**
//     * Log out
//     * Invalidate the token, so user cannot use it anymore
//     * They have to relogin to get a new token
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function logout(Request $request)
//    {
//        $this->validate($request, ['token' => 'required']);
//        try {
//            JWTAuth::invalidate($request->input('token'));
//            return response()->json(['success' => true, 'message' => "You have successfully logged out."]);
//        } catch (JWTException $e) {
//            // something went wrong whilst attempting to encode the token
//            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
//        }
//    }
//    /**
//     * API Recover Password
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function recover(Request $request)
//    {
//        $user = User::where('email', $request->email)->first();
//        if (!$user) {
//            $error_message = "Your email address was not found.";
//            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
//        }
//        try {
//            Password::sendResetLink($request->only('email'), function (Message $message) {
//                $message->subject('Your Password Reset Link');
//            });
//        } catch (\Exception $e) {
//            //Return with error
//            $error_message = $e->getMessage();
//            return response()->json(['success' => false, 'error' => $error_message], 401);
//        }
//        return response()->json([
//            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
//        ]);
//    }
//}