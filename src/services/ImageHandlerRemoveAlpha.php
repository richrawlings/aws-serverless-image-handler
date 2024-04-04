<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerRemoveAlpha
{

    public function removeAlpha(): static
    {
        $this->edits['removeAlpha'] = true;

        return $this;
    }

}