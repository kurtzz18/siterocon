-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: quiz
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `quiz`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `quiz` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `quiz`;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `cargo_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Usuario'),(2,'Admin');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questoes`
--

DROP TABLE IF EXISTS `questoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questoes` (
  `id_quest` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) NOT NULL,
  `quiz_questao` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `resp1` varchar(255) NOT NULL,
  `resp2` varchar(255) NOT NULL,
  `resp3` varchar(255) NOT NULL,
  `resp4` varchar(255) NOT NULL,
  `opc_correta` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id_quest`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questoes`
--

LOCK TABLES `questoes` WRITE;
/*!40000 ALTER TABLE `questoes` DISABLE KEYS */;
INSERT INTO `questoes` VALUES (1,'Num clube, dentre os 500 inscritos no departamento de nataÃ§Ã£o, 30 sÃ£o unicamente nadadores, entretento 310 tambÃ©m jogam futebol e 250 tambÃ©m jogam tÃªnis. Os inscritos em nataÃ§Ã£o que tambÃ©m praticam futebol e tÃªnis sÃ£o em nÃºmero de:','0','80\r\n','90','100\r\n','110','2'),(2,'Em um cubo, a quantidade de conjuntos distintos formados por duas arestas paralelas Ã© igual a:','2','6\r\n','8\r\n','12\r\n','18','4'),(3,'Um pacote tem 48 balas: algumas de hortelÃ£ e as demais de laranja. Se a terÃ§a parte correspondente ao dobro do nÃºmero de balas de hortelÃ£ excede a metade do de laranjas em 4 unidades, determine o nÃºmero de balas de hortelÃ£ e laranja.','3','24 balas de hortelÃ£ e 24 de laranja. ','12 balas de hortelÃ£ e 24 de laranja.	\r\n','12 balas de hortelÃ£ e 12 de laranja.	\r\n','20 balas de hortelÃ£ e 20 de laranja.','1'),(4,'Um aviÃ£o percorreu a distÃ¢ncia de 5 000 metros na posiÃ§Ã£o inclinada, e em relaÃ§Ã£o ao solo, percorreu 3 000 metros. Determine a altura do aviÃ£o.','4','4000','2000\r\n','3200\r\n','5000','1'),(5,'Calcule a metragem de arame utilizado para cercar um terreno triangular com as medidas perpendiculares de 60 e 80 metros, considerando que a cerca de arame terÃ¡ 4 fios.','5','240\r\n','690\r\n','960\r\n','420','3'),(6,'A compra foi entregue, embalada em 10 caixas, com 24 frascos em cada caixa. Sabendo-se que cada caixa continha 2 frascos de detergentes a mais no aroma limÃ£o do que no aroma coco, o nÃºmero de frascos entregues, no aroma limÃ£o, foi:','6','110\r\n','120\r\n','130\r\n','140','3'),(7,'A soma de um nÃºmero x com o dobro de um nÃºmero y Ã© - 7; e a diferenÃ§a entre o triplo desse nÃºmero x e nÃºmero y Ã© igual a 7. Sendo assim, Ã© correto afirmar que o produto xy Ã© igual a:\r\n','7','-10	\r\n','-12	\r\n','-15	\r\n','-4','4'),(8,'Um estudante pagou um lanche de 8 reais em moedas de 50 centavos e 1 real. Sabendo que, para este pagamento, o estudante utilizou 12 moedas, determine, respectivamente, moedas de 50 centavos e de um real que foram utilizadas no pagamento do lanche:','8','6 e 6	\r\n','8 e 4\r\n','4 e 8	\r\n','5 e 7','2'),(9,'Pedro e Paula sÃ£o irmÃ£os. Pedro tem 8 anos e a irmÃ£ Ã© 2 anos mais velha que ele. Somando-se a idade dos dois e dobrando o resultado, tem-se a idade da mÃ£e deles. Quantos anos a mÃ£o deles tem?','9','36 anos\r\n','22 anos	\r\n','41 anos	\r\n','26 anos','1'),(10,'A soma de um nÃºmero com o seu antecessor Ã© igual a 49. Qual Ã© o menor desses nÃºmeros?','10','21	\r\n','23	\r\n','22	\r\n','24','4'),(11,'As x pessoas de um grupo deveriam contribuir com quantias iguais a fim de arrecadar R$ 15 000,00 ,\r\nentretanto 10 delas deixaram de fazÃª-lo, ocasionando, para as demais, um acrÃ©scimo de R$ 50,00\r\nnas respectivas contribuiÃ§Ãµes. EntÃ£o x vale:','1','60\r\n\r\n','80\r\n\r\n','95\r\n\r\n','115\r\n','1');
/*!40000 ALTER TABLE `questoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `fk_PesCargo` (`cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Luan','lpessoa','bf5d8c6dbf7dd8ca72cc93b46c73525a4a51fb82',0,2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-19  9:48:53
