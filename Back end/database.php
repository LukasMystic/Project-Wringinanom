<?php

session_start();
$conn = '';
$stmt = "";

function connectToDB(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'dewi_anom';
    
    try{
        $conn = new mysqli($servername, $username, $password, $dbName);

        if($conn->connect_error){
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    catch(Exception $e){
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}

function closeConnection(){
    $conn = null;
    $stmt = null;
}

function getAllEcomData(){
    $conn = connectToDB();
    $stmt = $conn -> query("SELECT * FROM ecommerce_data");
    $ecoms = [];
    while($ecom = $stmt->fetch_assoc()){
        array_push($ecoms, $ecom);
    }

    closeConnection();
    return $ecoms;
}

function addEcomData($data, $img){
    $conn = connectToDB();
    move_uploaded_file($img['tmp_name'], 'img/' . $img['name']);
    
    $stmt = $conn->prepare("SELECT MAX(id) AS maxNumber FROM ecommerce_data");
    $stmt->execute();
    $stmt->bind_result($maxNumber);

    $stmt->fetch();
    $stmt->close();
    $id = $maxNumber + 1;
    
    $stmt = $conn->prepare("INSERT INTO ecommerce_data (id, gambar, nama, description, link) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $id,
        $img["name"],
        $data["nama"],
        $data["description"],
        $data["link"]
    ]);

    closeConnection();
}

function updateEcomData($data, $img){
    $conn = connectToDB();

    $stmt = $conn->prepare("UPDATE ecommerce_data SET gambar = ?, nama = ?, description = ?, link = ? WHERE id = ?");
    $stmt->execute([
        $img["name"],
        $data["nama"],
        $data["description"],
        $data["link"],
        $data["id"]
    ]);
    
    closeConnection();
    header("Location: dashboard.php");
}

function deleteEcomData(){
    $conn = connectToDB();
    $stmt = $conn->prepare("DELETE FROM ecommerce_data WHERE id = ?");
    $stmt->execute([
        $data["id"]
    ]);
    closeConnection();
}

?>