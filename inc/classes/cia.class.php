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
}