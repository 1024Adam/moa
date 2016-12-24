<?php
  /* Constructed by the advice of jakebesworth :) */
  /* https://github.com/jakebesworth */
  class Database
  {
    const HOST = 'localhost';
    const USER = 'adam';
    const PASS = 'app135';
    const BASE = 'moa';
    
    private $db;
    private $query;
    private $result;
    private $statement;

    /* Constructor */
    public function __construct()
    {
      $this->db = new mysqli(self::HOST, self::USER, self::PASS, self::BASE);
      if($this->db->connect_error)
      {
        $this->error('Cannot connect to database: ' . $this->db->connect-errno . ' - ' . $this->db->connect_error . '', true);
      }
    }
    
    /* 
     * Perform query
     * $query - query to run
     * $parameters - associative array of parameters for statement
     */
    public function query($query, $parameters = null)
    {
      /* Initial query setup
      **/
      if(empty($this->query) || $this->query !== $query)
      {
        $this->query = $query;
        $this->statement = $this->db->prepare($this->query);
      }

      if(!empty($parameters))
      {
        call_user_func_array(array($this->statement, 'bind_param'), $parameters);
      }
      /**/

      if(empty($this->statement))
      {
        $this->error("Invalid SQL with query: $query");
      }
      else
      {
        $this->statement->execute();
      }
    }

    /*
     * Fetch results from a database query
     * Return array of records
     */
    public function fetch()
    {
      $this->result = array();
      $result = $this->statement->get_result();

      if(!empty($result))
      {
        while($record = $result->fetch_array(MYSQLI_ASSOC))
        {
          $this->result[] = $record;
        }
      }

      if(empty($this->result))
      {
        /* Note that this happens also if table is empty */
        $this->error("There was an error fetching query {$this->query}, query returned empty results");
      }

      return $this->result;
    }

    /*
     * Logs and deals with database warnings and errors
     * $text - Log text
     * $die - True for fatal, false for warning
     */
    private function error($text, $die = false)
    {
      $level = ($die ? 'Fatal' : 'Warning');
      error_log(date('[Y-m-d H:i:s]') . " $level: $text\n", 0);

      if($die)
      {
        die();
      }
    }
    
    /* Close our database connection */
    public function __destruct()
    {
      if(isset($this->db))
      {
        mysqli_close($this->db);
      }
    }
  } 

?>
