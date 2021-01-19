<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:investor')->except('logout');
    }

    public function showInvestorLoginForm()
    {
        SEOTools::setTitle('Login to Central Java Investment Platform');
        SEOTools::setDescription('Login in to Central Java Investment Platform you can easily select our investment project and we are here to help');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.logo')));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Login to Central Java Investment Platform')->setDescription('Login to Central Java Investment Platform you can easily select our investment project and we are here to help');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.logo')))->setUrl(url()->current())->setDescription('Login to Central Java Investment Platform you can easily select our investment project and we are here to help');

        TwitterCard::addValue('card', Voyager::image(setting('site.logo')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.logo')))
            ->setTitle('Login to Central Java Investment Platform')
            ->setDescription('Login in to Central Java Investment Platform you can easily select our investment project and we are here to help')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        SEOMeta::addKeyword('login, masuk, daftar investasi, jawa tengah, investasi, investment, indonesia, FDI indonesia, industrial park, indonesia investment, central java, invest central java');

        return view('login_client', ['url' => 'investor']);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function investorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        //dd(Auth::guard('investor'));
        if (Auth::guard('investor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
