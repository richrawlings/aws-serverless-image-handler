<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerExtend
{

    public function extend(int $top = 0, int $left = 0, int $bottom = 0, int $right = 0, string $extendWith = 'background', $background = null): static
    {
        $this->edits['extend']['top'] = $top;
        $this->edits['extend']['left'] = $left;
        $this->edits['extend']['bottom'] = $bottom;
        $this->edits['extend']['right'] = $right;

        if (in_array($extendWith, [
            'background',
            'copy',
            'repeat',
            'mirror',
        ])) {
            $this->edits['extend']['extendWith'] = $extendWith;
        }

        if ($background) {
            $this->edits['extend']['background'] = $background;
        }

        return $this;
    }

}