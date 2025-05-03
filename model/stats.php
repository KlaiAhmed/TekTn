<?php

class Stats
{
    /** @var \PDO */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllCounts(): array
    {
        $tables = [
            'courses'       => 'courses',
            'topics'        => 'topics',
            'users'         => 'users',
            'staff_members'=> 'admin'
        ];

        $counts = [];
        foreach ($tables as $key => $table) {
            $stmt = $this->pdo
                ->query("SELECT COUNT(*) AS cnt FROM `$table`");
            $counts[$key] = (int) $stmt->fetchColumn();
        }

        return $counts;
    }
}
