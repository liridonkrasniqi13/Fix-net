<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Post Title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Categori Id</label>
        <input type="text" class="form-control" name="post_category_id" id="" placeholder="Post Categori Id">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="" placeholder="Post Author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="" placeholder="Post Status">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="" placeholder="Post Tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" placeholder="Post Content"></textarea>
    </div>

    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>