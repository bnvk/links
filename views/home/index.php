<?php foreach($links as $link): 
$redirects = $this->redirects_model->get_redirects($link->alias); ?>
<h3><?= count($redirects) ?> Hits</h3>
<p>
	<input type="text" value="http://bnvk.me/<?= $link->alias ?>" onclick="this.focus(); this.select();"><br>
	<a href="<?= $link->url ?>" target="_blank"><?= character_limiter($link->url, 15) ?></a>
	<hr>
</p>
<?php endforeach; ?>