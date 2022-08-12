<?php

require_once ROOT_DIR . '/classes/DotEnv.class.php';
(new DotEnv(__DIR__ . '/../../.env'))->load();

/*
 * Database class, used to connect to the database and execute queries
 */
class Database
{
    protected $conn = null;

    /* initialised when class called */
    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASS');
        $this->db = getenv('DB_NAME');

        /* try to connect to database */
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if (mysqli_connect_errno()) {
                throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /* create a statement / query */
    public function select($query="", $params=array())
    {
        try {
            $statement = $this->exec($query, $params);
            $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            $statement->close(); 

            return $result;

        }catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return false;
    }

    /* execute a query */
    private function exec($query="", $params=array())
    {
        try {
            $statement = $this->conn->prepare($query);

            if (!$statement) {
                throw new Exception("Error: " . $this->conn->error);
            }

            if ($params) {
                $statement->bind_param($params[0], $params[1]);
            }

            $statement->execute();

            return $statement;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>