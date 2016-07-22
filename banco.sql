-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jul-2016 às 16:30
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `balance_history`
--

CREATE TABLE IF NOT EXISTS `balance_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `value_before` decimal(10,2) NOT NULL,
  `value_after` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `balance_history`
--

INSERT INTO `balance_history` (`id`, `id_user`, `value_before`, `value_after`, `date`) VALUES
(1, 1, '0.00', '0.00', '2016-07-21 16:22:01'),
(3, 1, '3230.01', '3230.01', '2016-07-21 16:26:03'),
(4, 1, '3230.01', '3230.00', '2016-07-21 16:26:08'),
(5, 1, '100.01', '-100.01', '2016-07-21 16:46:47'),
(6, 1, '-100.01', '-100.01', '2016-07-21 16:47:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `bill`
--

INSERT INTO `bill` (`id`, `id_type`, `day`, `value`, `description`) VALUES
(1, 2, 10, 65, ''),
(2, 3, 5, 50, 'Investimento em X');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bill_payment`
--

CREATE TABLE IF NOT EXISTS `bill_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bill` int(11) NOT NULL,
  `id_withdraw` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date` date NOT NULL,
  `observation` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `bill_payment`
--

INSERT INTO `bill_payment` (`id`, `id_bill`, `id_withdraw`, `value`, `date`, `observation`) VALUES
(1, 2, 7, 50, '2016-07-22', ''),
(2, 1, 8, 65, '2016-07-22', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(30) DEFAULT NULL,
  `ie` varchar(50) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `since` date DEFAULT NULL,
  `responsible` varchar(255) DEFAULT NULL,
  `responsible_cpf` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `observation` text,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `name`, `cpf_cnpj`, `ie`, `email1`, `email2`, `phone1`, `phone2`, `site`, `since`, `responsible`, `responsible_cpf`, `address`, `observation`, `status`) VALUES
(1, 'Phantom', '', '', '', '', '', '', '', '2016-07-12', '', '', '', '', 1),
(2, 'Crossfit', '', '', '', '', '', '', '', '2016-07-12', '', '', '', '', 1),
(3, 'Casa Fracalossi', '', '', '', '', '', '', '', '2016-07-12', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` text,
  `value` decimal(10,2) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_entry_0` (`id_type`),
  KEY `FK_entry_1` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `entry`
--

INSERT INTO `entry` (`id`, `date`, `description`, `value`, `id_type`, `id_client`) VALUES
(8, '2016-07-12', '', '50.00', 9, 2),
(9, '2016-07-12', 'Acréscimo de caixa', '3000.00', 8, NULL),
(11, '2016-07-12', 'Pagamento de título', '100.00', 2, 1),
(12, '2016-07-19', 'Acréscimo de caixa', '90.01', 8, NULL),
(13, '2016-07-20', 'Pagamento de título', '80.00', 1, 1),
(14, '2016-07-20', 'Pagamento de título', '150.00', 3, 3),
(15, '2016-07-21', 'Pagamento de título', '70.00', 1, 3),
(16, '2016-07-21', 'Pagamento de título', '350.00', 7, 3),
(17, '2016-07-21', 'Pagamento de título', '150.00', 3, 3),
(18, '2016-07-21', 'Pagamento de título', '50.00', 1, 0),
(19, '2016-07-21', 'Pagamento de título', '150.00', 7, 2),
(20, '2016-07-21', 'Pagamento de título', '50.00', 1, 2),
(21, '2016-07-21', 'Acréscimo de caixa', '0.01', 8, NULL),
(24, '2016-07-21', 'Acréscimo de caixa', '0.00', 8, NULL),
(25, '2016-07-21', 'Acréscimo de caixa', '0.00', 8, NULL),
(26, '2016-07-21', 'Pagamento de título - Parcela 3 de projeto Site institucional Phantom', '100.00', 2, 1),
(33, '2016-07-21', 'Pagamento de parcela de projeto - 10.', '0.01', 7, 0),
(34, '2016-07-21', 'Pagamento de parcela de projeto - 12.', '0.01', 7, 0),
(35, '2016-07-21', 'Pagamento de parcela de projeto - 13.', '0.01', 7, 0),
(36, '2016-07-21', 'Pagamento de parcela de projeto - 15.', '80.00', 2, 0),
(37, '2016-07-22', 'Pagamento de cobrança extra - cliente 1.', '50.00', 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entry_type`
--

