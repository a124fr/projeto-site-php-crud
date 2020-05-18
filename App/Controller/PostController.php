<?php

class PostController
{
	public function index($params)
	{
		try
		{
			if(!isset($params['id'])) 
				throw new Exception('Error postagem não encontrado!');

			$postagem = Postagem::selecionaPorId($params['id']);

			$loader = new \Twig\Loader\FilesystemLoader('App/View/');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('single.html');

			$parametros = array();
			$parametros['id'] = $postagem->id;
			$parametros['titulo'] = $postagem->titulo;
			$parametros['conteudo'] = $postagem->conteudo;
			$parametros['comentarios'] = $postagem->comentarios;

			$conteudo = $template->render($parametros);
			echo $conteudo;	
							
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function addComent()
	{
		try
		{
			Comentario::inserir($_POST);
			header('Location: index.php?pagina=post&id='.$_POST['id']);
		}
		catch(Exception $e)
		{
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=post&id='.$_POST['id'].'"</script>';
		}
	}
}