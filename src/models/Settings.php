<?php

namespace rebellionagency\awsserverlessimagehandler\models;

use craft\base\Model;

class Settings extends Model
{
    public string $s3Bucket = '';
    public string $cloudFrontDistributionId = '';
    public string $cloudFrontDomain = '';

    public function defineRules(): array
    {
        return [
            [['s3Bucket'], 'required'],
            [['cloudFrontDistributionId'], 'required'],
            [['cloudFrontDomain'], 'required'],
        ];
    }
}