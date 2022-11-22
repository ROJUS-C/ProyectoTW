<?php

class MSQL
{
    protected $connection;
    protected function __construct()
    {
        try {
            $this->connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function query($query)
    {
        try {
            $res = $this->connection->query($query);
            return $res;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function closeConnection()
    {
        $this->connection->close();
    }
}
