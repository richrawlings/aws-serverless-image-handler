<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerFlip
{
    public function flip(): static
    {
        $this->edits['flip'] = true;

        return $this;
    }

}