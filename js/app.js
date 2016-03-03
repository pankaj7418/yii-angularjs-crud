var app = angular.module("App",[]);
app.controller("AppCtrl",function($scope,$http){
	
	//menset aksi simpan pada saat aplikasi dijalankan adalah menambah data
	$scope.aksiSimpan = "tambah";
	// menset nilai awal data adalah sebagai objek kosong
	$scope.data = {};
	// aksi menambah pelanggan
	$scope.tambah = function(){
		$http.post(
			"index.php?r=pelanggan/create",
			{
				data : $scope.data
			}
		).success(function(){
			$scope.clearData();
			$scope.dapatkanPelanggan();
		}).error(function(){
			alert("gagal");
		});
	};
	// aksi mendapatkan semua data pelanggan
	$scope.dapatkanPelanggan = function(){
		$http.get(
			'index.php?r=pelanggan/get-pelanggan'
		).success(function(data){
			$scope.semuaPelanggan = data;
		});
	};
	// aksi sebelum mengubahah data, agar data yang mau diubah bisa diedit
	$scope.preUbah = function(data){
		$scope.data = data;
		$scope.aksiSimpan = "ubah";
	};
	// aksi mengubah data yang sebenarnya
	$scope.ubah = function(){
		$http.post(
			'index.php?r=pelanggan/ubah',
			{
				data : $scope.data
			}
		).success(function(){
			$scope.clearData();
			$scope.dapatkanPelanggan();
		}).error(function(){
			alert("gagal ubah data");
		});
		
		$scope.aksiSimpan = "tambah";
	};
	// aksi menghapus data
	$scope.hapus = function(id){
		$http.post(
			'index.php?r=pelanggan/hapus',
			{
				id : id
			}
		).success(function(){
			$scope.dapatkanPelanggan();
		}).error(function(){
			alert("gagal hapus data");
		});
	};
	/*
	 * aksi menyimpan data,
	 * aksi ini bisa menambah data atau mengubah data,
	 * tergantung dari nilai $scope.aksiSimpan
	 */
	$scope.simpan = function(){
		switch($scope.aksiSimpan){
			case "tambah" :
				$scope.tambah();
			break;
			
			case "ubah" :
				$scope.ubah();
			break;
		}
	};
	// membersihkan inputan data pelanggan
	$scope.clearData = function(){
		$scope.data = {
			nama : "",
			alamat : "",
			telp : "",
			email : ""
		};
	};
	// pada saat aplikasi dijalankan secara otomatis mendaptkan semua data pelanggan
	$scope.dapatkanPelanggan();
	
});
