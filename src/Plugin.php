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
 * @author    Richard Rawlings <rich.rawlings@gmail.com>
 * @copyright Copyright (c) 2024 Richard Rawlings
 */

namespace richrawlings\awsserverlessimagehandler;

use Craft;
use craft\base\Model;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{
    public bool $hasCpSettings = true;
    public string $schemaVersion = '2.1.0';

    public function init(): void
    {
        parent::init();

        Craft::$app->onInit(function () {

            $this->setComponents([
                'awsServerlessImageHandler' => \richrawlings\awsserverlessimagehandler\services\ImageHandlerService::class,
            ]);

            $extension = new \richrawlings\awsserverlessimagehandler\twig\ImageHandlerExtension();

            Craft::$app->getView()->registerTwigExtension($extension);

            Event::on(
                CraftVariable::class,
                CraftVariable::EVENT_INIT,
                function (Event $e) {
                    $variable = $e->sender;
                    $variable->set('awsServerlessImageHandler', \richrawlings\awsserverlessimagehandler\services\ImageHandlerService::class);
                }
            );

        });

    }

    protected function createSettingsModel(): ?Model
    {
        return new \richrawlings\awsserverlessimagehandler\models\Settings();
    }

    protected function settingsHtml(): ?string
    {
        return \Craft::$app->getView()->renderTemplate(
            'aws-serverless-image-handler/settings',
            ['settings' => $this->getSettings()]
        );
    }

    public static function config(): array
    {
        return [
            'components' => [
                'awsserverlessimagehandler' => ['class' => \richrawlings\awsserverlessimagehandler\services\ImageHandlerService::class],
            ],
        ];
    }
}