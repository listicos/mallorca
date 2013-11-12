<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AdjuntosDAO
	 */
	public static function getAdjuntosDAO(){
		return new AdjuntosMySqlExtDAO();
	}

	/**
	 * @return AlojamientosDAO
	 */
	public static function getAlojamientosDAO(){
		return new AlojamientosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosDAO
	 */
	public static function getApartamentosDAO(){
		return new ApartamentosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosAdjuntosDAO
	 */
	public static function getApartamentosAdjuntosDAO(){
		return new ApartamentosAdjuntosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosAlojamientosDAO
	 */
	public static function getApartamentosAlojamientosDAO(){
		return new ApartamentosAlojamientosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosArticulosDAO
	 */
	public static function getApartamentosArticulosDAO(){
		return new ApartamentosArticulosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosDescripcionDAO
	 */
	public static function getApartamentosDescripcionDAO(){
		return new ApartamentosDescripcionMySqlExtDAO();
	}

	/**
	 * @return ApartamentosDocumentosDAO
	 */
	public static function getApartamentosDocumentosDAO(){
		return new ApartamentosDocumentosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosInstalacionesDAO
	 */
	public static function getApartamentosInstalacionesDAO(){
		return new ApartamentosInstalacionesMySqlExtDAO();
	}

	/**
	 * @return ApartamentosLugaresCercanosDAO
	 */
	public static function getApartamentosLugaresCercanosDAO(){
		return new ApartamentosLugaresCercanosMySqlExtDAO();
	}

	/**
	 * @return ApartamentosPagosTiposDAO
	 */
	public static function getApartamentosPagosTiposDAO(){
		return new ApartamentosPagosTiposMySqlExtDAO();
	}

	/**
	 * @return ApartamentosTiposDAO
	 */
	public static function getApartamentosTiposDAO(){
		return new ApartamentosTiposMySqlExtDAO();
	}

	/**
	 * @return ArticulosDAO
	 */
	public static function getArticulosDAO(){
		return new ArticulosMySqlExtDAO();
	}

	/**
	 * @return ArticulosAdjuntosDAO
	 */
	public static function getArticulosAdjuntosDAO(){
		return new ArticulosAdjuntosMySqlExtDAO();
	}

	/**
	 * @return ArticulosTiposDAO
	 */
	public static function getArticulosTiposDAO(){
		return new ArticulosTiposMySqlExtDAO();
	}

	/**
	 * @return CanalesDAO
	 */
	public static function getCanalesDAO(){
		return new CanalesMySqlExtDAO();
	}

	/**
	 * @return CiudadesDAO
	 */
	public static function getCiudadesDAO(){
		return new CiudadesMySqlExtDAO();
	}

	/**
	 * @return ComplejosDAO
	 */
	public static function getComplejosDAO(){
		return new ComplejosMySqlExtDAO();
	}

	/**
	 * @return ComplejosApartamentosDAO
	 */
	public static function getComplejosApartamentosDAO(){
		return new ComplejosApartamentosMySqlExtDAO();
	}

	/**
	 * @return CondicionesCompraDAO
	 */
	public static function getCondicionesCompraDAO(){
		return new CondicionesCompraMySqlExtDAO();
	}

	/**
	 * @return ConfiguracionDAO
	 */
	public static function getConfiguracionDAO(){
		return new ConfiguracionMySqlExtDAO();
	}

	/**
	 * @return ContratosDAO
	 */
	public static function getContratosDAO(){
		return new ContratosMySqlExtDAO();
	}

	/**
	 * @return ContratosFechasDAO
	 */
	public static function getContratosFechasDAO(){
		return new ContratosFechasMySqlExtDAO();
	}

	/**
	 * @return CuentasDAO
	 */
	public static function getCuentasDAO(){
		return new CuentasMySqlExtDAO();
	}

	/**
	 * @return DireccionesDAO
	 */
	public static function getDireccionesDAO(){
		return new DireccionesMySqlExtDAO();
	}

	/**
	 * @return DisponibilidadesDAO
	 */
	public static function getDisponibilidadesDAO(){
		return new DisponibilidadesMySqlExtDAO();
	}

	/**
	 * @return EmpresasDAO
	 */
	public static function getEmpresasDAO(){
		return new EmpresasMySqlExtDAO();
	}

	/**
	 * @return EmpresasContratosDAO
	 */
	public static function getEmpresasContratosDAO(){
		return new EmpresasContratosMySqlExtDAO();
	}

	/**
	 * @return EmpresasCuentasDAO
	 */
	public static function getEmpresasCuentasDAO(){
		return new EmpresasCuentasMySqlExtDAO();
	}

	/**
	 * @return HuespedesDAO
	 */
	public static function getHuespedesDAO(){
		return new HuespedesMySqlExtDAO();
	}

	/**
	 * @return HuespedesCuentasDAO
	 */
	public static function getHuespedesCuentasDAO(){
		return new HuespedesCuentasMySqlExtDAO();
	}

	/**
	 * @return IdiomasDAO
	 */
	public static function getIdiomasDAO(){
		return new IdiomasMySqlExtDAO();
	}

	/**
	 * @return InstalacionesDAO
	 */
	public static function getInstalacionesDAO(){
		return new InstalacionesMySqlExtDAO();
	}

	/**
	 * @return InstalacionesCategoriaDAO
	 */
	public static function getInstalacionesCategoriaDAO(){
		return new InstalacionesCategoriaMySqlExtDAO();
	}

	/**
	 * @return LugaresCercanosDAO
	 */
	public static function getLugaresCercanosDAO(){
		return new LugaresCercanosMySqlExtDAO();
	}

	/**
	 * @return MantenimientosDAO
	 */
	public static function getMantenimientosDAO(){
		return new MantenimientosMySqlExtDAO();
	}

	/**
	 * @return MantenimientosMaterialesDAO
	 */
	public static function getMantenimientosMaterialesDAO(){
		return new MantenimientosMaterialesMySqlExtDAO();
	}

	/**
	 * @return MantenimientosPersonalDAO
	 */
	public static function getMantenimientosPersonalDAO(){
		return new MantenimientosPersonalMySqlExtDAO();
	}

	/**
	 * @return MonedasDAO
	 */
	public static function getMonedasDAO(){
		return new MonedasMySqlExtDAO();
	}

	/**
	 * @return OpinionesDAO
	 */
	public static function getOpinionesDAO(){
		return new OpinionesMySqlExtDAO();
	}

	/**
	 * @return PagosTiposDAO
	 */
	public static function getPagosTiposDAO(){
		return new PagosTiposMySqlExtDAO();
	}

	/**
	 * @return PaisesDAO
	 */
	public static function getPaisesDAO(){
		return new PaisesMySqlExtDAO();
	}

	/**
	 * @return PoliticasCancelacionDAO
	 */
	public static function getPoliticasCancelacionDAO(){
		return new PoliticasCancelacionMySqlExtDAO();
	}

	/**
	 * @return ProvinciasDAO
	 */
	public static function getProvinciasDAO(){
		return new ProvinciasMySqlExtDAO();
	}

	/**
	 * @return ReservacionesDAO
	 */
	public static function getReservacionesDAO(){
		return new ReservacionesMySqlExtDAO();
	}

	/**
	 * @return ReservacionesArticulosDAO
	 */
	public static function getReservacionesArticulosDAO(){
		return new ReservacionesArticulosMySqlExtDAO();
	}

	/**
	 * @return ReservacionesPagosDAO
	 */
	public static function getReservacionesPagosDAO(){
		return new ReservacionesPagosMySqlExtDAO();
	}

	/**
	 * @return SubscripcionesDAO
	 */
	public static function getSubscripcionesDAO(){
		return new SubscripcionesMySqlExtDAO();
	}

	/**
	 * @return UsuariosDAO
	 */
	public static function getUsuariosDAO(){
		return new UsuariosMySqlExtDAO();
	}

	/**
	 * @return UsuariosGruposDAO
	 */
	public static function getUsuariosGruposDAO(){
		return new UsuariosGruposMySqlExtDAO();
	}

	/**
	 * @return UsuariosRegistrosDAO
	 */
	public static function getUsuariosRegistrosDAO(){
		return new UsuariosRegistrosMySqlExtDAO();
	}


}
?>