CREATE TABLE IF NOT EXISTS `entry_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `entry_type`
--

INSERT INTO `entry_type` (`id`, `name`) VALUES
(1, 'Suporte web'),
(2, 'Desenvolvimento'),
(3, 'Marketing'),
(4, 'Investimento Eduardo'),
(5, 'Investimento Emanuel'),
(6, 'Investimento Maurício'),
(7, 'Serviço extra'),
(8, 'Atualização de caixa'),
(9, 'Suporte técnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `error` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `line` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `extra_charge`
--

CREATE TABLE IF NOT EXISTS `extra_charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_entry` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `description` text,
  `value` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `expiry` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_extra_charge_0` (`id_client`),
  KEY `id_entry` (`id_entry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `extra_charge`
--

INSERT INTO `extra_charge` (`id`, `id_client`, `id_entry`, `date`, `description`, `value`, `status`, `expiry`) VALUES
(1, 2, NULL, '2016-07-12', '', '150.00', 1, '2016-07-10'),
(2, 3, NULL, '2016-07-12', '', '350.00', 1, '2016-07-13'),
(3, 2, 8, '2016-07-12', '', '50.00', 1, '2016-07-12'),
(5, 1, NULL, '2016-07-22', '', '50.00', 1, '2016-07-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finances`
--

CREATE TABLE IF NOT EXISTS `finances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `observation` text,
  `monthly_value` decimal(10,2) NOT NULL,
  `payment_day` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `finances`
--

INSERT INTO `finances` (`id`, `status`, `observation`, `monthly_value`, `payment_day`) VALUES
(1, 1, '', '80.00', 13),
(2, 1, '', '50.00', 10),
(3, 1, '', '70.00', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `finances_history`
--

CREATE TABLE IF NOT EXISTS `finances_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_finances` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_finances_history_0` (`id_finances`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `finances_history`
--

INSERT INTO `finances_history` (`id`, `id_finances`, `date`, `description`) VALUES
(1, 1, '2016-07-12', 'Suporte mensal alterado de R$80,00 para R$85,00'),
(2, 1, '2016-07-12', 'Suporte mensal alterado de R$85,00 para R$0,80'),
(3, 1, '2016-07-12', 'Suporte mensal alterado de R$0,80 para R$80,00'),
(4, 2, '2016-07-12', 'Entrada de R$50,00.'),
(5, 1, '2016-07-22', 'Entrada de R$50,00.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inspection`
--

CREATE TABLE IF NOT EXISTS `inspection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `inspection`
--

INSERT INTO `inspection` (`id`, `date`) VALUES
(1, '2016-07-12'),
(2, '2016-07-12'),
(3, '2016-07-13'),
(4, '2016-07-18'),
(5, '2016-07-19'),
(6, '2016-07-20'),
(7, '2016-07-20'),
(8, '2016-07-20'),
(9, '2016-07-20'),
(10, '2016-07-20'),
(11, '2016-07-20'),
(12, '2016-07-20'),
(13, '2016-07-20'),
(14, '2016-07-20'),
(15, '2016-07-20'),
(16, '2016-07-20'),
(17, '2016-07-20'),
(18, '2016-07-20'),
(19, '2016-07-20'),
(20, '2016-07-21'),
(21, '2016-07-21'),
(22, '2016-07-21'),
(23, '2016-07-21'),
(24, '2016-07-21'),
(25, '2016-07-21'),
(26, '2016-07-21'),
(27, '2016-07-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `investor`
--

CREATE TABLE IF NOT EXISTS `investor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `initial_capital` decimal(10,2) DEFAULT NULL,
  `is_partner` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `investor`
--

INSERT INTO `investor` (`id`, `name`, `initial_capital`, `is_partner`) VALUES
(1, 'Eduardo', '20000.00', 1),
(2, 'Emanuel', '10000.00', 1),
(3, 'Mauricio', '20000.00', 1),
(4, 'Caixa', '3195.00', 0),
(5, 'Caixa interno', '50.02', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_entry_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `initial_date` date NOT NULL,
  `end_date` date NOT NULL,
  `executor` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `observation` text,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `done_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_0` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`id`, `id_client`, `id_entry_type`, `name`, `value`, `initial_date`, `end_date`, `executor`, `status`, `observation`, `done`, `done_date`) VALUES
(1, 1, 2, 'Site institucional Phantom', '800.00', '2016-07-11', '2016-07-18', '', 0, '', 1, '2016-07-20'),
(2, 3, 3, 'Site institucional Casa Fracalossi', '900.00', '2016-06-27', '2016-07-01', '', 0, '', 1, '2016-07-20'),
(3, NULL, 1, 'asdfweaf', '100.00', '2016-07-21', '2016-07-21', '', 0, '', 0, '0000-00-00'),
(10, NULL, 7, 'Novo projeto', '0.01', '2016-07-21', '2016-07-21', '', 1, '', 0, '0000-00-00'),
(12, NULL, 7, 'Novo projeto', '0.01', '2016-07-21', '2016-07-21', '', 1, '', 0, '0000-00-00'),
(13, NULL, 7, 'Novo projeto', '0.01', '2016-07-21', '2016-07-21', '', 1, '', 0, '0000-00-00'),
(14, NULL, 6, 'Projeto 312321321321', '80.00', '2016-07-21', '2016-07-21', '', 0, '', 0, '0000-00-00'),
(15, NULL, 2, 'fasfasdfasdfsdf', '80.00', '2016-07-21', '2016-07-21', '', 1, '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_installment`
--

CREATE TABLE IF NOT EXISTS `project_installment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `expiry` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_project_installment_0` (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `project_installment`
--

INSERT INTO `project_installment` (`id`, `id_project`, `number`, `value`, `expiry`, `status`) VALUES
(1, 1, 1, '100.00', '2016-06-10', 0),
(2, 1, 2, '100.00', '2016-07-10', 1),
(3, 1, 3, '100.00', '2016-08-10', 1),
(4, 1, 4, '100.00', '2016-09-10', 0),
(5, 1, 5, '100.00', '2016-10-10', 0),
(6, 1, 6, '100.00', '2016-11-10', 0),
(7, 1, 7, '100.00', '2016-12-10', 0),
(8, 1, 8, '100.00', '2017-01-10', 0),
(9, 2, 1, '150.00', '2016-05-13', 1),
(10, 2, 2, '150.00', '2016-06-13', 0),
(11, 2, 3, '150.00', '2016-07-13', 1),
(12, 2, 4, '150.00', '2016-08-13', 0),
(13, 2, 5, '150.00', '2016-09-13', 0),
(14, 2, 6, '150.00', '2016-10-13', 0),
(15, 3, 1, '50.00', '2016-07-21', 1),
(16, 3, 2, '50.00', '2016-08-21', 0),
(23, 10, 1, '0.01', '2016-07-21', 1),
(25, 12, 1, '0.01', '2016-07-21', 1),
(26, 13, 1, '0.01', '2016-07-21', 1),
(27, 14, 1, '80.00', '2016-07-21', 0),
(28, 15, 1, '80.00', '2016-07-21', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `report`
--

INSERT INTO `report` (`id`, `period`, `file`, `name`, `created`) VALUES
(1, '2016-07-01 / 2016-07-31', '579115f8705c7', 'Relatório 1', '2016-07-21'),
(2, '2016-07-01 / 2016-07-31', '57911a5020798', 'Relatório 2', '2016-07-21'),
(3, '2016-08-01 / 2016-08-31', '5791276c3950e', 'Relatório 3', '2016-07-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_client`
--

CREATE TABLE IF NOT EXISTS `report_client` (
  `id_report` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_report`,`id_client`),
  KEY `FK_report_client_1` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `report_client`
--

INSERT INTO `report_client` (`id_report`, `id_client`) VALUES
(1, 1),
(2, 1),
(3, 1),
(25, 1),
(1, 2),
(2, 2),
(3, 2),
(25, 2),
(1, 3),
(2, 3),
(3, 3),
(25, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `report_payment`
--

CREATE TABLE IF NOT EXISTS `report_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_report` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `type` varchar(70) NOT NULL,
  `id_title` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_report` (`id_report`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `report_payment`
--

INSERT INTO `report_payment` (`id`, `id_report`, `id_client`, `type`, `id_title`, `value`) VALUES
(1, 1, 3, 'support', 3, 70),
(2, 1, 3, 'extra', 2, 350),
(3, 1, 3, 'installment', 11, 150),
(4, 2, 0, 'installment', 15, 50),
(5, 2, 2, 'extra', 1, 150),
(6, 2, 2, 'support', 2, 50),
(7, 3, 1, 'installment', 3, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Rafael de Paula', 'rafael@email.com', '123'),
(4, 'Emanuel', 'emanuel@serraempresas.com.br', '123'),
(5, 'Eduardo', 'eduardo@serraempresas.com.br', '123'),
(6, 'Maurício', 'mauricio@serraempresas.com.br', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` text,
  `value` decimal(10,2) NOT NULL,
  `id_investor` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_partner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_exit_0` (`id_investor`),
  KEY `FK_exit_1` (`id_type`),
  KEY `FK_exit_2` (`id_partner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `withdraw`
--

INSERT INTO `withdraw` (`id`, `date`, `description`, `value`, `id_investor`, `id_type`, `id_partner`) VALUES
(1, '2016-07-12', 'DARF', '1000.00', 4, 5, NULL),
(2, '2016-07-12', NULL, '40.00', 5, 6, NULL),
(3, '2016-07-21', '', '50.00', 2, 2, NULL),
(5, '2016-07-21', 'Decréscimo de caixa', '0.01', 4, 6, NULL),
(6, '2016-07-21', 'Decréscimo de caixa', '200.02', 5, 6, NULL),
(7, '2016-07-22', 'Pagamento de conta', '50.00', 4, 3, NULL),
(8, '2016-07-22', 'Pagamento de conta', '65.00', 4, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `withdraw_type`
--

CREATE TABLE IF NOT EXISTS `withdraw_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `need_partner` tinyint(1) NOT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `withdraw_type`
--

INSERT INTO `withdraw_type` (`id`, `name`, `need_partner`, `balance`) VALUES
(1, 'Bem', 0, NULL),
(2, 'Despesa', 0, '50.00'),
(3, 'Investimento', 0, NULL),
(4, 'Retirada', 1, NULL),
(5, 'Imposto', 0, '1000.00'),
(6, 'Atualização de caixa', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `FK_entry_0` FOREIGN KEY (`id_type`) REFERENCES `entry_type` (`id`);

--
-- Limitadores para a tabela `extra_charge`
--
ALTER TABLE `extra_charge`
  ADD CONSTRAINT `FK_extra_charge_0` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_extra_charge_1` FOREIGN KEY (`id_entry`) REFERENCES `entry` (`id`);

--
-- Limitadores para a tabela `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `FK_finances_0` FOREIGN KEY (`id`) REFERENCES `client` (`id`);

--
-- Limitadores para a tabela `finances_history`
--
ALTER TABLE `finances_history`
  ADD CONSTRAINT `FK_finances_history_0` FOREIGN KEY (`id_finances`) REFERENCES `finances` (`id`);

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_project_0` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Limitadores para a tabela `project_installment`
--
ALTER TABLE `project_installment`
  ADD CONSTRAINT `FK_project_installment_0` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Limitadores para a tabela `report_client`
--
ALTER TABLE `report_client`
  ADD CONSTRAINT `FK_report_client_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `FK_exit_0` FOREIGN KEY (`id_investor`) REFERENCES `investor` (`id`),
  ADD CONSTRAINT `FK_exit_1` FOREIGN KEY (`id_type`) REFERENCES `withdraw_type` (`id`),
  ADD CONSTRAINT `FK_exit_2` FOREIGN KEY (`id_partner`) REFERENCES `investor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
