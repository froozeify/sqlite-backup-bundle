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

class SqliteRestore extends Command {
	protected static $defaultName = "froozeify:sqlite:restore";

	/**
	 * @var SqliteConfigurationService
	 */
	private $sqliteConfigurationService;

	public function __construct(SqliteConfigurationService $sqliteConfigurationService, string $name = null) {
		parent::__construct($name);
		$this->sqliteConfigurationService = $sqliteConfigurationService;
	}

	protected function configure() {
		$this->setDescription("Restore your old SQLite file")
			 ->addArgument("input", InputArgument::OPTIONAL, "The backup file to restore");
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$sqliteFile = $this->sqliteConfigurationService->getSqliteFile();
		$backupFile = $input->getArgument("input") ?? $this->sqliteConfigurationService->getBackupFile();
		if (file_exists($backupFile)) {
			$success = copy($backupFile, $sqliteFile);
			if ($success) {
				$output->writeln("<fg=green>File copied to: $sqliteFile</>");
				return 1;
			} else {
				$output->writeln("<error>Copy failed for $sqliteFile</error>");
				return 0;
			}
		} else {
			$output->writeln("<error>File not found: $backupFile</error>");
			return 0;
		}
	}
}
