<?php

class Controller extends Model {
	public function newUser($firstN, $lastN, $email, $userN, $pass) {
		$this->setUsers($firstN, $lastN, $email, $userN, $pass);
	}

	public function updUser($id, $firstN, $lastN, $email, $userN) {
		$this->updateUsers($id, $firstN, $lastN, $email, $userN);
	}

	public function rmvPassRcv($email) {
		$this->rmPassRecov($email);
	}

	public function setingToken($selector, $token, $email, $expire) {
		$this->setToken($selector, $token, $email, $expire);
	}

	public function newPass($email, $password) {
		$this->updatePassword($email, $password);
	}

	public function pubArticle($author, $title, $article, $categorie, $image) {
		$this->setArticle($author, $title, $article, $categorie, $image);
	}

}