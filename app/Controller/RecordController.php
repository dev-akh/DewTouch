<?php
	class RecordController extends AppController{

		public $components = array('DataTable');

		public function index(){
			ini_set('memory_limit','256M');
			set_time_limit(0);
			
			$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			$this->set('title',__('List Record'));
		}

		public function getData()
		{
			$this->layout = false; 
			$this->render(false);
			if($this->request->is('ajax')) {
				$this->paginate = array(
					'fields' => array('id', 'name'),
					'link' => array(
						'Record' => array(
							'fields' => array('id','name')
						)
					)
				);
				$this->DataTable->mDataProp = true;
				$records=$this->DataTable->getResponse();
				echo json_encode($records);exit;
			}
		}
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}