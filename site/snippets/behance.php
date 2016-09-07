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

				if (in_array('chezvalois', $usernames)) :
					$inline_class = ' project-collaboration';
					$sub_title = '<a href="http://chezvalois.com" target="_blank">Chez Valois</a>';
				else :
					$inline_class = ' project-personal';
					$sub_title = 'Dawson';
				endif;

				$project_api = $site->url() . '/assets/scripts/behance/project-' . $id . '.json';

				// if (!file_exists($project_api)):
				// 	$project_remote = 'https://www.behance.net/v2/projects/?api_key=' . $user_id;
				// 	$project_api = $project_remote;
				// endif;

				$project_content = json_decode(file_get_contents($project_api), true);

				$has_gallery = false;

				?>

				<li class="project-item project-<?php echo $count;
				echo $inline_class; ?>">
					<?php

					/* Build up an array of gallery images */
					$has_gallery[] = null;
					foreach ($project_content as $project_contents => $contents) :
						$modules = $contents["modules"];
						$text = $contents["modules"][0]["text_plain"];
						if ($modules) :
							$img_count = 1;
							foreach ($modules as $module) :
								$has_gallery[] = $module["src"];
								$img_count++;
							endforeach;
						endif;
					endforeach;

					/* Get count of gallery images for conditional */
					$gallery_count = count(array_filter($has_gallery));

					if ($has_gallery && $gallery_count > 1) : ?>
						<a href="#" data-id="gallery-<?php echo $id; ?>" class="project-gallery-link">
							<div class="project-image"style="background-image:url('<?php echo $thumb; ?>');">
								<img src="<?php echo kirby()->urls()->assets() ?>/images/rectangle.png" class="rectangle" alt="<?php echo $name; ?>"/>
								<div class="project-overlay"></div>
							</div>
						</a>
					<?php else : ?>
						<div class="project-image" style="background-image:url('<?php echo $thumb; ?>');">
							<img src="<?php echo kirby()->urls()->assets() ?>/images/rectangle.png" class="rectangle" alt="<?php echo $name; ?>"/>
							<div class="project-overlay"></div>
						</div>
					<?php endif;
					?>

					<br/>

					<?php if ($has_gallery && $gallery_count > 1) : ?>
						<div class="project-gallery" data-id="gallery-<?php echo $id; ?>">
							<?php
							foreach ($project_content as $project_contents => $contents) :
								$modules = $contents["modules"];
								$text = $contents["modules"][0]["text_plain"];
								if ($modules) :
									$img_count = 1;
									$image_array = array();
									foreach ($modules as $module) :
										$image_sizes = $module["sizes"];
										if (!empty($image_sizes)) :
											if (!empty($image_sizes["original"])) :
												$image = $image_sizes["original"];
											elseif (!empty($image_sizes["disp"])) :
												$image = $image_sizes["disp"];
											else :
												$image = null;
											endif;
										endif;
										$image_array[] = $image;
									endforeach;

									$images = array_unique($image_array);

									$img_count = count($images);

									if (!empty($images) & $img_count > 1) :
										$counter = 1;
										foreach ($images as $image) :
											if (!empty($image)) :
												echo '<a href="' . $image . '" rel="gallery-' . $id . '" class="project-gallery gallery-item"><img src="' . $image . '" style="width: 100px;height:auto;"/></a>';
											endif;
											$counter++;
										endforeach;
									endif;
								endif;
							endforeach;
							?>
						</div>
					<?php endif; ?>

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
							<?php if ($has_gallery && $gallery_count > 1) : ?>
								<strong>
									<a href="<?php echo $thumb; ?>"
									   rel="gallery-<?php echo $id; ?>" class="project-gallery gallery-link">
										Gallery
									</a>
								</strong> |
							<?php endif ?>
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
