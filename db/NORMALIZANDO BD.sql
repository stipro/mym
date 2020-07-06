CREATE TABLE `t00ven` (
`NIDVEN` int(11) NOT NULL AUTO_INCREMENT,
`FIDCOL` int(11) NOT NULL,
`CCODVEN` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDVEN`) ,
INDEX `FKIDCOLVEN` (`FIDCOL` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 29
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `usuarios` (
`id_colaborador` int(11) NOT NULL,
`id_usuario` int(11) NOT NULL AUTO_INCREMENT,
`codigo_usuario` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`nombre_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`clave_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`correo_usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`estado_usuario` tinyint(4) NOT NULL,
`registro_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
`modificacion_usuario` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id_usuario`) ,
INDEX `FKIDCOLUSU` (`id_colaborador` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `colaborador` (
`id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
`codigo_colaborador` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pnombre_colaborador` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`snombre_colaborador` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`papellido_colaborador` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`sapellido_colaborador` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`nacionalidad_colaborador` varchar(20) NULL DEFAULT NULL,
`dni_colanorador` char(8) NULL DEFAULT NULL,
`FIDDEP` int(11) NULL DEFAULT NULL,
`FIDGEN` int(11) NULL DEFAULT NULL,
`FIDARE` int(11) NULL DEFAULT NULL,
`genero_colaborador` varchar(255) NULL,
`telefono_colaborador` varchar(255) NULL,
`estado_colaborador` varchar(255) NULL,
`id_cargo` int(11) NULL,
PRIMARY KEY (`id_colaborador`) ,
INDEX `FKIDDEP` (`FIDDEP` ASC) USING BTREE,
INDEX `FKIDGEN` (`FIDGEN` ASC) USING BTREE,
INDEX `FKIDCOL_AREA` (`FIDARE` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `t011avavendedor` (
`NIDAVAVEN` int(11) NOT NULL AUTO_INCREMENT,
`FIDZON` int(11) NULL DEFAULT NULL,
`NVENBRU` decimal(10,2) NOT NULL,
`NNETCRE` decimal(10,2) NOT NULL,
`NVENNET` decimal(10,2) NOT NULL,
`NCUOTA` decimal(10,2) NOT NULL,
`NPORCEN` decimal(10,2) NOT NULL,
`NTOTCLI` int(10) NOT NULL,
`NCOBERT` int(10) NOT NULL,
`NCOBRAD` decimal(10,2) NOT NULL,
`NTOPCOB` decimal(10,2) NOT NULL,
`NMOROSI` decimal(10,2) NOT NULL,
`NMOROSO` decimal(10,2) NOT NULL,
`DFECREG` date NOT NULL,
`FIDARCHTIPO` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDAVAVEN`) ,
INDEX `FKVENAVAVENDEDOR` (`FIDZON` ASC) USING BTREE,
INDEX `FKARCHTIPO_AVAVENDOR` (`FIDARCHTIPO` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 30
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `t021salconventa` (
`NIDSALCONVENTA` int(11) NOT NULL AUTO_INCREMENT,
`FIDZON` int(11) NOT NULL,
`NCENT` decimal(20,2) NOT NULL,
`NCRE` decimal(20,2) NOT NULL,
`NLET` decimal(20,2) NOT NULL,
`NTOT` decimal(20,2) NOT NULL,
`DFECREG` date NOT NULL,
`DFECMOD` date NULL DEFAULT NULL,
`FIDARCHTIPO` int(11) NOT NULL,
PRIMARY KEY (`NIDSALCONVENTA`) ,
INDEX `FKVENSALCONVENTA` (`FIDZON` ASC) USING BTREE,
INDEX `FKARCHTIPO_SALCONVENTA` (`FIDARCHTIPO` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tarchtipo` (
`NIDARCHTIPO` int(11) NOT NULL AUTO_INCREMENT,
`VNOMARCHTIPO` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDARCHTIPO`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tarea` (
`NIDAREA` int(255) NOT NULL AUTO_INCREMENT,
`VAREA` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`VAREADES` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDDIV` int(11) NULL DEFAULT NULL,
`FIDDEP` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDAREA`) ,
INDEX `FKIDARE_DEP` (`FIDDEP` ASC) USING BTREE,
INDEX `FKIDDIV` (`FIDDIV` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tasistencias` (
`NIDASI` int(11) NOT NULL AUTO_INCREMENT,
`THORINGASI` time NULL DEFAULT NULL,
`THORINGRECASI` time NULL DEFAULT NULL,
`THORFINRECASI` time NULL DEFAULT NULL,
`THORSALASI` time NULL DEFAULT NULL,
`VDIA` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDASI`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tasi_ven_zon` (
`NIDASI_VEN_ZON` int(11) NOT NULL AUTO_INCREMENT,
`FIDVEN` int(11) NOT NULL,
`FIDZON` int(11) NOT NULL,
`DFECREG` date NULL DEFAULT NULL,
PRIMARY KEY (`NIDASI_VEN_ZON`) ,
INDEX `FKIDVEN` (`FIDVEN` ASC) USING BTREE,
INDEX `FIDZON` (`FIDZON` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 30
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tasis_pers` (
`IDPER` int(11) NOT NULL AUTO_INCREMENT,
`DFECINI` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
`DFECFIN` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
`VDESC` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDCOL` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`IDPER`) ,
INDEX `FKIDCOL` (`FIDCOL` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tcol_contrato` (
`NIDCOL_CONTRATO` int(11) NOT NULL AUTO_INCREMENT,
`NCOL_SUELDO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDCOL` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDCOL_CONTRATO`) ,
INDEX `FKIDCOL_COLSUELDO` (`FIDCOL` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tcol_datos` (
`NIDCOL_DATO` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`NIDCOL_DATO`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tdep` (
`NIDDEP` int(11) NOT NULL AUTO_INCREMENT,
`VNOMDEP` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDDEP`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tdis` (
`NIDDIS` int(11) NOT NULL AUTO_INCREMENT,
`VNOMDIS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDPRO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDDIS`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tdiv` (
`NIDDIV` int(11) NOT NULL AUTO_INCREMENT,
`VDIVNOM` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`VDIVDES` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDDIV`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tgenero` (
`NIDGENERO` int(11) NOT NULL AUTO_INCREMENT,
`VGENERO` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDGENERO`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `this_col_ven` (
`NIDHIS_COL_VEN` int(11) NOT NULL AUTO_INCREMENT,
`FIDCOL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDVEN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`DFECREG` date NULL DEFAULT NULL,
PRIMARY KEY (`NIDHIS_COL_VEN`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `this_ven_zon` (
`NIDHIS_VEN_ZON` int(11) NOT NULL AUTO_INCREMENT,
`FIDVEN` int(11) NULL DEFAULT NULL,
`FIDZON` int(11) NULL DEFAULT NULL,
`DFECREG` date NULL DEFAULT NULL,
`VMOD` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDHIS_VEN_ZON`) ,
INDEX `FKIDHIS_VEN` (`FIDVEN` ASC) USING BTREE,
INDEX `FKIDHIS_ZON` (`FIDZON` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `thorarios` (
`NIDHOR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`VDESHOR` time NULL DEFAULT NULL,
`THORINGHOR` time NULL DEFAULT NULL,
`THORINGRECHOR` time NULL DEFAULT NULL,
`THORFINRECHOR` time NULL DEFAULT NULL,
`THORSALHOR` time NULL DEFAULT NULL,
PRIMARY KEY (`NIDHOR`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tjor` (
`NIDJOR` int(11) NOT NULL AUTO_INCREMENT,
`VNOMJOR` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDJOR`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `menu` (
`id_menu` int(11) NOT NULL AUTO_INCREMENT,
`id_modulos` int(11) NOT NULL,
`nombre_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`link_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`descripcion_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`id_menu`) ,
INDEX `FKIDMODMEN` (`id_modulos` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `modulos` (
`id_modulo` int(11) NOT NULL AUTO_INCREMENT,
`codigo_modulo` varchar(10) NULL,
`nombre_modulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`estado_modulo` tinyint(4) NULL DEFAULT NULL,
`descripcion_modulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`id_modulo`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tmod_per` (
`id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT,
`id_perfil` int(11) NOT NULL,
`id_modulo` int(11) NOT NULL,
PRIMARY KEY (`id_perfil_modulo`) ,
INDEX `FKIDMOD` (`id_modulo` ASC) USING BTREE,
INDEX `FKIDPER` (`id_perfil` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `perfiles` (
`id_perfil` int(11) NOT NULL AUTO_INCREMENT,
`codigo_perfil` int(11) NULL,
`nombre_perfil` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`estado_perfil` tinyint(4) NULL DEFAULT NULL,
`descripcion_perfil` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`id_perfil`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tpro` (
`NIDPRO` int(11) NOT NULL AUTO_INCREMENT,
`VNOMPRO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDDEP` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDPRO`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `roles` (
`id_rol` int(11) NOT NULL AUTO_INCREMENT,
`codigo_rol` int(11) NULL DEFAULT NULL,
`nombre_rol` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`estado_rol` tinyint(4) NULL DEFAULT NULL,
`descripcion_rol` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`id_rol`) ,
UNIQUE INDEX `FKIDMODROL` (`codigo_rol` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tsedes` (
`NIDSED` int(11) NOT NULL AUTO_INCREMENT,
`VNOMSED` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDAREA` int(11) NULL DEFAULT NULL,
`FIDDIV` int(11) NULL DEFAULT NULL,
`FIDDEP` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDSED`) ,
INDEX `FKIDAREA` (`FIDAREA` ASC) USING BTREE,
INDEX `FKIDSED_DIV` (`FIDDIV` ASC) USING BTREE,
INDEX `FKIDSEC_DEP` (`FIDDEP` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tsuc` (
`NIDSUC` int(11) NOT NULL AUTO_INCREMENT,
`FIDDIS` int(11) NULL DEFAULT NULL,
`FIDPRO` int(11) NULL DEFAULT NULL,
`FIDDEP` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDSUC`) ,
INDEX `FKIDSUC_DIS` (`FIDDIS` ASC) USING BTREE,
INDEX `FKIDSUC_PRO` (`FIDPRO` ASC) USING BTREE,
INDEX `FKIDSUC_DEP` (`FIDDEP` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tusu_per` (
`id_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
`id_usuario` int(11) NOT NULL,
`id_perfil` int(11) NOT NULL,
PRIMARY KEY (`id_usuario_perfil`) ,
INDEX `FKIDUSU` (`id_usuario` ASC) USING BTREE,
INDEX `FIDPER` (`id_perfil` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tusu_rol` (
`id_usuario_rol` int(11) NOT NULL AUTO_INCREMENT,
`id_usuario` int(11) NOT NULL,
`id_rol` int(11) NOT NULL,
PRIMARY KEY (`id_usuario_rol`) ,
INDEX `FKIDUSU_ROL` (`id_usuario` ASC) USING BTREE,
INDEX `FKIDROL_USU` (`id_rol` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tvac` (
`IDVAC` int(11) NOT NULL AUTO_INCREMENT,
`VIDEN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`DFECINI` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
`FECHFIN` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
`VDESC` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDCOL` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`IDVAC`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tzona` (
`NIDZON` int(11) NOT NULL AUTO_INCREMENT,
`NZON` int(3) UNSIGNED NULL DEFAULT NULL,
`NESTZON` tinyint(1) NULL DEFAULT 1,
`VNOMZON` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`FIDZONTIP` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`NIDZON`) ,
INDEX `FKIDZONTIP` (`FIDZONTIP` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 30
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `tzontip` (
`NIDZONTIP` int(11) NOT NULL AUTO_INCREMENT,
`VNOMZONTIP` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`VDESZONTIP` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`NIDZONTIP`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `historial` (
`id_historial` int(11) NOT NULL AUTO_INCREMENT,
`id_producto` int(11) NOT NULL,
`id_usuario` int(11) NOT NULL,
`fecha_historial` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`nota_historial` varchar(255) NULL,
`referencia_historial` varchar(100) NULL,
`cantidad_historial` int(11) NULL,
PRIMARY KEY (`id_historial`) 
)
ENGINE = InnoDB;
CREATE TABLE `producto` (
`id_proveedor` int(11) NULL,
`id_categoria` int(11) NULL,
`id_marca` int(11) NULL,
`id_producto` int(11) NOT NULL AUTO_INCREMENT,
`codigo_producto` varchar(255) NULL,
`nombre_producto` varchar(255) NULL,
`precio_producto` varchar(255) NULL,
`stock_producto` varchar(255) NULL,
`caracteristica_producto` varchar(255) NULL,
`descripcion_producto` varchar(255) NULL,
`garantia_producto` varchar(255) NULL,
PRIMARY KEY (`id_producto`) 
)
ENGINE = InnoDB;
CREATE TABLE `categorias` (
`id_categoria` int(11) NOT NULL AUTO_INCREMENT,
`nombre_categoria` varchar(255) NULL,
`descripcion_categoria` varchar(255) NULL,
`estado_categoria` tinyint(1) NULL,
PRIMARY KEY (`id_categoria`) 
)
ENGINE = InnoDB;
CREATE TABLE `almacenes` (
`id_almacen` int(11) NOT NULL AUTO_INCREMENT,
`nombre_almacen` varchar(50) NULL,
`estado_almacen` tinyint(1) NULL,
`descripcion_almacen` varchar(200) NULL,
PRIMARY KEY (`id_almacen`) 
)
ENGINE = InnoDB;
CREATE TABLE `salidas` (
`id_salida` int(11) NOT NULL AUTO_INCREMENT,
`id_producto` int(11) NULL,
`id_usuario` int(11) NULL,
`fecha_salida` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`cantidad_salida` int(50) NULL,
`motivo_salida` varchar(255) NULL,
`observacion_salida` varchar(255) NULL,
PRIMARY KEY (`id_salida`) 
)
ENGINE = InnoDB;
CREATE TABLE `entradas` (
`id_entrada` int(11) NOT NULL AUTO_INCREMENT,
`id_producto` int(11) NULL,
`id_usuario` int(11) NULL,
`fecha_entrada` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`cantidad_entrada` varchar(50) NULL,
`motivo_entrada` varchar(255) NULL,
`observacion_entrada` varchar(255) NULL,
PRIMARY KEY (`id_entrada`) 
)
ENGINE = InnoDB;
CREATE TABLE `provedores` (
`id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
`ruc_proveedor` char(11) NULL,
`nombre_proveedor` varchar(120) NULL,
`razonsocial_proveedor` varchar(120) NULL,
`direccion_proveedor` varchar(255) NULL,
`telefono_proveedor` varchar(255) NULL,
`celular_proveedor` int(8) NULL,
`correo_proveedor` varchar(255) NULL,
`descripcion_proveedor` varchar(255) NULL,
`logo_proveedor` varchar(255) NULL,
`estado_proveedor` tinyint(1) NULL,
PRIMARY KEY (`id_proveedor`) 
)
ENGINE = InnoDB;
CREATE TABLE `marcas` (
`id_marca` int(11) NOT NULL AUTO_INCREMENT,
`nombre_marca` varchar(255) NULL,
`telefono_marca` varchar(255) NULL,
`direccion_marca` varchar(255) NULL,
`correo_marca` varchar(255) NULL,
`rubro_marca` varchar(255) NULL,
PRIMARY KEY (`id_marca`) 
)
ENGINE = InnoDB;
CREATE TABLE `unidades_medida` (
`id_uniMedida` int(11) NOT NULL AUTO_INCREMENT,
`abreviatura_uniMedida` varchar(255) NULL,
`nombre_uniMedida` varchar(255) NULL,
`estado_uniMedida` tinyint(1) NULL,
`id_producto` int(11) NULL,
PRIMARY KEY (`id_uniMedida`) 
)
ENGINE = InnoDB;
CREATE TABLE `usuarios_almacenes` (
`id_asignacion_almacen` int(11) NOT NULL,
`id_usuario` int(11) NULL,
`id_almacen` int(11) NULL,
`estado` tinyint(1) NULL,
`descripcion` varchar(255) NULL,
`motivo` varchar(255) NULL,
PRIMARY KEY (`id_asignacion_almacen`) 
)
ENGINE = InnoDB;
CREATE TABLE `kardex_informatica` (
`id_kardex` int(11) NOT NULL AUTO_INCREMENT,
`id_producto` varchar(255) NULL,
`stock` varchar(255) NULL,
PRIMARY KEY (`id_kardex`) 
)
ENGINE = InnoDB;
CREATE TABLE `requerimientos` (
`id_requermiento` int(11) NOT NULL AUTO_INCREMENT,
`id_usuario` int(11) NULL,
`id_producto` int(11) NULL,
`cantidad` varchar(255) NULL,
PRIMARY KEY (`id_requermiento`) 
);
CREATE TABLE `almacenes_productos` (
`id_almacenes_productos` int(11) NOT NULL,
`id_producto` int(11) NULL,
`id_almacen` int(11) NULL,
PRIMARY KEY (`id_almacenes_productos`) 
);
CREATE TABLE `kardex` (
`id_kardex` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id_kardex`) 
);
CREATE TABLE `cargos` (
`id_cargo` int(11) NOT NULL AUTO_INCREMENT,
`nombre_cargo` varchar(20) NULL,
`descripcion_cargo` varchar(255) NULL,
`estado_cargo` varchar(255) NULL,
PRIMARY KEY (`id_cargo`) 
)
ENGINE = InnoDB;
CREATE TABLE `detalle_producto` (
`id_producto` int(11) NOT NULL AUTO_INCREMENT,
`modelo_producto` varchar(20) NULL,
`serial_producto` varchar(20) NULL,
`lotnumero_producto` varchar(20) NULL,
`garantia_producto` varchar(10) NULL,
PRIMARY KEY (`id_producto`) 
);

ALTER TABLE `t00ven` ADD CONSTRAINT `FKIDCOLVEN` FOREIGN KEY (`FIDCOL`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `usuarios` ADD CONSTRAINT `FKIDCOLUSU` FOREIGN KEY (`id_colaborador`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `colaborador` ADD CONSTRAINT `FKIDCOL_AREA` FOREIGN KEY (`FIDARE`) REFERENCES `tarea` (`NIDAREA`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `colaborador` ADD CONSTRAINT `FKIDDEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `colaborador` ADD CONSTRAINT `FKIDGEN` FOREIGN KEY (`FIDGEN`) REFERENCES `tgenero` (`NIDGENERO`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `t011avavendedor` ADD CONSTRAINT `FKARCHTIPO_AVAVENDOR` FOREIGN KEY (`FIDARCHTIPO`) REFERENCES `tarchtipo` (`NIDARCHTIPO`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `t011avavendedor` ADD CONSTRAINT `FKZON_AVAVENDOR` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `t021salconventa` ADD CONSTRAINT `FKARCHTIPO_SALCONVENTA` FOREIGN KEY (`FIDARCHTIPO`) REFERENCES `tarchtipo` (`NIDARCHTIPO`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `t021salconventa` ADD CONSTRAINT `FKZON_SALCONVENTA` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tarea` ADD CONSTRAINT `FKIDARE_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tarea` ADD CONSTRAINT `FKIDDIV` FOREIGN KEY (`FIDDIV`) REFERENCES `tdiv` (`NIDDIV`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tasi_ven_zon` ADD CONSTRAINT `FKIDVEN` FOREIGN KEY (`FIDVEN`) REFERENCES `t00ven` (`NIDVEN`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tasi_ven_zon` ADD CONSTRAINT `FKIDZON` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tasis_pers` ADD CONSTRAINT `FKIDCOL` FOREIGN KEY (`FIDCOL`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tcol_contrato` ADD CONSTRAINT `FKIDCOL_COLSUELDO` FOREIGN KEY (`FIDCOL`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `this_ven_zon` ADD CONSTRAINT `FKIDHIS_VEN` FOREIGN KEY (`FIDVEN`) REFERENCES `t00ven` (`NIDVEN`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `this_ven_zon` ADD CONSTRAINT `FKIDHIS_ZON` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `menu` ADD CONSTRAINT `FKIDMODMEN` FOREIGN KEY (`id_modulos`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tmod_per` ADD CONSTRAINT `FKIDMOD` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tmod_per` ADD CONSTRAINT `FKIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `roles` ADD CONSTRAINT `FKIDMODROL` FOREIGN KEY (`codigo_rol`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsedes` ADD CONSTRAINT `FKIDAREA` FOREIGN KEY (`FIDAREA`) REFERENCES `tarea` (`NIDAREA`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsedes` ADD CONSTRAINT `FKIDSEC_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsedes` ADD CONSTRAINT `FKIDSED_DIV` FOREIGN KEY (`FIDDIV`) REFERENCES `tdiv` (`NIDDIV`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsuc` ADD CONSTRAINT `FKIDSUC_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsuc` ADD CONSTRAINT `FKIDSUC_DIS` FOREIGN KEY (`FIDDIS`) REFERENCES `tdis` (`NIDDIS`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tsuc` ADD CONSTRAINT `FKIDSUC_PRO` FOREIGN KEY (`FIDPRO`) REFERENCES `tpro` (`NIDPRO`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_per` ADD CONSTRAINT `FIDPER` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_per` ADD CONSTRAINT `FKIDUSU` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_rol` ADD CONSTRAINT `FKIDROL_USU` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tusu_rol` ADD CONSTRAINT `FKIDUSU_ROL` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tvac` ADD CONSTRAINT `FKIDCOL_VAC` FOREIGN KEY (`IDVAC`) REFERENCES `colaborador` (`id_colaborador`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tzona` ADD CONSTRAINT `FKIDZONTIP` FOREIGN KEY (`FIDZONTIP`) REFERENCES `tzontip` (`NIDZONTIP`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `producto` ADD CONSTRAINT `fk_id_categoria_producto` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `producto` ADD CONSTRAINT `fk_id_proveedor_producto` FOREIGN KEY (`id_proveedor`) REFERENCES `provedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `salidas` ADD CONSTRAINT `fk_id_producto_salida` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `entradas` ADD CONSTRAINT `fk_id_producto_entrada` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `producto` ADD CONSTRAINT `fk_id_marca_producto` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `salidas` ADD CONSTRAINT `fk_id_usuario_salida` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `entradas` ADD CONSTRAINT `fk_id_usuario_entrada` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `usuarios_almacenes` ADD CONSTRAINT `fk_id_usuario_asignacion_almacen` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `usuarios_almacenes` ADD CONSTRAINT `fk_id_almacen_asignacion_almacen` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `unidades_medida` ADD CONSTRAINT `fk_id_producto_uniMedida` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `almacenes_productos` ADD CONSTRAINT `fk_id_almacen_productos` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `almacenes_productos` ADD CONSTRAINT `fk_id_producto_almacen` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `colaborador` ADD CONSTRAINT `fk_id_cargo_colaborador` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `requerimientos` ADD CONSTRAINT `fk_id_usuario_requerimiento` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `requerimientos` ADD CONSTRAINT `fk_id_producto_requerimiento` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE 
VIEW `view_1` AS 
SELECT
`comisiones_live`.`almacenes`.`nombre_almacen`,
`comisiones_live`.`almacenes`.`descripcion_almacen`,
`comisiones_live`.`producto`.`codigo_producto`,
`comisiones_live`.`producto`.`nombre_producto`,
`comisiones_live`.`producto`.`precio_producto`,
`comisiones_live`.`entradas`.`fecha_entrada`,
`comisiones_live`.`entradas`.`cantidad_entrada`,
`comisiones_live`.`entradas`.`motivo_entrada`,
`comisiones_live`.`salidas`.`fecha_salida`,
`comisiones_live`.`salidas`.`cantidad_salida`,
`comisiones_live`.`salidas`.`motivo_salida`
FROM
`comisiones_live`.`almacenes`
INNER JOIN `comisiones_live`.`producto` ON `comisiones_live`.`producto`.`id_almacen` = `comisiones_live`.`almacenes`.`id_almacen`
INNER JOIN `comisiones_live`.`entradas` ON `comisiones_live`.`entradas`.`id_producto` = `comisiones_live`.`producto`.`id_proveedor`
INNER JOIN `comisiones_live`.`salidas` ON `comisiones_live`.`salidas`.`id_producto` = `comisiones_live`.`producto`.`id_producto`
WHERE
`comisiones_live`.`almacenes`.`id_almacen` = `comisiones_live`.`producto`.`id_almacen` AND
`comisiones_live`.`entradas`.`id_producto` = `comisiones_live`.`producto`.`id_producto` AND
`comisiones_live`.`salidas`.`id_producto` = `comisiones_live`.`producto`.`id_producto`
HAVING;
