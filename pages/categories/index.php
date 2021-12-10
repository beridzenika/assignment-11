<?php
    
    $categories = getAll("SELECT * FROM categories");

    if(isset($_POST['action']) && $_POST['action'] == 'delete'){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
    
        if($id) {
            $delete_query = "DELETE FROM categories WHERE id = " .$id;
            
            echo query($delete_query) ? "Record Deleted" : "Error" ;
        }
    }

?>

    <main>
        <div class="container-header">
            <h2>კატეგორიები</h2>
            <a href="<?= '?' . $_SERVER['QUERY_STRING'] . '&action=form' ?>" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($categories as $value) { ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['title'] ?></td>
                    <td class="actions">
                        <a class="edit" href="<?= '?' . $_SERVER['QUERY_STRING'] . '&action=update&id='.$value['id'] ?>">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <a class="delete" href="">Delete</a>
                        </form>
                    </td>
                </tr>
            <?php } ?>
              </table>
        </div>
    </main>