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

namespace rebellionagency\awsserverlessimagehandler;

use Craft;
use craft\base\Model;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;
use craft\base\Event;
use rebellionagency\awsserverlessimagehandler\models\Settings;

class Plugin extends \craft\base\Plugin
{
    public bool $hasCpSettings = true;

    public string $schemaVersion = '2.1.0';

    public function init(): void
    {
        Craft::$app->onInit(function () {

            parent::init();

            Event::on(
                UrlManager::class,
                UrlManager::EVENT_REGISTER_CP_URL_RULES,
                function (RegisterUrlRulesEvent $event) {

                    $event->rules['settings/assets/aws-serverless-image-handler'] = 'aws-serverless-image-handler/transforms/index';

//                    $event->rules['widgets/new'] = 'my-plugin/widgets/edit';
//                    $event->rules['widgets/edit/<id:\d+>'] = 'my-plugin/widgets/edit';

                }
            );

            Craft::$app->getView()->hook('cp.settings.assets.nav', function (array &$context) {
                $context['navItems'] = [
                    'volumes' => [
                        'label' => 'Volumes',
                        'url' => UrlHelper::cpUrl('settings/assets')
                    ],
                    'transforms' => [
                        'label' => 'Transforms',
                        'url' => UrlHelper::cpUrl('settings/assets/transforms')
                    ],
                    'aws-serverless-image-handler' => [
                        'label' => 'Serverless Image Handler',
                        'url' => UrlHelper::cpUrl('settings/assets/aws-serverless-image-handler'),
                    ],
                    'settings' => [
                        'label' => 'Settings',
                        'url' => UrlHelper::cpUrl('settings/assets/settings')
                    ],
                ];

                // Return template *output*
//                return '<p>Hey!</p>';
            });


        });
    }

    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }

    protected function settingsHtml(): ?string
    {
        return \Craft::$app->getView()->renderTemplate(
            'aws-serverless-image-handler/settings',
            ['settings' => $this->getSettings()]
        );
    }
}