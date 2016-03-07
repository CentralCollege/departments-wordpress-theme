<h1>Manage the homepage</h1>
<hr size="1">
<?php
	//verify nonce
	if(!empty( $_POST ) && check_admin_referer('updateHomepage', '_wpnonce')){
		//social media
		if (isset($_POST['central_twitter_URL']) && strlen($_POST['central_twitter_URL']) > 0){
			update_option('central_twitter_URL', $_POST['central_twitter_URL']);
		} else {
			update_option('central_twitter_URL','http://twitter.com/centralcollege');
		}
		if (isset($_POST['central_facebook_URL']) && strlen($_POST['central_facebook_URL']) > 0){
			update_option('central_facebook_URL', $_POST['central_facebook_URL']);
		} else {
			update_option('central_facebook_URL','http://facebook.com/centralcollege');
		}
		if (isset($_POST['central_youtube_URL']) && strlen($_POST['central_youtube_URL']) > 0){
			update_option('central_youtube_URL', $_POST['central_youtube_URL']);
		} else {
			update_option('central_youtube_URL','http://www.youtube.com/user/centralcollegeadm');
		}
		//theme settings
		if (isset($_POST['active_banner_photo']) ) {
			update_option('active_banner_photo', $_POST['active_banner_photo']);
		}
		if (isset($_POST['active_side_nav']) ) {
			update_option('active_side_nav', $_POST['active_side_nav']);
		}
		if (isset($_POST['active_breadcrumb']) ) {
			update_option('active_breadcrumb', $_POST['active_breadcrumb']);
		}
		if (isset($_POST['directory_url']) ) {
			update_option('directory_url', $_POST['directory_url']);
				if(get_page_by_path('department-directory') == NULL){
					?><div class="updated">
                    		<p> Directory added.</p>
                      </div><?php
					// Get current user's ID
					$user_ID = get_current_user_id();
					// Query the API to get directory information
					$xml = simplexml_load_file(get_option('directory_url'));
					$directoryOutput = "";
					foreach($xml->employee as $emp){
						$directoryOutput = $directoryOutput . "<div class='staffListing' style='border-bottom: 1px solid #ccc; min-height: 200px;'>";
						if ($emp->hasPhoto == "yes"){
							$directoryOutput = $directoryOutput . "<img src='http://www.central.edu/humanresources/photodirectory/images/" . $emp->username . ".jpg' alt='" . $emp->firstName . " " . $emp->lastName. "' style='float:right; padding: 1px; margin: 1px; border: 1px solid #ccc;'/>";
						}
						$directoryOutput = $directoryOutput . "<h4>" . $emp->firstName . " " . $emp->lastName. "</h4>";
						$directoryOutput = $directoryOutput . "<p>" . $emp->title . "<br />";
						$directoryOutput = $directoryOutput . "<strong>Office:</strong> " . $emp->officeLocation . "<br />";
						$directoryOutput = $directoryOutput . "<strong>Phone:</strong> " . $emp->phoneNumber . "<br />";
						$directoryOutput = $directoryOutput . "<strong>Email:</strong> <a href='mailto:" . $emp->email . "'>" . $emp->email . "</a></p>";
						$directoryOutput = $directoryOutput . "</div>";
					}
						//Create new directory page
						$add_directory_to_site = array(
							'post_title'	=> 'Department Directory',
							'post_content'	=> $directoryOutput,
							'post_name'	=> 'department-directory',
							'post_status'	=> 'draft',
							'post_type'	=> 'page',
							'post_author'	=> $user_ID,
							'ping_status'	=> 'closed'
						);
						wp_insert_post($add_directory_to_site);
				} else {
						?><div class="updated">
                        	<p>Directory updated.</p>
                          </div><?php
						//Get page ID
						$page = get_page_by_path('department-directory');

						//Get directory info
						$xml = simplexml_load_file(get_option('directory_url'));
						$directoryOutput = "";
						foreach($xml->employee as $emp){
							$directoryOutput = $directoryOutput . "<div class='staffListing' style='border-bottom: 1px solid #ccc; min-height: 200px;'>";
							if ($emp->hasPhoto == "yes"){
								$directoryOutput = $directoryOutput . "<img src='http://www.central.edu/humanresources/photodirectory/images/" . $emp->username . ".jpg' alt='" . $emp->firstName . " " . $emp->lastName. "' style='float:right; padding: 1px; margin: 1px; border: 1px solid #ccc;'/>";
							}
							$directoryOutput = $directoryOutput . "<h4>" . $emp->firstName . " " . $emp->lastName. "</h4>";
							$directoryOutput = $directoryOutput . "<p>" . $emp->title . "<br />";
							$directoryOutput = $directoryOutput . "<strong>Office:</strong> " . $emp->officeLocation . "<br />";
							$directoryOutput = $directoryOutput . "<strong>Phone:</strong> " . $emp->phoneNumber . "<br />";
							$directoryOutput = $directoryOutput . "<strong>Email:</strong> <a href='mailto:" . $emp->email . "'>" . $emp->email . "</a></p>";
							$directoryOutput = $directoryOutput . "</div>";
						}

						$update_directory_page = array(
							'ID' => $page->ID,
							'post_content'	=> $directoryOutput
						);
						wp_update_post($update_directory_page);
				}
		}
	}
