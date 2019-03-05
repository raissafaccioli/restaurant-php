<?php include 'header.php'; ?>

<div class="cardapio-list small-11 large-12 columns no-padding small-centered">

	<div class="global-page-container">
		<div class="cardapio-title small-12 columns no-padding">
			<h3>Cardapio</h3>
			<hr>
			</hr>
		</div>

		<?php
			$server = 'localhost';
			$user = 'root';
			$password = '';
			$db_name = 'restaurante';
			$port = '3306';

			$db_connect = new mysqli($server,$user,$password,$db_name,$port);
			// O comando abaixo insere os dados com acentos corretos.
			mysqli_set_charset($db_connect,"utf8");

			if ($db_connect->connect_error) {
					echo 'Falha: ' . $db_connect->connect_error;
			} else {
					// echo 'Conexão feita com sucesso' . '<br><br>';
					
					$sql = "SELECT DISTINCT categoria FROM pratos";
					// Keep the results from the database 
					$result = $db_connect->query($sql);
					// Check if there are results from the database
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							
							$category = $row['categoria']; ?>

							<div class="category-slider small-12 columns no-padding">
								<h4><?php echo $category; ?></h4>
								<div class="slider-cardapio">
									<div class="slider-002 small-12 small-centered columns">

										<?php
											$mealSql = "SELECT * FROM pratos WHERE categoria = '$category'";
											// Keep the results from the database 
											$mealResult = $db_connect->query($mealSql);
											// Check if there are results from the database
											if ($mealResult->num_rows > 0) {
												while($meal = $mealResult->fetch_assoc()) { ?>
													
													<div class="cardapio-item-outer bounce-hover small-10 medium-4 columns">
														<div class="cardapio-item">
															<a href="prato.php?prato=<?php echo $meal['codigo']; ?>">
																<div class="item-image">
																	<img src="img/cardapio/<?php echo $meal['codigo']; ?>.jpg" alt="<?php echo $meal['codigo']; ?>" />
																</div>
																<div class="item-info">
																	<div class="title"><?php echo $meal['nome']; ?></div>
																</div>
																<div class="gradient-filter">
																</div>
															</a>
														</div>
													</div>
												<?php }
											}
										?>
									</div>
								</div>
							</div>

						<?php }

					} else {
						echo 'Não há pratos para serem exibidos.';
					}
			}
		?>
	</div>
</div>

<?php include 'footer.php'; ?>

</body>

</html>