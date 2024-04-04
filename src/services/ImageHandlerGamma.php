<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerGamma
{

    public function gamma(float $gamma): static
    {
        if ($gamma >= 1 && $gamma <= 3) {
            $this->edits['gamma'] = $gamma;
        }

        return $this;
    }

}