<?php
	if (!isset( $_GET['page'])){
					$page = 1;
				}else{
					$page = $_GET['page'];
				}
	$results_per_page = 8;
	$total_records = $row[0];
	$total_pages = ceil( $total_records / $results_per_page );
	$pagelink = "";
	if(isset ($_GET['keyword_sotientu'])and isset($_GET['keyword_sotienden'])){
		if($page >= 2){
			echo "<li class='page-item'><a class = 'page-link' href='?keyword_sotientu=".$_GET['keyword_sotientu']."&keyword_sotienden=".$_GET['keyword_sotienden']."&page=".($page - 1)."'><span aria-hidden='true'>&laquo;</span></a></li>";
		}
		for ( $i = 1; $i <= $total_pages; $i++ ) {
			if ( $i == $page ) {
				$pagelink .= "<li class='page-item' aria-current='page'><a class = 'page-link active'style='background-color: #B4CAF9' href='?keyword_sotientu=".$_GET['keyword_sotientu']."&keyword_sotienden=".$_GET['keyword_sotienden']."&page=" . $i . "'>" . $i . "</a></li>";
			} else {
				$pagelink .= "<li class='page-item'><a class = 'page-link' href='?keyword_sotientu=".$_GET['keyword_sotientu']."&keyword_sotienden=".$_GET['keyword_sotienden']."&page=" . $i . "'>" . $i . "</a></li>";
			}
		};
		echo $pagelink;
		if ( $page < $total_pages ) {
			echo "<li class='page-item'><a class = 'page-link' href='?keyword_sotientu=".$_GET['keyword_sotientu']."&keyword_sotienden=".$_GET['keyword_sotienden']."&page=" . ( $page + 1 ) . "'><span aria-hidden='true'>&raquo;</span></a></li>";
		}
	}else{
//	$page = $_GET['page'];
	if($page >= 2){
		echo "<li class='page-item'><a class = 'page-link' href='?page=".($page - 1)."'><span aria-hidden='true'>&laquo;</span></a></li>";
	}
	for ( $i = 1; $i <= $total_pages; $i++ ) {
		if ( $i == $page ) {
			$pagelink .= "<li class='page-item' aria-current='page'><a class = 'page-link active'style='background-color: #B4CAF9' href='?page=" . $i . "'>" . $i . "</a></li>";
		} else {
			$pagelink .= "<li class='page-item'><a class = 'page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
		}
	};
	echo $pagelink;
	if ( $page < $total_pages ) {
		echo "<li class='page-item'><a class = 'page-link' href='?page=" . ( $page + 1 ) . "'><span aria-hidden='true'>&raquo;</span></a></li>";
	}
	}
?>