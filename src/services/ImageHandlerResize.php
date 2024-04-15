<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerResize
{

    public function resize(int $width = null, int $height = null, string $fit = null, string $position = null, $background = null, string $kernel = null, bool $withoutEnlargement = false, bool $withoutReduction = false): static
    {
        if ($width > 0) {
            $this->edits['resize']['width'] = $width;
        }

        if ($height > 0) {
            $this->edits['resize']['height'] = $height;
        }

        if ($fit) {
            $this->edits['resize']['options']['fit'] = $fit;
        }

        if ($position) {
            $this->edits['resize']['options']['position'] = $position;
        }

        if ($background) {
            $this->edits['resize']['options']['background'] = $background;
        }

        if ($kernel) {
            $this->edits['resize']['options']['kernel'] = $kernel;
        }

        $this->edits['resize']['options']['withoutEnlargement'] = $withoutEnlargement;
        $this->edits['resize']['options']['withoutReduction'] = $withoutReduction;

        return $this;
    }

}