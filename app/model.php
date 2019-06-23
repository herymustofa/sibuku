<?php
	class Model {
		private $db; //Menyimpan Koneksi database
		private $error; //Menyimpan Error Message
        private $message;
	
		// Contructor untuk class User, membutuhkan satu parameter yaitu koneksi ke databse
        function __construct($db_conn){
			$this->db = $db_conn;
			// Mulai session
        	session_start();
        }

        //Login user
        public function login($user, $password){
            try{
                // Ambil data dari database
                $query = $this->db->prepare("SELECT * FROM user WHERE user = :user");
                $query->bindParam(":user", $user);
                $query->execute();
                $data = $query->fetch();


                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                     if($password == $data['password']){
                        $_SESSION['user_session'] = $user;
                        return true;						
					} else{
                        $this->error = "Password tidak sesuai";
                        return false;
                    }
                }else {				
                    $this->error = "User tidak ditemukan";
                    return false;
					
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Logout user
        public function logout(){
            // Hapus session
            session_destroy();
            // Hapus user_session
            unset($_SESSION['user_session']);
            return true;
        }        

        public function getLastError(){
            return $this->error;
        }      

        public function getLastMessage(){
            return $this->message;
        }           

        // Cek apakah user sudah login
        public function isLoggedIn(){
            // Apakah user_session sudah ada di session
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }

        // Ambil data user yang sudah login
        public function getUser(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM user WHERE user = :user");
                $query->bindParam(":user", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllJenisBuku(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM jenis ");
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }     


        public function getJenisBuku($kd_jenis){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM jenis WHERE kd_jenis=:kd_jenis");
                $query->bindParam(":kd_jenis", $kd_jenis);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }             

        public function inputJenisBuku($jenisbuku, $desbuku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    INSERT INTO `sibukudb`.`jenis` (`jenis_buku`, `deskripsi`)
                    VALUES
                      (:jenisbuku, :desbuku)
                    ");
                $query->bindParam(":jenisbuku", $jenisbuku);
                $query->bindParam(":desbuku", $desbuku);
                $query->execute();
                $this->message = "data berhasil disimpan";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }  

        public function updateJenisBuku($kd_jenis, $jenisbuku, $desbuku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    UPDATE 
                        `sibukudb`.`jenis` 
                    SET 
                        `jenis_buku` = :jenisbuku , 
                        `deskripsi`  = :desbuku
                    WHERE 
                        `kd_jenis` = :kd_jenis;
                    ");
                $query->bindParam(":kd_jenis", $kd_jenis);
                $query->bindParam(":jenisbuku", $jenisbuku);
                $query->bindParam(":desbuku", $desbuku);
                $query->execute();
                $this->message = "!! data berhasil diupdate";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }   

        public function delJenisBuku($kd_jenis){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    DELETE
                    FROM
                      `sibukudb`.`jenis`
                    WHERE `kd_jenis` = :kd_jenis
                    ");
                $query->bindParam(":kd_jenis", $kd_jenis);
                $query->execute();
                $this->message = "!! data berhasil didelete";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }     


        public function inputPenerbit($penerbit, $alamat){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    INSERT INTO `sibukudb`.`penerbit` (`penerbit`, `alamat`)
                    VALUES
                      (:penerbit, :alamat)
                    ");
                $query->bindParam(":penerbit", $penerbit);
                $query->bindParam(":alamat", $alamat);
                $query->execute();
                $this->message = "data berhasil disimpan";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllPenerbit(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM penerbit ");
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }  

        public function getPenerbit($kd_penerbit){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM penerbit WHERE kd_penerbit=:kd_penerbit");
                $query->bindParam(":kd_penerbit", $kd_penerbit);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }   

        public function updatePenerbit($kd_penerbit, $penerbit, $alamat){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    UPDATE 
                        `sibukudb`.`penerbit` 
                    SET 
                        `penerbit` = :penerbit , 
                        `alamat`  = :alamat
                    WHERE 
                        `kd_penerbit` = :kd_penerbit;
                    ");
                $query->bindParam(":kd_penerbit", $kd_penerbit);
                $query->bindParam(":penerbit", $penerbit);
                $query->bindParam(":alamat", $alamat);
                $query->execute();
                $this->message = "!! data berhasil diupdate";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function delPenerbit($kd_penerbit){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    DELETE
                    FROM
                      `sibukudb`.`penerbit`
                    WHERE `kd_penerbit` = :kd_penerbit
                    ");
                $query->bindParam(":kd_penerbit", $kd_penerbit);
                $query->execute();
                $this->message = "!! data berhasil didelete";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }   

        public function inputBuku($judul, $jenis, $penerbit, $tahun_terbit, $jumlah_buku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    INSERT INTO `sibukudb`.`buku` ( `judul`, `kd_jenis`, `kd_penerbit`, `tahun_terbit`, `jumlah_buku`)
                    VALUES
                      (:judul, :kd_jenis, :kd_penerbit, :tahun_terbit, :jumlah_buku)
                    ");
                $query->bindParam(":judul", $judul);
                $query->bindParam(":kd_jenis", $jenis);
                $query->bindParam(":kd_penerbit", $penerbit);
                $query->bindParam(":tahun_terbit", $tahun_terbit);
                $query->bindParam(":jumlah_buku", $jumlah_buku);
                $query->execute();
                $this->message = "data berhasil disimpan";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllBuku(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                        SELECT
                          *
                        FROM
                          buku
                          INNER JOIN jenis ON buku.`kd_jenis` = jenis.`kd_jenis`
                          INNER JOIN penerbit ON buku.`kd_penerbit` = penerbit.`kd_penerbit`
                    ");
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getBuku($kd_buku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    SELECT
                      *
                    FROM
                      buku
                      JOIN jenis
                      JOIN penerbit
                        ON buku.`kd_jenis` = jenis.`kd_jenis`
                        AND buku.`kd_penerbit` = penerbit.`kd_penerbit`
                        WHERE buku.`kd_buku` = :kd_buku 
                ");
                $query->bindParam(":kd_buku", $kd_buku);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }                              

        public function updateBuku($kd_buku, $judul, $kd_jenis, $kd_penerbit, $tahun_terbit, $jumlah_buku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    UPDATE 
                        `sibukudb`.`buku` 
                    SET 
                        `judul`         = :judul, 
                        `kd_jenis`      = :kd_jenis,
                        `kd_penerbit`   = :kd_penerbit, 
                        `tahun_terbit`  = :tahun_terbit,
                        `jumlah_buku`   = :jumlah_buku                                           
                    WHERE 
                        `kd_buku` = :kd_buku;
                ");
                $query->bindParam(":kd_buku", $kd_buku);
                $query->bindParam(":judul", $judul);
                $query->bindParam(":kd_jenis", $kd_jenis);
                $query->bindParam(":kd_penerbit", $kd_penerbit);
                $query->bindParam(":tahun_terbit", $tahun_terbit);
                $query->bindParam(":jumlah_buku", $jumlah_buku);
                $query->execute();
                $this->message = "data berhasil di update";
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function delBuku($kd_buku){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("
                    DELETE
                    FROM
                      `sibukudb`.`buku`
                    WHERE `kd_buku` = :kd_buku
                    ");
                $query->bindParam(":kd_buku", $kd_buku);
                $query->execute();
                $this->message = "!! data berhasil didelete";
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }          
		
	}//end class
?>