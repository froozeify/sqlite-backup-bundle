# Status

This package is currently in the active development.

# Installation

For the moment, no symfony recipes has been created.

You must create a `froozeify_sqlite_backup.yml` in your package config directory (`/config/packages`)

Here is a reference configuration file:

```yaml
froozeify_sqlite_backup:

  # Full path to your original sqlite file
  original_file: '%kernel.project_dir%/var/data.db'
  
  # Full path where the backup of your original file must be saved
  backup_file: '%kernel.project_dir%/var/bk-data.db'
```

# Commands

## Backup your SQLite file

`php bin/console froozeify:sqlite:backup [<output>]`

- `output`: Optional allow you to change you copied file location and name

## Restore your SQLite file

`php bin/console froozeify:sqlite:restore [<input>]`

- `input`: Optional allow you to change you source backup file path

# License

See the [LICENSE](LICENSE.md) file for license rights and limitations (MIT).
