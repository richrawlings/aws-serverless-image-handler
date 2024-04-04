<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerTrim
{

    private array $allowedOptionsTrim = [
        'background',
        'threshold',
        'lineArt',
    ];

    public function trim($options = []): static
    {
        $this->prepareEdits('trim', $this->allowedOptionsTrim, $options);

        return $this;
    }

}