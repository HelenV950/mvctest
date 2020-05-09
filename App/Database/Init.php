<?php
namespace App\Database;
require_once 'create_tables.php';

use App\Components\Model;
use App\Logs\Logger;
use PDO;

class Init
{
    /**
     * $pdo;
     * 
     * @throws \Exception
     */

public function createTablesInit(PDO $pdo)
{
    $pdo = getPDO();
    $tables_path = ROOT. '/App/Database/queries/create/';
    $tables      = [
        'users'             =>  'create_users_table.sql',
        'posts'             =>  'create_posts_table.sql',
     
    ];

    foreach ($tables as $name => $fileName) {
        //writeLog($_SERVER[DOCUMENT_ROOT] . /Logs/log.txt, "[". date("Y-m-d H:i:s") ."]: Start creating {$name} table");
        Logger::start();
       
       
        $query = file_get_contents($tables_path . $fileName);
        $result = $pdo->exec($query);
       
        //writeLog($_SERVER[DOCUMENT_ROOT] . /Logs/log.txt, "[". date("Y-m-d H:i:s") ."]: Finished creating {$name} table.");
        Logger::stop();
        if($result !== 0) {
            //writeLog(DB_LOG_FILE, "[". date("Y-m-d H:i:s") ."]: Error => " . print_r($pdo->errorInfo(), true));
            Logger::write('error' . print_r($pdo->errorInfo()), true, $userdata=true);
        }
    }

}
}


//  try {

//    $pdo = getPDO();
//     createTablesInit($pdo);
// } catch (PDOException $e) {
//     echo '<pre>';
//     echo $e->getFile();
//     echo $e->getCode();
//     echo $e->getMessage();
//     echo '</pre>';
//     die();
// }

//echo '11';