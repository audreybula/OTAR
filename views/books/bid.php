<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1primary" data-toggle="tab">Book Details</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active " id="tab1primary">
                <div class="col-md-12">
                    <table id="example" class="mdl-data-table table" cellspacing="0" style="width:100%">
                        <?php foreach($viewmodel as $item) : ?>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>                                
                                <th>Publisher</th>
                                <th>Edition</th>
                                <th>Seller</th>
                                <?php if($item['bookStatus'] == 1) : ?>
                                <th>Price</th>
                                <th>Buy Now</th>
                                <?php else : ?>
                                <th>Current Bid</th>
                                <th>Bid End Date</th>
                                <th>Place A Bid</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>                                
                                <td><img alt="<?php echo $item['bookTitle']; ?>" width="200px" height="250px" src="/otar/assets/bookpics/<?php echo $item['bookPic']; ?>" /></td>
                                <td><?php echo $item['bookTitle']; ?></td>
                                <td><?php echo $item['bookAuthor']; ?></td>                                
                                <td><p><?php echo $item['bookPublisher']; ?></p></td>
                                <td><p><?php echo $item['bookEdition']; ?></p></td>
                                <td><?php echo $item['sellerID']; ?></td>
                                <?php if($item['bookStatus'] == 1) : ?>
                                <td><p>$<?php echo $item['bookPrice']; ?></p></td>
                                <td>
                                    <form method="post" action="<?php echo ROOT_URL; ?>users/messaging" enctype="multipart/form-data">
                                        <button class="btn btn-primary" name="buyNowBtn">Buy Now</button>
                                    </form>
                                </td>
                                <?php else : ?>
                                <td><p>$<?php echo $item['bidCurrent']; ?></p></td>
                                <td><p><?php  $date = $item['bidEndDate']; echo date('D d M Y, h:i A', strtotime($date)); ?></p></td>
                                <td>
                                    <form method="post" action="<?php echo ROOT_URL; ?>books/bid" enctype="multipart/form-data">
                                        <input type="number" name="bidAmt" class="form-control" placeholder="Enter bid amount" size="30" required><button class="btn btn-primary" name="bidBtn" value="<?php echo $item['bookID']; ?>">Place A Bid</button>
                                    </form>
                                </td>
                                <?php endif; ?>
                            </tr>                             
                        </tbody>                        
                        <?php endforeach; ?>
                    </table>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

