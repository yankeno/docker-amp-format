<meta charset="UTF-8" />
<title>テスト</title>
<?php
try {
    # hostには「docker-compose.yml」で指定したコンテナ名を記載
    $dsn = "mysql:host=db;dbname=test;";
    $db = new PDO($dsn, 'phper', 'secret');

    $sql = "SELECT * FROM test";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
