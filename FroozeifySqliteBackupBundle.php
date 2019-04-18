<?php
/*
 * This file is part of the sqliteBackupBundle project
 *
 * (c) Benoit VIGNAL <froozeify@mail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Froozeify\SqliteBackupBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FroozeifySqliteBackupBundle extends Bundle {
	public function build(ContainerBuilder $container) {
		parent::build($container);
	}
}
