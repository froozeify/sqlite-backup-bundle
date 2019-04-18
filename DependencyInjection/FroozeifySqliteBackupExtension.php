<?php
/*
 * This file is part of the sqliteBackupBundle project
 *
 * (c) Benoit VIGNAL <froozeify@mail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Froozeify\SqliteBackupBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * https://symfony.com/doc/current/bundles/configuration.html
 * https://symfony.com/doc/current/bundles/extension.html
 * https://github.com/tsantos84/serializer-bundle/blob/master/composer.json
 *
 * https://johannespichler.com/developing-composer-packages-locally/
 *
 * https://www.youtube.com/watch?v=sNmpddaseK8
 */

class FroozeifySqliteBackupExtension extends Extension {
	public function load(array $configs, ContainerBuilder $container) {
		$loader = new YamlFileLoader(
			$container,
			new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yaml');

		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		$container->setParameter('froozeify.sqlite_backup.original_file', $config['original_file']);
		$container->setParameter('froozeify.sqlite_backup.backup_file', $config['backup_file']);
	}
}
