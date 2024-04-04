<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerThreshold
{

    public function threshold(int $threshold = 128): static
    {
        $this->edits['threshold'] = $threshold;

        return $this;
    }

}