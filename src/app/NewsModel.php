<?php
class NewsView
{
	function render($templateView, $data = null)
	{
		extract($data);
		$templateView = 'src/templates/' . $templateView;
		ob_start();
		include $templateView;
		$content = ob_get_clean();
		include 'src/layout/layout.php';

		return true;
	}
	function renderMain($templateView, $data = null)
	{
		extract($data);
		$templateView = 'src/templates/' . $templateView;
		ob_start();
		include $templateView;
		$content = ob_get_clean();
		echo $content;
		return true;
	}
}
