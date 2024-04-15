<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerResize
{

    public function resize(int $width = null, int $height = null, string $fit = null, string $position = null, $background = null, string $kernel = null, bool $withoutEnlargement = null, bool $withoutReduction = null, bool $fastShrinkOnLoad = null): static
    {
        if ($width) {
            $this->edits['resize']['width'] = $width;
        }

        if ($height) {
            $this->edits['resize']['height'] = $height;
        }

        if ($fit) {
            $this->edits['resize']['fit'] = $fit;
        }

        if ($position) {
            $this->edits['resize']['position'] = $position;
        }

        if ($background) {
            $this->edits['resize']['background'] = $background;
        }

        if ($kernel) {
            $this->edits['resize']['kernel'] = $kernel;
        }

        if ($withoutEnlargement) {
            $this->edits['resize']['withoutEnlargement'] = $withoutEnlargement;
        }

        if ($withoutReduction) {
            $this->edits['resize']['withoutReduction'] = $withoutReduction;
        }

        return $this;
    }

}