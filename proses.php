<?php 

class Rental {
    public $nama,
           $diskon,
           $hargaRental,
           $pajak,
           $namaMamber,
           $waktuHari,
           $jenisMotor;

    public function __construct($nama, $waktuHari, $jenisMotor, $diskon = 5, $hargaRental = 700000, $pajak = 100000, $namaMamber = ["i", "l", "y"])
    {
        $this->nama = $nama;
        $this->diskon = $diskon;
        $this->hargaRental = $this->setHargaRental($jenisMotor);
        $this->pajak = $pajak;
        $this->namaMamber = $namaMamber;
        $this->waktuHari = $waktuHari;    
        $this->jenisMotor = $jenisMotor;
    }

    public function setHargaRental($jenisMotor)
    {
        switch ($jenisMotor) {
            case 'supra':
                return 500000; // Harga sewa per hari untuk Supra
            case 'mx':
                return 700000; // Harga sewa per hari untuk MX
            case 'vespa':
                return 900000; // Harga sewa per hari untuk Vespa
            default:
                return 700000; // Harga default jika jenis motor tidak dikenali
        }
    }

    public function setHarga()
    {
        return $this->hargaRental * $this->waktuHari;
    }

    public function setDiskon()
    {
       return ($this->diskon / 100) * $this->setHarga(); 
    }

    public function isMember()
    {
        return in_array($this->nama, $this->namaMamber);
    }

    public function setPajak()
    {
        if ($this->isMember()) {
            return ($this->setHarga() + $this->pajak) - $this->setDiskon();
        } else {
            return $this->setHarga() + $this->pajak;
        }
    }  
}
