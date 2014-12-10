 <?php 
class TreeHelper extends Helper {
  var $helpers = array('Form','Html');
  var $tab = "_";
  
  function show($name, $data)
  {
    list($modelName, $view, $fieldName, $status, $id) = explode('/', $name);
    $output = $this->list_element($data, $modelName, array($fieldName, $status, $id, $view), 0);
    
    return $this->output($output);
  }
  
  function list_element($data, $modelName, $fieldName, $level)
  {
    $tabs = str_repeat($this->tab, $level * 2);
    $li_tabs = $tabs.$this->tab;
    
    $output = "";
    foreach ($data as $key=>$val) {
      $output .= "<tr>";
        $output .= "<td>".$li_tabs.$val[$modelName][$fieldName[0]]."</td>";
        $output .= "<td>".($val[$modelName][$fieldName[1]]=='A'? 'Activo':'Inactivo')."</td>";
        $output .= "<td>".$this->Html->link('Editar','/'.$fieldName[3].'/edit/'.$val[$modelName][$fieldName[2]], array('class'=>"btn btn-warning", 'role'=>"button"));
        $output .= " ".$this->Html->link('Eliminar',"/".$fieldName[3]."/delete/{$val[$modelName][$fieldName[2]]}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este registro?')."";
        $output .= " ".$this->Html->link('Agregar fotos','/photos/index/'.$val[$modelName][$fieldName[2]]."/2", array('class'=>"btn btn-primary", 'role'=>"button"))."</td>";
      $output .= "</tr>";
      if(isset($val['children'][0])) {
        $output .= $this->list_element($val['children'], $modelName, array($fieldName[0], $fieldName[1], $fieldName[2], $fieldName[3]), $level+1);
      }
    }

    return $output;
  }

  function createSelect($name, $data, $selected = 0){
    list($modelName, $fieldName, $id) = explode('/', $name);
    $output_select = "<select name='data[ProgramasCircuito][parent_id]' class='form-control'>";
    $output_select .= "<option value='NULL'>Select Parent</option>";
    $output_select .= $this->list_element_select($data, $modelName, array($fieldName, $id, $selected), 0)."</select>";
    
    return $this->output($output_select);
  }

  function list_element_select($data, $modelName, $fieldName, $level) {
    $tabs = str_repeat($this->tab, $level * 2);
    $li_tabs = $tabs.$this->tab;
    
    $output = "";
    foreach ($data as $key=>$val) {
        $output .= "<option value=".$val[$modelName][$fieldName[1]]." ".($val[$modelName][$fieldName[1]] == $fieldName[2] ? 'selected="selected"' : '').">".$li_tabs.$val[$modelName][$fieldName[0]]."</option>";
      if(isset($val['children'][0])) {
        $output .= $this->list_element_select($val['children'], $modelName, array($fieldName[0], $fieldName[1], $fieldName[2]), $level+1);
      }
    }

    return $output;
  }
  
  
  function createSelectRelated($name, $data, $selected = 0){
    list($parentModel, $fieldRelated, $modelName, $fieldName, $id) = explode('/', $name);
    $output_select = "<select name='data[".$parentModel."][".$fieldRelated."]' class='form-control'>";
    $output_select .= $this->list_element_select_related($data, $modelName, array($fieldName, $id, $selected, $parentModel), 0)."</select>";
    
    return $this->output($output_select);
  }

  function list_element_select_related($data, $modelName, $fieldName, $level) {
    $tabs = str_repeat($this->tab, $level * 2);
    $li_tabs = $tabs.$this->tab;
    
    $output = "";
    foreach ($data as $key=>$val) {
        $output .= "<option value=".$val[$modelName][$fieldName[1]]." ".($val[$modelName][$fieldName[1]] == $fieldName[2] ? 'selected="selected"' : '').">".$li_tabs.$val[$modelName][$fieldName[0]]."</option>";
      if(isset($val['children'][0])) {
        $output .= $this->list_element_select_related($val['children'], $modelName, array($fieldName[0], $fieldName[1], $fieldName[2],$fieldName[3]), $level+1);
      }
    }

    return $output;
  }
  

}
?> 