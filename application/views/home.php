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
											<?php if(isset($company_results)) : ?>
												<option selected value="company">Company</option>
											<?php else : ?>
												<option value="company">Company</option>
											<?php endif; ?>
											<?php if(isset($drink_results)) : ?>
												<option selected value="drink">Drink</option>
											<?php else : ?>
												<option value="drink">Drink</option>
											<?php endif; ?>
											<?php if(isset($liquor_results)) : ?>
												<option selected value="liquor">Liquor</option>
											<?php else : ?>
												<option value="liquor">Liquor</option>
											<?php endif; ?>
											<?php if(isset($mixer_results)) : ?>
												<option selected value="mixer">Mixer</option>
											<?php else : ?>
												<option value="mixer">Mixer</option>
											<?php endif; ?>
											<?php if(isset($store_results)) : ?>
												<option selected value="store">Store</option>
											<?php else : ?>
												<option value="store">Store</option>
											<?php endif; ?>
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
										<table width="100%" id="company_results">
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
					<?php if(isset($drink_results)) : ?>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<div class="row">
									<div class="small-12 columns">
										<table width="100%">
											<thead>
												<tr>
													<th>Drink Name</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($drink_results as $result) : ?>
													<tr>
														<td><?php print $result->get_name(); ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($liquor_results)) : ?>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<div class="row">
									<div class="small-12 columns">
										<table width="100%">
											<thead>
												<tr>
													<th>Liquor Name</th>
													<th>Type</th>
													<th>Proof</th>
													<th>ABV</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($liquor_results as $result) : ?>
													<tr>
														<td><?php print $result->get_name(); ?></td>
														<td><?php print $result->get_type(); ?></td>
														<td><?php print $result->get_proof(); ?></td>
														<td><?php print $result->get_percent_vol(); ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($mixer_results)) : ?>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<div class="row">
									<div class="small-12 columns">
										<table width="100%">
											<thead>
												<tr>
													<th>Mixer Name</th>
													<th>Type</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($mixer_results as $result) : ?>
													<tr>
														<td><?php print $result->get_name(); ?></td>
														<td><?php print $result->get_type(); ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(isset($store_results)) : ?>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<div class="row">
									<div class="small-12 columns">
										<table width="100%">
											<thead>
												<tr>
													<th>Store Name</th>
													<th>City</th>
													<th>State</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($store_results as $result) : ?>
													<tr>
														<td><?php print $result->get_name(); ?></td>
														<td><?php print $result->get_city(); ?></td>
														<td><?php print $result->get_state(); ?></td>
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