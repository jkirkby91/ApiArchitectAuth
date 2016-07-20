<?php

namespace ApiArchitect\Auth\Contracts;

/**
 * Interface OAuthCallBackControllerContract
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface OAuthCallBackControllerContract
{

    /**
     * Redirect the user to the OAuth provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider();

    /**
     * Obtain the user information from OAuth provider.
     *
     * @return Response
     */
    public function handleProviderCallback();

}