<?php

echo '<ul class="projects block-grid small-block-grid-1 medium-block-grid-2 large-block-grid-3">';

$user = 'robinwkurtz';
$user_id = 'Jfh0WmUQrqTOkbQiplTxeWPLWKb9XuEz';

$json = $site->url() . '/assets/scripts/behance/behance-api.json';

$behance_api = file_get_contents($json);

	if (json_decode($behance_api, true)) :
		$json = json_decode($behance_api, true);
	else :
		$behance_remote = file_get_contents("http://www.behance.net/v2/users/' . $user . '/projects?client_id=' . $user_id . '&sort=appreciations");
		$json = json_decode($behance_remote, true);
	endif;

	foreach ($json as $project_details => $projects) :
		$count = 1;
		if (is_array($projects) || is_object($projects)) :
			foreach ($projects as $project) :
				$fields = $project["fields"];
				$fieldarray = array($fields);
			endforeach;
		endif;
	endforeach;

	foreach ($json as $project_details => $projects) :
		$count = 1;
		if (is_array($projects) || is_object($projects)) :
			foreach ($projects as $project) :

				$id = $project["id"];
				$name = $project["name"];
				$url = $project["url"];
				$thumb = $project["covers"]["404"];
				$owners = $project["owners"];

				$usernames = array();
				foreach ($owners as $owner) :
					$usernames[] = $owner["username"];
				endforeach;

				if (in_array('michelvalois', $usernames) || in_array('sylvieracicot', $usernames)) :
					$inline_class = ' project-collaboration';
					$sub_title = '<a href="http://chezvalois.com" target="_blank">Chez Valois</a>';
				elseif (in_array('PeopleLikeUs', $usernames) || in_array('juliettefoxtrot', $usernames)) :
					$inline_class = ' project-collaboration';
					$sub_title = '<a href="http://peoplelikeus.ca" target="_blank">People Like Us</a>';
				else :
					$inline_class = ' project-personal';
					$sub_title = 'Personal Project';
				endif;

				$project_api = $site->url() . '/assets/scripts/behance/project-' . $id . '.json';

				$project_content = json_decode(file_get_contents($project_api), true);

				?>

				<li class="project-item project-<?php echo $count; echo $inline_class; ?>">
					<a href="<?php echo $url; ?>" target="_blank">
						<div class="project-image" style="background-image:url('<?php echo $thumb; ?>');">
							<img src="<?php echo kirby()->urls()->assets() ?>/images/rectangle.png" class="rectangle" alt="<?php echo $name; ?>"/>
							<div class="project-overlay"></div>
						</div>
					</a>
					<br/>
					<div class="project-name content">
						<h5 class="no-margin">
							<?php echo $name;
							if (!empty($sub_title)) :
								echo '<br/><span class="text-light text-body">';
								echo $sub_title;
								echo '</span>';
							endif; ?>
						</h5>
						<p class="text-xsmall text-upper no-margin small-padding-top third-space">
							<strong>
								<a href="<?php echo $url; ?>" target="_blank">
									View on Behance
								</a>
							</strong>
						</p>
					</div>
				</li>
				<?php
				$count++;
			endforeach;
		endif;
	endforeach;

    echo '</ul>';

	?>
