<?php 
$pdo = new PDO('mysql:host=localhost;dbname=epcst','root','');
$stmt = $pdo->prepare('SELECT * FROM students');
$query = 'SELECT * FROM students';

if(isset($_GET['first_name'])){
    $query.='Where first_name LIKE "%'.$_GET['first_name'].'%"';
}
if(isset($_GET['limit'])){
    $query.=' LIMIT '.$_GET['limit'];
}
if(isset($_GET['order'])&& isset($_GET['column'])){
    $query.=' ORDER BY '.$_GET['order'].' '.$_GET['column'];
}

$stmt =$pdo->prepare($query);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($students);

?>

