<?php

class Comentario 
{
	public static function selecionarComentarios($idPost)
	{
		$conn = Connection::getConn();

		$sql = "SELECT * FROM comentario WHERE id_postagem = :id";
		$sql = $conn->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = array();
		while($row = $sql->fetchObject('Comentario'))
		{
			$resultado[] = $row;
		}

		return $resultado;
	}

	public static function inserir($reqPost)
	{
		$conn = Connection::getConn();

		$sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nome, :msg, :id_postagem)";
		$sql = $conn->prepare($sql);
		$sql->bindValue(':nome', $reqPost['nome']);
		$sql->bindValue(':msg', $reqPost['msg']);
		$sql->bindValue(':id_postagem', $reqPost['id'], PDO::PARAM_INT);
		$resultado = $sql->execute();

		if($sql->rowCount())
		{
			return true;				
		}

		throw new Exception('Falha ao inserir comentário');
	}
}