<?php namespace Zofe\Rapyd\DataForm\Field;

use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\URL;
use Zofe\Rapyd\Rapyd;

class Redactor extends Field {

  public $type = "text";
  
  public function build()
  {
    $output = "";
    $this->attributes["class"] = "form-control";
    if (parent::build() === false) return;

    switch ($this->status)
    {
      case "disabled":
      case "show":
		  
		if ($this->type =='hidden' || $this->value == "") {
          $output = "";
		} elseif ( (!isset($this->value)) )
        {
          $output = $this->layout['null_label'];
        } else {
          $output = nl2br(htmlspecialchars($this->value));
        }
        $output = "<div class='help-block'>".$output."</div>";
        break;

      case "create":
      case "modify":

        Rapyd::js('packages/zofe/rapyd/assets/tinymce/tinymce.min.js');
        $output  = Form::textarea($this->db_name, $this->value, $this->attributes);
        $output .= Rapyd::script("
          tinymce.init({
            selector: 'textarea#".$this->name."',
            plugins: [
                 'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                 'save table contextmenu directionality emoticons template paste textcolor responsivefilemanager'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons', 
            image_advtab: true ,
            external_filemanager_path:'" . URL::to('/') . "/packages/filemanager/',
            filemanager_title:'Upload',
          });");

        break;

      case "hidden":
        $output = Form::hidden($this->db_name, $this->value);
        break;

      default:;
    }
    $this->output = "\n".$output."\n". $this->extra_output."\n";
  }

}
