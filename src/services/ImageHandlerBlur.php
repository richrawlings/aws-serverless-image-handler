<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerBlur
{

    public function blur(int $sigma = null): static
    {
        $this->edits['blur'] = $sigma ?? 3;

        return $this;
    }

}