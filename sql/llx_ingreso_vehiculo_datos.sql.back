-- Copyright (C) 2025		SuperAdmin
--
-- This program is free software: you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation, either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program.  If not, see https://www.gnu.org/licenses/.


CREATE TABLE llx_ingreso_vehiculo_datos(
	-- BEGIN MODULEBUILDER FIELDS
	rowid integer AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	fk_datos integer NOT NULL, 
	date_creation datetime NOT NULL, 
	tms timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
	fk_user_creat integer NOT NULL, 
	fk_user_modif integer, 
	model_pdf varchar(255), 
	status integer NOT NULL, 
	celulaverde varchar(128) NOT NULL, 
	poliza varchar(128) NOT NULL, 
	vtvitvrto varchar(128) NOT NULL, 
	tituloautomotriz varchar(128) NOT NULL, 
	certificacionsat varchar(128) NOT NULL, 
	fechavencevtv date NOT NULL, 
	notified_7day integer, 
	notified_today integer, 
	notified_past integer
	-- END MODULEBUILDER FIELDS
) ENGINE=innodb;
