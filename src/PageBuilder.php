<?php
namespace Valdevieso\PageGenerator;

class PageBuilder{
    private $_fields;
    private $_tableName;

    public function __construct($tableName, $fields){
        $this->_fields = $fields;
        $this->_tableName = $tableName;
    }

    public function getPageHtml(){
        $htmlContent = "";
        $fieldContent = "";

        $htmlContent .= $this->getPageHeader();

        foreach($this->_fields as $field){
            $fieldContent .= $this->getLineWithContent($this->getField($field));
        }

        $htmlContent .= $this->getFormWithContent($this->getRowWithContent($fieldContent));

        $htmlContent .= $this->getActionButtons();
        $htmlContent .= $this->getPageFooter();

        file_put_contents($this->_tableName.".php", $htmlContent);

        return $htmlContent;
    }

    public function getFormWithContent($content){
        return '<form method="POST" action="'.$this->_tableName.'.php">'.$content.'</form>';
    }

    public function getLineWithContent($content){
        return '<div class="col-md-12">'.$content.'</div>';
    }

    public function getRowWithContent($content){
        return '<div class="row">'.$content.'</div>';
    }

    public function getField($field){
        $fieldId = $field['Field'];

        if(strpos($field['Type'], "varchar") !== false)
            return '<label for="'.$fieldId.'">'.ucfirst($fieldId).'</label><input class="form-control" id="'.$fieldId.'" name="'.$fieldId.'" type="text"/>';
    }

    public function getPageHeader(){
        return '<html><head><title>Testando o generator</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body><div class="container">';
    }

    public function getActionButtons(){
        return '<input class="btn btn-primary" type="submit" value="Salvar"/>';
    }

    public function getPageFooter(){
        return "</div></body></html>";
    }
}