<?php
	class Transaction extends AppModel{
		
		var $hasMany = array('TransactionItem' => array(
									'conditions' => array('TransactionItem.valid' => 1),
                                    'recursive'=>-1
								)
							);
        var $belongsTo = array('Member');
	}