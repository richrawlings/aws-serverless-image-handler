<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerClahe
{

    public function clahe(int $width, int $height, int $maxSlope = null): static
    {
        $this->edits['clahe']['width'] = $width;
        $this->edits['clahe']['height'] = $height;

        if ($maxSlope) {
            $this->edits['clahe']['maxSlope'] = $maxSlope;
        }

        return $this;
    }

}