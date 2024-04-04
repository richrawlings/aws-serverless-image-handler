<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerGrayscale
{

    public function grayscale(): static
    {
        $this->edits['grayscale'] = true;

        return $this;
    }

}