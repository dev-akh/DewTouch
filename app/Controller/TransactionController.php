<?php

class TransactionController extends AppController{

    public function index()
    {
        $this->setFlash('MVC');
        $this->loadModel('Transaction');
		$transactions = $this->Transaction->find('all',
                                    array(
                                        'conditions' => array('Transaction.valid' => 1),
                                        'recursive'=>1
                                    )
                                );
        // debug($transactions);exit;
        $this->set('transactions',$transactions);

		$this->set('title',__('Transactions List'));
    }

}
?>