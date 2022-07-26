<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In response to</th>
                <th>Date</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $query = "SELECT * FROM comments ";
            $select_comments = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_comments)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_email</td>";

                // $query = "SELECT * FROM categories WHERE  cat_id = $post_category_id ";
                // $select_categries_id = mysqli_query($connection, $query);
                // while ($row = mysqli_fetch_assoc($select_categries_id)) {
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                // }

                echo "<td>$comment_content</td>";
                echo "<td>$comment_status</td>";
                echo "<td>Some titel</td>";
                echo "<td>$comment_date</td>";
                echo "<td><a href='posts.php?source=edit_post&p_id='>Approve</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id='>Unapprove</a></td>";
                echo "<td><a href='posts.php?delete='>Delete</a></td>";
                echo "</tr>";
            }


            ?>


        </tbody>
    </table>

    <?php

    if (isset($_GET['delete'])) {

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: posts.php");
    }


    ?>


</div>