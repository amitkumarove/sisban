<div class="sharingbar">
	<p>Share this page:</p>
	<ul>
		<li class="sharingbar__icon sharingbar__icon--twitter">
			<a href="http://www.twitter.com/share?url=<?php echo urlencode(lp_get_current_url()) ?>" target="noreferrer" title="Share on Twitter">
				<img src="<?php echo get_template_directory_uri() ?>/images/icons/social/twitter.svg" alt="Twitter logo">
			</a>
		</li>
		<li class="sharingbar__icon">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(lp_get_current_url()) ?>" target="noreferrer" title="Share on Facebook">
				<img src="<?php echo get_template_directory_uri() ?>/images/icons/social/facebook.svg" alt="Facebook logo">
			</a>
		</li>
		<li class="sharingbar__icon">
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(lp_get_current_url()) ?>&source=LinkedIn" target="noreferrer" title="Share on LinkedIn">
				<img src="<?php echo get_template_directory_uri() ?>/images/icons/social/linkedin.svg" alt="LinkedIn logo">
			</a>
		</li>
		<li class="sharingbar__icon sharingbar__icon--email">
			<a href="mailto:?subject=Sisban&amp;body=I found this web page <?php echo lp_get_current_url() ?>" target="noreferrer" title="Share by email">
				<img src="<?php echo get_template_directory_uri() ?>/images/icons/social/email.svg" alt="Email icon">
			</a>
		</li>
	</ul>
</div>
