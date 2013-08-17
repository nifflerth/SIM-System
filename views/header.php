<div class="topbar">
	<div class="container-fluid">
		<a href="dashboard.html" class='company'>SIM Systems</a>
		<ul class='mini'>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/home/logout">
					<img src="<?=site_url("img/icons/fugue/control-power.png") ?>" alt="">
					<?=t_logout?>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="breadcrumbs">
	<div class="container-fluid">
		<ul class="bread pull-left">
			<li>
				<a href="<?=base_url('index.php');?>/dashboard"><i class="icon-home icon-white"></i> <?=t_home?></a>
			</li>
			<?
			if ($path <> 'null'){
				foreach ($path as $sub){
					echo '<li>';
					echo '<a href="'.base_url('index.php');
					echo $sub['path'].'">';
					echo $sub['page'];
					echo '</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
