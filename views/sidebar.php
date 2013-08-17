<? 
$role = $this->session->userdata("logged_in");
$data['ac_role'] = $role['ac_role'];
?>
<div class="navi">
	<ul class='main-nav'>
		<li <? if($mlink == 'home'){ echo 'class="active"';} ?>>
			<a href="<?=base_url('index.php');?>/dashboard" class='light'>
				<div class="ico"><i class="icon-home icon-white"></i></div>
				Home
			</a>
		</li>
		<li <? if($mlink == 'score'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class=" icon-briefcase icon-white"></i></div>
				Evaluation
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'score'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<li <? if($slink == 's_score'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/score/class_student">
						Student's score 
					</a>
				</li>
				<li <? if($slink == 'activity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/score/manage_activity">
						Activity
					</a>
				</li>
				<li <? if($slink == 'promote'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/score/promote_class">
						Promote
					</a>
				</li>
				<li <? if($slink == 'status'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/score/status_class">
						Student Status
					</a>
				</li>
			</ul>
		</li>
		<li <? if($mlink == 'course'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class="icon-tasks icon-white"></i></div>
				Course Management
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'course'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<li <? if($slink == 'manage_course'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/course/manage_course">
						Manage Course
					</a>
				</li>
				<li <? if($slink == 'manage_class'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/course/manage_class">
						Manage Class
					</a>
				</li>
				<li <? if($slink == 'manage_activity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/course/manage_activity">
						Manage Free Activity
					</a>
				</li>
				<li <? if($slink == 'manage_reactivity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/course/manage_reactivity">
						Manage Required Activity
					</a>
				</li>
			</ul>
		</li>
		<li <? if($mlink == 'student'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class="icon-tasks icon-white"></i></div>
				Student
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'student'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<li <? if($slink == 'list_student_id'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/student/liststudent_id">
						List Student by ID
					</a>
				</li>
				<li <? if($slink == 'list_student_cr'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/course/class_student">
						List Student by Class&Room
					</a>
				</li>
				<li <? if($slink == 'create_student'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/student/create">
						Create Student
					</a>
				</li>
			</ul>
		</li>
		<li <? if($mlink == 'teacher'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class="icon-tasks icon-white"></i></div>
				Teacher
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'teacher'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<li <? if($slink == 'list_teacher'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/teacher/list_teacher">
						List Teacher
					</a>
				</li>
				<li <? if($slink == 'create_teacher'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/teacher/create">
						Create Teacher
					</a>
				</li>
			</ul>
		</li>			
		<li <? if($mlink == 'subject'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class="icon-tasks icon-white"></i></div>
				Subject / Activity
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'subject'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<li <? if($slink == 'list_subject'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/subject/list_subject">
						List Subject
					</a>
				</li>
				<li <? if($slink == 'list_activity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/subject/list_activity">
						List Free Activity
					</a>
				</li>
				<? if($data['ac_role'] <= 3){ ?>
				<li <? if($slink == 'list_reactivity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/subject/list_reactivity">
						List Required Activity
					</a>
				</li>
				<? } ?>
				<li <? if($slink == 'create_subject'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/subject/add_subject">
						Create Subject
					</a>
				</li>
				
				<li <? if($slink == 'create_activity'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/subject/add_activity">
						Create Activity
					</a>
				</li>
			</ul>
		</li>
		
		
		
		<!--<li <!? if($mlink == 'print'){ echo 'class="active"';} ?>>
			<a href="<!?=base_url('index.php');?>/print/main" class='light'>
				<div class="ico"><i class="icon-print icon-white"></i></div>
				Prints
			</a>
		</li>-->	
		<li <? if($mlink == 'system'){ echo 'class="active"';} ?>>
			<a href="#" class='light toggle-collapsed'>
				<div class="ico"><i class="icon-wrench icon-white"></i></div>
				System
				<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
			</a>
			<ul <? if($mlink == 'system'){ echo 'class="collapsed-nav"';}else{ echo 'class="collapsed-nav closed"';} ?>>
				<? if($data['ac_role'] <= 2){ ?>
				<li <? if($slink == 'list_user'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/system_m/list_user">
						List User
					</a>
				</li>
				<li <? if($slink == 'create_user'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/system_m/create_user">
						Create User
					</a>
				</li>
				<? } ?>
				<li <? if($slink == 'change_password'){ echo 'class="active"';} ?>>
					<a href="<?=base_url('index.php');?>/system_m/change_password">
						Change Password
					</a>
				</li>
			</ul>
		</li>									
	</ul>
</div>
