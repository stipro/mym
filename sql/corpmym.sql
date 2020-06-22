-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla comisiones_live.t001usu
CREATE TABLE IF NOT EXISTS `t001usu` (
  `NIDUSU` int(11) NOT NULL AUTO_INCREMENT,
  `CCODUSU` char(5) NOT NULL,
  `VNOMUSU` varchar(20) NOT NULL,
  `VCLAUSU` varchar(20) NOT NULL,
  `VCORUSU` varchar(20) NOT NULL,
  `BESTUSU` tinyint(4) NOT NULL,
  `DFREUSU` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DFMOUSU` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `FIDCOL` int(11) NOT NULL,
  PRIMARY KEY (`NIDUSU`),
  KEY `FKIDCOLUSU` (`FIDCOL`) USING BTREE,
  CONSTRAINT `FKIDCOLUSU` FOREIGN KEY (`FIDCOL`) REFERENCES `t002col` (`NIDCOL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.t002col
CREATE TABLE IF NOT EXISTS `t002col` (
  `NIDCOL` int(11) NOT NULL AUTO_INCREMENT,
  `CCODCOL` char(5) DEFAULT NULL,
  `VPNOCOL` varchar(20) DEFAULT NULL,
  `VSNOCOL` varchar(20) DEFAULT NULL,
  `VAPACOL` varchar(20) DEFAULT NULL,
  `VAMACOL` varchar(20) DEFAULT NULL,
  `DNACCOL` date DEFAULT NULL,
  `NDNICOL` int(8) DEFAULT NULL,
  `FIDDEP` int(11) DEFAULT NULL,
  `FIDGEN` int(11) DEFAULT NULL,
  `FIDARE` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDCOL`),
  KEY `FKIDDEP` (`FIDDEP`) USING BTREE,
  KEY `FKIDGEN` (`FIDGEN`) USING BTREE,
  KEY `FKIDCOL_AREA` (`FIDARE`) USING BTREE,
  CONSTRAINT `FKIDCOL_AREA` FOREIGN KEY (`FIDARE`) REFERENCES `tarea` (`NIDAREA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDDEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDGEN` FOREIGN KEY (`FIDGEN`) REFERENCES `tgenero` (`NIDGENERO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.t00ven
CREATE TABLE IF NOT EXISTS `t00ven` (
  `NIDVEN` int(11) NOT NULL AUTO_INCREMENT,
  `FIDCOL` int(11) NOT NULL,
  `CCODVEN` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`NIDVEN`),
  KEY `FKIDCOLVEN` (`FIDCOL`) USING BTREE,
  CONSTRAINT `FKIDCOLVEN` FOREIGN KEY (`FIDCOL`) REFERENCES `t002col` (`NIDCOL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.t011avavendedor
CREATE TABLE IF NOT EXISTS `t011avavendedor` (
  `NIDAVAVEN` int(11) NOT NULL AUTO_INCREMENT,
  `FIDZON` int(11) DEFAULT NULL,
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
  `FIDARCHTIPO` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDAVAVEN`),
  KEY `FKVENAVAVENDEDOR` (`FIDZON`) USING BTREE,
  KEY `FKARCHTIPO_AVAVENDOR` (`FIDARCHTIPO`) USING BTREE,
  CONSTRAINT `FKARCHTIPO_AVAVENDOR` FOREIGN KEY (`FIDARCHTIPO`) REFERENCES `tarchtipo` (`NIDARCHTIPO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKZON_AVAVENDOR` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.t021salconventa
CREATE TABLE IF NOT EXISTS `t021salconventa` (
  `NIDSALCONVENTA` int(11) NOT NULL AUTO_INCREMENT,
  `FIDZON` int(11) NOT NULL,
  `NCENT` decimal(20,2) NOT NULL,
  `NCRE` decimal(20,2) NOT NULL,
  `NLET` decimal(20,2) NOT NULL,
  `NTOT` decimal(20,2) NOT NULL,
  `DFECREG` date NOT NULL,
  `DFECMOD` date DEFAULT NULL,
  `FIDARCHTIPO` int(11) NOT NULL,
  PRIMARY KEY (`NIDSALCONVENTA`),
  KEY `FKVENSALCONVENTA` (`FIDZON`) USING BTREE,
  KEY `FKARCHTIPO_SALCONVENTA` (`FIDARCHTIPO`) USING BTREE,
  CONSTRAINT `FKARCHTIPO_SALCONVENTA` FOREIGN KEY (`FIDARCHTIPO`) REFERENCES `tarchtipo` (`NIDARCHTIPO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKZON_SALCONVENTA` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tarchtipo
CREATE TABLE IF NOT EXISTS `tarchtipo` (
  `NIDARCHTIPO` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMARCHTIPO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`NIDARCHTIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tarea
CREATE TABLE IF NOT EXISTS `tarea` (
  `NIDAREA` int(255) NOT NULL AUTO_INCREMENT,
  `VAREA` varchar(15) DEFAULT NULL,
  `VAREADES` varchar(50) DEFAULT NULL,
  `FIDDIV` int(11) DEFAULT NULL,
  `FIDDEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDAREA`),
  KEY `FKIDARE_DEP` (`FIDDEP`) USING BTREE,
  KEY `FKIDDIV` (`FIDDIV`) USING BTREE,
  CONSTRAINT `FKIDARE_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDDIV` FOREIGN KEY (`FIDDIV`) REFERENCES `tdiv` (`NIDDIV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tasi
CREATE TABLE IF NOT EXISTS `tasi` (
  `NIDASI` int(11) NOT NULL AUTO_INCREMENT,
  `THORINGASI` time DEFAULT NULL,
  `THORINGRECASI` time DEFAULT NULL,
  `THORFINRECASI` time DEFAULT NULL,
  `THORSALASI` time DEFAULT NULL,
  `VDIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDASI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tasis_pers
CREATE TABLE IF NOT EXISTS `tasis_pers` (
  `IDPER` int(11) NOT NULL AUTO_INCREMENT,
  `DFECINI` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DFECFIN` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `VDESC` varchar(50) DEFAULT NULL,
  `FIDCOL` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPER`),
  KEY `FKIDCOL` (`FIDCOL`) USING BTREE,
  CONSTRAINT `FKIDCOL` FOREIGN KEY (`FIDCOL`) REFERENCES `t002col` (`NIDCOL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tasi_ven_zon
CREATE TABLE IF NOT EXISTS `tasi_ven_zon` (
  `NIDASI_VEN_ZON` int(11) NOT NULL AUTO_INCREMENT,
  `FIDVEN` int(11) NOT NULL,
  `FIDZON` int(11) NOT NULL,
  `DFECREG` date DEFAULT NULL,
  PRIMARY KEY (`NIDASI_VEN_ZON`),
  KEY `FKIDVEN` (`FIDVEN`) USING BTREE,
  KEY `FIDZON` (`FIDZON`) USING BTREE,
  CONSTRAINT `FKIDVEN` FOREIGN KEY (`FIDVEN`) REFERENCES `t00ven` (`NIDVEN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDZON` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tcol_contrato
CREATE TABLE IF NOT EXISTS `tcol_contrato` (
  `NIDCOL_CONTRATO` int(11) NOT NULL AUTO_INCREMENT,
  `NCOL_SUELDO` varchar(255) DEFAULT NULL,
  `FIDCOL` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDCOL_CONTRATO`),
  KEY `FKIDCOL_COLSUELDO` (`FIDCOL`) USING BTREE,
  CONSTRAINT `FKIDCOL_COLSUELDO` FOREIGN KEY (`FIDCOL`) REFERENCES `t002col` (`NIDCOL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tcol_datos
CREATE TABLE IF NOT EXISTS `tcol_datos` (
  `NIDCOL_DATO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NIDCOL_DATO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tdep
CREATE TABLE IF NOT EXISTS `tdep` (
  `NIDDEP` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMDEP` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NIDDEP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tdis
CREATE TABLE IF NOT EXISTS `tdis` (
  `NIDDIS` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMDIS` varchar(255) DEFAULT NULL,
  `FIDPRO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIDDIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tdiv
CREATE TABLE IF NOT EXISTS `tdiv` (
  `NIDDIV` int(11) NOT NULL AUTO_INCREMENT,
  `VDIVNOM` varchar(255) DEFAULT NULL,
  `VDIVDES` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIDDIV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tgenero
CREATE TABLE IF NOT EXISTS `tgenero` (
  `NIDGENERO` int(11) NOT NULL AUTO_INCREMENT,
  `VGENERO` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NIDGENERO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.this_col_ven
CREATE TABLE IF NOT EXISTS `this_col_ven` (
  `NIDHIS_COL_VEN` int(11) NOT NULL AUTO_INCREMENT,
  `FIDCOL` varchar(255) DEFAULT NULL,
  `FIDVEN` varchar(255) DEFAULT NULL,
  `DFECREG` date DEFAULT NULL,
  PRIMARY KEY (`NIDHIS_COL_VEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.this_ven_zon
CREATE TABLE IF NOT EXISTS `this_ven_zon` (
  `NIDHIS_VEN_ZON` int(11) NOT NULL AUTO_INCREMENT,
  `FIDVEN` int(11) DEFAULT NULL,
  `FIDZON` int(11) DEFAULT NULL,
  `DFECREG` date DEFAULT NULL,
  `VMOD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIDHIS_VEN_ZON`),
  KEY `FKIDHIS_VEN` (`FIDVEN`) USING BTREE,
  KEY `FKIDHIS_ZON` (`FIDZON`) USING BTREE,
  CONSTRAINT `FKIDHIS_VEN` FOREIGN KEY (`FIDVEN`) REFERENCES `t00ven` (`NIDVEN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDHIS_ZON` FOREIGN KEY (`FIDZON`) REFERENCES `tzona` (`NIDZON`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.thor
CREATE TABLE IF NOT EXISTS `thor` (
  `NIDHOR` varchar(255) NOT NULL,
  `VDESHOR` time DEFAULT NULL,
  `THORINGHOR` time DEFAULT NULL,
  `THORINGRECHOR` time DEFAULT NULL,
  `THORFINRECHOR` time DEFAULT NULL,
  `THORSALHOR` time DEFAULT NULL,
  PRIMARY KEY (`NIDHOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tjor
CREATE TABLE IF NOT EXISTS `tjor` (
  `NIDJOR` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMJOR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIDJOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tmen
CREATE TABLE IF NOT EXISTS `tmen` (
  `NIDMEN` int(11) NOT NULL AUTO_INCREMENT,
  `FIDMOD` int(11) NOT NULL,
  `VNOMMEN` varchar(50) DEFAULT NULL,
  `VLINKMEN` varchar(255) DEFAULT NULL,
  `VDESMEN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NIDMEN`),
  KEY `FKIDMODMEN` (`FIDMOD`) USING BTREE,
  CONSTRAINT `FKIDMODMEN` FOREIGN KEY (`FIDMOD`) REFERENCES `tmod` (`NIDMOD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tmod
CREATE TABLE IF NOT EXISTS `tmod` (
  `NIDMOD` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMMOD` varchar(50) NOT NULL,
  `VDESMOD` varchar(200) DEFAULT NULL,
  `BESTMOD` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`NIDMOD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tmod_per
CREATE TABLE IF NOT EXISTS `tmod_per` (
  `NIDMOD_PER` int(11) NOT NULL AUTO_INCREMENT,
  `FIDMOD` int(11) NOT NULL,
  `FIDPER` int(11) NOT NULL,
  PRIMARY KEY (`NIDMOD_PER`),
  KEY `FKIDMOD` (`FIDMOD`) USING BTREE,
  KEY `FKIDPER` (`FIDPER`) USING BTREE,
  CONSTRAINT `FKIDMOD` FOREIGN KEY (`FIDMOD`) REFERENCES `tmod` (`NIDMOD`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDPER` FOREIGN KEY (`FIDPER`) REFERENCES `tper` (`NIDPER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tper
CREATE TABLE IF NOT EXISTS `tper` (
  `NIDPER` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMPER` varchar(50) NOT NULL,
  `VDESPER` varchar(200) DEFAULT NULL,
  `BESTPER` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`NIDPER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tpro
CREATE TABLE IF NOT EXISTS `tpro` (
  `NIDPRO` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMPRO` varchar(255) DEFAULT NULL,
  `FIDDEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDPRO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.trol
CREATE TABLE IF NOT EXISTS `trol` (
  `NIDROL` int(11) NOT NULL AUTO_INCREMENT,
  `FIDMOD` int(11) DEFAULT NULL,
  `VNOMROL` varchar(50) NOT NULL,
  `VDESROL` varchar(200) DEFAULT NULL,
  `BESTROL` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`NIDROL`),
  KEY `FKIDMODROL` (`FIDMOD`) USING BTREE,
  CONSTRAINT `FKIDMODROL` FOREIGN KEY (`FIDMOD`) REFERENCES `tmod` (`NIDMOD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tsedes
CREATE TABLE IF NOT EXISTS `tsedes` (
  `NIDSED` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMSED` varchar(20) DEFAULT NULL,
  `FIDAREA` int(11) DEFAULT NULL,
  `FIDDIV` int(11) DEFAULT NULL,
  `FIDDEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDSED`),
  KEY `FKIDAREA` (`FIDAREA`) USING BTREE,
  KEY `FKIDSED_DIV` (`FIDDIV`) USING BTREE,
  KEY `FKIDSEC_DEP` (`FIDDEP`) USING BTREE,
  CONSTRAINT `FKIDAREA` FOREIGN KEY (`FIDAREA`) REFERENCES `tarea` (`NIDAREA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDSEC_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDSED_DIV` FOREIGN KEY (`FIDDIV`) REFERENCES `tdiv` (`NIDDIV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tsuc
CREATE TABLE IF NOT EXISTS `tsuc` (
  `NIDSUC` int(11) NOT NULL AUTO_INCREMENT,
  `FIDDIS` int(11) DEFAULT NULL,
  `FIDPRO` int(11) DEFAULT NULL,
  `FIDDEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDSUC`),
  KEY `FKIDSUC_DIS` (`FIDDIS`) USING BTREE,
  KEY `FKIDSUC_PRO` (`FIDPRO`) USING BTREE,
  KEY `FKIDSUC_DEP` (`FIDDEP`) USING BTREE,
  CONSTRAINT `FKIDSUC_DEP` FOREIGN KEY (`FIDDEP`) REFERENCES `tdep` (`NIDDEP`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDSUC_DIS` FOREIGN KEY (`FIDDIS`) REFERENCES `tdis` (`NIDDIS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDSUC_PRO` FOREIGN KEY (`FIDPRO`) REFERENCES `tpro` (`NIDPRO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tusu_per
CREATE TABLE IF NOT EXISTS `tusu_per` (
  `NIDUSU_PRO` int(11) NOT NULL AUTO_INCREMENT,
  `FIDUSU` int(11) NOT NULL,
  `FIDPER` int(11) NOT NULL,
  PRIMARY KEY (`NIDUSU_PRO`),
  KEY `FKIDUSU` (`FIDUSU`) USING BTREE,
  KEY `FIDPER` (`FIDPER`) USING BTREE,
  CONSTRAINT `FIDPER` FOREIGN KEY (`FIDPER`) REFERENCES `tper` (`NIDPER`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDUSU` FOREIGN KEY (`FIDUSU`) REFERENCES `t001usu` (`NIDUSU`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tusu_rol
CREATE TABLE IF NOT EXISTS `tusu_rol` (
  `NIDUSU_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `FIDUSU` int(11) NOT NULL,
  `FIDROL` int(11) NOT NULL,
  PRIMARY KEY (`NIDUSU_ROL`),
  KEY `FKIDUSU_ROL` (`FIDUSU`) USING BTREE,
  KEY `FKIDROL_USU` (`FIDROL`) USING BTREE,
  CONSTRAINT `FKIDROL_USU` FOREIGN KEY (`FIDROL`) REFERENCES `trol` (`NIDROL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKIDUSU_ROL` FOREIGN KEY (`FIDUSU`) REFERENCES `t001usu` (`NIDUSU`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tvac
CREATE TABLE IF NOT EXISTS `tvac` (
  `IDVAC` int(11) NOT NULL AUTO_INCREMENT,
  `VIDEN` varchar(255) DEFAULT NULL,
  `DFECINI` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `FECHFIN` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `VDESC` varchar(120) DEFAULT NULL,
  `FIDCOL` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDVAC`),
  CONSTRAINT `FKIDCOL_VAC` FOREIGN KEY (`IDVAC`) REFERENCES `t002col` (`NIDCOL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tzona
CREATE TABLE IF NOT EXISTS `tzona` (
  `NIDZON` int(11) NOT NULL AUTO_INCREMENT,
  `NZON` int(3) unsigned DEFAULT NULL,
  `NESTZON` tinyint(1) DEFAULT '1',
  `VNOMZON` varchar(50) DEFAULT NULL,
  `FIDZONTIP` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIDZON`),
  KEY `FKIDZONTIP` (`FIDZONTIP`) USING BTREE,
  CONSTRAINT `FKIDZONTIP` FOREIGN KEY (`FIDZONTIP`) REFERENCES `tzontip` (`NIDZONTIP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla comisiones_live.tzontip
CREATE TABLE IF NOT EXISTS `tzontip` (
  `NIDZONTIP` int(11) NOT NULL AUTO_INCREMENT,
  `VNOMZONTIP` varchar(20) DEFAULT NULL,
  `VDESZONTIP` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`NIDZONTIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
