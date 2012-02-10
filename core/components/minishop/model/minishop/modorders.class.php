<?php
class ModOrders extends xPDOSimpleObject {
  	
	function getUserName() {
	  if ($res = $this->xpdo->getObject('modUser', $this->get('uid'))) {
	    return $res->get('username');
	  }
	}
  
	function getFullName() {
	  
	  if ($res = $this->xpdo->getObject('modUserProfile', array('internalKey' => $this->get('uid')))) {
	    return $res->get('fullname');
	  }
	}
	
  	function getEmail() {
	  
	  if ($res = $this->xpdo->getObject('modUserProfile', array('internalKey' => $this->get('uid')))) {
	    return $res->get('email');
	  }
	}
  
	function getStatusName() {
	  if ($res = $this->xpdo->getObject('ModStatus', $this->get('status'))) {
	    return $res->get('name');
	  }
	}
  
	function getWarehouseName() {
	  if ($res = $this->xpdo->getObject('modResource', $this->get('warehouse'))) {
	    return $res->get('pagetitle');
	  }     
	}
  	
  	function getAddress() {
  	  if ($res = $this->xpdo->getObject('ModAddress', $this->get('address'))) {
	    return $res->toArray();
	  }
 	}
  
  	function updateSum() {
  	  if ($res = $this->xpdo->getCollection('ModOrdersGoods', array('oid' => $this->get('id')))) {
	    $sum = 0;
	    foreach ($res as $v) {
	    	$sum += $v->get('sum');
	    }
	    $this->set('sum', $sum);
	    $this->save();
	  }
 	}
}