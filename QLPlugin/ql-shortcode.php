<?php

function ql_event_browsing($atts){
	$a=shortcode_atts( array(
		'name' =>''
	 ), $atts );
	?>
	<p id='qleventview'> hi prem</p>
	<script>
	myName('<?php echo  $a['name']?>');
	</script>
	
	<?php
}
function ql_event_browsing_args( $atts ) {
	$a = shortcode_atts( array(
	   'uid' => 1,
	   'eid' => 1,
	   'order' => 'id',
	   'asc' => 1,
	   'page' => 1
	), $atts );
	?>
	<p id='qleventviewargs'></p>
	<script>
		myFunction(<?php echo $a['uid'] ?>,<?php echo $a['eid'] ?>,'<?php echo $a['order'] ?>',<?php echo $a['asc'] ?>,<?php echo $a['page'] ?>);
	</script>
	<?php

 }

add_shortcode('qlevent','ql_event_browsing');
add_shortcode('qleventargs','ql_event_browsing_args');
?>
