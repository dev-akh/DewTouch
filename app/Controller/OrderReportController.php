<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			// debug($orders);exit;

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
			// debug($portions);exit;


			// To Do - write your own array in this format
			// $order_reports = array('Order 1' => array(
			// 							'Ingredient A' => 1,
			// 							'Ingredient B' => 12,
			// 							'Ingredient C' => 3,
			// 							'Ingredient G' => 5,
			// 							'Ingredient H' => 24,
			// 							'Ingredient J' => 22,
			// 							'Ingredient F' => 9,
			// 						),
			// 					  'Order 2' => array(
			// 					  		'Ingredient A' => 13,
			// 					  		'Ingredient B' => 2,
			// 					  		'Ingredient G' => 14,
			// 					  		'Ingredient I' => 2,
			// 					  		'Ingredient D' => 6,
			// 					  	),
			// 					);

			
			$portionData=$this->portionDataManipulate($portions);
			
			$orderData=$this->orderDataManipulate($orders,$portionData);

			$order_reports=array();
			foreach ($orderData as $k => $order_data) {
				$sumValue = array();
					array_walk_recursive($order_data, function($item, $key) use (&$sumValue){
						$sumValue[$key] = isset($sumValue[$key]) ?  ($item + $sumValue[$key]) : (float)$item;
					});
				$order_reports[$k]=$sumValue;
			}

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		private function portionDataManipulate($portions)
		{
			$portionData=array();
			foreach ($portions as $k => $portion) {
				$PortionDetail=array();
				foreach ($portion['PortionDetail'] as $key => $portion_detail) {

					$PortionDetail[$portion_detail['Part']['name']]=$portion_detail['value'];

				}
				$portionData[$portion['Item']['id']]=$PortionDetail;
			}
			return $portionData;
		}

		private function orderDataManipulate($orders,$portionData)
		{
			$orderData=array();
			foreach ($orders as $key => $order) {
				$orderDetailPortion=array();
				foreach ($order['OrderDetail'] as $key => $order_detail) {
					if(isset($portionData[$order_detail['item_id']])){
						$orderDetailPortion[$order_detail['item_id']]=$portionData[$order_detail['item_id']];
					}
				}
				$orderData[$order['Order']['name']]=$orderDetailPortion;
			}
			return $orderData;
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}