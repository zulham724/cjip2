<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\UserInvestor;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use TCG\Voyager\Facades\Voyager;


class SocialController extends Controller

{



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirect($provider)
    {
        SEOTools::setTitle('Sign in Google Account - Central Java Investment Plaftform');
        SEOTools::setDescription('Sign in using your Google Account on Central Java Investment Plaftform to get all features');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('Sign in using your Google Account on Central Java Investment Plaftform to get all features');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('Sign in using your Google Account on Central Java Investment Plaftform to get all features');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Sign in Google Account - Central Java Investment Plaftform')
            ->setDescription('Sign in using your Google Account on Central Java Investment Plaftform to get all features')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        return Socialite::driver($provider)->redirect();
    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function Callback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users       =   UserInvestor::where(['email' => $userSocial->getEmail()])->first();
        //dd($users);
        $hashids = new Hashids();
        $hashed = $hashids->encode($users->id);
        if($users){
            Auth::guard('investor')->login($users);

            return redirect('/dashboard/'.$hashed);


        }else{
            $user = UserInvestor::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
            Auth::guard('investor')->login($user);

            return redirect('/profile/'.$hashed);

        }
    }

}
