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
		<link rel="stylesheet" href="/css/detalle.page.css" />
	</head>
	<body>
		<header>
			<a href="#" id="logo">Showroom</a>
			<div id="siteMap">
				<a href="/" class="backLink">Home /</a>
				<a href="/categoria/<?= $categoria->id ?>" class="backLink"><?= $categoria->nombre ?> /</a>
				<a href="#" class="backLink" style="color: black"
					>
                    <?= $producto->nombre ?>
				</a>
			</div>
		</header>

		<main>
			<h1><?= $producto->nombre ?></h1>

			<div id="contenido">
				<div id="texto">
                <?= $producto->contenido ?>
				</div>
				<div id="miniaturas">
					<div class="imagenes">
						<div
							class="imagen"
							id="img1"
							style="
								background-image: url(<?= $producto->url_img_principal ?>);
							"
						></div>
					</div>

					<h1 class="relacionados_titulo">Acciones</h1>

					<div class="relacionados">
							<a
								class="thumb"
								href="/carrito/agregar/<?= $producto->id ?>"
								style="
									background-image: url(/img/icons/add_to_cart.png);
								"
							></a>

							<a
							class="thumb"
							href="#img1"
							style="
								background-image: url(/img/icons/ig_icon.png);
							"
						></a>

						<a
						class="thumb"
						href="#img1"
						style="
							background-image: url(/img/icons/fb_icon.png);
						"
					></a>
					</div>

				</div>
			</div>
		</main>
	</body>
</html>
