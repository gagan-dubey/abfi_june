<?php
/**
 * Created by PhpStorm.
 * User: Atul
 * Date: 7/13/2017
 * Time: 4:30 PM
 */
class db_functions{

    protected $con;
    function __construct()
    {
      $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (!$this->con) {
            //die("Connection failed: " . mysqli_connect_error());
        }
        //echo "Connected successfully";
    }

    public function confirm_query($result_set) {
        if (!$result_set) {
            die("Database query failed.");
        }
    }

    public function extract($sql)
    {
        $result = mysqli_query($this->con,$sql);

        return $result;
    }
	
	public function mysql_prep($string) {
		
		$escaped_string = mysqli_real_escape_string($this->con, $string);
		return $escaped_string;
	}
	
	public function fetch_all_states()
	{
		$sql = "select * from abfi_states";
		$all_states = $this->extract($sql);
		return $all_states;
	}
	
	public function state_code_ecrypt( $string) {
    // you may change these values to your own
    $secret_key = 'abfi_sol_secret_key';
    $secret_iv = 'abfi_sol_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	return $output;
}

public function state_code_dcrypt( $string) {
    // you may change these values to your own
    $secret_key = 'abfi_sol_secret_key';
    $secret_iv = 'abfi_sol_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    return $output;
}


}



