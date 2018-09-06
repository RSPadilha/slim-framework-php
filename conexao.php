<?php
	// TODO put everything inside its function
	$db = "mysql:host=localhost;dbname=slim";
	$user = "root";
	$pwd ="";
	$conn = new PDO($db, $user, $pwd);

	// INSERT
	$insert = $conn->prepare("INSERT INTO users (name, cpf, password) VALUES (?, ?, ?)");
	$insert->bindValue(1, "ricardo");
	$insert->bindValue(2, "03337437095");
	// 256 bits, 64 characters, password pre-salted
	$insert->bindValue(3, hash("sha256", "slim-senac" . "senha")); 
	$insert->execute();

	// DELETE
	$delete = $conn->prepare("DELETE FROM users WHERE id = :id ");
	$delete->bindValue(":id", 1); 
	// $delete->execute();

	// TODO UPDATE (what?)
	$update = $conn->prepare("UPDATE users SET x = ? WHERE condition");
	$update->bindValue(1, "y");
	$update->execute();

	// TODO LOGIN return true if user and password are correct, checking with the hash


	// SHOW
	foreach($conn->query("SELECT * FROM users") as $row) {
		print $row["id"] . " ";
		print $row["name"] . " ";
		print $row["cpf"] . " ";
		print $row["password"] . "<br>";
	}
?>