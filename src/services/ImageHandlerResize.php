<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerResize
{

    private array $allowedOptionsResize = [
        'width',
        'height',
        'options.width',
        'options.height',
        'options.fit',
        'options.position',
        'options.background',
        'options.kernel',
        'options.withoutEnlargement',
        'options.withoutReduction',
        'options.fastShrinkOnLoad',
    ];

    public function resize(int $width = null, int $height = null, array $options = []): static
    {
        if ($width && !isset($options['width'])) {
            $options['width'] = $width;
        }

        if ($height && !isset($options['height'])) {
            $options['height'] = $height;
        }

        $this->prepareEdits('resize', $this->allowedOptionsResize, $options);

        return $this;
    }

}