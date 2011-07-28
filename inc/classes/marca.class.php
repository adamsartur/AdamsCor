<?php
class Marca extends Base {
    
    public static function listar( $idAtual = null )
    {
        $resMarcas = mysql_query("
            SELECT * FROM marcas 
            ORDER BY DESCRICAO
        ");
        
        $html  = '<select name="MARCA_ID" id="MARCA_ID">';
        $html .= '<option value="">Selecione</option>';
        
        while( $linha = mysql_fetch_array( $resMarcas ) ) {
            $id    = $linha['ID'];
            $atual = $id == $idAtual ? 'selected="selected"' : '';
            
            $html .= '<option value="'.$id.'" '.$atual.'>'.$linha['DESCRICAO'].'</option>';
        }
        
        $html .= '</select>';        
        return $html;
    }
    
}