?>
<form name="form1" method="post" action="">
<?php wp_nonce_field( 'updateHomepage'); ?>
<h2>Social Media Settings</h2>
<p>Enter the URL to the following social media sites if applicable.</p>
    <table class="form-table">
        <tbody>
            <tr>
                <th align="right">
                    <label for="central_twitter_URL">Twitter Account:</label>
                </th>
                <td>
                    <input type="text" name="central_twitter_URL" id="central_twitter_URL" value="<?php echo get_option('central_twitter_url');?>" size="50" /><br />
                    <span class="description">Enter the URL to your Twitter account. <?php echo get_option('central_twitter_url');?></span>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <label for="central_facebook_URL">Facebook Account:</label>
                </th>
                <td>
                    <input type="text" name="central_facebook_URL" id="central_facebook_URL" value="<?php echo get_option('central_facebook_url');?>" size="50" /><br />
                    <span class="description">Enter the URL to your Facebook account. <?php echo get_option('central_facebook_url');?></span>
                </td>
            </tr>
            <tr>
                <th align="right">
                    <label for="central_youtube_URL">YouTube Account:</label>
                </th>
                <td>
                    <input type="text" name="central_youtube_URL" id="central_youtube_URL" value="<?php echo get_option('central_youtube_url');?>" size="50" /><br />
                    <span class="description">Enter the URL to your YouTube account. <?php echo get_option('central_youtube_url');?></span>
                </td>
            </tr>
            <!--- Need to add Facebook and youTube !--->
            <tr>
                <td colspan="2"><input id="submit" class="button button-primary" type="submit" value="Update settings" name="submit"></td>
            </tr>
        </tbody>
    </table>
</form>
<div class="wrapper">
<form name="form2" method="post" action="">
<?php wp_nonce_field( 'updateHomepage'); ?>
<h2>Theme Settings</h2>
    <table class="form-table">
        <tbody>
            <tr>
                <th align="right">
                    <label for="active_banner_photo">Banner photo on all pages: </label>
                </th>
                <td>
                    <select id="active_banner_photo" name="active_banner_photo">
                        <option value="<?php echo get_option('active_banner_photo')?>" selected="selected"><?php echo get_option('active_banner_photo')?></option>
                        <option value="-----------" disabled="disabled">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
             <tr>
                <th align="right">
                  <label for="active_side_nav">Side navigation on all pages: </label>
                </th>
                <td>
                  <select id="active_side_nav" name="active_side_nav">
                        <option value="<?php echo get_option('active_side_nav')?>" selected="selected"><?php echo get_option('active_side_nav')?></option>
                        <option value="-----------" disabled="disabled">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
             <tr>
                <th align="right">
                  <label for="active_breadcrumb">Breadcrumb nav on all pages: </label>
                </th>
                <td>
                  <select id="active_breadcrumb" name="active_breadcrumb">
                        <option value="<?php echo get_option('active_breadcrumb')?>" selected="selected"><?php echo get_option('active_breadcrumb')?></option>
                        <option value="-----------" disabled="disabled">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input id="submit" class="button button-primary" type="submit" value="Update settings" name="submit"></td>
            </tr>
        </tbody>
    </table>
</form>
<form name="form3" method="post" action="">
<?php wp_nonce_field( 'updateHomepage'); ?>
<h2>Directory Settings</h2>
    <table class="form-table">
        <tbody>
          <?php if (current_user_can('edit_themes') ) { ?>
             <tr>
                <th align="right">
                    <label for="directory_url">Directory listing url: </label>
                </th>
                <td>
                        <input type="text" name="directory_url" id="directory_url" value="<?php echo get_option('directory_url')?>" size="80" >
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input id="submit" class="button button-primary" type="submit" value="Update URL" name="submit">
                </td>
          <?php } else { ?>
                <?php if(get_page_by_path('department-directory') == TRUE){ ?>
                    <?php $page = get_page_by_path('department-directory');?>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="directory_url" id="directory_url" value="<?php echo get_option('directory_url')?>" >
                            <a href="<?php bloginfo('url'); ?>/department-directory"><input id="view" class="button button-secondary" type="button" value="View Directory" name="view" /></a>
                            <a href="post.php?post=<?php echo $page->ID; ?>&action=edit"><input id="edit" class="button button-primary" type="button" value="Edit Directory" name="edit" /></a>
                            <input id="submit" class="button button-secondary" type="submit" value="Update Directory" name="submit">
                        </td>
                    </tr>
                <?php } else { ?>
                     <tr>
                        <td colspan="2">
                            <input type="hidden" name="directory_url" id="directory_url" value="<?php echo get_option('directory_url')?>" >
                            <input id="submit" class="button button-primary" type="submit" value="Update Directory" name="submit">
                        </td>
                     </tr>
                <?php } ?>
          <?php } ?>
        </tbody>
    </table>
</form>
</div>