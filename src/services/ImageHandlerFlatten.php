<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerFlatten
{

    public function flatten($background): static
    {
        $this->edits['flatten'] = $background;

        return $this;
    }

}