<?php

namespace ApiArchitect\Auth\Http\Controllers\OAuth;

use ApiArchitect\Auth\Contracts\OAuthCallBackControllerContract;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class FacebookController
 * 
 * @package Api\Controllers\Auth\Social
 */
class TwitterController implements OAuthCallBackControllerContract
{

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }
}