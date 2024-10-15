<?php
class Animal {
    public $animals = [];

   
    public function __construct($data = []) {
        $this->animals = $data;
    }
    public function index() {
        foreach ($this->animals as $name) {
            echo "$name <br>";
        }
    }

    public function store($name) {
        $this->animals[] = $name; 
    }

    public function update($oldName, $newName) {
        $index = array_search($oldName, $this->animals); 
        if ($index !== false) {
            $this->animals[$index] = $newName;
        } else {
            echo "Hewan dengan nama $oldName tidak ditemukan.<br>";
        }
    }

    
    public function destroy($name) {
        $index = array_search($name, $this->animals); 
        if ($index !== false) {
            unset($this->animals[$index]);
            $this->animals = array_values($this->animals); 
        } else {
            echo "Hewan dengan nama $name tidak ditemukan.<br>";
        }
    }
}


$animal = new Animal(['kambing', 'sapi', 'domba']);


echo 'Index - Menampilkan seluruh hewan<br>';
$animal->index();
echo '<br><br>';


echo 'Store - Menambahkan hewan baru (kambing)<br>';
$animal->store('kambing');
$animal->index();
echo '<br><br>';


echo 'Update - Mengupdate nama hewan<br>';
$animal->update('sapi', 'kerbau');
$animal->index();
echo '<br><br>';


echo 'Destroy - Menghapus hewan (domba)<br>';
$animal->destroy('domba');
$animal->index();
echo '<br><br>';
?>
