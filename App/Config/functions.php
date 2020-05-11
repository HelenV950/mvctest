<?php

use App\Logs\Logger;

function site_redirect($path = '')
{
    header("Location: " . SITE_URL . "/" . $path);
}



function getPDO(): PDO
{
    return new PDO('mysql:host=localhost;dbname=mvc', "root", '');
}


try {

    $pdo = getPDO();
    createTablesInit($pdo);
} catch (PDOException $e) {
    echo '<pre>';
    echo $e->getFile();
    echo $e->getCode();
    echo $e->getMessage();
    echo '</pre>';
    die();
}

function createTablesInit(PDO $pdo)
{
    $pdo = getPDO();
    $tables_path = ROOT . '/App/Database/queries/create/';
    $tables      = [
        'users'             =>  'create_users_table.sql',
        'posts'             =>  'create_posts_table.sql',

    ];

    foreach ($tables as $name => $fileName) {
        Logger::start();

        $query = file_get_contents($tables_path . $fileName);
        $result = $pdo->exec($query);

        Logger::stop();
        if ($result !== 0) {
            Logger::write('error' . print_r($pdo->errorInfo()), true, $userdata = true);
        }
    }
}



function show_alert()
{
    if (isset($_SESSION['notification'])) {
?>
        <div class="alert alert-<?php echo $_SESSION['notification']['type']; ?>" style="text-align: center ; z-index: 9999;">
            <?php echo $_SESSION['notification']['message']; ?>
        </div>

<?php
        unset($_SESSION['notification']);
    }
}
