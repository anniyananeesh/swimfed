<div id="page-wrapper">
<div class="main-page">
<h3 class="title1">Approval Requests</h3>
<div class="tables">
<div class="bs-example widget-shadow" data-example-id="hoverable-table">
<div class="inbox-row">
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-left">
<li><button onclick="window.location.href='<?php echo $ctrlUrl;?>'" class="blue_button3">Refresh</button></li>
</ul>
<form class="navbar-form navbar-right" method="get" enctype="application/x-www-form-urlencoded">
<div class="form-group">
<input type="text" class="form-control" name="q" id="q" placeholder="Search by Name">
</div>
<button type="submit" class="btn green_button2">Search</button>
</form>
</div>
</div>
</nav>
</div>
<h4>Registered members</h4>
<table class="table table-hover">
<thead>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Nationality</th>
<th>Club</th>
<th>Last Update</th>
<th>Submit Date</th>
<th>Status</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php if($records):?>
<?php foreach ($records as $key=> $value):?>
<tr>
<th scope="row"><?php echo $value->code?></th>
<td><?php echo $value->first_name?></td>
<td><?php echo $value->last_name?></td>
<td><?php echo $value->emirate?></td>
<td><?php echo $value->name?></td>
<td><?php echo date('d-m-Y <br> h.i a', strtotime($value->updated_on))?></td>
<td><?php echo date('d-m-Y <br> h.i a', strtotime($value->created_on))?></td>
<td><?php echo ($value->is_active == 'Y') ? 'Active' : 'Pending'?></td>
<td><a href="<?php echo HOST_URL . '/' . ADMIN_URL . '/Clubs'?>/view_member/<?php echo $this->mencrypt->encode($value->club_fk)?>/<?php echo $this->mencrypt->encode($value->id)?>" class="blue_button3">View</a></td>
</tr>
<?php endforeach;?>
<?php else:?>
<tr>
<td colspan="10">No records has been found</td>
</tr>
<?php endif;?>
</tbody>
</table>
</div>
</div>
</div>
</div>
