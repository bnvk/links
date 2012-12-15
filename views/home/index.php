<h2>Shorten Link</h2>
<form name="shorten_link" id ="shorten_link" method="post">
	<p><input type="text" id="shorten_url" name="url" size="50" value="" autocomplete="off">
    <input type="submit" name="shorten_url" value="Shorten" id="shorten_url" autocomplete="off"></p>
</form>

<h2>Your Links</h2>
<ul id="your_links">
	<?php foreach($links as $link): 
	$redirects = $this->redirects_model->get_redirects($link->alias); ?>
	<li>
		<h3><?= count($redirects) ?> Hits since <?= human_date('MONTH_DAY_YEAR_TIME_ABBR', mysql_to_unix($link->created)) ?></h3>
		<input type="text" value="<?= config_item('links_short_url').$link->alias ?>" onclick="this.focus(); this.select();"> 
		<a href="<?= $link->url ?>" target="_blank"><?= real_character_limiter($link->url, 65) ?></a>
		<br><br>
		<hr>
	</li>
	<?php endforeach; ?>
</ul>

<script type="text/javascript">
$(document).ready(function()
{
	$('#shorten_link').bind('submit', function(e)
	{
		e.preventDefault();
		var link_data = $('#shorten_link').serializeArray();
		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/links/shorten_link',
			type		: 'POST',
			dataType	: 'json',
			data		: link_data,
		  	success		: function(result)
		  	{
				$('html, body').animate({scrollTop:0});
				$('#content_message').notify({scroll:true,status:result.status,message:result.message});

				if (result.status == 'success')
				{				
					// Append Link
					var link_html = '<li>' +
						'<h3>0 Hits since right now</h3>' +
						'<input type="text" value="' + result.data + '" onclick="this.focus(); this.select();">' +
						'<a href="' + $('#shorten_url').val() + '" target="_blank">' + $('#shorten_url').val() + '</a>' +
						'<br><br><hr></li>';

					$('#your_links').prepend(link_html);

					// Clean Form
					$('#shorten_url').val('');
				}
		  	}
		});
	});
});
</script>