<?php

class TransactionController extends AppController{

    public function index()
    {
        ini_set('memory_limit','-1');
		set_time_limit(0);

        $this->setFlash('MVC');
        $this->loadModel('Transaction');
		$transactions = $this->Transaction->find('all',
                                    array(
                                        'conditions' => array('Transaction.valid' => 1),
                                        'recursive'=>1,
                                        'limit'=>500
                                    )
                                );
        // debug($transactions);exit;
        $this->set('transactions',$transactions);

		$this->set('title',__('Transactions List'));
    }

}
?>