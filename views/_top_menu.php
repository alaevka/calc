<?php
	use yii\helpers\Url;
?>
<ul class="nav nav-tabs right-aligned"><!-- available classes "bordered", "right-aligned" -->
	<li <?php if($tab == 1) { ?>class="active"<?php } ?>><a href="<?= Url::to(['/site/index']) ?>">
			<span><i class="entypo-user"></i></span>
			<span class="hidden-xs">Мои расчеты</span>
		</a>
	</li>
	<li <?php if($tab == 2) { ?>class="active"<?php } ?>>
		<a href="#tab2-data" data-toggle="tab">
			<span><i class="entypo-doc-text"></i></span>
			<span class="hidden-xs">Расчеты сотрудников</span>
		</a>
	</li>
	<li <?php if($tab == 3) { ?>class="active"<?php } ?>>
		<a href="#tab3-data" data-toggle="tab">
			<span><i class="entypo-docs"></i></span>
			<span class="hidden-xs">Расчеты партнеров</span>
		</a>
	</li>
	<li <?php if($tab == 4) { ?>class="active"<?php } ?>>
		<a href="#tab4-data" data-toggle="tab">
			<span><i class="entypo-mail"></i></span>
			<span class="hidden-xs">Новости</span>
		</a>
	</li>
	<li <?php if($tab == 5) { ?>class="active"<?php } ?>>
		<a href="#tab5-data" data-toggle="tab">
			<span><i class="entypo-picture"></i></span>
			<span class="hidden-xs">Баннер</span>
		</a>
	</li>
	<li <?php if($tab == 6) { ?>class="active"<?php } ?>>
		<a href="<?= Url::to(['/user/admin/index']) ?>">
			<span><i class="entypo-users"></i></span>
			<span class="hidden-xs">Пользователи системы</span>
		</a>
	</li>
</ul>