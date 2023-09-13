<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- SEO -->
		<!-- Fin SEO -->
		<title>Showroom</title>
		<!-- Estilos CSS -->
		<link rel="stylesheet" href="/css/globals.css" />
		<link rel="stylesheet" href="/css/index.css">
	</head>
	<body>
		<header style="background-image: url(/img/banner.jpg.webp)">
			<nav>
				<a href="#" id="logo">Showroom</a>
				<a href="#menu" class="mobile_button">
					<i style="background-image: url(/icons/mobile_menu.png);" class="mobile_button_icon">
					</i>
				</a>
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li>
						<a href="#categorias" class="js-scroll-trigger"
							>Catálogo</a
						>
					</li>
					<li>
						<a href="#empresa" class="js-scroll-trigger"
							>Sobre nosotros</a
						>
					</li>
					<li>
						<a href="#contacto" class="js-scroll-trigger"
							>Contacto</a
						>
					</li>
                    <li>
						<a href="/pedido" class="js-scroll-trigger"
							>Tu Pedido</a
						>
					</li>
				</ul>
			</nav>
		</header>

		<section id="categorias">
			<h1>Catálogo</h1>

			<div id="catalogo">
                <?php 
                $pattern = ['l', 's', 's', 'l'];
                $currentIndex = 0;
                foreach ($categorias as $i => $cat): ?>
                    <div
                        class="cat-item cat-item-<?= $pattern[$currentIndex] ?>"
                        style="background-image: url(<?php echo $cat->url_imagen ?>)"
                    >
                        <a href="/categoria/<?= $cat->id ?>">
                            <?php echo $cat->nombre ?>
                        </a>
                    </div>
                <?php 
                    if($currentIndex == (count($pattern) - 1)):
                        $currentIndex = 0;
                    else:
                        $currentIndex += 1;
                    endif;

                endforeach; 
                ?>
			</div>
		</section>

		<section id="empresa">
			<div>
                <h1>Sobre nosotros</h1>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro
				aliquam praesentium quo ratione cumque nesciunt natus quia quos
				neque! Dolorem rerum minima, numquam vel eos error est quis.
				Laboriosam, ipsum. Suscipit nam laudantium odio, possimus a rem
				aliquam perspiciatis vel similique beatae qui accusamus, laborum
				iusto repellendus cum eligendi veritatis molestiae eaque?
				Dignissimos at rem beatae laudantium molestiae molestias
				recusandae. Dolor suscipit necessitatibus dolorum corrupti
				nulla? Dolorum, aut deleniti? Totam molestiae excepturi velit?
				Quisquam dignissimos rem nobis? Repellendus fuga magnam dicta
				deserunt eaque vel optio veritatis eligendi, commodi explicabo
				amet. Dolores dolor numquam sint eligendi, veritatis soluta
				perspiciatis itaque ratione placeat architecto, ducimus deleniti
				provident vel voluptatibus praesentium consequatur iste. Soluta,
				possimus. Nihil tempora quisquam quam non delectus corporis aut!
				Id cum repellendus vero dignissimos tenetur nisi nemo delectus
				enim ipsum soluta, fugiat velit at est quaerat, fugit beatae
				eligendi, magnam necessitatibus doloribus similique! Cumque, qui
				rem. Ex, esse laboriosam.

                <h1>Nuestros valores</h1>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro
				aliquam praesentium quo ratione cumque nesciunt natus quia quos
				neque! Dolorem rerum minima, numquam vel eos error est quis.
				Laboriosam, ipsum. Suscipit nam laudantium odio, possimus a rem
				aliquam perspiciatis vel similique beatae qui accusamus, laborum
				iusto repellendus cum eligendi veritatis molestiae eaque?
				Dignissimos at rem beatae laudantium molestiae molestias
				recusandae. Dolor suscipit necessitatibus dolorum corrupti
				nulla? Dolorum, aut deleniti? Totam molestiae excepturi velit?
				Quisquam dignissimos rem nobis? Repellendus fuga magnam dicta
				deserunt eaque vel optio veritatis eligendi, commodi explicabo
				amet. Dolores dolor numquam sint eligendi, veritatis soluta
				perspiciatis itaque ratione placeat architecto, ducimus deleniti
				provident vel voluptatibus praesentium consequatur iste. Soluta,
				possimus. Nihil tempora quisquam quam non delectus corporis aut!
				Id cum repellendus vero dignissimos tenetur nisi nemo delectus
				enim ipsum soluta, fugiat velit at est quaerat, fugit beatae
				eligendi, magnam necessitatibus doloribus similique! Cumque, qui
				rem. Ex, esse laboriosam.
            </div>
			<div
                id="imagen"
				style="
					background-image: url(/img/Remeras/christian-bolt-VW5VjskNXZ8-unsplash.jpg.webp);
				"
			></div>
		</section>

		<section id="contacto">
				<form action="">
					<h1>Contacto</h1>
					<div class="campo">
						<span>Nombre</span>
						<input type="text">
					</div>
					<div class="campo">
						<span>Email</span>
						<input type="text">
					</div>
					<div class="campo">
						<span>Telefono</span>
						<input type="text">
					</div>
					<div class="campo">
						<span>Localidad</span>
						<input type="text">
					</div>
					<div class="campo">
						<span>Comentario</span>
						<textarea name="" id="" cols="30" rows="7"></textarea>
					</div>
					<div class="campo campo-enviar">
						<button>ENVIAR FORMULARIO</button>
					</div>
				</form>
				<div id="mapa">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.068715758411!2d-58.37805708502725!3d-34.60242386493605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacc4710ca73%3A0xd97e897c4650d172!2sLavalle%20648%2C%20C1047AAN%20CABA!5e0!3m2!1ses!2sar!4v1615125418274!5m2!1ses!2sar" allowfullscreen="" loading="lazy"></iframe>
				</div>
        </section>

		<footer>
			<div id="social">
				<a href="#">
					<i class="social-icon" 
					style="background-image: url(/icons/fb_icon.png);"></i>
				</a>
				<a href="#">
					<i class="social-icon" 
					style="background-image: url(/icons/ig_icon.png);"></i>
				</a>
				<a href="#">
					<i class="social-icon" 
					style="background-image: url(/icons/ln_icon.png);"></i>
				</a>
			</div>
			<div id="copy">
				&copy; Todos los derechos reservados
			</div>
		</footer>

		<script src="/js/jquery-3.5.1.min.js"></script>
		<script src="/js/jquery.easing.min.js"></script>
		<script src="/js/scrolling-nav.js"></script>
	</body>
</html>
