<!DOCTYPE html>
<html>

  <head>
    <title>Adding Bookmarklets on iPad and iPhone</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="en" /> 
    <meta name="viewport" content="initial-scale=1,user-scalable=yes" />
  </head>

  <body>
    <h1>Bookmarklets for your iDevices</h1>
    <p>Based on <a href="http://static.chrisbray.com/bookmarklets/">Chris Bray's original</a>.</p>

    <h2>Instructions:</h2>
    <ol>
      <li>Add this page as a bookmark by tapping the "+" </li>
      <li>Find the bookmarklet below that you want, and select and copy the Javascript to your clipboard. </li>
      <li>Go to your bookmarks and edit the new bookmark.  Edit the name and paste the Javascript in the field for the URL.</li>
    </ol>

    <p>For more detailed instructions, check out Marco Arment's <a href="http://www.instapaper.com/i__?Paste_here_and_replace_this" target="new">step by step guide</a> for adding the Instapaper bookmarklet to Safari for an iDevice.</p>

    <h2>Bookmarklets:</h2>

    <?php
      $dir = 'bookmarklets';
      $iterator = new DirectoryIterator(implode(DIRECTORY_SEPARATOR, array(dirname(__FILE__),$dir)));
      $bookmarklets = array();
      foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile()) {
          $name = $fileinfo->getBasename('.js');
          $display_name = ucwords(str_replace('_', ' ', $name));
          $bookmarklets[$name] = array('display' => $display_name, 'js' => file_get_contents(implode(DIRECTORY_SEPARATOR, array($dir,$fileinfo->getFilename()))));
          echo "<li><a href='#{$name}'>{$display_name}</a></li>";
        }
      }
      foreach ($bookmarklets as $name => $bookmarklet) {
        echo "<div><h3><a name='{$name}'>{$bookmarklet['display']}</a></h3><textarea name='code' cols='50' rows='10'>{$bookmarklet['js']}</textarea></div>";
      }
    ?>

  </body>
</html>
