<?php 
	if (isset($_POST['signup-submit'])) {

		require 'dbh.inc.php';

		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];

		if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
			header("Location: ../index.php?singuperror=emptyfields&uid=".$username."&mail=".$email);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../index.php?singuperror=invalidmailuid");
			exit();
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../index.php?singuperror=invalidmail&uid=".$username);
			exit();
		}
		else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../index.php?singuperror=invaliduid&mail=".$email);
			exit();
		}
		else if ($password !== $passwordRepeat) {
			header("Location: ../index.php?singuperror=passwordcheck&uid=".$username."&mail=".$mail);
			exit();
		}
		else{
			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../index.php?singuperror=sqlerror");
			exit();
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if ($resultCheck > 0) {
					header("Location: ../index.php?singuperror=usertaken&mail=".$email);
					exit();
				}
				else {
					$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../index.php?singuperror=sqlerror");
					exit();
					}
					else {
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);
						header("Location: ../index.php?signup=success");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else {
		header("Location: ../index.php");
		exit();
	}