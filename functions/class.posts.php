<?php

class _hPosts {
  var $h_alias; 
  var $h_author; 
  var $h_avatar; 
  var $h_by; 
  var $h_category; 
  var $h_center; 
  var $h_code; 
  var $h_created; 
  var $h_custom; 
  var $h_description; 
  var $h_email; 
  var $h_fav; 
  var $h_key; 
  var $h_level; 
  var $h_link; 
  var $h_location; 
  var $h_notes; 
  var $h_phone; 
  var $h_reading; 
  var $h_status; 
  var $h_style; 
  var $h_subtitle; 
  var $h_tags; 
  var $h_type; 
  var $h_updated;
  
  function createPost() {

    $date = date("YmdHms");
    if (isset($_SESSION['myEmail'])) {
      $email = $_SESSION['myEmail'];
    } else {
      $email = hEMAIL;
    }

    $h_alias = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_alias']); 
    $h_author = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_author']); 
    $h_avatar = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_avatar']); 
    $h_by = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_by']);
    $h_category = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_category']); 
    $h_center = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_center']);
    $h_key = str_shuffle(md5($email.$date));
    $h_code = substr($h_key, rand(0, 15), 12); 
    $h_created = date(Ymd);
    $h_desc = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_desc']); 
    $h_email = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_email']); 
    $h_fav = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_fav']); 
    $h_level = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_level']); 
    $h_link = hPORTAL."post?view=".$h_code; 
    $h_location = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_location']);
    $h_notes = substr($h_desc, 250); 
    $h_phone = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_phone']); 
    $h_price = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_price']);
    $h_reading = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_reading']); 
    $h_status = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_status']);
    $h_subtitle = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_subtitle']); 
    $h_tags = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_tags']); 
    $h_type = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_type']); 
    $h_updated = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_updated']);

    $createPost = "INSERT INTO hposts (h_alias, h_author, h_avatar, h_by, h_category, h_center, h_code, h_created, h_description, h_email, h_fav, h_key, h_level, h_link, h_location, h_notes, h_phone, h_reading, h_status, h_subtitle, h_tags, h_type, h_updated) 
      VALUES ('".$h_alias."', '".$h_author."', '".$h_avatar."', '".$h_by."', '".$h_category."', '".$h_center."', '".$h_code."', '".$h_created."', '".$h_desc."', '".$h_email."', '".$h_fav."', '".$h_key."', '".$h_level."', '".$h_link."', '".$h_location."', '".$h_notes."', '".$h_phone."', '".$h_reading."', '".$h_status."', '".$h_subtitle."', '".$h_tags."', '".$h_type."', '".$h_updated."')";
    
    if ($_POST['h_price'] !== "") {
      mysqli_query( $GLOBALS['conn'], "INSERT INTO hproducts (h_code, h_price) VALUES ('".$h_code."', '".$h_price."')" );
    }

    if ( mysqli_query( $GLOBALS['conn'], $createPost ) ) {
      echo "<script type = \"text/javascript\">
                      alert(\"Post Created Successfully!\");
                  </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function updatePost($h_code) {
    
    $date = date("YmdHms");
    if (isset($_SESSION['myEmail'])) {
      $email = $_SESSION['myEmail'];
    } else {
      $email = hEMAIL;
    }

    $h_alias = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_alias']); 
    $h_author = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_author']); 
    $h_avatar = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_avatar']); 
    $h_by = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_by']);
    $h_category = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_category']); 
    $h_center = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_center']);
    $h_key = str_shuffle(md5($email.$date));
    $h_code = substr($h_key, rand(0, 15), 12); 
    $h_created = date(Ymd);
    $h_desc = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_desc']); 
    $h_email = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_email']); 
    $h_fav = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_fav']); 
    $h_level = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_level']); 
    $h_link = hPORTAL."post?view=".$h_code; 
    $h_location = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_location']);
    $h_notes = substr($h_desc, 250); 
    $h_phone = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_phone']);
    $h_price = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_price']);
    $h_reading = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_reading']); 
    $h_status = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_status']);
    $h_subtitle = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_subtitle']); 
    $h_tags = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_tags']); 
    $h_type = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_type']); 
    $h_updated = mysqli_real_escape_string($GLOBALS['conn'], $_POST['h_updated']);

    $createPost = "INSERT INTO hposts (h_alias, h_author, h_avatar, h_category, h_center, h_code, h_created, h_description, h_email, h_fav, h_key, h_level, h_link, h_location, h_notes, h_phone, h_reading, h_status, h_subtitle, h_tags, h_type, h_updated) 
      VALUES ('".$h_alias."', '".$h_author."', '".$h_avatar."', '".$h_category."', '".$h_center."', '".$h_code."', '".$h_created."', '".$h_desc."', '".$h_email."', '".$h_fav."', '".$h_key."', '".$h_level."', '".$h_link."', '".$h_location."', '".$h_notes."', '".$h_phone."', '".$h_reading."', '".$h_status."', '".$h_subtitle."', '".$h_tags."', '".$h_type."', '".$h_updated."')";
    
    if ($_POST['h_price'] !== "") {
      mysqli_query( $GLOBALS['conn'], "INSERT INTO hproducts (h_code, h_price) VALUES ('".$h_code."', '".$h_price."')" );
    }

    if ( mysqli_query( $GLOBALS['conn'], $createPost ) ) {
      echo "<script type = \"text/javascript\">
                      alert(\"Post Updated Successfully!\");
                  </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  function getPostsType($type) {?>
  <title>All <?php show( ucwords($type) ); ?>s [ <?php getOption('name'); ?> ]</title>

  <a href="./post?create=<?php show( $type ); ?>" class="addfab mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">create</i>
      </a><?php
    $getPostsBy = mysqli_query($GLOBALS['conn'], "SELECT * FROM hposts WHERE h_status = 'published' AND h_type='".$type."'");
    if($getPostsBy -> num_rows > 0) { ?>
      <div class="mdl-grid">
        <div class="mdl-cell--12-col" >
          <form>
            <center>
            <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input type="text" placeholder="Search <?php show( ucwords($type) ); ?>">
            </div></center>
            </form>
        </div>
      <div class="mdl-cell--12-col mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
        <thead>
        <tr>
        <th class="mdl-data-table__cell--non-numeric">ARTICLE</th>
        <th class="mdl-data-table__cell--non-numeric">AUTHOR</th>
        <th class="mdl-data-table__cell--non-numeric">CATEGORY</th>
        <th class="mdl-data-table__cell--non-numeric">TAGS</th>
        <th class="mdl-data-table__cell--non-numeric">CREATED</th>
        <th class="mdl-data-table__cell--non-numeric">STATUS</th>
        <th class="mdl-data-table__cell--non-numeric">ACTIONS</th>
        </tr>
        </thead><?php
        while ($postsDetails = mysqli_fetch_assoc($getPostsBy)){ ?>
        <tbody>
        <tr>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_alias'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_by'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_category'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_tags'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_created'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_status'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <a href="./post?view=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a> 
        <a href="tel:<?php show( $postsDetails['h_phone'] ); ?>" ><i class="material-icons">phone</i></a> 
        <a href="?post?view=<?php show( $_SESSION['myCode'] ); ?>&action=chat&by=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">message</i></a>  
        <a href="./post?edit=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">edit</i></a> 
        <a href="./post?delete=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">delete</i></a>
        </td>
        </tr>
        </tbody><?php
        } ?>
        </table>
        </div><?php
    } else {
      ?><div style="margin:1%;" ><table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
      <thead>
        <tr>
        <th class="mdl-data-table__cell--non-numeric">ARTICLE</th>
        <th class="mdl-data-table__cell--non-numeric">AUTHOR</th>
        <th class="mdl-data-table__cell--non-numeric">CATEGORY</th>
        <th class="mdl-data-table__cell--non-numeric">TAGS</th>
        <th class="mdl-data-table__cell--non-numeric">CREATED</th>
        <th class="mdl-data-table__cell--non-numeric">STATUS</th>
        <th class="mdl-data-table__cell--non-numeric">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td><p>No <?php show( ucwords($type) ); ?>s Found</p></td>
        </tr>
        </tbody>
        </table>
        </div><?php
    }
  }

  function getPosts() { ?>
  <title>All Posts [ <?php getOption('name'); ?> ]</title>

  <a href="./post?create=article" class="addfab mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">create</i>
      </a><?php
    $getPosts = mysqli_query($GLOBALS['conn'], "SELECT * FROM hposts WHERE (h_type = 'article' AND h_status = 'published') ORDER BY h_created DESC");
    if($getPosts -> num_rows > 0) { ?>
      <div class="mdl-grid">
        <div class="mdl-cell--12-col" >
          <form>
            <center>
            <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input type="text" placeholder="Search <?php show( "User" ); ?>">
            </div></center>
            </form>
        </div>
      <div class="mdl-cell--12-col mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
        <thead>
        <tr>
        <th class="mdl-data-table__cell--non-numeric">ARTICLE</th>
        <th class="mdl-data-table__cell--non-numeric">AUTHOR</th>
        <th class="mdl-data-table__cell--non-numeric">CATEGORY</th>
        <th class="mdl-data-table__cell--non-numeric">TAGS</th>
        <th class="mdl-data-table__cell--non-numeric">CREATED</th>
        <th class="mdl-data-table__cell--non-numeric">STATUS</th>
        <th class="mdl-data-table__cell--non-numeric">ACTIONS</th>
        </tr>
        </thead><?php
        while ($postsDetails = mysqli_fetch_assoc($getPosts)){ ?>
        <tbody>
        <tr>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_alias'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_by'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_category'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_tags'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_created'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <?php show( $postsDetails['h_status'] ); ?>
        </td>
        <td class="mdl-data-table__cell--non-numeric">
        <a href="./post?view=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a> 
        <a href="tel:<?php show( $postsDetails['h_phone'] ); ?>" ><i class="material-icons">phone</i></a> 
        <a href="?post?view=<?php show( $_SESSION['myCode'] ); ?>&action=chat&by=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">message</i></a>  
        <a href="./post?edit=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">edit</i></a> 
        <a href="./post?delete=<?php show( $postsDetails['h_code'] ); ?>" ><i class="material-icons">delete</i></a>
        </td>
        </tr>
        </tbody><?php
        } ?>
        </table>
        </div><?php
    } else {
      ?><div style="margin:1%;" ><table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
      <thead>
        <tr>
        <th class="mdl-data-table__cell--non-numeric">ARTICLE</th>
        <th class="mdl-data-table__cell--non-numeric">AUTHOR</th>
        <th class="mdl-data-table__cell--non-numeric">CATEGORY</th>
        <th class="mdl-data-table__cell--non-numeric">TAGS</th>
        <th class="mdl-data-table__cell--non-numeric">CREATED</th>
        <th class="mdl-data-table__cell--non-numeric">STATUS</th>
        <th class="mdl-data-table__cell--non-numeric">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td><p>No Posts Found</p></td>
        </tr>
        </tbody>
        </table>
        </div><?php
    }
  }

  function getPostCode($code) {
    $getPostCode = mysqli_query($GLOBALS['conn'], "SELECT * FROM hposts WHERE h_code = '".$code."'");
    if($getPostCode -> num_rows > 0) {
      while ($postDetails = mysqli_fetch_assoc($getPostCode)){ ?>
      <title><?php show( $postDetails['h_alias'] ); ?> [ JABALI Posts ]</title>
        <div class="mdl-grid" >
              <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text"><?php show( $postDetails['h_alias'] ); ?></h2>

                            <div class="mdl-layout-spacer"></div>
                            <div class="mdl-card__subtitle-text">
                                <a href="tel:<?php show( $postDetails['h_phone'] ); ?>" ><i class="material-icons">phone</i></a>
                                <a href="./post?view=<?php show( $postDetails['h_code'] ); ?>&fav=<?php show( $postDetails['h_code'] ); ?>" ><i class="material-icons">star</i></a>
                                <a href="./post?edit=<?php show( $postDetails['h_code'] ); ?>" ><i class="material-icons">edit</i></a>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand mdl-grid">
                          <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--12-col-phone">
                            <h4><?php show( $postDetails['h_subtitle'] ); ?></h4>
                            <h6>Published: <?php show( $postDetails['h_created'] ); ?><br>
                            Authored by: <?php show( $postDetails['h_by'] ); ?><br>
                            Category: <?php show( $postDetails['h_category'] ); ?><br>
                            Tagged: <?php show( ucwords($postDetails['h_tags']) ); ?></br>
                            Readings: <?php show( ucwords($postDetails['h_tags']) ); ?></h6>
                            SHARE 
                            <a href="mailto:<?php show( $userDetails['h_email'] ); ?>"><i class="mdi mdi-email"></i></a>
                            <a href="sms://<?php show( $_SESSION['myPhone'] ); ?>?body=<?php show( $postDetails['h_alias'].' '.hPORTAL ); ?>post?view=<?php show( $postDetails['h_code'] ); ?>"><i class="mdi mdi-message"></i></a>
                            <a href="whatsapp://send?text=<?php show( $postDetails['h_alias'].' '.hPORTAL ); ?>post=view=<?php show( $postDetails['h_code'] ); ?>" data-action="share/whatsapp/share"><i class="mdi mdi-whatsapp"></i></a>
                          </div>
                          <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                            <img src="<?php show( $postDetails['h_avatar'] ); ?>" width="100%">
                          </div>
                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                        <?php show( $postDetails['h_description'] ); ?>
                        </div>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>"><?php
                      $getNotes = mysqli_query($GLOBALS['conn'], "SELECT * FROM hmessages LIMIT 5");
                      if ($getNotes -> num_rows >= 0) { ?>
                        <div class="mdl-card__title">
                          <i class="material-icons">comment</i>
                            <span class="mdl-button">Comments</span>
                          <div class="mdl-layout-spacer"></div>
                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                          <ul class="collapsible popout" data-collapsible="accordion"><?php
                              while ($note = mysqli_fetch_assoc($getNotes)) { ?>
                              <li>
                                <div class="collapsible-header"><i class="material-icons">label_outline</i>
                                  
                                    <b><?php show( $note['h_alias'] ); ?></b><span class="alignright"><?php
                                    show( $note['h_created'] ); ?></span>
                                </div>
                                <div class="collapsible-body"><span class="alignright">
                                    <a href="./notification?create=note&code=<?php show( $note['h_author'] ); ?>" ><i class="material-icons">reply</i></a> 
                                    <a href="./notification?view=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a> 
                                    <a href="./notification?delete=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">delete</i></a>
                                    </span>
                                    <span><?php
                                    show( $note['h_description'] ); ?></span>
                                </div>
                              </li><?php
                              } ?>
                          </ul><?
                      } else {
                        echo "No Messages";
                      } ?>
                            <p>Add Comment</p>
                            <form>
                            <div class="input-field">
                            <input id="h_alias" name=="h_alias" type="text">
                            <label for="h_alias">Title</label>
                            </div>

                            <div class="input-field">
                            <textarea class="materialize-textarea col s12" id="h_description" name="h_description" ><?php show( $userDetails['h_description'] ); ?></textarea>
                            <label for="h_description">Your Comment</label>
                            </div>
                            <button type="submit" name="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect alignright"><i  class="material-icons">send</i></button>
                            </form>
                        </div>
                    </div><br>
                    <div class="mdl-card mdl-shadow--2dp mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>"><?php
                          $getNotes = mysqli_query($GLOBALS['conn'], "SELECT * FROM hnotes LIMIT 5");
                          if ($getNotes -> num_rows >= 0) { ?>
                            <div class="mdl-card__title">
                              <i class="material-icons">note</i>
                                <span class="mdl-button">Notes</span>
                              <div class="mdl-layout-spacer"></div>
                            </div>
                            <div class="mdl-card__supporting-text mdl-card--expand">
                              <ul class="collapsible popout" data-collapsible="accordion"><?php
                                  while ($note = mysqli_fetch_assoc($getNotes)) { ?>
                                  <li>
                                    <div class="collapsible-header"><i class="material-icons">label_outline</i>
                                      
                                        <b><?php show( $note['h_alias'] ); ?></b><span class="alignright"><?php
                                        show( $note['h_created'] ); ?></span>
                                    </div>
                                    <div class="collapsible-body"><span class="alignright">
                                        <a href="./notification?create=note&code=<?php show( $note['h_author'] ); ?>" ><i class="material-icons">reply</i></a> 
                                        <a href="./notification?view=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a> 
                                        <a href="./notification?delete=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">delete</i></a>
                                        </span>
                                        <span><?php
                                        show( $note['h_description'] ); ?></span>
                                    </div>
                                  </li><?php
                                  } ?>
                              </ul><?
                          } else {
                            echo "No Messages";
                          } ?>
                                <p>Add Note</p>
                                <form>

                                <div class="input-field">
                                <textarea class="materialize-textarea col s12" id="h_description" name="h_description" ><?php show( $userDetails['h_description'] ); ?></textarea>
                                <label for="h_description">Your Note</label>
                                </div>
                                <button type="submit" name="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect alignright"><i  class="material-icons">save</i></button>
                                </form>
                            </div>
                    </div>
                </div>
                <br>
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-color--<?php primaryColor( $_SESSION['myCode']); ?>">
                  <div class="mdl-card__title">
                    <i class="material-icons">face</i>
                      <span class="mdl-button">More by this author</span>
                    <div class="mdl-layout-spacer"></div>
                  </div>
                  <div class="mdl-card__supporting-text mdl-card--expand mdl-grid">
                    <div class="mdl-cell">
                      h
                    </div>
                    <div class="mdl-cell">
                      h
                    </div>
                    <div class="mdl-cell">
                      h
                    </div>
                  </div>
                </div><?php
      }
    } else {
      echo 'Post Not Found';
    }
  }

}
