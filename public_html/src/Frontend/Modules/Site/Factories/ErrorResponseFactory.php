<?php

declare(strict_types=1);

namespace OSM\Frontend\Modules\Site\Factories;

use League\Plates\Engine;
use OSM\Frontend\Core\Builders\ResponseBuilder;
use OSM\Frontend\Exceptions\Http\AbstractHttpException;
use OSM\Frontend\Modules\Site\ViewModels\ErrorViewModel;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ErrorResponseFactory
{
    private ResponseBuilder $responseBuilder;
    private Engine $engine;

    public function __construct(
        ResponseBuilder $responseBuilder,
        Engine $engine
    ) {
        $this->responseBuilder = $responseBuilder;
        $this->engine = $engine;
    }

    /**
     * @throws Throwable
     */
    public function buildFromThrowable(Throwable $throwable): ResponseInterface
    {
        // if not http exception let it bubble up
        if (!$throwable instanceof AbstractHttpException) {
            throw $throwable;
        }

        $model = new ErrorViewModel();
        $model->title = _f('Error');
        $model->description = $throwable->getMessage();

        $content = $this->engine->render('/error', [
            'error' => $model,
        ]);

        return $this->responseBuilder
            ->withStatus($throwable->statusCode)
            ->withContent($content)
            ->build();
    }
}
