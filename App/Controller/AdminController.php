<?php

class AdminController
{
	public function index()
	{	
		$loader = new \Twig\Loader\FilesystemLoader('App/View/');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

		$objPostagens = Postagem::selecionaTodos();

		$parametros = array();
		$parametros['postagens'] = $objPostagens;

		$conteudo = $template->render($parametros);
		echo $conteudo;	
	}

	public function create()
	{
		$loader = new \Twig\Loader\FilesystemLoader('App/View/');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('create.html');

		$conteudo = $template->render();
		echo $conteudo;
	}

	public function insert()
	{
		try
		{
			Postagem::insert($_POST);
			echo '<script>alert("Publicação inserida com sucesso!")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=index"</script>';
		}
		catch(Exception $e)
		{
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=create"</script>';
		}
	}

	public function change($params)
	{
		$loader = new \Twig\Loader\FilesystemLoader('App/View/');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');

		$id = 0;
		if(isset($params['id']))
			$id = $params['id'];

		$post = Postagem::selecionaPorId($id);

		$parametros = array();
		$parametros['id'] = $post->id;
		$parametros['titulo'] = $post->titulo;
		$parametros['conteudo'] = $post->conteudo;

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function update()
	{
		try
		{
			Postagem::update($_POST);

			echo '<script>alert("Publicação alterada com sucesso!")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=index"</script>';
		}
		catch(Exception $e)
		{
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
		}
	}

	public function delete($params)
	{	
		try
		{
			$id = 0;
			if(isset($params['id']))
				$id = $params['id'];
			
			Postagem::delete($id);

			echo '<script>alert("Publicação deletada com sucesso!")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=index"</script>';
		}
		catch(Exception $e)
		{
			echo '<script>alert("'.$e->getMessage().'")</script>';
			echo '<script>window.location.href="http://localhost/projetos-wampp/meusprojetos/projeto-site-php-crud/?pagina=admin&metodo=index"</script>';
		}
	}
}