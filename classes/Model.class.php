<?php

class Model extends Dbh {

	protected function setUsers($firstN, $lastN, $email, $userN, $pass) {
		$hashPass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO users(firstName, lastName, email, username, password) VALUES(:firstName, :lastName, :email, :username, :password);';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(['firstName' => $firstN, 'lastName' => $lastN, 'email' => $email, 'username' => $userN, 'password' => $hashPass ]);
	}

	protected function updateUsers($id, $firstN, $lastN, $email, $userN) {
		$sql = 'UPDATE users SET firstName=:firstName, lastName=:lastName, email=:email, username=:username WHERE id=:id;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(['firstName' => $firstN, 'lastName' => $lastN, 'email' => $email, 'username' => $userN, 'id' => $id]);
	}

	public function setProfilePicture($profilePicture, $email) {
		$sql= 'UPDATE users SET profilePicture=:profilePicture WHERE email=:email;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(["profilePicture" => $profilePicture, "email" => $email]);
	}
	
	protected function getUsers() {
		$sql = 'SELECT * FROM users;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function loginUsers($loginInfo) {
		$sql = 'SELECT * FROM users WHERE username=:username OR email=:email;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(["username" => $loginInfo, "email" => $loginInfo]);
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function rmPassRecov($email) {
		$sql = 'DELETE FROM recover_password WHERE email=:email;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(["email" => $email]);
	}

	protected function setToken($selector, $token, $email, $expire) {
		$hash = password_hash($token, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO recover_password(selector, validator, email, expire) VALUES(:selector, :validator, :email, :expire);';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(['selector' => $selector, 'validator' => $hash, 'email' => $email, 'expire' => $expire]);
	}

	protected function getToken($selector) {
		$sql = 'SELECT * FROM recover_password WHERE selector=:selector;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(['selector' => $selector]);
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function getUsersByEmail($email) {
		$sql = 'SELECT * FROM users WHERE email=:email;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(["email" => $email]);
		$result = $stmt->fetchAll();
		return $result;
	}

	protected function updatePassword($email, $password) {
		$sql = 'UPDATE users SET password=:password WHERE email=:email;';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(['password' => $password, 'email' => $email]);
	}
	
	protected function setArticle($author, $title, $article, $categorie, $image) {
		$sql = 'INSERT INTO article(author_id, subject, article, categorie, image) VALUES(:author, :subject, :article, :categorie, :image);';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute(["author" => $author, "subject" => $title, "article" => $article, "categorie" => $categorie, "image" => $image]);
	}

	public function getArticles($lim) {
		$sql = 'SELECT * FROM article ORDER BY id DESC LIMIT '.$lim.';';
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}