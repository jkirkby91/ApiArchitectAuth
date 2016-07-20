<?php

namespace ApiArchitect\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use ApiArchitect\Auth\Http\Controllers\AuthController;

/**
 * Class PasswordController
 *
 * @package ApiArchitect\Auth\Http\Controllers
 */
class PasswordController extends AuthController
{

    use ResetsPasswords;

    /**
     * PasswordController constructor.
     *
     * Create a new password controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
