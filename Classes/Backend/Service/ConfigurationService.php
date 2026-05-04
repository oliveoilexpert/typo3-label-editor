<?php

namespace Amdeu\LabelEditor\Backend\Service;

use Symfony\Component\Translation\Loader\LoaderInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ConfigurationService
{

	public function getLoaderForFile(string $filePath): LoaderInterface
	{
		$loaderClassName = $this->getLoaderClassNameForFormat(pathinfo($filePath, PATHINFO_EXTENSION));
		if (!$loaderClassName || !class_exists($loaderClassName)) {
			throw new \RuntimeException(sprintf('No loader found for file format: %s', $filePath));
		}
		return GeneralUtility::makeInstance($loaderClassName);
	}

	public function getLoaderClassNameForFormat(string $format): string
	{
		return $GLOBALS['TYPO3_CONF_VARS']['LANG']['loader'][$format] ?? '';
	}

	public function getFormatPriority(): string
	{
		return $GLOBALS['TYPO3_CONF_VARS']['LANG']['format']['priority'] ?: 'xlf,yaml,json,php';
	}

	public function setResourceOverride(string $originalPath, string $overridePath): void
	{
		$GLOBALS['TYPO3_CONF_VARS']['LANG']['resourceOverrides'][$originalPath][] = $overridePath;
	}
}