<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    /**
     * Handle API exceptions.
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function apiException($request, Exception $exception)
    {
        if ($this->isModelNotFound($exception)) {
            return $this->ModelNotFoundResponse($exception);
        }

        if ($this->isNotFoundHttp($exception)) {
            return $this->NotFoundHttpResponse($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Check for ModelNotFoundException.
     *
     * @param Exception $exception
     * @return boolean
     */
    protected function isModelNotFound($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    /**
     * Check for NotFoundHttpException.
     *
     * @param Exception $exception
     * @return boolean
     */
    protected function isNotFoundHttp($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    /**
     * Reponse for ModelNotFoundException.
     *
     * @param Exception $exception
     * @return \Illuminate\Http\Response
     */
    protected function ModelNotFoundResponse($exception)
    {
        return response()->json([
            'error' => 'Resource not found',
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Reponse for NotFoundHttpException.
     *
     * @param Exception $exception
     * @return \Illuminate\Http\Response
     */
    protected function NotFoundHttpResponse($exception)
    {
        return response()->json([
            'error' => 'Provided route is invalid',
        ], Response::HTTP_NOT_FOUND);
    }
}
