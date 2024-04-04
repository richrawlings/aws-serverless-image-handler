<?php

namespace richrawlings\awsserverlessimagehandler\twig;

use richrawlings\awsserverlessimagehandler\Plugin;
use richrawlings\awsserverlessimagehandler\services\ImageHandlerService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageHandlerExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [

            // Resizing
            new TwigFunction('extract', [ImageHandlerService::class, 'extract']),
            new TwigFunction('extend', [ImageHandlerService::class, 'extend']),
            new TwigFunction('resize', [ImageHandlerService::class, 'resize']),
            new TwigFunction('trim', [ImageHandlerService::class, 'trim']),

            // Image manipulation
            new TwigFunction('blur', [ImageHandlerService::class, 'blur']),
            new TwigFunction('clahe', [ImageHandlerService::class, 'clahe']),
            new TwigFunction('flatten', [ImageHandlerService::class, 'flatten']),
            new TwigFunction('flip', [ImageHandlerService::class, 'flip']),
            new TwigFunction('flop', [ImageHandlerService::class, 'flop']),
            new TwigFunction('gamma', [ImageHandlerService::class, 'gamma']),
            new TwigFunction('median', [ImageHandlerService::class, 'median']),
            new TwigFunction('modulate', [ImageHandlerService::class, 'modulate']),
            new TwigFunction('negate', [ImageHandlerService::class, 'negate']),
            new TwigFunction('normalise', [ImageHandlerService::class, 'normalise']),
            new TwigFunction('normalize', [ImageHandlerService::class, 'normalise']),
            new TwigFunction('rotate', [ImageHandlerService::class, 'rotate']),
            new TwigFunction('sharpen', [ImageHandlerService::class, 'sharpen']),
            new TwigFunction('threshold', [ImageHandlerService::class, 'threshold']),
            new TwigFunction('unflatten', [ImageHandlerService::class, 'unflatten']),

            // Colour manipulation
            new TwigFunction('tint', [ImageHandlerService::class, 'tint']),
            new TwigFunction('grayscale', [ImageHandlerService::class, 'grayscale']),
            new TwigFunction('greyscale', [ImageHandlerService::class, 'grayscale']),
            new TwigFunction('pipelineColourspace', [ImageHandlerService::class, 'pipelineColourspace']),
            new TwigFunction('pipelineColorspace', [ImageHandlerService::class, 'pipelineColourspace']),
            new TwigFunction('toColourspace', [ImageHandlerService::class, 'toColourspace']),
            new TwigFunction('toColorspace', [ImageHandlerService::class, 'toColourspace']),

            // Channel manipulation
            new TwigFunction('ensureAlpha', [ImageHandlerService::class, 'ensureAlpha']),
            new TwigFunction('extractChannel', [ImageHandlerService::class, 'extractChannel']),
            new TwigFunction('removeAlpha', [ImageHandlerService::class, 'removeAlpha']),

            // URL helper
            new TwigFunction('cloudFrontUrl', [ImageHandlerService::class, 'cloudFrontUrl']),

        ];
    }

    public function getGlobals(): array
    {
        return [
            'awsServerlessImageHandler' => Plugin::getInstance(),
        ];
    }
}