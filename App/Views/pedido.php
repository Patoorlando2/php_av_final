<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- SEO -->
		<!-- Fin SEO -->
		<title>Showroom || Tu pedido</title>
		<!-- Estilos CSS -->
		<link rel="stylesheet" href="/css/globals.css" />
		<link rel="stylesheet" href="/css/detalle.page.css" />
        
        <style>
        .cart-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            border-bottom: 1px solid #999;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .cart-table {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            flex-direction: column;
        }

        #miniaturas {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #miniaturas form {
            width: 90%;
            box-sizing: border-box;
            padding: 10px;
            background: #473826ff;
        }
        form .campo {
            display: flex;
            flex-direction: column;
            padding: 10px;
            
        }
        form .campo span {
            color: #999;
            text-transform: uppercase;
        }
        form .campo input,
        form .campo textarea {
            font-size: 18px;
            outline: 0;
            border: 0;
            opacity: 0.9;
        }
        form .campo input:focus,
        form .campo textarea:focus {
            transition: opacity 0.25s;
            opacity: 1;
        }
        form .campo input {
            padding: 10px;
        }
        form .campo.campo-enviar {
            width: 50%;
            margin-right: auto;
            margin-left: auto;
        }
        form .campo.campo-enviar button {
            padding: 15px;
            border: 0;
            outline: 0;
            background: 0;
            border: 1px solid white;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            cursor: pointer;
        }
        </style>

    </head>
	<body>
		<header>
			<a href="#" id="logo">Showroom</a>
			<div id="siteMap">
				<a href="/" class="backLink">Home /</a>
			</div>
		</header>

		<main>
			<h1>Tu Pedido</h1>

			<div id="contenido">
                <div id="texto">

                    <div class="cart-table">

                    <?php foreach ($carrito->items() as $item): ?>
                        <div class="cart-row">
                            <div class="cart-row-image">
                                <img width="150" height="150" src="<?= $item->producto->url_img_principal ?>" alt="" srcset="">
                            </div>
                            <div class="cart-row-title"><?= $item->producto->nombre ?></div>
                            <div class="cart-row-count"><?= $item->cantidad ?></div>
                        </div>
                    <?php endforeach; ?>

                    </div>

                </div>
				<div id="miniaturas">
                    <form action="/pedido/presupuesto" method="POST">
                        <div class="campo">
                            <span>Nombre</span>
                            <input type="text" name="nombre">
                        </div>
                        <div class="campo">
                            <span>Email</span>
                            <input type="text" name="email">
                        </div>
                        <div class="campo campo-enviar">
                            <button>SOLICITAR PRESUPUESTO</button>
                        </div>
                    </form>
				</div>

			</div>
		</main>
	</body>
</html>
