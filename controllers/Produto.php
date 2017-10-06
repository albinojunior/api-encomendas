<?php
namespace controllers{

	class Produto{

		private $PDO;
 
		function __construct(){
			$this->PDO = new \PDO('mysql:host=localhost;dbname=api_encomendas', 'root', '');
			$this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION );
		}

		public function list(){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM produto");
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200); 
		}

		public function view($id){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM produto WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200); 
		}
 
		public function new(){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$keys = array_keys($dados);
			$sth = $this->PDO->prepare("INSERT INTO produto (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
			foreach ($dados as $key => $value) {
				$sth ->bindValue(':'.$key,$value);
			}
			$sth->execute();
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
 
			$sth = $this->PDO->prepare("UPDATE produto SET ".implode(',', $sets)." WHERE id = :id");
			$sth ->bindValue(':id',$id);
			foreach ($dados as $key => $value) {
				$sth ->bindValue(':'.$key,$value);
			}
			$app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
		}
 
		public function delete($id){
			global $app;
			$sth = $this->PDO->prepare("DELETE FROM produto WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
		}
	}
}

?>