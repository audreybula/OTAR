<?php $page = "sellBook"; ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Sell Book Details</h3>
  </div>
  <div class="panel-body">
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <table width="100%" class="mdl-data-table table" cellspacing="0" cellpadding="10">
            <tr>
                <td class="font-bold">Book Title:</td>
                <td><input type="text" name="booktitle" class="form-control" placeholder="Enter book title"size="30" required></td>
            </tr>
            <tr>
                <td class="font-bold">Book Author:</td>
                <td><input type="text" name="bookauthor" class="form-control" placeholder="Enter book author" size="30" required></td>
            </tr>
            <tr>
                <td class="font-bold">Book Course:</td>
                <td><input type="text" name="bookcourse" class="form-control" placeholder="Enter book course" size="30" required></td>
            </tr>
            <tr>
                <td class="font-bold">Book Publisher:</td>
                <td><input type="text" name="bookpublisher" class="form-control" placeholder="Enter book publisher" placeholder="Enter book edition" size="30" required></td>
            </tr>
            <tr>
                <td class="font-bold">Book Picture:</td>
                <td><input type="file" name="bookpic" class="form-control" placeholder="Upload book picture" size="30"></td>
            </tr>
            <tr>
                <td class="font-bold">Book Edition:</td>
                <td><input type="text" name="bookedition" class="form-control" placeholder="Enter book edition" size="30" required></td>
            </tr>
            <tr>
                <td class="font-bold">Book Price:</td>
                <td><div class="dollar"><input type="number" name="bookprice" class="form-control" placeholder="Enter book price" size="30" required></div></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-primary" name="sellBookBtn" value="Post For Sale"></td>
                <td><input type="reset" class="btn btn-primary" name="resetBtn" value="Clear"></td>
            </tr>
        </table>
    </form>
  </div>
</div>