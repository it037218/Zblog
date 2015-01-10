<?php
	class TagsAction extends Action {

		public function tags(){
			$m=new TagsModel();
			
			$res=$m->add();
			
			$this->display();
	    }

	    public function add(){
	    	
	    	$this->display();
	    }

		public function edit(){

			$this->display();
		}


	}

?>