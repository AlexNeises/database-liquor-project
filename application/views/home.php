		<div class="row">
			<div class="small-12 columns">
				<h1 class="main"><a href="<?php print site_url('home'); ?>"><i class="fa fa-glass"></i></a> Alcohol Databases</h1>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<div id="blur_container">
					<div class="row">
						<div class="small-8 small-offset-2 columns">
							<div class="row">
								<div class="small-12 columns">
									<p>Use the search feature to find recipes, drinks, companies, stores, and more.</p>
									<p>The dropdown menu should be used to choose the category you would like to search.  Then, enter your query and hit "Search".</p>
								</div>
							</div>
							<form id="search_home" action="<?php print site_url('search'); ?>" method="post" class="custom">
								<div class="row collapse">
									<div class="small-3 columns">
										<select name="search_category">
											<option value="company">Company</option>
											<option>Test2</option>
											<option>Test3</option>
										</select>
									</div>
									<div class="small-9 columns">
										<input type="text" name="query_value" id="search_query"/>
									</div>
								</div>
								<div class="row">
									<div class="small-6 small-offset-3 columns">
										<input type="submit" class="button radius expand" value="Search">
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php if(isset($company_results)) : ?>
					<div class="row">
						<div class="small-8 small-offset-2 columns">
							<div class="row">
								<div class="small-12 columns">
									<table width="100%">
										<thead>
											<tr>
												<th>Company Name</th>
												<th>City</th>
												<th>Country</th>
												<th>Year Founded</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($company_results as $result) : ?>
											<tr>
												<td><?php print $result->get_name(); ?></td>
												<td><?php print $result->get_city(); ?></td>
												<td><?php print $result->get_country(); ?></td>
												<td><?php print $result->get_founded(); ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>