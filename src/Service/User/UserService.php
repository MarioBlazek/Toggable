<?php

namespace Marek\Toggable\Service\User;

use Marek\Toggable\API\Http\Request\RequestInterface;
use Marek\Toggable\Service\AbstractService;
use Marek\Toggable\API\Http\Request\Users\GetCurrentUser;
use Marek\Toggable\API\Http\Request\Users\ResetApiToken;
use Marek\Toggable\API\Http\Request\Users\SignUp;
use Marek\Toggable\API\Http\Request\Users\UpdateUser;
use Marek\Toggable\API\Http\Response\Users\Token;
use Marek\Toggable\API\Http\Response\Users\User as UserResponse;
use Marek\Toggable\API\Toggl\Values\User\User;


/**
 * Class UserService
 * @package Marek\Toggable\Service\User
 */
class UserService extends AbstractService implements \Marek\Toggable\API\Toggl\UserServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getCurrentUserData($withRelatedData = false)
    {
        $request = new GetCurrentUser(
            array(
                'relatedData' => $withRelatedData,
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function updateUser(\Marek\Toggable\API\Toggl\Values\User\User $user)
    {
        $request = new UpdateUser(
            array(
                'data' => $this->extractDataFromObject($user),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function resetApiToken()
    {
        $request = new ResetApiToken();

        $response = $this->delegate($request);

        return new Token(
            array(
                'token' => $response->body,
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function signUpNewUser(\Marek\Toggable\API\Toggl\Values\User\SignUp $signUp)
    {
        $request = new SignUp(
            array(
                'data' => $this->extractDataFromObject($signUp),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritdoc
     */
    protected function delegateHydrateAndReturnResponse(RequestInterface $request)
    {
        $response = $this->delegate($request);

        return new UserResponse(
            array(
                'user' => $this->hydrateDataFromArrayToObject($response, new User()),
            )
        );
    }
}
