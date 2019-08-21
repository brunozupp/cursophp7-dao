<?php  

	class Usuario {

		private $id;
		private $login;
		private $senha;
		private $dtCadastro;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getLogin() {
			return $this->login;
		}

		public function setLogin($login) {
			$this->login = $login;
		}

		public function getSenha() {
			return $this->senha;
		}

		public function setSenha($senha) {
			$this->senha = $senha;
		}

		public function getDtCadastro() {
			return $this->dtCadastro;
		}

		public function setDtCadastro($dtCadastro) {
			$this->dtCadastro = $dtCadastro;
		}

		public function loadById($id) {

			$sql = new Sql();

			// Me retorna um array de arrays, mesmo pedindo um único registro
			$results = $sql->select("SELECT * FROM usuarios WHERE ID = :ID", array(
				":ID"=>$id
			));

			if(count($results) > 0) {

				$row = $results[0];

				$this->setId($row['ID']);
				$this->setLogin($row['login']);
				$this->setSenha($row['senha']);
				$this->setDtCadastro(new DateTime($row['dtCadastro']));
			}
		}

		public function __toString() {

			return json_encode(array(
				"id"=>$this->getId(),
				"login"=>$this->getLogin(),
				"senha"=>$this->getSenha(),
				"dtCadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
			));
		}
	}

?>