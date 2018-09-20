<?php
/**
 * 归档
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col" id="main">
<article class="post">
<?php
$stat = Typecho_Widget::widget('Widget_Stat');
$this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
$year=0; $mon=0; $i=0; $j=0;
$output = '<div id="archives">';
while($archives->next()){
	$year_tmp = date('Y',$archives->created);
	if ($year > $year_tmp) {
		$output .= '</ul>';
	}
	if ($year != $year_tmp) {
		$year = $year_tmp;
		$output .= '<div>'.date('Y 年',$archives->created).'</div><ul>';
	}
	$output .= '<li>'.date('m/d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
}
$output .= '</ul></div>';
echo $output;
?>
</article>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>