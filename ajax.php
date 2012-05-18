<?php if(!defined("mj")){ die(); }
/**
 * This function checks to see if an sqlite3 table exists.
 * @param string $MRusers_sqlite_db Path to the sqlite3 database file.
 * @param string $table_name Name of the table to check for existence.
 * @return boolean Returns TRUE if the table exists and FALSE if it does not.
 */
function sqlite3_table_exists($db_path, $table_name)
{
        $db = new SQLite3($db_path);

        ### check for mrusers table
        $result = $db->query("select name from sqlite_master where type='table' and name='" . $db->escapeString($table_name) . "'");
        $a_result = $result->fetchArray(SQLITE3_ASSOC);
        if(is_array($a_result) && count($a_result) > 0)
        {
                ### the table exists
                $db->close();
                return TRUE;
        }
        else
        {
                ### the table does not exist
                $db->close();
                return FALSE;
        }
}

if(!sqlite3_table_exists("mj", "mj.sqlite3"))
{
	$db->query("create table mj(id integer primary key autoincrement, sessid, start_time text, end_time text, timestamp DATETIME DEFAULT CURRENT_TIMESTAMP)");
}

if($_POST['action'] == "set_time_start")
{
	$db = new SQLite3("mj.sqlite3");
	$start_time = date("U");
	$db->query("insert into mj (sessid, start_time) values ('{$sessid}', '{$start_time}')");
	die();
}
?>
