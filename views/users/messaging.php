
    <div class="panel panel-primary">
        <div class="panel-heading top-bar">
            <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Messages</h3>
        </div>
        <?php if(isset($_SESSION['msgExists'])) : ?>
        <?php foreach($viewmodel as $item) : ?>
        <div class="panel-body msg_container_base">
            <div class="row msg_container base_sent">               
                <div class="col-md-10 col-xs-10">
                    <div class="messages msg_sent">
                        <?php if($_SESSION['user_data']['studID'] == $item['studID']) : ?>
                        <p><?php echo $item['messageText'] ?></p>
                        <p class="small"><?php $date = $item['messageDate']; echo date('D d M Y, h:i A', strtotime($date)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2 col-xs-2 avatar">
                    <?php if($_SESSION['user_data']['studID'] == $item['studID']) : ?>
                    <p><b><?php echo $item['studFName'].' '.$item['studLName'] ?></b></p>
                    <img src="/otar/assets/userpics/<?php echo $item['studPic']; ?>" alt="<?php echo $item['studFName']; ?>" width="170px" height="200px" class=" img-responsive ">                     
                    <?php endif; ?>
                </div>
            </div>
            <div class="row msg_container base_receive">
                
                <div class="col-md-2 col-xs-2 avatar">
                    <?php if($_SESSION['user_data']['studID'] != $item['studID']) : ?>
                    <p><b><?php echo $item['studFName'].' '.$item['studLName'] ?></b></p>
                    <img src="/otar/assets/userpics/<?php echo $item['studPic']; ?>" alt="<?php echo $item['studFName']; ?>" width="170px" height="200px" class=" img-responsive ">                     
                    <?php endif; ?>
                </div>
                <div class="col-md-10 col-xs-10">
                    <div class="messages msg_receive">
                        <?php if($_SESSION['user_data']['studID'] != $item['studID']) : ?>
                        <p><?php echo $item['messageText'] ?></p>
                        <p class="small"><?php $date = $item['messageDate']; echo date('D d M Y, h:i A', strtotime($date)); ?></p>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!--<div class="panel-footer">-->
            <div class="input-group">
                    <form method="post" action="<?php echo ROOT_URL; ?>users/messaging" enctype="multipart/form-data">                
                    <input id="btn-input" type="text" name="messagetext" class="form-control chat_input" placeholder="Write your message here..." required/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" name="msgBtn" value="">Send</button>
                    </span>
                    </form>
            </div>
        <!--</div>-->
    </div>