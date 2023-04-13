<?php
   /**
    * @file search.php
    */

   // 0, 1 & 2. Initialize connect and use db
   require_once( "include/login.php" );

   // for HTML table creation
   require_once( "include/table.php" );

   // initialize strings
   $likeClause = "";
   $contentsClause = "";

	
   // 3. Build the SQL statement
  /** if ( strlen( $_REQUEST[$row] ) > 0 )
   {
      $likeClause = sprintf( 
        "AND ( ( r.name LIKE '%%%s%%' ) OR ( content LIKE '%%%s%%' ) )",
        $_REQUEST["name"],
        $_REQUEST["content"] 
      );
   }
*/


   $sql = sprintf( 
        "SELECT r.name, r.content, c.name FROM recipe r INNER JOIN category c ON r.category_id = c.id WHERE 1=1 %s ORDER BY r.name",
        $likeClause 
    );

   if ( array_key_exists( 'debug',
                          $_REQUEST ) )
   {
      printf( "SQL: <pre>%s</pre>", $sql );
   }

   // 4. Execute the SQL statement
   $result = mysqli_query( $conn, $sql );

   if ( ! $result )  // sql failed
   {
      die( "Could not execute SQL:
            <pre>$sql</pre> <br />" .
            mysqli_error( $conn ) );
   }
?>

<html>
   <head>
      <title>
         Search/Delete Notecard
      </title>

      <script language="JavaScript" type="text/javascript">
         /**
          * @brief Prompts for confirmation before
          *        redirecting to page for deletion
          * @param $id    ID of record to delete
          * @param $title Title of record to delete
          */
         function confirmDelete( $id, $title )
         {
            // confirmation message
            var msg = "Are you sure that you want to delete '" +
                       $title + "'?";
            var reply;
            var url = "delete.php?id=" + $id;

            reply = confirm(msg);

            if ( reply === true )  // "OK" pressed
            {
               window.location = url;
            }
            else  // "Cancel" button pressed
            {
               // alert( "No action taken" );
            }
         }  // function confirmDelete()


         /**
          * @brief Redirects page for updates
          *        (not currently used).  May
          *        be used if href is replaced
          *        by a push button.
          * @param $id  ID of record to update
          */
         function editRecord($id)
         {
            // redirect to a new URL
            window.location = "create.php?id=" + $id;
         }  // function editRecord()
      </script>

      <link rel="stylesheet"
            type="text/css"
            href="css/common.css" />
   </head>
   
   <body>
      <!-- Navigation Tabs -->
    <form>
      <table cellpadding="10"
             cellspacing="5"
             width="100%">
         <tr>
            <th bgcolor="#D3D3D3"
                width="15%">
               Search/Delete
            </th>

            <th bgcolor="gray"
                style="color: #ffffff;"
                width="15%">
               <a href="create.php"
                  class="tabs">Create/Modify</a>
            </th>

            <th>
               &nbsp;
            </th>
         </tr>
      </table>
    </form>
      <img src="images/pixels/ccccff.png"
           height="4" width="100%">

      <p />

<?php
   // uncomment for verbose SQL (debugging)
   //printf( '<input type="hidden" name="debug" />' );
?>

         <table>
            <tr>
               <td>
                  <table border="1"
                         width="100%"
                         cellspacing="0"
                         cellpadding="5">
                     <tr bgcolor="#FFFFD4">
                        <td align="left">
                           Title:
                           <input type="text"
                                  name="title"
                                  size="27"
                              />
                        </td>
                        <td align="center"
                            valign="middle">
                           <input type="submit"
                                  name="search"
                                  value="Search" />
                        </td>
                     </tr>
                  </table>

                  <p />

<?php
   $header = array( "Title",
                    "Contents",
                    "Category",
                    "Action" );

   printTableHeader( $header );

   //** 5. Display the results
   while ( $row = mysqli_fetch_assoc($result ) )
   {
      $id = $row['name'];
      unset( $row['cell'] );//it works ycd

      PrintTableRow( $id,$row );
   }

   // 6. Close database connection
   mysqli_close( $conn );  // "login.php" variable
?>
                  </table>
               </td>
            </tr>
         </table>

      </form>

   </body>
</html>