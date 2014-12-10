 <?php  /*
class FckHelper extends Helper
{
    function load($id, $toolbar = 'Default') {

        $did = Inflector::camelize(str_replace('/', '_', $id));
        $js = $this->webroot.'js/'; 


return <<<FCK_CODE
<script type="text/javascript">
fckLoader_$did = function () {
    var bFCKeditor_$did = new FCKeditor('$did');
    bFCKeditor_$did.BasePath = '$js';
    bFCKeditor_$did.ToolbarSet = '$toolbar';
    bFCKeditor_$did.ReplaceTextarea();
}
fckLoader_$did();
</script>
FCK_CODE;
    }
     
    
    
} */
?> 

 <?php 
class FckHelper extends Helper
{
    function load($id, $toolbar = 'Default') {

        $did = Inflector::camelize(str_replace('/', '_', $id));
        //$js = $this->webroot.'js/'; 


return <<<FCK_CODE
<script type="text/javascript">
	CKEDITOR.replace('$did');
</script>
FCK_CODE;
}
     
    
    
}
?> 
