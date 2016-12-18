<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Robin Kurtz | Behance API</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/personal-website/assets/css/style.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
	<div class="site">
		<main class="main" role="main" name="form">
			<div class="row">
				<div class="column content align-center">

					<div id="loader">
						<div class="icon-font icon-spin2 animate-spin" style="font-size: 400%"></div>
						<br/>
						<h3>Fetching data...</h3>
					</div>

					<div id="loaded" style="display: none;">

						<?php

						$user = 'robinwkurtz';
						$user_id = 'Jfh0WmUQrqTOkbQiplTxeWPLWKb9XuEz';

						function getBehanceAPI($user, $user_id)
						{
							$array = null;
							$x = 1;
							while($x <= 4) {
							    $file = json_decode(file_get_contents('https://www.behance.net/v2/users/' . $user . '/projects?client_id=' . $user_id . '&sort=appreciations&per_page=12&page=' . $x ), true);
								if ($file['projects']) {
									foreach($file['projects'] as $project) :
										$array[] =  $project;
									endforeach;
								}
								$x++;
							}
							file_put_contents("behance-api.json", json_encode([projects, $array]));
						}
						getBehanceAPI($user, $user_id);

						$behance_api = file_get_contents('behance-api.json');

						if (!empty($behance_api)) :
							$json = json_decode($behance_api, true);
							if (!empty($json)) :
								foreach ($json as $project_details => $projects) :
									$count = 1;
									if (is_array($projects) || is_object($projects)) :
										foreach ($projects as $project) :
											$id = $project["id"];
											$project_file = fopen('project-' . $id . '.json', 'w');
											fwrite($project_file, file_get_contents('https://www.behance.net/v2/projects/' . $id . '?api_key=' . $user_id));
											fclose($project_file);
										endforeach;
									endif;
								endforeach;
								echo '<h3>Success! Fetched projects.</h3>';
							else :
								echo '<h3>Oops, json file could not be decoded.</h3>';
							endif;
						else :
							echo '<h3>Oops, no json file.</h3>';
						endif;

						echo '
							<script type="text/javascript">
								document.getElementById("loader").style.display = "none";
								document.getElementById("loaded").style.display = "block";
							</script>
						';

						?>
						<br/>
						<a href="/" class="btn">back to home</a>

					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>
