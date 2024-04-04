<?php

namespace richrawlings\awsserverlessimagehandler\services;

trait ImageHandlerSharpen
{

    public function sharpen(int $sigma = null, float $m1 = 1.0, float $m2 = 2.0, float $x1 = 2.0, float $y2 = 10.0, float $y3 = 20.0): static
    {
        if ($sigma >= 0 && $sigma <= 10) {
            $this->edits['sharpen']['sigma'] = $sigma;
        }

        if ($m1 >= 0 && $m1 <= 1000000) {
            $this->edits['sharpen']['m1'] = $m1;
        }

        if ($m2 >= 0 && $m2 <= 1000000) {
            $this->edits['sharpen']['m2'] = $m2;
        }

        if ($x1 >= 0 && $x1 <= 1000000) {
            $this->edits['sharpen']['x1'] = $x1;
        }

        if ($y2 >= 0 && $y2 <= 1000000) {
            $this->edits['sharpen']['y2'] = $y2;
        }

        if ($y3 >= 0 && $y3 <= 1000000) {
            $this->edits['sharpen']['y3'] = $y3;
        }

        return $this;
    }

}