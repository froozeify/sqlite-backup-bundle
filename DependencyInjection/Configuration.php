<?php
/*
 * This file is part of the sqliteBackupBundle project
 *
 * (c) Benoit VIGNAL <froozeify@mail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Froozeify\SqliteBackupBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder();
		$treeBuilder->root('froozeify_sqlite_backup')->end();

		$treeBuilder->getRootNode()
			->children()
				->scalarNode('original_file')
					->isRequired()
					->end()
				->scalarNode('backup_file')
					->isRequired()
					->end()
			->end()
		;
		return $treeBuilder;
	}
}
