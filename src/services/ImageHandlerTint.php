<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerTint
{

    public function tint(int $red, int $green, int $blue): static
    {
        $this->edits['tint'] = [
            'r' => $red,
            'g' => $green,
            'b' => $blue,
        ];

        return $this;
    }

}