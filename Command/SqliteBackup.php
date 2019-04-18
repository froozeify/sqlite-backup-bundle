<?php
/*
 * This file is part of the sqliteBackupBundle project
 *
 * (c) Benoit VIGNAL <froozeify@mail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Froozeify\SqliteBackupBundle\Command;

use Froozeify\SqliteBackupBundle\Service\SqliteConfigurationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SqliteBackup extends Command {
	protected static $defaultName = "froozeify:sqlite:backup";

	/**
	 * @var SqliteConfigurationService
	 */
	private $sqliteConfigurationService;

	public function __construct(SqliteConfigurationService $sqliteConfigurationService, string $name = null) {
		parent::__construct($name);
		$this->sqliteConfigurationService = $sqliteConfigurationService;
	}

	protected function configure() {
		$this->setDescription("Backup your current SQLite file")
			 ->addArgument("output", InputArgument::OPTIONAL, "The backup output (by default will be in the same folder as the sqlite file, with a bk- prefix)");
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$sqliteFile = $this->sqliteConfigurationService->getSqliteFile();
		$backupFile = $input->getArgument("output") ?? $this->sqliteConfigurationService->getBackupFile();
		if (file_exists($sqliteFile)) {
			$success = copy($sqliteFile, $backupFile);
			if ($success) {
				$output->writeln("<fg=green>File copied to: $backupFile</>");
				return 1;
			} else {
				$output->writeln("<error>Copy failed for $backupFile</error>");
				return 0;
			}
		} else {
			$output->writeln("<error>File not found: $sqliteFile</error>");
			return 0;
		}
	}
}
