<?php 
    class Pagination {

        private $per_page = 5;


        public function paginate($current_page,$number_of_items,$items) {
            $offset = ($current_page - 1) * $this->per_page;
            $paginated =  array_slice($items,$offset,$this->per_page);
            return($paginated);
        }

        public function getTotalPages($number_of_items){
           return ceil($number_of_items / $this->per_page);
        }


    }