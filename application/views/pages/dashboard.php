<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Game</a>
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Last 5 Games</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Developer</th>
					<th>Release date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($games as $game) : ?>
                    <tr>
                        <td><?=$game['id']?></td>
                        <td><?=$game['name']?></td>
                        <td><?=$game['price']?></td>
                        <td><?=$game['developer']?></td>
                        <td><?=$game['release_date']?></td>
                        <td>
							<?php if($_SESSION['logged_user']['id'] == $game['user_id']) : ?>
                            <a href="<?= base_url() ?>games/edit/<?=$game['id']?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:goDelete(<?=$game['id']?>)" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
							<?php else : ?>
							<button disabled class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button>
                            <button disabled class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
							<?php endif;?>
                        </td>
                    </tr>
                <?php endforeach;?>
			</tbody>
		</table>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Last 5 Users</h2>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Country</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user) : ?>
					<tr>
						<td><?=$user['id']?></td>
						<td><?=$user['name']?></td>
						<td><?=$user['email']?></td>
						<td><?=$user['country']?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</main>
<script>
	function goDelete(id) {
		var myUrl = 'games/edit/'+id;
		if(confirm("Deseja apagar este registro?")) {
			window.location.href = 'games/delete/'+id;
		} else {
			alert("Registro não alterado");
			return false;
		}
	}
</script>