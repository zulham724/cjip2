<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserInvestor;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use TCG\Voyager\Facades\Voyager;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register-cjibf';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:investor');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showInvestorRegisterForm()
    {
        SEOTools::setTitle('Register to Central Java Investment Platform');
        SEOTools::setDescription('Register to Central Java Investment Platform you can easily select our investment project and we are here to help');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.logo')));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Register to Central Java Investment Platform')->setDescription('Register to Central Java Investment Platform you can easily select our investment project and we are here to help');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.logo')))->setUrl(url()->current())->setDescription('Register to Central Java Investment Platform you can easily select our investment project and we are here to help');

        TwitterCard::addValue('card', Voyager::image(setting('site.logo')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.logo')))
            ->setTitle('Register to Central Java Investment Platform')
            ->setDescription('Register to Central Java Investment Platform you can easily select our investment project and we are here to help')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        SEOMeta::addKeyword('registerr, masuk, daftar, investasi, jawa tengah, investasi, investment, indonesia, FDI indonesia, industrial park, indonesia investment, central java, invest central java');

        return view('login-investor', ['url' => 'investor']);
    }

    protected function createInvestor(Request $request)
    {
        //dd($request->all());
        $this->validator($request->all())->validate();
        $writer = UserInvestor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        //dd($writer);
        if (Auth::guard('investor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
