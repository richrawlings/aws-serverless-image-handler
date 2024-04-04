<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerRotate
{

    public function rotate(int $angle, $background = null): static
    {
        if ($background) {
            $this->edits['rotate']['angle'] = $angle;
            $this->edits['rotate']['options']['background'] = $background;
        } else {
            $this->edits['rotate'] = $angle;
        }

        return $this;
    }

}