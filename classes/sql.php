<?php



class sql
{

    public mysqli $conn;

    public function __construct()
    {
        // deze code wprdt ma eem mew uitgevoerd
        $this->connect_db();
    }

    private function connect_db() : bool {
        $this->conn = new mysqli("localhost","bijles-user","bijles-password","bijles-db");
        return true;
    }

    public function get_users() : array {
        $result = false;
        $rows = [];

        $sql = "SELECT * FROM `user`";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()) {
            $r = $stmt->get_result();
            while($row = $r->fetch_object()) {
              array_push($rows,$row);
            }
        }
        return $rows;
    }

    /***
     * @param string $username
     * @param object|null $user
     * @return bool
     * Function to check if user exists
     */
    public function user_exists(string $username, object &$user=null) : bool
    {
        $retval = false;
        $sql = "SELECT * FROM `user` WHERE `username` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s",$username);
        if($stmt->execute()) {
            // haal result op uit prep_statement
            $result = $stmt->get_result();
            // stel de pointer in op de gevonden user
            $user = $result->fetch_object();
            // Aan rijen >= 1 ? result = true
            $retval = ($result->num_rows >= 1);
        }
        return $retval;
    }

    public function user_create(string $username,string $password) : bool
    {
        $retval = false;
        $sql = "INSERT INTO `user` (`username`,`password`) VALUES (?,?)";
        $stmt = $this->conn->prepare($sql);
        $hp = password_hash($password,PASSWORD_DEFAULT);
        $stmt->bind_param("ss",$username,$hp);
        if($stmt->execute()) {
            //echo $stmt->insert_id; // ff testen
            $retval = true;
        }
        return $retval;
    }

    /***
     * @param string $username
     * @param string $password
     * @return bool
     * This function check if user and password are correct
     */
    public function user_check(string $username,string $password) : bool {
        $retval = false;
        $founduser = null;

        if($this->user_exists($username,$founduser)) {
            if(password_verify($password,$founduser->password)) {
                $retval = true;
            }
        }
        return $retval;
    }

}