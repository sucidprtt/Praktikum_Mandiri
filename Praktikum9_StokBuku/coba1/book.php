<?php
class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->setName($name);
        $this->setQty($qty);
    }

    private function setCodeBook($code_book): void {
        $pattern = "/^[A-Z]{2}\d{2}$/";
        if (preg_match($pattern, $code_book)) {
            $this->code_book = $code_book;
        } else {
            throw new Exception("Format code book harus sesuai dengan format 'BB00'");
        }
    }

    public function getCodeBook() {
        return $this->code_book;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }

    private function setQty($qty): void {
        if ($qty <= 0) {
            throw new Exception("Qty harus berupa angka integer positif");
        } 
        $this->qty = $qty;
    }
    

    public function getQty() {
        return $this->qty;
    }
}
?>
