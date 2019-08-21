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

				$this->setData($results[0]);
			}
		}

		public static function getList() {

			$sql = new Sql();

			return $sql->select("SELECT * FROM usuarios ORDER BY login;");
		}

		public static function search($login) {

			$sql = new Sql();

			return $sql->select("SELECT * FROM usuarios WHERE login LIKE :SEARCH ORDER BY login;", array(
				':SEARCH'=>"%".$login."%"
			));
		}

		public function login($login, $password) {

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password
			));

			if(count($results) > 0) {

				$this->setData($results[0]);

			} else {

				throw new Exception("Login e/ou senha inválidos.");
			}
		}

		public function setData($data) {

			$this->setId($data['ID']);
			$this->setLogin($data['login']);
			$this->setSenha($data['senha']);
			$this->setDtCadastro(new DateTime($data['dtCadastro']));
		}

		public function insert() {

			$sql = new Sql();

			$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
				':LOGIN'=>$this->getLogin(),
				':PASSWORD'=>$this->getSenha()
			));

			if(count($results) > 0) {
				$this->setData($results[0]);
			}
		}

		public function update($login, $password) {

			$this->setLogin($login);
			$this->setSenha($password);

			$sql = new Sql();

			$sql->query("UPDATE usuarios SET login = :LOGIN, senha = :PASSWORD WHERE ID = :ID", array(
				':LOGIN'=>$this->getLogin(),
				':PASSWORD'=>$this->getSenha(),
				':ID'=>$this->getId()
			));
		}

		public function __construct($login = "", $password = "") { // = "" não é obrigatorio passar o parametro
			$this->setLogin("aluno2");
			$this->setSenha("@lun@2");
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