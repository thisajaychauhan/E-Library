<?php

class BookDetailController {
    private $model;
    
    public function __construct() {
        include '../modal/read_more.php';
        $this->model = new BookDetailModel();
    }
    
    public function show($id) {
        $book = $this->model->getBookDetail($id);
        include '../view/read_more.view.php';
    }
}

if (isset($_GET['id'])) {
    $controller = new BookDetailController();
    $controller->show($_GET['id']);
}
?>
