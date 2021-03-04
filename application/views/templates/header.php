<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title><?php echo $judul; ?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
		<a class="navbar-brand" href="#">Tahfidz ICR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			<a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
			<a class="nav-link" href="<?= base_url(); ?>santri">Santri</a>
			<a class="nav-link" href="<?= base_url(); ?>pengajar">Pengajar</a>
			<a class="nav-link" href="<?= base_url(); ?>donatur">Donatur</a>
			<a class="nav-link" href="<?= base_url(); ?>absensi">Kehadiran santri</a>
			<a class="nav-link" href="<?= base_url(); ?>hafalan">Hafalan</a>
			<a class="nav-link" href="">About</a>
			</div>
		</div>
  </div>
</nav>
