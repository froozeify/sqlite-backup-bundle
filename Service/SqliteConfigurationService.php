<?php


namespace Froozeify\SqliteBackupBundle\Service;


class SqliteConfigurationService {
	/**
	 * @var string
	 */
	private $sqliteFile;
	/**
	 * @var string
	 */
	private $backupFile;

	public function __construct(string $sqliteFile, string $backupFile) {
		$this->sqliteFile = $sqliteFile;
		$this->backupFile = $backupFile;
	}

	/**
	 * @return string
	 */
	public function getSqliteFile(): string {
		return $this->sqliteFile;
	}

	/**
	 * @return string
	 */
	public function getBackupFile(): string {
		return $this->backupFile;
	}
}
