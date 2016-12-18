<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url()?>assets/images/image.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $user ?></span>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
									<ul>
										<li><a href="<?php echo base_url('dashboard/starter2') ?>">starter2</a></li>
										<li><a href="1_col.html">1 column</a></li>
										<li><a href="2_col.html">2 columns</a></li>
										<li>
											<a href="#">3 columns</a>
											<ul>
												<li><a href="3_col_dual.html">Dual sidebars</a></li>
												<li><a href="3_col_double.html">Double sidebars</a></li>
											</ul>
										</li>
										<li><a href="4_col.html">4 columns</a></li>
										<li>
											<a href="#">Detached layout</a>
											<ul>
												<li><a href="detached_left.html">Left sidebar</a></li>
												<li><a href="detached_right.html">Right sidebar</a></li>
												<li><a href="detached_sticky.html">Sticky sidebar</a></li>
											</ul>
										</li>
										<li><a href="layout_boxed.html">Boxed layout</a></li>
										<li class="navigation-divider"></li>
										<li ><a href="layout_navbar_fixed_main.html">Fixed top navbar</a></li>
										<li><a href="layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
										<li><a href="layout_navbar_fixed_both.html">Both navbars fixed</a></li>
										<li><a href="layout_fixed.html">Fixed layout</a></li>
									</ul>
								</li>
								<li><a href="../changelog.html"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>
								<!-- /main -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<script type="text/javascript">
				var url = window.location;
				// Will only work if string in href matches with location
				$('ul.navigation a[href="'+ url +'"]').parent().addClass('active');

				// Will also work for relative and absolute hrefs
				$('ul.navigation a').filter(function() {
				    return this.href == url;
				}).parent().addClass('active');
			</script>