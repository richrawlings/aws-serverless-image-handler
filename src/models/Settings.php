<?php

namespace rebellionagency\awsserverlessimagehandler\models;

use craft\base\Model;

class Settings extends Model
{
    public string $cloudFrontDistributionId = '';

    public function defineRules(): array
    {
        return [
            [['cloudFrontDistributionId'], 'required'],
        ];
    }
}