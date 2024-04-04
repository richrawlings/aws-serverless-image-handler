<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerToColourspace
{

    public function toColourspace(string $colourspace): static
    {
        $this->edits['toColourspace'] = $colourspace;

        return $this;
    }

}