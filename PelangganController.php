<?php
	namespace app\controllers;
	use Yii;
	use yii\web\Controller;
	use app\models\Pelanggan;
	// membuat conttroller pelanggan
	class PelangganController extends Controller {
		// menonaktifkan csrfvalidation agar fungsi $http.post() bisa berjalan
		public function beforeAction($action) {
		    $this->enableCsrfValidation = false;
		    return parent::beforeAction($action);
		}
		// merender halaman utama
		public function actionIndex(){
			return $this->render('index');
		}
		// aksi menambah data
		public function actionCreate(){
			$postData = file_get_contents("php://input");
			$dataObject = json_decode($postData);
			
			$pelanggan = new Pelanggan();
			$pelanggan->nama = $dataObject->data->nama;
			$pelanggan->alamat = $dataObject->data->alamat;
			$pelanggan->telp = $dataObject->data->telp;
			$pelanggan->email = $dataObject->data->email;
			$pelanggan->save();
		}
		// aksi mengubah data
		public function actionUbah(){
			$postData = file_get_contents("php://input");
			$dataObject = json_decode($postData);
			
			$pelanggan = Pelanggan::findOne($dataObject->data->id);
			$pelanggan->nama = $dataObject->data->nama;
			$pelanggan->alamat = $dataObject->data->alamat;
			$pelanggan->telp = $dataObject->data->telp;
			$pelanggan->email = $dataObject->data->email;
			$pelanggan->save();
		}
		// aksi menghapus data
		public function actionHapus(){
			$postData = file_get_contents("php://input");
			$dataObject = json_decode($postData);
			
			$pelanggan = Pelanggan::findOne($dataObject->id);
			$pelanggan->delete();
		}
		// aksi menampilkan semua data
		public function actionGetPelanggan(){
			$pelanggan = Pelanggan::find()->asArray()->all();
			return json_encode($pelanggan);
		}
		
		
	}
?>