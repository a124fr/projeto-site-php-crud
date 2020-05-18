<?php
class Postagem
{
	public static function selecionaTodos()
	{		
		$conn = Connection::getConn();
		
		$sql = "SELECT * FROM postagem ORDER BY id DESC";
		$sql = $conn->query($sql);
		$sql->execute();

		$resultado = array();

		while($row = $sql->fetchObject('Postagem'))
		{
			$resultado[] = $row;
		}
		
		if(!$resultado) 
		{
			throw new Exception('Não foi encontrado nenhum registro no banco');
		}

		return $resultado;
	}

	public static function selecionaPorId($id)
	{
		$conn = Connection::getConn();

		$sql = "SELECT * FROM postagem WHERE id = :id";
		$sql = $conn->prepare($sql);
		$sql->bindValue(':id', $id ,PDO::PARAM_INT);
		$sql->execute();

		$resultado = $sql->fetchObject('Postagem');

		if(!$resultado) {
			throw new Exception('Não foi encontrado nenhum registro no banco!');
		}
		else
		{
			$resultado->comentarios = Comentario::selecionarComentarios($id);
		}


		return $resultado;
	}

	public static function insert($dadosPost)
	{
		if(empty($dadosPost['titulo']) OR empty($dadosPost['conteudo']))
		{
			throw new Exception('Preencha todos os campos');			
		}

		$conn = Connection::getConn();

		$sql = "INSERT INTO postagem (titulo, conteudo) VALUES (:titulo, :conteudo)";

		$sql = $conn->prepare($sql);
		$sql->bindValue(':titulo', $dadosPost['titulo']);
		$sql->bindValue(':conteudo', $dadosPost['conteudo']);
		$resultado = $sql->execute();

		if($resultado == false)
		{
			throw new Exception('Falha ao inserir publicação');			
		}


		return true;
	}

	public static function update($params)
	{
		$conn = Connection::getConn();

		$sql = "UPDATE postagem SET titulo = :titulo, conteudo = :conteudo WHERE id = :id";		
		$sql = $conn->prepare($sql);
		$sql->bindValue(':titulo', $params['titulo']);
		$sql->bindValue(':conteudo', $params['conteudo']);
		$sql->bindValue(':id', $params['id']);
		$sql->execute();

		$resultado = $sql->execute();

		if($resultado == false)
		{
			throw new Exception("Falha ao alterar publicação");
		}

		return true;
	}

	public static function delete($id)
	{
		$conn = Connection::getConn();				
		$sql = "DELETE FROM postagem WHERE id = :id";
		$sql = $conn->prepare($sql);
		$sql->bindValue(':id', $id);
		$resultado = $sql->execute();

		if($resultado == false)
		{
			throw new Exception("Falha ao deletar publicação");
		}

		return true;
	}
}