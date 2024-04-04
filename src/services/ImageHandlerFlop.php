<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerFlop
{
    public function flop(): static
    {
        $this->edits['flop'] = true;

        return $this;
    }

}