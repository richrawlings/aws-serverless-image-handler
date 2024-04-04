<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerMedian
{

    public function median(int $size = null): static
    {
        $this->edits['median'] = $size ?? 3;

        return $this;
    }

}