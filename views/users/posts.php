<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1primary" data-toggle="tab">My Posts</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active " id="tab1primary">
                <div class="col-md-12">
                    <table id="example" class="mdl-data-table table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Details</th>
                                <th>Mark As Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($viewmodel as $item) : ?>
                            <tr>
                                <td><img alt="<?php echo $item['bookTitle']; ?>" width="200px" height="250px" src="/otar/assets/bookpics/<?php echo $item['bookPic']; ?>" /></td>
                                <td><?php echo $item['bookTitle']; ?></td>
                                <td><?php echo $item['bookAuthor']; ?></td>
                                <td>
                                    <form method="post" action="<?php echo ROOT_URL; ?>books/details" enctype="multipart/form-data">
                                        <button class="btn btn-primary" name="bookid" value="<?php echo $item['bookID']; ?>">View</button>
                                    </form>
                                </td>
                                <td>
                                    <?php if($item['bookAvailability'] == 1) : ?>
                                    <form method="post" action="<?php echo ROOT_URL; ?>books/sold" enctype="multipart/form-data">
                                        <button class="btn btn-primary" name="soldBtn" value="<?php echo $item['bookID']; ?>">Sold</button>
                                    </form>
                                    <?php else : ?>
                                    <form method="post" action="<?php echo ROOT_URL; ?>books/unsold" enctype="multipart/form-data">
                                        <button class="btn btn-primary" name="unsoldBtn" value="<?php echo $item['bookID']; ?>">Unsold</button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

