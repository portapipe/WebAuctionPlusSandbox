<?php namespace wa;
if(!defined('\PORTAL_INDEX_FILE') || \PORTAL_INDEX_FILE!==TRUE){if(headers_sent()){echo '<header><meta http-equiv="refresh" content="0;url=../"></header>';}else{header('HTTP/1.0 301 Moved Permanently'); header('Location: ../');} die("<font size=+2>Access Denied!!</font>");}
class page_home extends \psm\Page {


	public function Render() {
		$headings = array(
			'Item',
			'Seller',
			'Expires',
			'Price (Each)',
			'Price (Total)',
			'Market Value',
			'Qty',
			'Buy',
		);
		$table = new \psm\datatables_Table(
			$headings,
			new home_Query(),
			FALSE
		);
		return 'HOME'.$table->Render();
	}


	protected function Action($action) {
	}


}
class home_Query extends \psm\datatables_Query {

	private $rows = array();


	public function runQuery() {
//		$rows[] = array(
//			array('a'),
//			array('a'),
//			array('a'),
//			array('a'),
//		);
for($i=0;$i<1000;$i++)
		$this->rows[] = array(
			'item '.$i,
			'seller '.$i,
			'expires',
			'price each',
			'price total',
			'market value',
			'qty',
			'<a href="">More Options</a>',
		);
		reset($this->rows);
		return TRUE;
	}


	public function getRow() {
		return next($this->rows);
	}


}
?>