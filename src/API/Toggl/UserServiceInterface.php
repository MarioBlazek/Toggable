<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface UserServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface UserServiceInterface
{
    /**
     * Get current user data
     *
     * @param boolean $withRelatedData
     *
     * @return \Marek\Toggable\API\Http\Response\Users\User|\Marek\Toggable\API\Http\Response\Users\UserWithRelatedData
     */
    public function getCurrentUserData($withRelatedData = false);

    /**
     * Update user
     *
     * @param \Marek\Toggable\API\Toggl\Values\User\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\Users\User
     */
    public function updateUser(\Marek\Toggable\API\Toggl\Values\User\User $user);

    /**
     * Resets API token and returns new one
     *
     * @return \Marek\Toggable\API\Http\Response\Users\Token
     */
    public function resetApiToken();

    /**
     * Signs up new User
     *
     * @return \Marek\Toggable\API\Http\Response\Users\User
     */
    public function signUpNewUser(\Marek\Toggable\API\Toggl\Values\User\SignUp $signUp);
}
