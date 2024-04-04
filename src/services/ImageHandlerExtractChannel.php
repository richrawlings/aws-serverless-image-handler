<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerExtractChannel
{

    public function extractChannel($channel): static
    {
        $this->edits['extractChannel'] = $channel;

        return $this;
    }

}