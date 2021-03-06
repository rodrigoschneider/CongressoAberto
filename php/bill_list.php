<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load('visualization', '1', {packages: ['table']});
</script>
<script type="text/javascript">
var visualization;
var data;
var options = {'showRowNumber': true};
function drawVisualization() {
  var query = new google.visualization.Query('/php/query.php?form=bill_list');    
    query.send(handleQueryResponse);
}
function handleQueryResponse(response) {
  if (response.isError()) {
    alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
    return;
  }
  //var post = new google.visualization.TablePatternFormat('<a href="/?p={1}"> {0} </a>');
  var data = response.getDataTable();
  var post = new google.visualization.TablePatternFormat('<a href="/?p={1}"> {0} </a>');
  post.format(data, [1,0]);
  options['page'] = 'enable';
  options['pageSize'] = 20;
  options['pagingButtonsConfiguration'] = 'auto';
  options['allowHtml'] = true;
  var view = new google.visualization.DataView(data);
  view.hideColumns([0]);
  visualization = new google.visualization.Table(document.getElementById('table1'));
  visualization.draw(view, options);
}

google.setOnLoadCallback(drawVisualization);
</script>
<h3> Proposições que chegaram ao plenário (votações nominais) </h3>
<div id="table1">
</div>
