<?php
class View{
	function generate($contentView,$templateView,$data){
		include 'src/templates/' . $templateView;
	}
}

