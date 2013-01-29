<?php namespace wa;
if(!defined('\PORTAL_INDEX_FILE') || \PORTAL_INDEX_FILE!==TRUE){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
class page_home extends \psm\Page {


	public function Render() {
		$table = new \psm\datatables_Table(
			array(
				'Item',
				'Seller',
				'Expires',
				'Price (Each)',
				'Price (Total)',
				'Market Value',
				'Qty',
				'Buy',
			)
		);
for($i=0;$i<1000;$i++)
		$table->addRow(
			array(
				'item '.$i,
				'seller '.$i,
				'expires',
				'price each',
				'price total',
				'market value',
				'qty',
				'<a href="">More Options</a>',
			)
		);
		return 'HOME'.$table->Render();
	}


	protected function Action($action) {
	}


}
class home_Query extends \psm\datatables_Query {


	public function QueryForTable() {
		return array(
			array('a'),
			array('a'),
			array('a'),
			array('a'),
		);
	}


}
?>