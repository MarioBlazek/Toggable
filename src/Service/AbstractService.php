<?php

namespace Marek\Toggable\Service;

use Marek\Toggable\API\Exception\NotFoundException;
use Marek\Toggable\API\Http\Response\Response;
use InvalidArgumentException;

/**
 * Class AbstractService
 * @package Marek\Toggable\Service
 */
abstract class AbstractService
{
    /**
     * @var \Marek\Toggable\Http\Manager\RequestManagerInterface
     */
    protected $requestManager;

    /**
     * @var \Marek\Toggable\Hydrator\HydratorInterface
     */
    protected $hydrator;

    /**
     * AbstractService constructor.
     *
     * @param \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager
     * @param \Marek\Toggable\Hydrator\HydratorInterface $hydrator
     */
    public function __construct(
        \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager,
        \Marek\Toggable\Hydrator\HydratorInterface $hydrator
    )
    {
        $this->requestManager = $requestManager;
        $this->hydrator = $hydrator;
    }

    /**
     * Extract helper method
     *
     * @param object $object
     *
     * @return array
     */
    protected function extractDataFromObject($object)
    {
        return $this->hydrator->extract($object);
    }

    /**
     * Hydrate helper method
     *
     * @param \Marek\Toggable\API\Http\Response\ResponseInterface $response
     * @param object $object
     *
     * @return object
     */
    protected function hydrateDataFromArrayToObject(\Marek\Toggable\API\Http\Response\ResponseInterface $response, $object)
    {
        $data = $response->getBody()['data'];

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * Delegates request/response management
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     *
     * @return \Marek\Toggable\API\Http\Response\Response
     */
    protected function delegate(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        try {

            $response = $this->requestManager->request($request);

        } catch(NotFoundException $e) {

            return new Response();
        }

        return $response;
    }

    /**
     * Response helper method
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     *
     * @return \Marek\Toggable\API\Toggl\Values\ValueObject
     */
    protected function delegateHydrateAndReturnResponse(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        throw new \RuntimeException('Method not implented');
    }

    /**
     * Validates input
     *
     * @param mixed $id
     *
     * @return mixed
     *
     * @throws InvalidArgumentException
     */
    protected function validate($id)
    {
        if (empty($id) || !is_int($id)) {
            throw new InvalidArgumentException(
                sprintf('$id argument not provided in %s', get_class($this))
            );
        }

        return $id;
    }
}
