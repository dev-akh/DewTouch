<?php
	class FormatController extends AppController{
		
		public function q1(){
			
			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
		public function q1_detail(){

			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
		
		public function saveType()
		{
			$type="";
			$descriptions=[];
			if(isset($this->request->data['Type']) && isset($this->request->data['Type']['type']))
			{
				$type=$this->request->data['Type']['type'];
				switch ($type) {
					case 'Type1':
						$descriptions=['Description .......','Description 2'];
						break;
					
					case 'Type2':
						$descriptions=['Desc 1 .....','Desc 2...'];
						break;
					
					default:
						break;
				}

			}
			$this->set('type',$type);
			$this->set('descriptions',$descriptions);
		}
	}