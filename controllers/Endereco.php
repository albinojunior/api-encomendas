<?php
namespace controllers{

	class Endereco{

		private $PDO;
 
		function __construct(){
			$this->PDO = new \PDO('mysql:host=localhost;dbname=api_encomendas', 'root', '');
			$this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION );
		}

		public function list(){
			global $app;
			$query = $this->PDO->prepare("SELECT * FROM endereco");
			$query->execute();
			$result = $query->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200); 
		}

		public function view($id){
			global $app;
			$query = $this->PDO->prepare("SELECT * FROM endereco WHERE id = :id");
			$query ->bindValue(':id',$id);
			$query->execute();
			$result = $query->fetch(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200); 
		}
 
		public function new(){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$keys = array_keys($dados);
			$query = $this->PDO->prepare("INSERT INTO endereco (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
			foreach ($dados as $key => $value) {
				$query ->bindValue(':'.$key,$value);
			}
			$query->execute();
			$app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
		}
 
		public function update($id){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$sets = [];
			foreach ($dados as $key => $VALUES) {
				$sets[] = $key." = :".$key;
			}
 
			$query = $this->PDO->prepare("UPDATE endereco SET ".implode(',', $sets)." WHERE id = :id");
			$query ->bindValue(':id',$id);
			foreach ($dados as $key => $value) {
				$query ->bindValue(':'.$key,$value);
			}
			$app->render('default.php',["data"=>['status'=>$query->execute()==1]],200);
		}
 
		public function delete($id){
			global $app;
			$query = $this->PDO->prepare("DELETE FROM endereco WHERE id = :id");
			$query ->bindValue(':id',$id);
			$app->render('default.php',["data"=>['status'=>$query->execute()==1]],200);
		}
	}
}

?>