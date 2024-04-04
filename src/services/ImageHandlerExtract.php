<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerExtract
{

    public function extract(int $left, int $top, int $width, int $height): static
    {
        $this->edits['extract']['left'] = $left;
        $this->edits['extract']['top'] = $top;
        $this->edits['extract']['width'] = $width;
        $this->edits['extract']['height'] = $height;

        return $this;
    }

}