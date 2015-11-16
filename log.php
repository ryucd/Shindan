<?


function get_my_answers(){
	$db = new mydb();
	$query = "select q.id as q_id, q.content, c.choice, c.answer from crystal q, choices c, answer a where ";
	$result = $db->query($query, array($id), "getans");
	return $result;
}
?>