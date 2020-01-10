<?php
/**
 *GET THE ARTICLE RECORD BASED ON THE ID
 *
 * This function is used to access a single article by selecting it's id.
 *
 * @param type object $db_conn create a connection to the database
 *@param type the selection is done with the optional $columns or an * symbol to select data
 * @param type intiger $id is the article ID
 * @return return mixed associative array containing the article with the fetched ID or null if the article was not found
 */

function getArticle($db_conn, $id, $columns = '*'){

//prepared query

  $sql = "SELECT $columns
         FROM articles
         WHERE id=?";


  $stmt = mysqli_prepare($db_conn, $sql);
    if($stmt === false){
      echo mysqli_error($db_conn);
    }else{
      mysqli_stmt_bind_param($stmt, "i", $id);

      if(mysqli_stmt_execute($stmt)){
        $results = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_array($results, MYSQLI_ASSOC);
    }
  }
}

/**
 * Validate the article properties
 *
 * @param string $title Title, required
 * @param string $content Content, required
 * @param string $published_at Published date and time, yyyy-mm-dd hh:mm:ss if not blank
 *
 * @return array An array of validation error messages
 */
function validateArticle($title, $content, $published_at)
{
$errors = [];
    if ($title == '') {
        $errors[] = '<h5 style="color:red;">Warning: Title is required!</h5>';
    }
    if ($content == '') {
        $errors[] = '<h5 style="color:red;">Warning: Content is required!</h5>';
    }

    if ($published_at == '') {
       $date_time = date_create_from_format('d-m-Y\TH:i', $published_at);

       if ($date_time === false) {

           $errors[] = 'Invalid date and time input';

       } else {

           $date_errors = date_get_last_errors();

           if ($date_errors['warning_count'] > 0) {
               $errors[] = 'Invalid date and time input';
           }
       }
   }

    return $errors;
}

 ?>
