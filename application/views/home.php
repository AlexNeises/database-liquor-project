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
											<?php if(isset($recipe_results)) : ?>
												<option selected value="recipe">Recipe</option>
											<?php else : ?>
												<option value="recipe">Recipe</option>
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
										<table width="100%" id="drink_results">
											<thead>
												<tr>
													<th>Drink Name</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($drink_results as $result) : ?>
													<tr>
														<td><a class="underline" href="<?php print site_url('drink/review/'.str_replace(' ', '_', $result->get_name())); ?>"><?php print $result->get_name(); ?></a></td>
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
										<table width="100%" id="liquor_results">
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
														<td><a class="underline" href="<?php print site_url('drink/review/'.str_replace(' ', '_', $result->get_name())); ?>"><?php print $result->get_name(); ?></a></td>
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
										<table width="100%" id="mixer_results">
											<thead>
												<tr>
													<th>Mixer Name</th>
													<th>Type</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($mixer_results as $result) : ?>
													<tr>
														<td><a class="underline" href="<?php print site_url('mixer/review/'.str_replace(' ', '_', $result->get_name())); ?>"><?php print $result->get_name(); ?></a></td>
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
										<table width="100%" id="store_results">
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
														<td><a class="underline" href="<?php print site_url('store/items/'.str_replace(' ', '_', $result->get_id())); ?>"><?php print $result->get_name(); ?></a></td>
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
					<?php if(isset($recipe_results)) : ?>
						<div class="row">
							<div class="small-8 small-offset-2 columns">
								<div class="row">
									<div class="small-12 columns">
										<table width="100%" id="recipe_results">
											<thead>
												<tr>
													<th>Recipe Name</th>
													<th>Liquor</th>
													<th>Mixer</th>
													<th>Taste</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($recipe_results as $result) : ?>
													<tr>
														<td><a class="underline" href="<?php print site_url('recipe'); ?>"><?php print $result->get_recipe_name(); ?></a></td>
														<td><?php print $result->get_lname(); ?></td>
														<td><?php print $result->get_mname(); ?></td>
														<td><?php print $result->get_taste(); ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<br/>
					<div class="row">
						<div class="small-8 small-offset-2 columns">
							<div class="row">
								<div class="small-12 columns">
									<p>New database entries can be submitted below.  Simply click on the link for the category you would like to add.</p>
									<section class="links">
										<nav class="bracket_link">
											<a href="javascript:void(0)" id="add_company">Company</a>
											<a href="javascript:void(0)" id="add_liquor">Liquor</a>
											<a href="javascript:void(0)" id="add_mixer">Mixer</a>
											<a href="javascript:void(0)" id="add_store">Store</a>
											<a href="javascript:void(0)" id="add_recipe">Recipe</a>
										</nav>
									</section>
									<br/>
								</div>
							</div>
							<form id="company_add" action="<?php print site_url('submit'); ?>" method="post" class="custom">
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>Company Name<input type="text" name="c_name"></label>
									</div>
									<div class="small-4 left columns">
										<label>Year Founded<input type="text" name="c_founded"></label>
									</div>
								</div>
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>City<input type="text" name="c_city"></label>
									</div>
									<div class="small-4 left columns">
										<label>Country<input type="text" name="c_country"></label>
									</div>
								</div>
								<div class="row">
									<div class="small-6 small-offset-3 columns">
										<input type="submit" class="button radius expand" value="Submit">
									</div>
								</div>
							</form>
							<form id="liquor_add" action="<?php print site_url('submit'); ?>" method="post" class="custom">
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>Liquor Name<input type="text" name="l_name"></label>
									</div>
									<div class="small-4 left columns">
										<label>Type<select name="l_type">
											<option value="NA">---</option>
											<option value="Rum">Rum</option>
											<option value="Whiskey">Whiskey</option>
											<option value="Tequila">Tequila</option>
											<option value="Vodka">Vodka</option>
											<option value="Gin">Gin</option>
											<option value="Grain">Grain Alcohol</option>
											<option value="Scotch">Scotch</option>
											<option value="Beer">Beer</option>
											<option value="Wine">Wine</option>
											<option value="Liqueur">Liqueur</option>
											<option value="Other">Other</option>
										</select></label>
									</div>
								</div>
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>Proof<input type="text" name="l_proof"></label>
									</div>
									<div class="small-4 left columns">
										<label>ABV<input type="text" name="l_abv"></label>
									</div>
								</div>
								<div class="row">
									<div class="small-8 small-offset-2 columns">
										<label>Store<select name="store">
											<?php $all_stores = Store_Model::get_all(); ?>
											<?php foreach($all_stores as $store) : ?>
												<option value="<?php print $store->get_id(); ?>"><?php print $store->get_name(); ?>, <?php print $store->get_city(); ?></option>
											<?php endforeach; ?>
										</select></label>
									</div>
								</div>
								<div class="row">
									<div class="small-6 small-offset-3 columns">
										<input type="submit" class="button radius expand" value="Submit">
									</div>
								</div>
							</form>
							<form id="mixer_add" action="<?php print site_url('submit'); ?>" method="post" class="custom">
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>Mixer Name<input type="text" name="m_name"></label>
									</div>
									<div class="small-4 left columns">
										<label>Type<select name="m_type">
											<option value="NA">---</option>
											<option value="Juice">Juice</option>
											<option value="Soda">Soda</option>
											<option value="Sports Drink">Sports Drink</option>
											<option value="Ginger Ale">Ginger Ale</option>
											<option value="Other">Other</option>
										</select></label>
									</div>
								</div>
								<div class="row">
									<div class="small-6 small-offset-3 columns">
										<input type="submit" class="button radius expand" value="Submit">
									</div>
								</div>
							</form>
							<form id="store_add" action="<?php print site_url('submit'); ?>" method="post" class="custom">
								<div class="row">
									<div class="small-8 small-offset-2 columns">
										<label>Store Name<input type="text" name="s_name"></label>
									</div>
								</div>
								<div class="row">
									<div class="small-4 small-offset-2 columns">
										<label>City<input type="text" name="s_city"></label>
									</div>
									<div class="small-4 left columns">
										<label>State<input type="text" name="s_state"></label>
									</div>
								</div>
								<div class="row">
									<div class="small-6 small-offset-3 columns">
										<input type="submit" class="button radius expand" value="Submit">
									</div>
								</div>
							</form>
						</div>
					</div>
					<?php if(!isset($this->my_global_var_1)) : ?>
						<form id="login" action="<?php print site_url('login'); ?>" method="post" class="custom">
							<div class="row">
								<div class="small-8 small-offset-2 columns">
									<div class="row">
										<div class="small-12 columns">
											<p style="text-align: center;">Please log in below.</p>
										</div>
									</div>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<label>Username<input type="text" name="username"/></label>
										</div>
									</div>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<label>Password<input type="password" name="password"/></label>
										</div>
									</div>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<a href="javascript:void(0)" class="submit button expand">Login</a>
										</div>
									</div>
								</div>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>