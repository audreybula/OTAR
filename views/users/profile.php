<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1primary" data-toggle="tab">My Profile</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active " id="tab1primary">
                <div class="col-md-12">
                    <table id="example" class="mdl-data-table table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>ID</th>
                                <th>Programme</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($viewmodel as $item) : ?>
                            <tr>
                                <td><img alt="<?php echo $item['studFName']; ?>" width="200px" height="250px" src="/otar/assets/userpics/<?php echo $item['studPic']; ?>" /></td>
                                <td><?php echo $item['studFName']; ?></td>
                                <td><?php echo $item['studLName']; ?></td>
                                <td><p><?php echo $item['studID']; ?></p></td>
                                <td>
                                    <p><?php echo $item['studProgramme']; ?></p>
                                </td>
                                <td><?php echo $item['studEmail']; ?></td>
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

