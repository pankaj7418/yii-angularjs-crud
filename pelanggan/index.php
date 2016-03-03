<fieldset ng-app="App" ng-controller="AppCtrl">
	<legend>Single Page CRUD Data Pelanggan</legend>
	<table class="table table-hover" >
		<thead>
			<th>#</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td>
					<input type="text" placeholder="Nama Pelanggan" class="form-control" ng-model="data.nama" />
				</td>
				<td>
					<input type="text" placeholder="Alamat Pelanggan" class="form-control" ng-model="data.alamat" />
				</td>
				<td>
					<input type="text" placeholder="Telepon Pelanggan" class="form-control" ng-model="data.telp" />
				</td>
				<td>
					<input type="text" placeholder="Email Pelanggan" class="form-control" ng-model="data.email" />
				</td>
				<td>
					<button class="btn btn-primary" ng-click="simpan()">Simpan</button>
				</td>
			</tr>
			<tr ng-repeat="pelanggan in semuaPelanggan">
				<td>{{$index+1}}</td>
				<td>{{pelanggan.nama}}</td>
				<td>{{pelanggan.alamat}}</td>
				<td>{{pelanggan.telp}}</td>
				<td>{{pelanggan.email}}</td>
				<td>
					<button class="btn btn-success" ng-click="preUbah(pelanggan)">Ubah</button>
					<button class="btn btn-danger" ng-click="hapus(pelanggan.id)">Hapus</button>
				</td>
			</tr>
			
		</tbody>
	</table>
</fieldset>

<?php
	// memasukkan semua file yang dibutuhkan
	echo $this->registerJsFile('js/angular.js');
	echo $this->registerJsFile('js/app.js');
?>