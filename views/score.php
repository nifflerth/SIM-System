<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Information Management Systems</title>
<meta name="description" content="">
<?php $role = $this->session->userdata("logged_in"); ?>
<?php $data['ac_role'] = $role['ac_role']; ?>
<?php if($data['ac_role'] != null) { ?>
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="<?=site_url("/css/bootstrap.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.fancybox.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/style.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/bootstrap-responsive.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/uniform.default.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/bootstrap.datepicker.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.cleditor.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.plupload.queue.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.tagsinput.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.ui.plupload.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/chosen.css")?>">
</head>
<body>              
<div class="topbar">
    <div class="container-fluid">
        <a href="dashboard.html" class='company'>SIM Systems</a>
        <ul class='mini'>
            </li>
            <li>
                <a href="index.html">
                    <img src="<?=site_url("img/icons/fugue/control-power.png") ?>" alt="">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="breadcrumbs">
    <div class="container-fluid">
        <ul class="bread pull-left">
            <li>
                <a href="<?=base_url('index.php');?>/dashboard"><i class="icon-home icon-white"></i></a>
            </li>
            <li>
                <a href="<?=base_url('index.php');?>/score">
                    เพิ่มคะแนน
                </a>
            </li>
        </ul>

    </div>
</div>
<div class="main">
    <div class="navi">
        <ul class='main-nav'>
            <li>
                <a href="<?=base_url('index.php');?>/dashboard" class='light'>
                    <div class="ico"><i class="icon-home icon-white"></i></div>
                    หน้าแรก
                </a>
            </li>
            <li>
                <a href="<?=base_url('index.php');?>/add" class='light'>
                    <div class="ico"><i class="icon-list icon-white"></i></div>
                    เพิ่มนักเรียนใหม่
                </a>
            </li>
            <li>
                <a href="#" class='light toggle-collapsed'>
                    <div class="ico"><i class="icon-tasks icon-white"></i></div>
                    ค้นหา
                    <img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
                </a>
                <ul class='collapsed-nav closed'>
                    <li>
                        <a href="<?=base_url('index.php');?>/search">
                            ค้นหาด้วยรหัสประจำตัวนักเรียน
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url('index.php');?>/search">
                            ค้นหาด้วยระดับชั้นและห้องเรียน
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=base_url('index.php');?>/subject" class='light'>
                    <div class="ico"><i class="icon-th-large icon-white"></i></div>
                    รายชื่อวิชา
                </a>
            </li>
            <li class="active">
                <a href="<?=base_url('index.php');?>/score" class='light'>
                    <div class="ico"><i class="icon-th-large icon-white"></i></div>
                    เพิ่มคะแนน
                </a>
            </li>
            <li>
                <a href="<?=base_url('index.php');?>/prints" class='light'>
                    <div class="ico"><i class="icon-th-large icon-white"></i></div>
                    พิมพ์
                </a>
            </li>   
            <li>
                <a href="<?=base_url('index.php');?>/subject" class='light'>
                    <div class="ico"><i class="icon-th-large icon-white"></i></div>
                    Systems
                </a>
            </li>                               
        </ul>
    </div>
    <div class="container-fluid">
        <div class="content">
            <div class="row-fluid">
                <div class="span12">
                    <div class="box">
                        <div class="box-head tabs">
                            <h3>Add Score</h3>
                            <ul class='nav nav-tabs'>
                                <li>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                <?=isset($class)?$class:"ระดับชั้น";?>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                            <?php
                                                $uri = '/?';
                                                foreach ($list_class as $s)
                                                { ?>
                                                <li>
                                                    <a href="<?=current_url();?>/?class_id=<?=$s['CLASS_ID'];?>"><?=$s['CLASS_NAME'];?></a>
                                                </li><? } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>                              
                                <li>
                                    <div class="btn-toolbar">
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                <?=isset($room)?$room:"ห้องเรียน";?>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                foreach ($this->search_model->getRoom() as $s) 
                                                { ?>
                                                <li>
                                                    <a href="<?=current_url().$uri;?><?=isset($class_id)?"&":null;?>room=<?=$s['room_id'];?>"><?=$s['room_name'];?></a>
                                                </li><?}?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>                                  
                            </ul>
                        </div>
                        
                        <div class="box-content box-nomargin">
                            <div class="tab-content">
                                    <div class="tab-pane active" id="basic">
                                        <table class='table table-striped table-bordered'>
                                            <thead>
                                                <tr>
                                                    <th width="200px">Name</th>
                                                <?php foreach($this->search_model->subjectList() as $row){ ?>
                                                <th width="200px"><?=$row["subject_name"];?></th>
                                                <?}?>
                                                    <th width="70px">EDIT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($list_student as $row) { ?>
                                                <tr>
                                                    <td><center><?=$row["STUDENT_NAME"];?> <?=$row["STUDENT_SURNAME"];?></center></td>
                                                    <? foreach($list_score as $row) { ?>
                                                    <td><center><?=$row["score"];?></center></td>
                                                    <?}?>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
                                                                <div class="modal hide" id="myModal">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                                    <h3>Modal header</h3>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <p>One fine body…</p>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                                                                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                                                                  </div>
                                                              </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <? } ?>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div><!-- END OF CONTENT -->
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>  
<script src="<?=site_url("/js/jquery.js") ?> "></script>
<script src="<?=site_url("/js/less.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.uniform.min.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.timepicker.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.datepicker.js") ?> "></script>
<script src="<?=site_url("/js/chosen.jquery.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.fancybox.js") ?> "></script>
<script src="<?=site_url("/js/plupload/plupload.full.js") ?> "></script>
<script src="<?=site_url("/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js") ?> "></script>
<script src="<?=site_url("/js/jquery.cleditor.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.inputmask.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.tagsinput.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.mousewheel.js") ?> "></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.dataTables.bootstrap.js") ?> "></script>
<script src="<?=site_url("/js/jquery.textareaCounter.plugin.js") ?> "></script>
<script src="<?=site_url("/js/ui.spinner.js") ?> "></script>
<script src="<?=site_url("/js/custom.js") ?> "></script>
</body>
<? } ?>
</html>