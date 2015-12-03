<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Libs\DataOperation\DataOperation;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;

class AuthController extends BackendBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(DataOperation $wbd)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->wbd = $wbd;
    }


    public function index()
    {

        if (Auth::check()) {
            return Redirect::route('admin.home.index');
        } else {
            return $this->wbd->view('backend.pages.login.index');
        }

    }

    public function login()
    {
        $input = Input::all();

        $lembreMe = empty($input['lembre_me']) ? false : true;

        if (Auth::attempt(['usuario' => $input['usuario'], 'password' => $input['senha']], $lembreMe)) {

            $pessoa = Usuario::find(Auth::user()->id)->first();

            session()->put('user_nome',         $pessoa->nome);
            session()->put('user_email',        $pessoa->email);
            session()->put('user_usuario',      $pessoa->usuario);
            session()->put('user_id',           $pessoa->id);

            return redirect('admin/home');
        }


        flash()->error('Login', trans('admin.msg_usuario_error'));
        return $this->wbd->view('backend.pages.login.index');
    }


    public function logout() {

        Auth::logout();

        if(session()->has('flash_message')){
            session()->flash('flash_message', session('flash_message') );
        }

        return Redirect::to('admin/login');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
}
