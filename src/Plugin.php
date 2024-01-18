<?php
/**
 * AWS Serverless Image Handler plugin for Craft CMS
 *
 * Integrates the AWS Serverless Image Handler CDN platform into Craft CMS.
 *
 * The Serverless Image Handler solution creates a serverless architecture to provide cost-effective image processing in the AWS Cloud.
 * The architecture combines AWS services with Sharp open-source image processing software and is optimized for dynamic image manipulation.
 *
 * @see https://aws.amazon.com/solutions/implementations/serverless-image-handler/
 * @see https://docs.aws.amazon.com/solutions/latest/serverless-image-handler/solution-overview.html
 * @see https://sharp.pixelplumbing.com/
 *
 * @author    Rebellion Software <support@rebellion.agency>
 * @link      https://rebellion.agency/
 * @copyright Copyright (c) 2024 Rebellion Software
 */

namespace rebellionagency\serverlessimagehandler;

/**
 * Class ServerlessImageHandler
 * @since 1.0.0
 */
class Plugin extends \craft\base\Plugin
{
    public bool $hasCpSettings = true;

    public string $schemaVersion = '2.1.0';

    public function init(): void
    {
        Craft::$app->onInit(function () {

            parent::init();



        });
    }
}