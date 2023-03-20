<?php

class MySQL implements IDB
{
    private $conn;
    
    public function connect(
        string $host = "",
        string $username = "",
        string $password = "",
        string $database = ""
    ): ?static {
        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->connect_error) {
            return null;
        }
        return $this;
    }
    
    public function select(string $query): array {
        $result = $this->conn->query($query);
        if (!$result) {
            return [];
        }
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function insert(string $table, array $data): bool {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($query);
    }
    
    public function update(string $table, int $id, array $data): bool {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key='$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE $table SET $set WHERE id=$id";
        return $this->conn->query($query);
    }
    
    public function delete(string $table, int $id): bool {
        $query = "DELETE FROM $table WHERE id=$id";
        return $this->conn->query($query);
    }
}
?>
