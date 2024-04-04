<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerEnsureAlpha
{

    public function ensureAlpha(int $alpha = 1): static
    {
        $this->edits['ensureAlpha'] = $alpha;

        return $this;
    }

}