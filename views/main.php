<?php global $page; ?>
<html>
    <head>
        <title>OTAR</title>
        <script src="/otar/assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="/otar/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/otar/assets/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="/otar/assets/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="/otar/assets/css/style.css" type="text/css"/>        
    </head>
    
    <body>
        <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="USPHeader">
                <tr bgcolor="#ddbb4d">
                    <td width="233" align="left"><a href="https://www.usp.ac.fj/" target="_blank"><img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/50th/img/50th_usp_logo.jpg"></a></td>
                    <td width="33" align="left"><img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/50th/img/50th_usp_logo_side.jpg"></td>
                    <td align="left"><img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/50th/img/50th_usp_logo_side2.jpg"></td>
                    <td align="right"><img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/50th/img/50th_theme.jpg"></td>
                </tr>
                <tr>
                    <td colspan="2" align="left"><a href="https://www.usp.ac.fj/" target="_blank"><img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/50th/img/50th_logo_bottom.jpg"></a></td>
                    <td colspan="2" style="font-size: 18px; font-family: tahoma; color: white" bgcolor="#8C7225">Online Textbook Advertisement & Retail</td>
                </tr>
            </table>
        </div>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <nav class="navbar navbar-inverse navbar-static-top">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <?php if(isset($_SESSION['is_student'])) : ?>
                <ul class="nav navbar-nav">
                  <li><a href="<?php echo ROOT_URL; ?>books">Home</a></li>
                  <li><a href="<?php echo ROOT_URL; ?>books/sell">Post Book For Sale</a></li>
                  <li><a href="<?php echo ROOT_URL; ?>books/auction">Post Book For Auction</a></li>
                  <li><a href="<?php echo ROOT_URL; ?>books/request">Request For A Book</a></li>
                </ul> 
                <?php endif; ?>
                <ul class="nav navbar-nav navbar-right">  
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php if(isset($_SESSION['is_student'])){ echo $_SESSION['user_data']['studFname'].' '.$_SESSION['user_data']['studLname']; } else{ echo $_SESSION['user_data1']['adFname'].' '.$_SESSION['user_data1']['adLname']; } ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php if(isset($_SESSION['is_student'])) : ?>  
                      <li><a href="<?php echo ROOT_URL; ?>users/profile">My Profile</a></li>
                      <li><a href="<?php echo ROOT_URL; ?>users/posts">My Posts</a></li>
                      <li><a href="<?php echo ROOT_URL; ?>users/messaging">Messages</a></li>
                      <?php endif; ?>
                      <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav><br/>
        <?php if(isset($_SESSION['is_student'])) : ?>  
        <div class="row">
            <div class="col-xs-6 col-md-4 pull-right">
                <form method="post" action="<?php echo ROOT_URL; ?>books/search" enctype="multipart/form-data">
                    <div class="input-group">                
                        <input type="text" class="form-control" placeholder="Search For A Book..." name="searchfield" id="txtSearch" required/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary" name="searchBtn"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>               
            </div>
        </div><br/>
        <?php endif; ?>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <?php Messages::display(); ?>
                <?php require($view); ?>
            </div>
        </div><!-- /.container --><br/><br/><br/>
        <!--<footer>-->
            <div>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td valign="top" colspan="4" style="height:3px; background-color: #004251"></td>
                    </tr>
                    <tr>
                        <td valign="top" colspan="5">
                            <table cellspacing="0" cellpadding="7" border="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" width="117" valign="top">
                                            <a target="_blank" href="http://www.usp.ac.fj/">
                                                <div id="btlogo">
                                                    <img src="http://www.usp.ac.fj/fileadmin/main_uni_template/newwebsite/img/usp_main_logo.gif" alt="USP 50th" width="117" height="50"/> 
                                                </div>
                                            </a>
                                        </td>
                                        <td align="left" valign="top">
                                            <a onfocus="blurLink(this);" href="http://www.usp.ac.fj/index.php?id=disclaimer_copyright">Disclaimer &amp; Copyright</a>&nbsp; l &nbsp;
                                            <a onfocus="blurLink(this);" href="http://www.usp.ac.fj/index.php?id=contact">Contact Us</a>&nbsp;  &nbsp;
                                            <b><br></b>&copy; Copyright 2018 - <?php echo date('Y').". " ?> All Rights Reserved.<br>
                                        </td>
                                        <td></td>
                                        <td align="right" valign="top">
                                            <b>The University of the South Pacific</b><br>Laucala Campus, Suva, Fiji<br>Tel: +679 323 1000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        <!--</footer>--> 
</html>

