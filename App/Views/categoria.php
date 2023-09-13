<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- SEO -->
		<!-- Fin SEO -->
		<title>Showroom || Anteojos</title>
		<!-- Estilos CSS -->
		<link rel="stylesheet" href="/css/globals.css" />
		<link rel="stylesheet" href="/css/categoria.page.css" />
	</head>
	<body>
		<header>
			<a href="#" id="logo">Showroom</a>
            <div id="siteMap">
				<div id="siteMap">
					<a href="/" class="backLink">Home /</a>
					<a href="#" class="backLink"  style="color: black;"><?= $categoria->nombre ?></a>
				</div>
            </div>
		</header>

		<main>
			<h1><?= $categoria->nombre ?></h1>

			<div id="items">
                <?php foreach($productos as $prod): ?>
				<div
					class="item"
					style="
						background-image: url(<?= $prod->url_img_principal ?>);
					"
				>
					<a href="/categoria/<?= $categoria->id ?>/producto/<?= $prod->id ?>">
                        <?= $prod->nombre ?>
                    </a>
				</div>
                <?php endforeach; ?>
			</div>
		</main>
	</body>
</html>
