<?php

class _hPoems extends _hPosts {
  var $h_alias; 
  var $h_author; 
  var $h_avatar; 
  var $h_by; 
  var $h_category; 
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

  function getPoems() { ?>
  <title>All Poems [ <?php getOption('name'); ?> ]</title>
    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
      <div class="mdl-card mdl-shadow--2dp mdl-color--<?php primaryColor($_SESSION['myCode']); ?>"><?php
            $getPoems = mysqli_query($GLOBALS['conn'], "SELECT * FROM hmessages WHERE h_author = '".$_SESSION['myCode']."'");
            if ($getPoems -> num_rows >= 0) { ?>
              <div class="mdl-card__title">
              <i class="material-icons">list</i>
                <span class="mdl-button">List of Poems</span>
              <div class="mdl-layout-spacer"></div>
              </div>
              <div class="mdl-card__supporting-text">
                <ul class="collapsible popout" data-collapsible="accordion"><?php
                    while ($note = mysqli_fetch_assoc($getPoems)) { ?>
                    <li>
                      <div class="collapsible-header"><i class="material-icons">label_outline</i>
                        
                          <b><?php show( $note['h_alias'] ); ?></b><span class="alignright"><a href="./message?view=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a></span>
                      </div>
                      <div class="collapsible-body"><span class="alignright">
                          <a href="./message?view=<?php show( $note['h_code'] ); ?>" ><i class="material-icons">open_in_new</i></a>
                          </span>
                          <span><?php
                          show( $note['h_description'] ); ?></span>
                      </div>
                    </li><?php
                    } ?>
              </ul>
              </div><?
            } else {
            echo '<div class="mdl-card__title">
  <i class="material-icons">notifications_none</i>
    <span class="mdl-button">No Recent Messages</span>
      <div class="mdl-layout-spacer">';
          }
        ?>
      </div>
  </div><?php
  }

  function getPoem($code) {
    $getPoemCode = mysqli_query($GLOBALS['conn'], "SELECT * FROM hposts WHERE h_code = '".$code."'");
    if($getPoemCode -> num_rows > 0) {
      while ($postDetails = mysqli_fetch_assoc($getPoemCode)){ ?>
      <title><?php show( $postDetails['h_alias'] ); ?> [ JABALI Poems ]</title>
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
                      $getPoems = mysqli_query($GLOBALS['conn'], "SELECT * FROM hmessages LIMIT 5");
                      if ($getPoems -> num_rows >= 0) { ?>
                        <div class="mdl-card__title">
                          <i class="material-icons">comment</i>
                            <span class="mdl-button">Comments</span>
                          <div class="mdl-layout-spacer"></div>
                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                          <ul class="collapsible popout" data-collapsible="accordion"><?php
                              while ($note = mysqli_fetch_assoc($getPoems)) { ?>
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
                          $getPoems = mysqli_query($GLOBALS['conn'], "SELECT * FROM hnotes LIMIT 5");
                          if ($getPoems -> num_rows >= 0) { ?>
                            <div class="mdl-card__title">
                              <i class="material-icons">note</i>
                                <span class="mdl-button">Poems</span>
                              <div class="mdl-layout-spacer"></div>
                            </div>
                            <div class="mdl-card__supporting-text mdl-card--expand">
                              <ul class="collapsible popout" data-collapsible="accordion"><?php
                                  while ($note = mysqli_fetch_assoc($getPoems)) { ?>
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
                                <p>Add Poem</p>
                                <form>

                                <div class="input-field">
                                <textarea class="materialize-textarea col s12" id="h_description" name="h_description" ><?php show( $userDetails['h_description'] ); ?></textarea>
                                <label for="h_description">Your Poem</label>
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
      echo 'Poem Not Found';
    }
  }

}

?>
