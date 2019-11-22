<?php
    require_once 'core/settings.php';

    // Additional constants
    // define('DB_HOST', 'localhost');
    define('DB_TABLE_VERSIONS', 'versions');

    function getDB(){

        require_once CORE_PATH.'/db.params.php';
        require_once CORE_PATH.'/db.class.php';

        $db_params = [
            'user' => DB_USER,
            'pass' => DB_PASS,
            'db' => DB_NAME,
        ];

        return new SafeMySQL($db_params);
    }

    // // Connect
    // function connectDB() {
    //     $errorMessage = 'Can\'t connect to the DB';
    //     $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
    //     if (!$conn)
    //         throw new Exception($errorMessage);
    //     else {
            
    //         return $conn;

    //         // $query = $conn->query('set names utf8');
            
    //         // if (!$query)
    //         //     throw new Exception($errorMessage);
    //         // else
    //         //     return $conn;
    //     }
    // }
    
    function getMigrationFiles($db) {

        $sqlFolder = str_replace('\\', '/', realpath(dirname(__FILE__)) . '/'.'core/migrations/');
        $allFiles = glob($sqlFolder . '*.sql');

        // Check versions table
        // Also, it means, that DB is not empty (filled after firest migration)
        $query = sprintf('show tables from `%s` like "%s"', DB_NAME, DB_TABLE_VERSIONS);
        
        // $data = $conn->query($query);
        $data = $db->getAll($query);

        // $firstMigration = !$data->num_rows;
        $firstMigration = false;
        if (count($data) == 0) {
            $firstMigration = true;
        }
        
        if ($firstMigration) {
            return $allFiles;
        }

        $versionsFiles = array();
        
        // Get all existing names in DB
        $query = sprintf('select `name` from `%s`', DB_TABLE_VERSIONS);
        
        // $data = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        $data = $db->getAll($query);
        
        // Push into array $versionsFiles
        foreach ($data as $row) {
            array_push($versionsFiles, $sqlFolder . $row['name']);
        }
    
        // Return differ versions
        return array_diff($allFiles, $versionsFiles);
    }
    
    // function migrate($conn, $file) {
    //     // Form sql-command from external file
    //     $command = sprintf('mysql -u%s -p%s -h %s -D %s < %s', DB_USER, DB_PASS, DB_HOST, DB_NAME, $file);    
        
    //     // Execute shell
    //     shell_exec($command);
    
    //     // Get filename except for path
    //     $baseName = basename($file);

    //     // Query to add migration to the versions
    //     $query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_VERSIONS, $baseName);
    //     $conn->query($query);
    // }
    
    function migrate($db, $file) {

        $myfile = fopen($file, "r") or die("Unable to open file!");
        $query = fread($myfile, filesize($file));
        fclose($myfile);

        $db->query($query);

        // Get filename except for path
        $baseName = basename($file);

        // Query to add migration to the versions
        $query = sprintf('insert into `%s` (`name`) values("%s")', DB_TABLE_VERSIONS, $baseName);
        $db->query($query);
    }
    
    // Start
    
    // $conn = connectDB();
    $db = getDB();
    $files = getMigrationFiles($db);

    // Check new migrations
    if (empty($files)) {
        echo 'DB in actual state :)';
    } else {
        echo 'Start migration...<br><br>';
    
        foreach ($files as $file) {
            echo basename($file) . '<br>';
            migrate($db, $file);
        }
    
        echo '<br>Migration complete.';    
    }
?>