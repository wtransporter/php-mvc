<?php

namespace app\core;

class Database
{
    public \PDO $pdo;
    
    public function __construct(array $config)
    {
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];

        $this->pdo = new \PDO($dsn, $username, $password);
    }

    public function runMigrations()
    {
        $this->createMigrationsTable();
        $newMigrations = [];
        $pastMigrations = $this->executedMigrations();
        $migrations = scandir(ROOT_DIR . 'migrations');
        $migrationsToRun = array_diff($migrations, $pastMigrations);
        foreach ($migrationsToRun as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            include_once ROOT_DIR . 'migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className($this);
            $this->log("Applying migration $className");
            $instance->up();
            $this->log("Applied migration $className");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("No migrations to run.");
        }
    }

    protected function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            migration varchar(255) NOT NULL,
            created_at timestamp DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function executedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function log(string $message)
    {
        echo date('Y-m-d H:s:i') . ' ' . $message . PHP_EOL;
    }

    public function saveMigrations(array $migrations)
    {
        $sql = implode(",", array_map(fn($item) => "('$item')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $sql
        ");
        $statement->execute();
    }
}