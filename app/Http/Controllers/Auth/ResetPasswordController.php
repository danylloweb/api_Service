<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postReset(Request $request)
    {
        try {

            $credentials = $this->getResetCredentials($request);

            $rs = DB::table('password_resets')->select('email')->where('token', $credentials['token'])->first();

            if ($rs != null) {
                DB::table('users')
                    ->where('email', $rs->email)
                    ->update(['password' => bcrypt($credentials['password'])]);
                DB::table('password_resets')->where('token', $credentials['token'])->delete();
                return response()->json([
                    'error' => false,
                    'message' => 'Senha alterada com sucesso'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Erro ao alterar a senha'
                ], 400);
            }

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function getResetCredentials(Request $request)
    {
        return $request->only(
            'password', 'password_confirmation', 'token'
        );
    }
}
