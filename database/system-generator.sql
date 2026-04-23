CREATE DATABASE IF NOT EXISTS `systemgenerator` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `systemgenerator`;



DROP TABLE IF EXISTS `tbprojeto`;
CREATE TABLE tbprojeto (
    projeto_id INT AUTO_INCREMENT PRIMARY KEY,
    projeto_title TEXT,
    projeto_name TEXT,
    projeto_path TEXT,
    projeto_url TEXT,
    projeto_db_hostname TEXT,
    projeto_db_database TEXT,
    projeto_user TEXT,
    projeto_password TEXT,
    projeto_status TINYINT(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbmodulos`;
CREATE TABLE tbmodulos (
    modulos_id INT AUTO_INCREMENT PRIMARY KEY,
    modulos_projeto_id INT,
    modulos_title TEXT,
    modulos_modulo TEXT,
    modulos_controller TEXT,
    modulos_model TEXT,
    modulos_table TEXT,
    modulos_db_prefixo TEXT,
    modulos_primary_key TEXT,
    modulos_field_default TEXT,
    modulos_field_status TINYINT(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbmodulo_campo`;
CREATE TABLE tbmodulo_campo (
    modulo_campo_id INT AUTO_INCREMENT PRIMARY KEY,
    modulo_campo_modulo_id INT,
    modulo_campo_nome TEXT,
    modulo_campo_title TEXT,
    modulo_campo_tipo INT,
    modulo_campo_fk TINYINT(1),
    modulo_campo_reference_table TEXT,
    modulo_campo_reference_key TEXT,
    modulo_campo_reference_option TEXT,
    modulo_campo_required TINYINT(1),
    modulo_campo_is_search TINYINT(1),
    modulo_campo_status TINYINT(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbtipo_campo`;
CREATE TABLE tbtipo_campo (
    tipo_campo_id INT AUTO_INCREMENT PRIMARY KEY,
    tipo_campo_nome TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbmenu`;
CREATE TABLE tbmenu (
    menu_id INT AUTO_INCREMENT PRIMARY KEY,
    menu_projeto_id TEXT,
    menu_title TEXT,
    menu_nome TEXT,
    menu_submenu TINYINT(1),
    menu_icon INT,
    menu_status TINYINT(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbsubmenu`;
CREATE TABLE tbsubmenu (
    submenu_id INT AUTO_INCREMENT PRIMARY KEY,
    submenu_menu_id INT,
    submenu_nome TEXT,
    submenu_title TEXT,
    submenu_link TEXT,
    submenu_status TINYINT(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tbicons`;
CREATE TABLE tbicons (
    icons_id INT AUTO_INCREMENT PRIMARY KEY,
    icons_nome TEXT,
    icons_icon TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP VIEW IF EXISTS `view_modulos`;
CREATE VIEW view_modulos as SELECT 
	modulos_id,
	modulos_projeto_id,
	projeto_title,
	modulos_title,
	modulos_modulo,
	modulos_controller,
	modulos_model,
	modulos_table,
	modulos_db_prefixo,
	modulos_primary_key,
	modulos_field_default,
	modulos_field_status
FROM tbmodulos
LEFT JOIN tbprojeto ON projeto_id=modulos_projeto_id;


DROP VIEW IF EXISTS `view_modulo_campo`;
CREATE VIEW view_modulo_campo as SELECT 
	modulo_campo_id,
	modulo_campo_modulo_id,
	modulos_title,
	modulo_campo_nome,
	modulo_campo_title,
	modulo_campo_tipo,
	tipo_campo_nome,
	modulo_campo_fk,
	modulo_campo_reference_table,
	modulo_campo_reference_key,
	modulo_campo_reference_option,
	modulo_campo_required,
	modulo_campo_is_search,
	modulo_campo_status
FROM tbmodulo_campo
LEFT JOIN tbmodulos ON modulos_id=modulo_campo_modulo_id
LEFT JOIN tbtipo_campo ON tipo_campo_id=modulo_campo_tipo;


DROP VIEW IF EXISTS `view_menu`;
CREATE VIEW view_menu as SELECT 
	menu_id,
	menu_projeto_id,
	projeto_title,
	menu_title,
	menu_nome,
	menu_submenu,
	menu_icon,
	icons_icon,
	menu_status
FROM tbmenu
LEFT JOIN tbprojeto ON projeto_id=menu_projeto_id
LEFT JOIN tbicons ON icons_id=menu_icon;


DROP VIEW IF EXISTS `view_submenu`;
CREATE VIEW view_submenu as SELECT 
	submenu_id,
	submenu_menu_id,
	menu_title,
	submenu_nome,
	submenu_title,
	submenu_link,
	submenu_status
FROM tbsubmenu
LEFT JOIN tbmenu ON menu_id=submenu_menu_id;
