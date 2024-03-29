<?php

namespace rebellionagency\awsserverlessimagehandler\twig;

use rebellionagency\awsserverlessimagehandler\Plugin;
use rebellionagency\awsserverlessimagehandler\services\ImageHandlerService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageHandlerExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('resize', [ImageHandlerService::class, 'resize']),
        ];
    }

    public function getGlobals(): array
    {
        return [
            'awsServerlessImageHandler' => Plugin::getInstance(),
        ];
    }
}