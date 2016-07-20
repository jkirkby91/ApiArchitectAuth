<?php

namespace ApiArchitect\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use ApiArchitect\Core\Http\Requests\UserRequest;
use ApiArchitect\Auth\Http\Controllers\AuthController;

/**
 * Class JWTController
 *
 * @package Api\Controllers\Auth
 * @author James Kirkby <hello@jameskirkby.com>
 */
class JWTController extends AuthController
{

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function me(Request $request)
    {
        return Response()->json($this->userRepository->find(JWTAuth::parseToken()->authenticate()));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->sendResponse($this->makeCollection(['error' => 'invalid_credentials']))->statusCode(401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->sendResponse($this->makeCollection(['error' => 'could_not_create_token']))->statusCode(500);
        }

        // all good so return the token
        return Response()->json(compact('token'));
    }

    /**
     * @return mixed
     */
    public function validateToken() 
    {
        // Our routes file should have already authenticated this token, so we just return success here
        return $this->sendResponse($this->makeCollection(['status' => 'success'])->statusCode(200));
    }

    /**
     * @param UserRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function register(UserRequest $request)
    {
        $user = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $user = $this->userRepository->create($user);

        $token = JWTAuth::fromUser($user);

        return $this->sendResponse($this->makeCollection(compact('token')))->statusCode(200);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Dingo\Api\Http\Response
     */
    protected function create(array $data)
    {
        return $this->sendResponse(Collection::make($this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ])))->statusCode(200);
    }
}