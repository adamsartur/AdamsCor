<? class Cia extends Base {
    public $ID = null;
    public $DESCRICAO = null;
    
    
    public static function nomeCia($ID) {
        $resNome = mysql_query("
            SELECT DESCRICAO FROM cia
            WHERE ID = '".$ID."'
        ");
        
        if( mysql_num_rows($resNome) > 0 ) {
            $linha = mysql_fetch_array($resNome);
            return $linha['DESCRICAO'];
        }
    }
    
    public static function listar( $idAtual = null )
    {
        $resCias = mysql_query("
            SELECT * FROM cia 
            ORDER BY DESCRICAO
        ");
        
        $html  = '<select name="CIA_ID" id="CIA_ID">';
        $html .= '<option value="">Selecione</option>';
        
        while( $linha = mysql_fetch_array( $resCias ) ) {
            $id    = $linha['ID'];
            $atual = $id == $idAtual ? 'selected="selected"' : '';
            
            $html .= '<option value="'.$id.'" '.$atual.'>'.$linha['DESCRICAO'].'</option>';
        }
        
        $html .= '</select>';        
        return $html;
    }
    
}