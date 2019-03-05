
	<?php include 'header.php'; ?>

  <div class="product-page small-11 large-12 columns no-padding small-centered">

		<div class="global-page-container">

		<?php 
			$mealCode = $_GET['prato'];
			
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
				
				$sql = "SELECT * FROM pratos WHERE codigo = '$mealCode'";
				// Guarda o resultado advindo do banco
				$result = $db_connect->query($sql);
				// Se houver resultados advindos do banco
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$mealName = $row['nome'];
						$mealCategory = $row['categoria'];
						$mealDescription = $row['descricao'];
						$mealPrice = $row['preco'];
						$mealCalories = $row['calorias'];
					}

				} else {
					echo 'Não há informações do prato.';
				}
			}
				
		?>

			<!-- Valida se há informações do prato para serem exibidas -->
			<?php if ($mealName != NULL && $mealCode != NULL) { ?>
				<div class="product-section">
					<div class="product-info small-12 large-5 columns no-padding">
						<h3><?php echo $mealName; ?></h3>
						<h4><?php echo $mealCategory; ?></h4>
						<p><?php echo $mealDescription; ?></p>

						<h5><b>Preço: </b>R$ <?php echo $mealPrice; ?></h5>
						<h5><b>Calorias: </b><?php echo $mealCalories; ?></h5>
					</div>
					<div class="product-picture small-12 large-7 columns no-padding">
						<img src="img/cardapio/<?php echo $mealCode; ?>.jpg" alt="<?php echo $mealCode; ?>">
					</div>
				</div>
			<?php } else {
				echo 'Prato não encontrado!' . '<br>';
			}?>

			<div class="go-back small-12 columns no-padding">
				<a href="cardapio.php">
					<< Voltar ao Cardápio</a> 
				</div> 
			</div> 
		</div> 
        <?php include 'footer.php'; ?>
</body>

</html>