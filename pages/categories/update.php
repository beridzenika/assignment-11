<?php

    $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null;

    if($id) {

        $categories = getFirst("SELECT * FROM categories WHERE id = " .$id);

        if(!$categories) {
            die('categories not found');
        }
        } else {
            echo "invalid id";
        }

    if(isset($_POST['action']) && $_POST['action'] == 'update') {
        
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;

        if($title) {
            $update_query = "UPDATE categories SET title = '$title', text = '$text', categories_id = '$categories_id' WHERE id = " . $id;

            echo query($select_query) ? "Record Update" : "Error";

        }
    }
    
?>

    <main>
        <div class="container-header">
            <h2>categories</h2>
            <a href="?page=categories" class="btn">Back</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">title</label>
                    <input type="text" name="title" value="<?= $categories['title'] ?>" >
                </div> 
                <div class="form-group">
                    <input type="hidden" name="acton" value="update">
                    <button class="btn submit">Update</button>
                </div>
            </form>
        </div>
    </main>
