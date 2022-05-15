	<?php /*导航美化风格选择*/
		if (_cao('is_dhxz_lixui','true')){
			if (_cao('site_dhxz_lixui') === 'ripro' ) { 
				get_template_part( 'parts/navbarripro' ); 
			}else if (_cao('site_dhxz_lixui') === 'lixuicms' ){
				get_template_part( 'parts/navbarcms' );
			};
		}
	?>
	
</header>
<div class="header-gap"></div>