<footer id="footer" class="small-12 columns no-padding">

	<div class="global-page-container">

		<div class="small-11 small-centered large-12 columns footer-section">

			<div class="follow-us small-5 medium-3 small-offset-1 medium-offset-0 columns">
				<h4 class="footer-section-title">Siga-nos</h4>
				<a href="http://www.facebook.com"><img src="img/social-icons/facebook.svg" alt="facebook-icon"></a>
				<a href="http://www.twitter.com"><img src="img/social-icons/twitter.svg" alt="facebook-icon"></a>
				<a href="http://www.instagram.com"><img src="img/social-icons/instagram.svg" alt="facebook-icon"></a>
			</div>

			<div class="contato small-5 medium-3 small-offset-1 medium-offset-0 columns">
				<h4 class="footer-section-title">Contato</h4>
				<p>
					Rua Nossa senhora de Copacabana, 400<br>
					Rio de Janeiro/RJ<br>
					T. 2245-0977<br>
					<a href="mailto:contato@restobar.com.br">contato@restobar.com.br</a>
				</p>
			</div>

			<div class="horario small-5 medium-3 small-offset-1 medium-offset-0 columns">
				<h4 class="footer-section-title">Horários</h4>

				<?php
					$currentWeekDay = date('w'); 
					$now = strtotime('now');
					$sunrise = strtotime('today');
					$currentHour = $now - $sunrise;

					if ($currentWeekDay >= 1 && $currentWeekDay <= 6) {
						if ($currentHour < 41400) {
							$message = '(Fechado agora)';
							$classMessage = 'horario-fechado';
						} else {
							$message = '(Aberto agora)';
							$classMessage = 'horario-aberto';
						}
					} elseif ($currentWeekDay == 0) {
						if ($currentHour > 7200 && $currentHour < 41400) {
							$message = '(Fechado agora)';
							$classMessage = 'horario-fechado';
						} elseif ($currentHour > 64800) {
							$message = '(Fechado agora)';
							$classMessage = 'horario-fechado';
						} else {
							$message = '(Aberto agora)';
							$classMessage = 'horario-aberto';
						}
					}
				?>	

				<p><span class="<?php echo $classMessage; ?>"> 
						<?php echo $message; ?> 
					</span>
					<br>
					Seg-Sex: 11h30 - 24h00<br>
					Sábado 11h30 - 02h00<br>
					Domingo 11h30 - 18h
				</p>
			</div>

			<div class="como-chegar small-5 medium-3 small-offset-1 medium-offset-0 columns">
				<h4 class="footer-section-title">Como chegar</h4>
				<div id="map"></div>
			</div>

			<hr>
			</hr>

			<div class="copyright small-12 columns">
				<?php $currentYear = date("Y"); ?>
				<?php echo $currentYear; ?> &copy; Todos os direitos reservados

			</div>
		</div>

	</div>

	</footer>


	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/slick.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
		function initMap() {
			var local = { lat: -22.971068, lng: -43.186851 };
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: local,
				styles:
					[
						{
							"featureType": "administrative",
							"elementType": "geometry",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "poi",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "road",
							"elementType": "labels.icon",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "transit",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						}
					]

			});
			var marker = new google.maps.Marker({
				position: local,
				map: map
			});
		}
	</script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlo2Bml6zmqP1_xtT3aLybZdWZNP7l8CM&callback=initMap">
		</script>
	<script>
		$(document).foundation();
	</script>
