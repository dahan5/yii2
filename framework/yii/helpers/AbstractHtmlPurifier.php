<?php
/**
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @link http://www.yiiframework.com/
 * @license http://www.yiiframework.com/license/
 */
namespace yii\helpers;

/**
 * AbstractHtmlPurifier provides concrete implementation for [[HtmlPurifier]].
 *
 * Do not use AbstractHtmlPurifier. Use [[HtmlPurifier]] instead.
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
abstract class AbstractHtmlPurifier
{
	/**
	 * Passes markup through HTMLPurifier making it safe to output to end user
	 *
	 * @param string $content
	 * @param array|null $config
	 * @return string
	 */
	public static function process($content, $config = null)
	{
		$configInstance = \HTMLPurifier_Config::create($config);
		$configInstance->autoFinalize = false;
		$purifier=\HTMLPurifier::instance($configInstance);
		$purifier->config->set('Cache.SerializerPath', \Yii::$app->getRuntimePath());
		return $purifier->purify($content);
	}
}
