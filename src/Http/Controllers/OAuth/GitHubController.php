<?php

namespace ApiArchitect\Auth\Http\Controllers\OAuth;

use Laravel\Socialite\Facades\Socialite;
use ApiArchitect\Auth\Contracts\OAuthCallBackControllerContract;

/**
 * Class GitHubController
 *
 * @package Api\Controllers\Auth\Social
 */
class GitHubController implements OAuthCallBackControllerContract
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
}