<?php
/* Copyright (C) 2025		SuperAdmin
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

require_once DOL_DOCUMENT_ROOT.'/core/triggers/interfaceweb.class.php';

/**
 *	Class to manage triggers for Ingreso module
 */
class interface_500200_modIngreso extends InterfaceWeb
{
	/**
	 * Constructor
	 *
	 * @param DoliDB $db Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}

	/**
	 * Return properties of an object linked to an action.
	 *
	 * @param 	array 	$parameters 	Parameters
	 * @return 	int|array 				<0 if KO, 0 if not implemented, array with properties if OK
	 */
	public function agenda_actions($parameters)
	{
		global $langs;
		$langs->load("ingreso@ingreso");

		$elementtype = $parameters['elementtype']; // 'personales_datos' o 'vehiculo_datos'
		$fk_element = $parameters['fk_element'];

		$object = null;
		$url = '';
		// --- INICIO CORRECCIÓN DE RUTA ---
		$dol_path = dol_buildpath('/ingreso/', 1); // Ruta correcta
		// --- FIN CORRECCIÓN DE RUTA ---

		// 1. Manejar 'personales_datos'
		if ($elementtype == 'personales_datos') {
			// --- INICIO CORRECCIÓN DE RUTA ---
			dol_include_once('/ingreso/class/personales_datos.class.php');
			dol_include_once('/ingreso/class/datos.class.php'); // Cargar el padre
			// --- FIN CORRECCIÓN DE RUTA ---
			
			$object = new Personales_Datos($this->db);
			$object->fetch($fk_element);
			
			// Cargar el padre para obtener el nombre
			$datos_padre = new Datos($this->db);
			if ($object->fk_datos > 0) {
				$datos_padre->fetch($object->fk_datos);
			}

			$label = $langs->transnoentities("Personales_Datos").': '.$datos_padre->apellido.', '.$datos_padre->nombre;
			$url = $dol_path.'personales_datos_card.php?id='.$object->id;
		}
		// 2. Manejar 'vehiculo_datos'
		elseif ($elementtype == 'vehiculo_datos') {
			// --- INICIO CORRECCIÓN DE RUTA ---
			dol_include_once('/ingreso/class/vehiculo_datos.class.php');
			dol_include_once('/ingreso/class/datos.class.php'); // Cargar el padre
			// --- FIN CORRECCIÓN DE RUTA ---
			
			$object = new Vehiculo_Datos($this->db);
			$object->fetch($fk_element);
			
			// Cargar el padre para obtener el nombre
			$datos_padre = new Datos($this->db);
			if ($object->fk_datos > 0) {
				$datos_padre->fetch($object->fk_datos);
			}

			$label = $langs->transnoentities("Vehiculo_Datos").': '.$datos_padre->apellido.', '.$datos_padre->nombre.' ('.$object->vtvitvrto.')';
			$url = $dol_path.'vehiculo_datos_card.php?id='.$object->id;
		}
		
		// 3. Devolver el array
		if ($object && $object->id) {
			return array(
				'ref' => $object->id, 		// Usamos el ID ya que estos objetos no tienen 'ref'
				'label' => $label,
				'name' => $label,
				'url' => $url
			);
		}

		return 0; // No manejado
	}
}