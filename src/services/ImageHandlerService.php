<?php

namespace rebellionagency\awsserverlessimagehandler\services;

use craft\elements\Asset;
use yii\base\Component;
use craft\helpers\App;

class ImageHandlerService extends Component
{

    public function resize(Asset $asset = null, int $width = null, int $height = null, array $options = []): string
    {
        if (!$asset instanceof Asset) {
            return '';
        }

        if (!$width && !$height) {
            return $asset->url;
        }

        if ($width && $height) {
            $edits = [
                'resize' => [
                    'width' => $width,
                    'height' => $height,
                ],
            ];
        }

        if ($width && !$height) {
            $edits = [
                'resize' => [
                    'width' => $width,
                ],
            ];
        }

        if ($height && !$width) {
            $edits = [
                'resize' => [
                    'height' => $height,
                ],
            ];
        }

        if ($options) {
            if (isset($options['fit'])) {
                $edits['resize']['options']['fit'] = $options['fit'];
            }
            if (isset($options['position'])) {
                $edits['resize']['options']['position'] = $options['position'];
            }
        }

        if (!$edits) {
            return $asset->url;
        }

        $config = [
            'bucket' => App::parseEnv(\rebellionagency\awsserverlessimagehandler\Plugin::getInstance()->getSettings()->s3Bucket),
            'key' => $asset->volume->fsHandle . '/' . $asset->path,
            'edits' => $edits,
        ];

        $urlParts[] = 'https://';
        $urlParts[] = App::parseEnv(\rebellionagency\awsserverlessimagehandler\Plugin::getInstance()->getSettings()->cloudFrontDomain);
        $urlParts[] = '.cloudfront.net';
        $urlParts[] = '/';
        $urlParts[] = base64_encode(json_encode($config));

        return implode('', $urlParts);
    }

}