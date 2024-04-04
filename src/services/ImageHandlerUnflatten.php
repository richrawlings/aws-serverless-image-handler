<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerUnflatten
{

    public function unflatten(): static
    {
        $this->edits['unflatten'] = true;

        return $this;
    }

}