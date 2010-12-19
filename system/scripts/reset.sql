
DROP DATABASE `#{DB_NAME}`;
CREATE DATABASE `#{DB_NAME}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `#{DB_NAME}`;

-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 06. Oktober 2010 um 02:56
-- Server Version: 5.1.41
-- PHP-Version: 5.3.2-1ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `cms_content`;
CREATE TABLE IF NOT EXISTS `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cms_key` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `cms_content` (`id`, `title`, `cms_key`, `content`) VALUES
(1, 'Angebot', 'angebot_de', '\r\n<ul>\r\n    <li>Kraftraining</li>\r\n    <li>Ausdauertraining</li>\r\n    <li>Bodytoning</li>\r\n    <li>Rumpf- und Rückenstabilisation und Stärkung</li>\r\n    <li>Kettlebell</li>\r\n    <li>TRX suspension</li>\r\n    <li>Kinesis</li>\r\n    <li>Theraband</li>\r\n</ul>\r\n\r\n<div>\r\n    <h3>Preise</h3>\r\n    <div>Einzelstunde: 140.- SFr</div>\r\n    <div>10er/20er Abo,nach Absprache</div>\r\n</div>\r\n\r\n'),
(2, 'Offer', 'angebot_en', '\r\n<ul>\r\n    <li>Kraftraining</li>\r\n    <li>Ausdauertraining</li>\r\n    <li>Bodytoning</li>\r\n    <li>Rumpf- und Rückenstabilisation und Stärkung</li>\r\n    <li>Kettlebell</li>\r\n    <li>TRX suspension</li>\r\n    <li>Kinesis</li>\r\n    <li>Theraband</li>\r\n</ul>\r\n\r\n<div>\r\n    <h3>Preise</h3>\r\n    <div>Einzelstunde: 140.- SFr</div>\r\n    <div>10er/20er Abo,nach Absprache</div>\r\n</div>\r\n\r\n'),
(3, 'Your goal is our concern', 'home_de', '???'),
(4, 'Your goal is our concern', 'home_en', '???'),
(5, 'Kontakt', 'kontakt_de', '\r\n<div>\r\n    Victor Adzikah<br/>\r\n    Birmensdorferstrasse 301<br/>\r\n    8055 Zürich<br/>\r\n    Tel:078 892 63 60<br/>\r\n    Email:vicannan@vmtraining.ch<br/>\r\n</div>\r\n\r\n<div>\r\n    Michael Vuilléme<br/>\r\n    ???<br/>\r\n    ???<br/>\r\n    ???<br/>\r\n    Email:mitch@vmtraining.ch<br/>\r\n</div>\r\n'),
(6, 'Contact', 'kontakt_en', '\r\n<div>\r\n    Victor Adzikah<br/>\r\n    Birmensdorferstrasse 301<br/>\r\n    8055 Zürich<br/>\r\n    Tel:078 892 63 60<br/>\r\n    Email:vicannan@vmtraining.ch<br/>\r\n</div>\r\n\r\n<div>\r\n    Michael Vuilléme<br/>\r\n    ???<br/>\r\n    ???<br/>\r\n    ???<br/>\r\n    Email:mitch@vmtraining.ch<br/>\r\n</div>\r\n'),
(7, 'Location', 'location_de', '\r\n<ul>\r\n    <li>Fitness Center</li>\r\n    <li>Outdoor</li>\r\n    <li>Bei Ihnen zu Hause</li>\r\n    <li>Einfach dort, wo Sie sich wohl fühlen.</li>\r\n</ul>\r\n'),
(8, 'Location', 'location_en', '\r\n<ul>\r\n    <li>Fitness Center</li>\r\n    <li>Outdoor</li>\r\n    <li>Bei Ihnen zu Hause</li>\r\n    <li>Einfach dort, wo Sie sich wohl fühlen.</li>\r\n</ul>\r\n'),
(9, 'Preise', 'preise_de', '\r\n<div>Einzelstunde: 140.- SFr</div>\r\n<div>10er/20er Abo,nach Absprache</div>\r\n'),
(10, 'Price', 'preise_en', '\r\n<div>Einzelstunde: 140.- SFr</div>\r\n<div>10er/20er Abo,nach Absprache</div>\r\n'),
(11, 'Über Uns', 'ueber_uns_de', '\r\n<div>\r\n    <div>Name: Victor Adzikah</div>\r\n    <div>Dip.Fitness/Personal Trainer.(Star Education School, Zürich)</div>\r\n    <div>Football, Mountain bike and other outdoor sports as well.</div>\r\n    <div>\r\n        <h3>Sprachen</h3>\r\n        <ul>\r\n            <li>English</li>\r\n            <li>German</li>\r\n        </ul>\r\n    </div>\r\n</div>\r\n\r\n<div>\r\n    <div>Name: Micheal Vuilléme</div>\r\n    <div>Dip.Fitness/Personal Trainer(Star Education School, Zürich)</div>\r\n    <div>Kampfsport (Thai Boxing)</div>\r\n    <div>\r\n        <h3>Sprachen</h3>\r\n        <ul>\r\n            <li>German</li>\r\n            <li>French</li>\r\n            <li>Spanish</li>\r\n            <li>Italian</li>\r\n        </ul>\r\n    </div>\r\n</div>\r\n\r\n'),
(12, 'About Us', 'ueber_uns_en', '\r\n<div>\r\n    <div>Name: Victor Adzikah</div>\r\n    <div>Dip.Fitness/Personal Trainer.(Star Education School, Zürich)</div>\r\n    <div>Football, Mountain bike and other outdoor sports as well.</div>\r\n    <div>\r\n        <h3>Sprachen</h3>\r\n        <ul>\r\n            <li>English</li>\r\n            <li>German</li>\r\n        </ul>\r\n    </div>\r\n</div>\r\n\r\n<div>\r\n    <div>Name: Micheal Vuilléme</div>\r\n    <div>Dip.Fitness/Personal Trainer(Star Education School, Zürich)</div>\r\n    <div>Kampfsport (Thai Boxing)</div>\r\n    <div>\r\n        <h3>Sprachen</h3>\r\n        <ul>\r\n            <li>German</li>\r\n            <li>French</li>\r\n            <li>Spanish</li>\r\n            <li>Italian</li>\r\n        </ul>\r\n    </div>\r\n</div>\r\n\r\n'),
(13, 'Referenzen und Erfahrungsberichte', 'referenzen_de', '???'),
(14, 'References', 'referenzen_en', '???');

