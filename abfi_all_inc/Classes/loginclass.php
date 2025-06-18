<?php
/**
 * Created by PhpStorm.
 * User: Atul
 * Date: 7/13/2017
 * Time: 5:01 PM
 */
class loginclass extends db_functions
{

    public function find_admin_by_id($admin_id) {

        $safe_admin_id = mysqli_real_escape_string($this->con, $admin_id);

        $query  = "SELECT * ";
        $query .= "FROM abfi_login ";
        $query .= "WHERE id = {$safe_admin_id} ";
        $query .= "LIMIT 1";
        $admin_set = mysqli_query($this->con, $query);
        $this->confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set)) {
            return $admin;
        } else {
            return null;
        }
    }

    public function find_admin_by_username($username) {

        $safe_username = mysqli_real_escape_string($this->con, $username);

        $query  = "SELECT * ";
        $query .= "FROM abfi_login ";
        $query .= "WHERE abfi_username = '{$safe_username}' ";
        $query .= "LIMIT 1";
        $admin_set = mysqli_query($this->con, $query);
        $this->confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set)) {
            return $admin;
        } else {
            return null;
        }
    }
	
	 public function find_sadmin_by_id($admin_id) {

        $safe_admin_id = mysqli_real_escape_string($this->con, $admin_id);

        $query  = "SELECT * ";
        $query .= "FROM abfi_adm_log ";
        $query .= "WHERE id = {$safe_admin_id} ";
        $query .= "LIMIT 1";
        $admin_set = mysqli_query($this->con, $query);
        $this->confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set)) {
            return $admin;
        } else {
            return null;
        }
    }

    public function find_sadmin_by_username($username) {

        $safe_username = mysqli_real_escape_string($this->con, $username);

        $query  = "SELECT * ";
        $query .= "FROM abfi_adm_log ";
        $query .= "WHERE abf_uname = '{$safe_username}' ";
        $query .= "LIMIT 1";
        $admin_set = mysqli_query($this->con, $query);
        $this->confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set)) {
            return $admin;
        } else {
            return null;
        }
    }

    public function password_check($password, $existing_hash) {
        // existing hash contains format and salt at start
        $hash = crypt($password, $existing_hash);
        if ($hash === $existing_hash) {
            return true;
        } else {
            return false;
        }
    }
    public function password_checks($password, $existing_hash) {
        // existing hash contains format and salt at start
        $hash = crypt($password, $password);
        if ($hash === $existing_hash) {
            return true;
        } else {
            return false;
        }
    }

    public function attempt_login($username, $password) {
        $admin = $this->find_admin_by_username($username);
        if ($admin) {
            // found admin, now check password
            if ($this->password_check($password, $admin["abfi_passw"])) {
                // password matches
                return $admin;
            } else {
                // password does not match
                return false;
            }
        } else {
            // admin not found
            return false;
        }
    }
	
	 public function attempt_slogin($username, $password) {
        $admin = $this->find_sadmin_by_username($username);
        if ($admin) {
            // found admin, now check password
            if ($this->password_checks($password, $admin["abf_passw"])) {
                // password matches
                return $admin;
            } else {
                // password does not match
                return false;
            }
        } else {
            // admin not found
            return false;
        }
    }

}