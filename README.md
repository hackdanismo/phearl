# phearl
A PHP Framework for building applications, websites and APIs. Released under the MIT Licence.

## Connect to the Database
Credentials for the database can be found in the `config/config.php` configuration file. This file will contain the details for the `host`, `username`, `password` and `database name` to connect to the database.

```php
const DB_HOSTNAME = "";
const DB_USERNAME = "";
const DB_PASSWORD = "";
const DB_DATABASE = "";
```

We can pass these credentials when creating a new instance of the Database, instead of using the configuration file:

```php
$database = new Database("localhost", "databaseName", "username", "password");
```

If we don't provide any parameters, the constructor in the `Database` class will fall back to using the constants (`DB_HOSTNAME`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) from the configuration file.

The connection to the database is handled by the `Database` class found in the `core/database.php` file. This is how we connect to the database using the credentials in the configuration file - `config/config.php`.

```php
// Instantiate the Database class
$database = new Database();
// Connect to the database
$database->connect();
```

A variable can be used to store the database connection, if preferred:

```php
// Instantiate the Database class
$database = new Database();
// Connect to the database
$conn = $database->connect();
```