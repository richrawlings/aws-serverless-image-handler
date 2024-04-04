<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerNegate
{

    public function negate(bool $alpha = null): static
    {
        if ($alpha) {
            $this->edits['negate']['options']['alpha'] = $alpha;
        } else {
            $this->edits['negate'] = true;
        }

        return $this;
    }

}