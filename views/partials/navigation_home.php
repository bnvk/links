<h2 class="content_title"><img src="<?= $modules_assets ?>links_32.png"> Links</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/links', 'Recent') ?>
	<?= navigation_list_btn('home/links/custom', 'Custom') ?>
	<?php if ($logged_user_level_id <= 2) echo navigation_list_btn('home/links/manage', 'Manage', $this->uri->segment(4)) ?>
</ul>