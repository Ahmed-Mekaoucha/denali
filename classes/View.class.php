<?php

class View extends Model {
	
	public function showUsers() {
		return $this->getUsers();
	}

	public function loginUser($loginInfo) {
		return $this->loginUsers($loginInfo);
	}

	public function getUserByEmail($email) {
		return $this->getUsersByEmail($email);
	}

	public function getTokenBySelector($selector) {
		return $this->getToken($selector);
	}

	public function getArticle($lim) {
		return $this->getArticles($lim);
	}

}