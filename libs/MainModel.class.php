<?php
/**
 * MainModel - Modelo geral
 * @package TutsupMVC
 * @since 0.1
 */
class MainModel {
    /**
     * $form_data
     * Os dados de formulÃ¡rios de envio.
     * @access public
     */	
    public $form_data;

    /**
     * $form_msg
     * As mensagens de feedback para formulÃ¡rios.
     * @access public
     */	
    public $form_msg;

    /**
     * $form_confirma
     * Mensagem de confirmaÃ§Ã£o para apagar dados de formulÃ¡rios
     * @access public
     */
    public $form_confirma;

    /**
     * $db
     * O objeto da nossa conexÃ£o PDO
     * @access public
     */
    public $db;

    /**
     * $controller
     * O controller que gerou esse modelo
     * @access public
     */
    public $controller;

    /**
     * $parametros
     * ParÃ¢metros da URL
     * @access public
     */
    public $parametros;

    /**
     * $userdata
     * Dados do usuÃ¡rio
     * @access public
     */
    public $userdata;

    /**
     * Inverte datas 
     *
     * ObtÃ©m a data e inverte seu valor.
     * De: d-m-Y H:i:s para Y-m-d H:i:s ou vice-versa.
     *
     * @since 0.1
     * @access public
     * @param string $data A data
     */
    public function inverte_data( $data = null ) {

            // Configura uma variÃ¡vel para receber a nova data
            $nova_data = null;

            // Se a data for enviada
            if ( $data ) {

                    // Explode a data por -, /, : ou espaÃ§o
                    $data = preg_split('/\-|\/|\s|:/', $data);

                    // Remove os espaÃ§os do comeÃ§o e do fim dos valores
                    $data = array_map( 'trim', $data );

                    // Cria a data invertida
                    $nova_data .= chk_array( $data, 2 ) . '-';
                    $nova_data .= chk_array( $data, 1 ) . '-';
                    $nova_data .= chk_array( $data, 0 );

                    // Configura a hora
                    if ( chk_array( $data, 3 ) ) {
                            $nova_data .= ' ' . chk_array( $data, 3 );
                    }

                    // Configura os minutos
                    if ( chk_array( $data, 4 ) ) {
                            $nova_data .= ':' . chk_array( $data, 4 );
                    }

                    // Configura os segundos
                    if ( chk_array( $data, 5 ) ) {
                            $nova_data .= ':' . chk_array( $data, 5 );
                    }
            }

            // Retorna a nova data
            return $nova_data;

    } // inverte_data
}
