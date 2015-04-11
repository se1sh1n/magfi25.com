<?php
/*******************************************************************************
    dbsqlite3.php by Allan C. Espiritu
    a CRUD class for SQLite3
    Copyright (c) 2012 IT Ace's Solutions
*******************************************************************************/

class dbsqlite3 {
    const VERSION = "0.0.1";
    private $dbh = NULL;
    private $sth = NULL;
    private $table_name;

    public function __construct( $filename = ':memory:', $table_name = NULL )
    {
        $this->dbh = new PDO('sqlite:' . $filename, 'unused', 'unused', array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        if($table_name) $this->table_name = $table_name;
    }

	// table_name setter/getter
    public function table_name($name = NULL)
    {
        if($name) $this->table_name = $name;
        return $this->table_name;
    }
	
	// sql_query_row( query [, arg[, ...]] )
    // returns one row from fetch
    public function sql_query_row()
    {
        $args = func_get_args();
        if(count($args) < 1) throw new PDOException('sql_query_row - missing query');
        $stmt = $this->dbh->prepare(array_shift($args));
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
	
	// sql_query_all( query [, arg[, ...]] )
    // returns fetchAll result (be careful!)
    public function sql_query_all()
    {
        $args = func_get_args();
        if(count($args) < 1) throw new PDOException('sql_query_all - missing query');
        $stmt = $this->dbh->prepare(array_shift($args));
        $stmt->execute($args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	
	// insert()
    // inserts a CRUD record
    // returns new id value
    public function insert()
    {
		$args = func_get_args();
        if(count($args) < 1) throw new PDOException('sql_query_row - missing query');
        $stmt = $this->dbh->prepare(array_shift($args));
        $stmt->execute($args);
        return $this->dbh->lastInsertId();
    }

    // update(id, rec)
    // updates a CRUD record
    // returns count of rows affected
    public function update()
    {
        $args = func_get_args();
        if(count($args) < 1) throw new PDOException('sql_query_row - missing query');
        $stmt = $this->dbh->prepare(array_shift($args));
        $stmt->execute($args);
    }
}

?>
