<?php

namespace Marek\Toggable\Service\User;

use Marek\Toggable\Service\AbstractService;
use Marek\Toggable\API\Http\Request\Users\GetCurrentUser;
use Marek\Toggable\API\Http\Request\Users\ResetApiToken;
use Marek\Toggable\API\Http\Request\Users\SignUp;
use Marek\Toggable\API\Http\Request\Users\UpdateUser;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Http\Response\Users\Token;
use Marek\Toggable\API\Http\Response\Users\User as UserResponse;
use Marek\Toggable\API\Http\Response\Users\UserWithRelatedData;
use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\API\Toggl\Values\User\BlogPost;
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
        $request = new GetCurrentUser(array(
            'withRelatedData' => $withRelatedData,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        if (empty($response->body['data'])) {
            // do something
        }

        $user = $this->hydrator->hydrate($response->body['data'], new User());

        $parameters = array(
            'user' => $user,
        );

        if ($withRelatedData) {

            if (!empty($response->body['data']['new_blog_post'])) {
                $blogPost = $this->hydrator->hydrate($response->body['data']['new_blog_post'], new BlogPost());
                $parameters['blogPost'] = $blogPost;
            }

            if (!empty($response->body['data']['time_entries'])) {
                $timeEntry = $this->hydrator->hydrate($response->body['data']['time_entries'], new TimeEntry());
                $parameters['timeEntry'] = $timeEntry;
            }

            if (!empty($response->body['data']['projects'])) {
                $projects = $this->hydrator->hydrate($response->body['data']['projects'], new TimeEntry());
                $parameters['projects'] = $projects;
            }

            if (!empty($response->body['data']['tags'])) {
                $tags = $this->hydrator->hydrate($response->body['data']['tags'], new TimeEntry());
                $parameters['tags'] = $tags;
            }

            if (!empty($response->body['data']['workspaces'])) {
                $workspaces = $this->hydrator->hydrate($response->body['data']['workspaces'], new TimeEntry());
                $parameters['workspaces'] = $workspaces;
            }

            if (!empty($response->body['data']['clients'])) {
                $clients = $this->hydrator->hydrate($response->body['data']['clients'], new TimeEntry());
                $parameters['clients'] = $clients;
            }

            return new UserWithRelatedData($parameters);
        }

        return new UserResponse($parameters);
    }

    /**
     * @inheritDoc
     */
    public function updateUser(\Marek\Toggable\API\Http\Response\Users\User $user)
    {
        $request = new UpdateUser(array(
            'user' => $user,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $user = $this->hydrator->hydrate($response->body['data'], new User());

        return new UserResponse(array(
            'user' => $user,
        ));
    }

    /**
     * @inheritDoc
     */
    public function resetApiToken()
    {
        $request = new ResetApiToken();

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        if (empty($response->body)) {
            // do something
        }

        return new Token(array(
            'token' => $response->body,
        ));
    }

    /**
     * @inheritDoc
     */
    public function signUpNewUser(\Marek\Toggable\API\Toggl\Values\User\SignUp $signUp)
    {
        $request = new SignUp(array(
            'signUp' => $signUp,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $user = $this->hydrator->hydrate($response->body['data'], new User());

        return new UserResponse(array(
            'user' => $user,
        ));
    }
}
