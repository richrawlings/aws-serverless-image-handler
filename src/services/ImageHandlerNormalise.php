<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerNormalise
{

    public function normalise(int $lower = null, int $upper = null): static
    {
        if ($lower >= 1 && $lower <= 100) {
            if ($upper >= 1 && $upper <= 100) {
                $this->edits['normalise']['lower'] = $lower;
                $this->edits['normalise']['upper'] = $upper;
            }
        }

        if (!isset($this->edits['normalise'])) {
            $this->edits['normalise'] = true;
        }

        return $this;
    }

}