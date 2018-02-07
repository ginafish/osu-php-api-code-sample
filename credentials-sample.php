<?php
Class dbConnection {
    var $dbhost = 'oniddb.cws.oregonstate.edu';
    var $dbname = 'db';
    var $dbuser = 'db';
    var $dbpass = 'pass';
    var $connection;

    function getConnection() {
        $mysql_handle = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname)
        or die("Error connecting to database server");

        if(mysqli_connect_errno()) {
            printf("Connection failed.");
            exit();
        }
        $this->connection = $mysql_handle;
        return $this->connection;
    }

    function closeConnection() {
        mysqli_close($this->connection);
    }
}

?>