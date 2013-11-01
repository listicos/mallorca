<?php
/**
 * Class that operate on table 'contratos_fechas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-08-26 12:25
 */
class ContratosFechasMySqlExtDAO extends ContratosFechasMySqlDAO{

    private $mysql;

    function __construct() {
        $this->mysql = new MySql();
    }

    function prepare($data, $id = 0) {

        if ($id != 0)
            $obj = $this->load($id);
        else
            $obj = new ContratosFecha ();
        return $this->mysql->prepare($obj, $data);
    }
    
    public function queryByIdApartamento($value){
            $sql = 'SELECT cf.* FROM contratos_fechas AS cf ';
            $sql .= ' INNER JOIN contratos AS c ON c.id_contrato = cf.id_contrato ';
            $sql .= ' INNER JOIN empresas_contratos AS ec ON c.id_contrato = ec.id_contrato ';
            $sql .= ' INNER JOIN apartamentos AS a ON c.id_empresa_contrato = ec.id_empresa_contrato ';
            $sql .= ' WHERE a.id_apartamento = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($value);
            return $this->getList($sqlQuery);
    }
    
    public function queryByIdApartamentoAndFecha($idApartamento, $fecha){
            $sql = 'SELECT cf.* FROM contratos_fechas AS cf ';
            $sql .= ' INNER JOIN contratos AS c ON c.id_contrato = cf.id_contrato ';
            $sql .= ' INNER JOIN empresas_contratos AS ec ON c.id_contrato = ec.id_contrato ';
            $sql .= ' INNER JOIN apartamentos AS a ON a.id_empresa_contrato = ec.id_empresa_contrato ';
            $sql .= ' WHERE a.id_apartamento = ? AND cf.fecha_inicio = ?';
            
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($idApartamento);
            $sqlQuery->set($fecha);
            return $this->getList($sqlQuery);
    }
}
?>