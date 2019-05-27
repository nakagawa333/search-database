<?php

$db = new mysqli("localhost","root","nakagawa3","website");

if(isset($_GET['search'])){
	$search = $db->escape_string($_GET["search"]);

	$query = $db->query("
		SELECT title,published
		FROM search
		WHERE body LIKE '%{$search}%'
		OR title LIKE '%{$search}%'

		");
		?>


		<div class="result-count">
			Found <?php echo $query->num_rows; ?>results.
		</div>

		<?php
		if($query->num_rows){
			while($r = $query->fetch_object()){
				?>
				<div class="result">
					<a href="#"><?php echo $r->title;?></a>
				</div>
				<?php
			}
		}

}

?>