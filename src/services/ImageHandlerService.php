<?php

namespace richrawlings\awsserverlessimagehandler\services;

use craft\elements\Asset;
use craft\helpers\App;
use yii\base\Component;

class ImageHandlerService extends Component
{
    use ImageHandlerBlur;
    use ImageHandlerClahe;
    use ImageHandlerEnsureAlpha;
    use ImageHandlerExtend;
    use ImageHandlerExtract;
    use ImageHandlerExtractChannel;
    use ImageHandlerFlatten;
    use ImageHandlerFlip;
    use ImageHandlerFlop;
    use ImageHandlerGamma;
    use ImageHandlerGrayscale;
    use ImageHandlerMedian;
    use ImageHandlerModulate;
    use ImageHandlerNegate;
    use ImageHandlerNormalise;
    use ImageHandlerPipelineColourspace;
    use ImageHandlerRemoveAlpha;
    use ImageHandlerResize;
    use ImageHandlerRotate;
    use ImageHandlerSharpen;
    use ImageHandlerThreshold;
    use ImageHandlerTint;
    use ImageHandlerToColourspace;
    use ImageHandlerTrim;
    use ImageHandlerUnflatten;

    public string $cloudFrontDistributionId;
    public string $cloudFrontDomain;
    public string $s3Bucket;

    public Asset $asset;
    public array $edits = [];

    public function __construct(array $config = [])
    {
        $plugin = \richrawlings\awsserverlessimagehandler\Plugin::getInstance();

        $this->cloudFrontDistributionId = App::parseEnv($plugin->getSettings()->cloudFrontDistributionId);
        $this->cloudFrontDomain = App::parseEnv($plugin->getSettings()->cloudFrontDomain);
        $this->s3Bucket = App::parseEnv($plugin->getSettings()->s3Bucket);

        parent::__construct($config);
    }

    public function cloudFrontUrl(Asset $asset = null): string
    {
        if (!$asset) {
            return '';
        }

        $this->asset = $asset;

        return $this->prepareUrl();
    }

    public function prepareUrl(): string
    {
        $config = [
            'bucket' => $this->s3Bucket,
            'key' => $this->asset->volume->fsHandle . '/' . $this->asset->path,
            'edits' => $this->edits,
        ];

        $urlParts[] = 'https://';
        $urlParts[] = $this->cloudFrontDomain;
        $urlParts[] = '.cloudfront.net/';
        $urlParts[] = base64_encode(json_encode($config));

        // Reset edits (important)
        $this->edits = [];

        return implode('', $urlParts);
    }

}