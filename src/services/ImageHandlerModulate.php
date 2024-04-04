<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerModulate
{

    public function modulate(int $brightness = null, float $saturation = null, float $hue = null, float $lightness = null): static
    {
        if ($brightness) {
            $this->edits['modulate']['brightness'] = $brightness;
        }

        if ($saturation) {
            $this->edits['modulate']['saturation'] = $saturation;
        }

        if ($hue) {
            $this->edits['modulate']['hue'] = $hue;
        }

        if ($lightness) {
            $this->edits['modulate']['lightness'] = $lightness;
        }

        return $this;
    }

}