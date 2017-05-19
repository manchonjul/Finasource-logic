<?php

namespace Flinks;

abstract class ConfigReader
{
	/**
	 * @return array
	 * @throws \Exception
	 */
	public static function read()
	{
		static $config;
		
		if (null === $config)
		{
			$file_path = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config.php');

			if (!file_exists($file_path))
			{
				throw new \Exception("Unable to find Flinks config file");
			}

			if (!is_readable($file_path))
			{
				throw new \Exception("Unable to read Flinks config file");
			}

			try
			{
				$config = require_once($file_path);
			}
			catch(\Exception $e)
			{
				throw new \Exception("Unable to load Flinks config file");
			}
		}

		return $config;
	}
}