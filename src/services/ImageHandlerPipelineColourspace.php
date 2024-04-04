<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerPipelineColourspace
{

    public function pipelineColourspace(string $colourspace): static
    {
        $this->edits['pipelineColourspace'] = $colourspace;

        return $this;
    }

}