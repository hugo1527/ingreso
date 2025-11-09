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


CREATE TABLE llx_ingreso_personales_datos(
	-- BEGIN MODULEBUILDER FIELDS
	rowid integer AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	fk_datos integer NOT NULL, 
	date_creation datetime NOT NULL, 
	fk_user_creat integer NOT NULL, 
	fk_user_modif integer, 
	model_pdf varchar(255), 
	status integer NOT NULL, 
	criminal_record varchar(128) NOT NULL, 
	dni integer NOT NULL, 
	drivers_license varchar(128) NOT NULL, 
	service varchar(128), 
	driver_contract varchar(128) NOT NULL, 
	contract_holder varchar(128) NOT NULL, 
	ap varchar(128) NOT NULL, 
	denunciation varchar(128), 
	pnr varchar(128) NOT NULL, 
	fechavencelc date NOT NULL
	-- END MODULEBUILDER FIELDS
) ENGINE=innodb;
