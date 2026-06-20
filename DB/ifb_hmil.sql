-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 08:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifb_hmil`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jasperReportcall` (IN `selectcopy` VARCHAR(100), IN `php_version` VARCHAR(100))   BEGIN
   IF selectcopy = 'All' THEN
SET @qry = CONCAT("SELECT\r\n         invoices.`InternalDocNo` AS invoices_InternalDocNo,\r\n invoices.PODateInWord, invoices.GrandTotalInWord,invoice_products.TaxAmountInWord,    invoices.`VoucherInvoiceNumber` AS invoices_VoucherInvoiceNumber,\r\n     invoices.`VoucherInvoiceDate` AS invoices_VoucherInvoiceDate,\r\n     invoices.`PONumber` AS invoices_PONumber,\r\n     invoices.`PODate` AS invoices_PODate,\r\n     invoices.`TransporterName` AS invoices_TransporterName,\r\n     invoices.`TransporterNo` AS invoices_TransporterNo,\r\n     invoices.`HMILVendorCode` AS invoices_HMILVendorCode,\r\n     invoices.`GrandTotal` AS invoices_GrandTotal,\r\n     invoices.`GSTIN` AS invoices_GSTIN,\r\n     invoices.`Location` AS invoices_Location,\r\n     invoices.`ShopCode` AS invoices_ShopCode,\r\n     invoices.`GateNo` AS invoices_GateNo,\r\n     invoices.`ContainerType` AS invoices_ContainerType,\r\n     invoices.`NoofContainers` AS invoices_NoofContainers,\r\n     invoices.`StuffQty` AS invoices_StuffQty,\r\n     invoices.`HMILPlant` AS invoices_HMILPlant,\r\n     invoices.`Invoicecount` AS invoices_Invoicecount,\r\n     invoices.`created_at` AS invoices_created_at,\r\n     invoices.`updated_at` AS invoices_updated_at,
\r\n  invoices.`CGST_amt` AS invoices_CGST_amt, 
 \r\n          invoice_products.`InternalDocNo_id` AS invoice_products_InternalDocNo_id,\r\n     invoice_products.`VoucherInvoiceNumber_id` AS invoice_products_VoucherInvoiceNumber_id,\r\n     invoice_products.`ItemNumber` AS invoice_products_ItemNumber,\r\n     invoice_products.`HMILPartDescription` AS invoice_products_HMILPartDescription,\r\n     invoice_products.`HMILPartNo` AS invoice_products_HMILPartNo,\r\n     invoice_products.`ITWPartNo` AS invoice_products_ITWPartNo,\r\n     invoice_products.`HSNCode` AS invoice_products_HSNCode,\r\n     invoice_products.`TarriffNo` AS invoice_products_TarriffNo,\r\n     invoice_products.`ItemServiceDescription` AS invoice_products_ItemServiceDescription,\r\n     invoice_products.`NoOfCases` AS invoice_products_NoOfCases,\r\n     invoice_products.`ItemQuantity` AS invoice_products_ItemQuantity,\r\n     invoice_products.`BaseUOM` AS invoice_products_BaseUOM,\r\n     invoice_products.`ItemUnitRate` AS invoice_products_ItemUnitRate,\r\n     invoice_products.`ItemUnitAmount` AS invoice_products_ItemUnitAmount,\r\n     invoice_products.`SGSTper` AS invoice_products_SGSTper,\r\n     invoice_products.`SGSTamt` AS invoice_products_SGSTamt,\r\n     invoice_products.`CGSTper` AS invoice_products_CGSTper,\r\n     invoice_products.`CGSTamt` AS invoice_products_CGSTamt,\r\n     invoice_products.`IGSTper` AS invoice_products_IGSTper,\r\n     invoice_products.`IGSTamt` AS invoice_products_IGSTamt,\r\n     invoice_products.`MaterialCost` AS invoice_products_MaterialCost,\r\n     invoice_products.`TaxAmount` AS invoice_products_TaxAmount,\r\n     invoice_products.`GrandTotal` AS invoice_products_GrandTotal,\r\n     invoice_products.`NetAmount` AS invoice_products_NetAmount,\r\n     invoice_products.`ConsPartCost` AS invoice_products_ConsPartCost,\r\n     invoice_products.`AssessableValue` AS invoice_products_AssessableValue,\r\n     invoice_products.`ToolCost` AS invoice_products_ToolCost,\r\n     invoice_products.`ConsMatlCost` AS invoice_products_ConsMatlCost,\r\n     invoice_products.`InvoiceID_count` AS invoice_products_InvoiceID_count,\r\n     invoice_products.`created_at` AS invoice_products_created_at,\r\n     invoice_products.`updated_at` AS invoice_products_updated_at,\r\n copy,sequence \r\n FROM \r\n     `invoices` invoices INNER JOIN `invoice_products` invoice_products ON invoices.`InternalDocNo` = invoice_products.`InternalDocNo_id`\r\n CROSS JOIN \r\n(\r\nSelect 'ORIGINAL FOR BUYER' as copy, 1 as sequence \r\n UNION \r\n SELECT 'DUPLICATE FOR TRANSPORTER' as copy, 2 as sequence \r\n UNION \r\n SELECT 'TRIPLICATE FOR ASSESSMENT' as copy, 3 as sequence \r\n UNION \r\n SELECT 'EXTRA COPY' as copy, 4 as sequence\r\n) x where InternalDocNo = '",php_version,"'");


ELSEIF selectcopy = 'ORIGINAL' THEN
SET @qry = CONCAT("SELECT\r\n        invoices.`InternalDocNo` AS invoices_InternalDocNo,\r\n invoices.PODateInWord, invoices.GrandTotalInWord,invoice_products.TaxAmountInWord,     invoices.`VoucherInvoiceNumber` AS invoices_VoucherInvoiceNumber,\r\n     invoices.`VoucherInvoiceDate` AS invoices_VoucherInvoiceDate,\r\n     invoices.`PONumber` AS invoices_PONumber,\r\n     invoices.`PODate` AS invoices_PODate,\r\n     invoices.`TransporterName` AS invoices_TransporterName,\r\n     invoices.`TransporterNo` AS invoices_TransporterNo,\r\n     invoices.`HMILVendorCode` AS invoices_HMILVendorCode,\r\n     invoices.`GrandTotal` AS invoices_GrandTotal,\r\n     invoices.`GSTIN` AS invoices_GSTIN,\r\n     invoices.`Location` AS invoices_Location,\r\n     invoices.`ShopCode` AS invoices_ShopCode,\r\n     invoices.`GateNo` AS invoices_GateNo,\r\n     invoices.`ContainerType` AS invoices_ContainerType,\r\n     invoices.`NoofContainers` AS invoices_NoofContainers,\r\n     invoices.`StuffQty` AS invoices_StuffQty,\r\n     invoices.`HMILPlant` AS invoices_HMILPlant,\r\n     invoices.`Invoicecount` AS invoices_Invoicecount,\r\n     invoices.`created_at` AS invoices_created_at,\r\n     invoices.`updated_at` AS invoices_updated_at,
 \r\n  invoices.`CGST_amt` AS invoices_CGST_amt, 
                  \r\n        invoice_products.`InternalDocNo_id` AS invoice_products_InternalDocNo_id,\r\n     invoice_products.`VoucherInvoiceNumber_id` AS invoice_products_VoucherInvoiceNumber_id,\r\n     invoice_products.`ItemNumber` AS invoice_products_ItemNumber,\r\n     invoice_products.`HMILPartDescription` AS invoice_products_HMILPartDescription,\r\n     invoice_products.`HMILPartNo` AS invoice_products_HMILPartNo,\r\n     invoice_products.`ITWPartNo` AS invoice_products_ITWPartNo,\r\n     invoice_products.`HSNCode` AS invoice_products_HSNCode,\r\n     invoice_products.`TarriffNo` AS invoice_products_TarriffNo,\r\n     invoice_products.`ItemServiceDescription` AS invoice_products_ItemServiceDescription,\r\n     invoice_products.`NoOfCases` AS invoice_products_NoOfCases,\r\n     invoice_products.`ItemQuantity` AS invoice_products_ItemQuantity,\r\n     invoice_products.`BaseUOM` AS invoice_products_BaseUOM,\r\n     invoice_products.`ItemUnitRate` AS invoice_products_ItemUnitRate,\r\n     invoice_products.`ItemUnitAmount` AS invoice_products_ItemUnitAmount,\r\n     invoice_products.`SGSTper` AS invoice_products_SGSTper,\r\n     invoice_products.`SGSTamt` AS invoice_products_SGSTamt,\r\n     invoice_products.`CGSTper` AS invoice_products_CGSTper,\r\n     invoice_products.`CGSTamt` AS invoice_products_CGSTamt,\r\n     invoice_products.`IGSTper` AS invoice_products_IGSTper,\r\n     invoice_products.`IGSTamt` AS invoice_products_IGSTamt,\r\n     invoice_products.`MaterialCost` AS invoice_products_MaterialCost,\r\n     invoice_products.`TaxAmount` AS invoice_products_TaxAmount,\r\n     invoice_products.`GrandTotal` AS invoice_products_GrandTotal,\r\n     invoice_products.`NetAmount` AS invoice_products_NetAmount,\r\n     invoice_products.`ConsPartCost` AS invoice_products_ConsPartCost,\r\n     invoice_products.`AssessableValue` AS invoice_products_AssessableValue,\r\n     invoice_products.`ToolCost` AS invoice_products_ToolCost,\r\n     invoice_products.`ConsMatlCost` AS invoice_products_ConsMatlCost,\r\n     invoice_products.`InvoiceID_count` AS invoice_products_InvoiceID_count,\r\n     invoice_products.`created_at` AS invoice_products_created_at,\r\n     invoice_products.`updated_at` AS invoice_products_updated_at,\r\ncopy,sequence \r\n FROM \r\n     `invoices` invoices INNER JOIN `invoice_products` invoice_products ON invoices.`InternalDocNo` = invoice_products.`InternalDocNo_id`\r\n CROSS JOIN \r\n(\r\nSelect 'ORIGINAL FOR BUYER' as copy, 1 as sequence\r\n) x where InternalDocNo = '",php_version,"'");


ELSEIF selectcopy = 'DUPLICATE' THEN
SET @qry = CONCAT("SELECT\r\n         invoices.`InternalDocNo` AS invoices_InternalDocNo,\r\n invoices.PODateInWord, invoices.GrandTotalInWord,invoice_products.TaxAmountInWord,    invoices.`VoucherInvoiceNumber` AS invoices_VoucherInvoiceNumber,\r\n     invoices.`VoucherInvoiceDate` AS invoices_VoucherInvoiceDate,\r\n     invoices.`PONumber` AS invoices_PONumber,\r\n     invoices.`PODate` AS invoices_PODate,\r\n     invoices.`TransporterName` AS invoices_TransporterName,\r\n     invoices.`TransporterNo` AS invoices_TransporterNo,\r\n     invoices.`HMILVendorCode` AS invoices_HMILVendorCode,\r\n     invoices.`GrandTotal` AS invoices_GrandTotal,\r\n     invoices.`GSTIN` AS invoices_GSTIN,\r\n     invoices.`Location` AS invoices_Location,\r\n     invoices.`ShopCode` AS invoices_ShopCode,\r\n     invoices.`GateNo` AS invoices_GateNo,\r\n     invoices.`ContainerType` AS invoices_ContainerType,\r\n     invoices.`NoofContainers` AS invoices_NoofContainers,\r\n     invoices.`StuffQty` AS invoices_StuffQty,\r\n     invoices.`HMILPlant` AS invoices_HMILPlant,\r\n     invoices.`Invoicecount` AS invoices_Invoicecount,\r\n     invoices.`created_at` AS invoices_created_at,\r\n     invoices.`updated_at` AS invoices_updated_at,\r\n       invoice_products.`InternalDocNo_id` AS invoice_products_InternalDocNo_id,\r\n     invoice_products.`VoucherInvoiceNumber_id` AS invoice_products_VoucherInvoiceNumber_id,\r\n     invoice_products.`ItemNumber` AS invoice_products_ItemNumber,\r\n     invoice_products.`HMILPartDescription` AS invoice_products_HMILPartDescription,\r\n     invoice_products.`HMILPartNo` AS invoice_products_HMILPartNo,\r\n     invoice_products.`ITWPartNo` AS invoice_products_ITWPartNo,\r\n     invoice_products.`HSNCode` AS invoice_products_HSNCode,\r\n     invoice_products.`TarriffNo` AS invoice_products_TarriffNo,\r\n     invoice_products.`ItemServiceDescription` AS invoice_products_ItemServiceDescription,\r\n     invoice_products.`NoOfCases` AS invoice_products_NoOfCases,\r\n     invoice_products.`ItemQuantity` AS invoice_products_ItemQuantity,\r\n     invoice_products.`BaseUOM` AS invoice_products_BaseUOM,\r\n     invoice_products.`ItemUnitRate` AS invoice_products_ItemUnitRate,\r\n     invoice_products.`ItemUnitAmount` AS invoice_products_ItemUnitAmount,\r\n     invoice_products.`SGSTper` AS invoice_products_SGSTper,\r\n     invoice_products.`SGSTamt` AS invoice_products_SGSTamt,\r\n     invoice_products.`CGSTper` AS invoice_products_CGSTper,\r\n     invoice_products.`CGSTamt` AS invoice_products_CGSTamt,\r\n     invoice_products.`IGSTper` AS invoice_products_IGSTper,\r\n     invoice_products.`IGSTamt` AS invoice_products_IGSTamt,\r\n     invoice_products.`MaterialCost` AS invoice_products_MaterialCost,\r\n     invoice_products.`TaxAmount` AS invoice_products_TaxAmount,\r\n     invoice_products.`GrandTotal` AS invoice_products_GrandTotal,\r\n     invoice_products.`NetAmount` AS invoice_products_NetAmount,\r\n     invoice_products.`ConsPartCost` AS invoice_products_ConsPartCost,\r\n     invoice_products.`AssessableValue` AS invoice_products_AssessableValue,\r\n     invoice_products.`ToolCost` AS invoice_products_ToolCost,\r\n     invoice_products.`ConsMatlCost` AS invoice_products_ConsMatlCost,\r\n     invoice_products.`InvoiceID_count` AS invoice_products_InvoiceID_count,\r\n     invoice_products.`created_at` AS invoice_products_created_at,\r\n     invoice_products.`updated_at` AS invoice_products_updated_at,\r\ncopy,sequence \r\n FROM \r\n     `invoices` invoices INNER JOIN `invoice_products` invoice_products ON invoices.`InternalDocNo` = invoice_products.`InternalDocNo_id`\r\n CROSS JOIN \r\n(\r\nSELECT 'DUPLICATE FOR TRANSPORTER' as copy, 2 as sequence\r\n) x where InternalDocNo = '",php_version,"'");

ELSEIF selectcopy = 'TRIPLICATE' THEN
SET @qry = CONCAT("SELECT\r\n        invoices.`InternalDocNo` AS invoices_InternalDocNo,\r\n invoices.PODateInWord, invoices.GrandTotalInWord,invoice_products.TaxAmountInWord,    invoices.`VoucherInvoiceNumber` AS invoices_VoucherInvoiceNumber,\r\n     invoices.`VoucherInvoiceDate` AS invoices_VoucherInvoiceDate,\r\n     invoices.`PONumber` AS invoices_PONumber,\r\n     invoices.`PODate` AS invoices_PODate,\r\n     invoices.`TransporterName` AS invoices_TransporterName,\r\n     invoices.`TransporterNo` AS invoices_TransporterNo,\r\n     invoices.`HMILVendorCode` AS invoices_HMILVendorCode,\r\n     invoices.`GrandTotal` AS invoices_GrandTotal,\r\n     invoices.`GSTIN` AS invoices_GSTIN,\r\n     invoices.`Location` AS invoices_Location,\r\n     invoices.`ShopCode` AS invoices_ShopCode,\r\n     invoices.`GateNo` AS invoices_GateNo,\r\n     invoices.`ContainerType` AS invoices_ContainerType,\r\n     invoices.`NoofContainers` AS invoices_NoofContainers,\r\n     invoices.`StuffQty` AS invoices_StuffQty,\r\n     invoices.`HMILPlant` AS invoices_HMILPlant,\r\n     invoices.`Invoicecount` AS invoices_Invoicecount,\r\n     invoices.`created_at` AS invoices_created_at,\r\n     invoices.`updated_at` AS invoices_updated_at,\r\n       invoice_products.`InternalDocNo_id` AS invoice_products_InternalDocNo_id,\r\n     invoice_products.`VoucherInvoiceNumber_id` AS invoice_products_VoucherInvoiceNumber_id,\r\n     invoice_products.`ItemNumber` AS invoice_products_ItemNumber,\r\n     invoice_products.`HMILPartDescription` AS invoice_products_HMILPartDescription,\r\n     invoice_products.`HMILPartNo` AS invoice_products_HMILPartNo,\r\n     invoice_products.`ITWPartNo` AS invoice_products_ITWPartNo,\r\n     invoice_products.`HSNCode` AS invoice_products_HSNCode,\r\n     invoice_products.`TarriffNo` AS invoice_products_TarriffNo,\r\n     invoice_products.`ItemServiceDescription` AS invoice_products_ItemServiceDescription,\r\n     invoice_products.`NoOfCases` AS invoice_products_NoOfCases,\r\n     invoice_products.`ItemQuantity` AS invoice_products_ItemQuantity,\r\n     invoice_products.`BaseUOM` AS invoice_products_BaseUOM,\r\n     invoice_products.`ItemUnitRate` AS invoice_products_ItemUnitRate,\r\n     invoice_products.`ItemUnitAmount` AS invoice_products_ItemUnitAmount,\r\n     invoice_products.`SGSTper` AS invoice_products_SGSTper,\r\n     invoice_products.`SGSTamt` AS invoice_products_SGSTamt,\r\n     invoice_products.`CGSTper` AS invoice_products_CGSTper,\r\n     invoice_products.`CGSTamt` AS invoice_products_CGSTamt,\r\n     invoice_products.`IGSTper` AS invoice_products_IGSTper,\r\n     invoice_products.`IGSTamt` AS invoice_products_IGSTamt,\r\n     invoice_products.`MaterialCost` AS invoice_products_MaterialCost,\r\n     invoice_products.`TaxAmount` AS invoice_products_TaxAmount,\r\n     invoice_products.`GrandTotal` AS invoice_products_GrandTotal,\r\n     invoice_products.`NetAmount` AS invoice_products_NetAmount,\r\n     invoice_products.`ConsPartCost` AS invoice_products_ConsPartCost,\r\n     invoice_products.`AssessableValue` AS invoice_products_AssessableValue,\r\n     invoice_products.`ToolCost` AS invoice_products_ToolCost,\r\n     invoice_products.`ConsMatlCost` AS invoice_products_ConsMatlCost,\r\n     invoice_products.`InvoiceID_count` AS invoice_products_InvoiceID_count,\r\n     invoice_products.`created_at` AS invoice_products_created_at,\r\n     invoice_products.`updated_at` AS invoice_products_updated_at,\r\ncopy,sequence \r\n FROM \r\n     `invoices` invoices INNER JOIN `invoice_products` invoice_products ON invoices.`InternalDocNo` = invoice_products.`InternalDocNo_id`\r\n CROSS JOIN \r\n(\r\nSELECT 'TRIPLICATE FOR ASSESSMENT' as copy, 3 as sequence\r\n) x where InternalDocNo = '",php_version,"'");

ELSEIF selectcopy = 'EXTRA' THEN
SET @qry = CONCAT("SELECT\r\n         invoices.`InternalDocNo` AS invoices_InternalDocNo,\r\n invoices.PODateInWord, invoices.GrandTotalInWord,invoice_products.TaxAmountInWord,    invoices.`VoucherInvoiceNumber` AS invoices_VoucherInvoiceNumber,\r\n     invoices.`VoucherInvoiceDate` AS invoices_VoucherInvoiceDate,\r\n     invoices.`PONumber` AS invoices_PONumber,\r\n     invoices.`PODate` AS invoices_PODate,\r\n     invoices.`TransporterName` AS invoices_TransporterName,\r\n     invoices.`TransporterNo` AS invoices_TransporterNo,\r\n     invoices.`HMILVendorCode` AS invoices_HMILVendorCode,\r\n     invoices.`GrandTotal` AS invoices_GrandTotal,\r\n     invoices.`GSTIN` AS invoices_GSTIN,\r\n     invoices.`Location` AS invoices_Location,\r\n     invoices.`ShopCode` AS invoices_ShopCode,\r\n     invoices.`GateNo` AS invoices_GateNo,\r\n     invoices.`ContainerType` AS invoices_ContainerType,\r\n     invoices.`NoofContainers` AS invoices_NoofContainers,\r\n     invoices.`StuffQty` AS invoices_StuffQty,\r\n     invoices.`HMILPlant` AS invoices_HMILPlant,\r\n     invoices.`Invoicecount` AS invoices_Invoicecount,\r\n     invoices.`created_at` AS invoices_created_at,\r\n     invoices.`updated_at` AS invoices_updated_at,\r\n        invoice_products.`InternalDocNo_id` AS invoice_products_InternalDocNo_id,\r\n     invoice_products.`VoucherInvoiceNumber_id` AS invoice_products_VoucherInvoiceNumber_id,\r\n     invoice_products.`ItemNumber` AS invoice_products_ItemNumber,\r\n     invoice_products.`HMILPartDescription` AS invoice_products_HMILPartDescription,\r\n     invoice_products.`HMILPartNo` AS invoice_products_HMILPartNo,\r\n     invoice_products.`ITWPartNo` AS invoice_products_ITWPartNo,\r\n     invoice_products.`HSNCode` AS invoice_products_HSNCode,\r\n     invoice_products.`TarriffNo` AS invoice_products_TarriffNo,\r\n     invoice_products.`ItemServiceDescription` AS invoice_products_ItemServiceDescription,\r\n     invoice_products.`NoOfCases` AS invoice_products_NoOfCases,\r\n     invoice_products.`ItemQuantity` AS invoice_products_ItemQuantity,\r\n     invoice_products.`BaseUOM` AS invoice_products_BaseUOM,\r\n     invoice_products.`ItemUnitRate` AS invoice_products_ItemUnitRate,\r\n     invoice_products.`ItemUnitAmount` AS invoice_products_ItemUnitAmount,\r\n     invoice_products.`SGSTper` AS invoice_products_SGSTper,\r\n     invoice_products.`SGSTamt` AS invoice_products_SGSTamt,\r\n     invoice_products.`CGSTper` AS invoice_products_CGSTper,\r\n     invoice_products.`CGSTamt` AS invoice_products_CGSTamt,\r\n     invoice_products.`IGSTper` AS invoice_products_IGSTper,\r\n     invoice_products.`IGSTamt` AS invoice_products_IGSTamt,\r\n     invoice_products.`MaterialCost` AS invoice_products_MaterialCost,\r\n     invoice_products.`TaxAmount` AS invoice_products_TaxAmount,\r\n     invoice_products.`GrandTotal` AS invoice_products_GrandTotal,\r\n     invoice_products.`NetAmount` AS invoice_products_NetAmount,\r\n     invoice_products.`ConsPartCost` AS invoice_products_ConsPartCost,\r\n     invoice_products.`AssessableValue` AS invoice_products_AssessableValue,\r\n     invoice_products.`ToolCost` AS invoice_products_ToolCost,\r\n     invoice_products.`ConsMatlCost` AS invoice_products_ConsMatlCost,\r\n     invoice_products.`InvoiceID_count` AS invoice_products_InvoiceID_count,\r\n     invoice_products.`created_at` AS invoice_products_created_at,\r\n     invoice_products.`updated_at` AS invoice_products_updated_at,\r\ncopy,sequence \r\n FROM \r\n     `invoices` invoices INNER JOIN `invoice_products` invoice_products ON invoices.`InternalDocNo` = invoice_products.`InternalDocNo_id`\r\n CROSS JOIN \r\n(\r\nSELECT 'EXTRA COPY' as copy, 4 as sequence\r\n) x where InternalDocNo = '",php_version,"'");

END IF;

PREPARE stmt FROM @qry;

EXECUTE stmt;

DROP PREPARE stmt;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `backuppath` varchar(255) NOT NULL,
  `lastbackupdate` varchar(255) NOT NULL,
  `lastdownloaddate` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `downloadusername` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backups`
--

INSERT INTO `backups` (`id`, `backuppath`, `lastbackupdate`, `lastdownloaddate`, `username`, `downloadusername`, `created_at`, `updated_at`) VALUES
(1, 'C:\\xampp\\htdocs\\Nash_Industries_HMIL\\public\\Resource', '2019-07-22_20-50-53', '2019-07-22_20-54-12', 'admin', 'admin', '2019-07-21 18:30:00', '2019-07-21 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE `configures` (
  `id` int(10) UNSIGNED NOT NULL,
  `ewaybillserialkey` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `ewaybillserialkey`, `created_at`, `updated_at`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZjYzBjZDM2OGVmOTAyYzUwNGNkMzQxYzRiYjJlYzM4YTI2NDJkMGU3NWYyODJlMDk2MmNkZjQwZWVmNDQzY2NlZjU1N2QyMjZmYjVhNGU5In0.eyJhdWQiOiIyIiwianRpIjoiNmNjMGNkMzY4ZWY5MDJjNTA0Y2QzNDFjNGJiMmVjMzhhMjY0MmQwZTc1ZjI4MmUwOTYyY2RmNDBlZWY0NDNjY2VmNTU3ZDIyNmZiNWE0ZTkiLCJpYXQiOjE1NjEzNzU3MDIsIm5iZiI6MTU2MTM3NTcwMiwiZXhwIjoxNTkyOTk4MTAyLCJzdWIiOiIzIiwic2NvcGVzIjpbIioiXX0.kh7qZwpxCOBKoO5uEc8tEhjExCs6RdNzu8AANqzq9PBjIC1OA0wtH1GZGOMdHYY2fZ-qxcIbhT8M5xcLBUqN4kEq2sMe-6AhmCYJECU_d5Zosw0qJ4XodrnnHLFXHOi3gU_5T2ZAIYghYSt3Ku7yHo7IKERjg6wA81TWxyNuO4ZP1TvCHOSVX-MFIBVDk6ZSnxL3yGvgod38kxgQrwJ7cpucyo6w6kFMhF7dW9FTbi21IL6aCGyDQ_Rjiub9H6vz7lzJ_O7TeZU00iVL_UF164VGBp4Lg4EYgHWEehe-VAvwnGBB8izP5Pb91HxlJISFiUHqAjDm5UBbx-rxUnXtZj1yktdT-O7aTTjbAxDQ35N-JPD4HZ4Csj_b5M3Msy6VvyRJfpdcmIgFgJCm-MMXI12nayjTuaDe-CPHr40ZeRWqi7H2f01-mNuDX4CT1-AKUfRu0vx2f9TKJ0tzVo5OuOVjPZ3aIhm_5fLh6eGPwlusVj6DInl42Vdp66hdvZJJuoSvxSRbSOVVJrOr9O9S6h9fPF_h9Gso-9dE797L0qJUKC9-cCWdjA2F-luKaaHw6S_MSohbcL2TtUWT95Q37UfNUvshZu551T7gRsGnQoCrO7ekYE0-QIS1fH_X3s20U9VYrOCZdBqn6CGpUOa6ltU02QfoMka-7a9hY-e-LUw', '2019-05-31 18:30:00', '2019-05-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `is_married` varchar(255) DEFAULT NULL,
  `no_of_child` varchar(255) DEFAULT NULL,
  `anniversary_date` varchar(255) DEFAULT NULL,
  `referd_by` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `acc_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `bcust_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ftpconfigs`
--

CREATE TABLE `ftpconfigs` (
  `id` int(10) UNSIGNED NOT NULL,
  `IPaddress` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `folderPath` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `InternalDocNo` varchar(255) DEFAULT NULL,
  `VoucherInvoiceNumber` varchar(255) DEFAULT NULL,
  `VoucherInvoiceDate` varchar(255) DEFAULT NULL,
  `PONumber` varchar(255) DEFAULT NULL,
  `PODate` varchar(255) DEFAULT NULL,
  `PODateInWord` varchar(255) DEFAULT NULL,
  `TransporterName` varchar(255) DEFAULT NULL,
  `TransporterNo` varchar(255) DEFAULT NULL,
  `HMILVendorCode` varchar(255) DEFAULT NULL,
  `GrandTotal` varchar(255) DEFAULT NULL,
  `GrandTotalInWord` varchar(255) DEFAULT NULL,
  `GSTIN` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `ShopCode` varchar(255) NOT NULL DEFAULT 'AC',
  `GateNo` varchar(255) DEFAULT NULL,
  `ContainerType` varchar(255) DEFAULT NULL,
  `NoofContainers` varchar(255) DEFAULT NULL,
  `StuffQty` varchar(255) DEFAULT NULL,
  `HMILPlant` varchar(255) DEFAULT NULL,
  `TaxAmount` varchar(255) DEFAULT NULL,
  `TaxAmountInWord` varchar(255) DEFAULT NULL,
  `Invoicecount` varchar(255) DEFAULT NULL,
  `ewaybillno` varchar(100) DEFAULT NULL,
  `CGST_amt` varchar(191) DEFAULT NULL,
  `SGST_amt` varchar(191) DEFAULT NULL,
  `IGST_amt` varchar(191) DEFAULT NULL,
  `sub_total` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(191) DEFAULT NULL,
  `SGSTper` varchar(191) DEFAULT NULL,
  `CGSTper` varchar(191) DEFAULT NULL,
  `IGSTper` varchar(191) DEFAULT NULL,
  `pomonth` varchar(191) DEFAULT NULL,
  `subtotal` varchar(191) DEFAULT NULL,
  `totalqty` varchar(191) DEFAULT NULL,
  `totaligst` varchar(191) DEFAULT NULL,
  `totalsgst` varchar(191) DEFAULT NULL,
  `totalcgst` varchar(191) DEFAULT NULL,
  `totalinvoicevalue` varchar(191) DEFAULT NULL,
  `totalinvoicevaluewords` varchar(191) DEFAULT NULL,
  `unittotal` varchar(191) DEFAULT NULL,
  `TCS_Percentage` varchar(191) DEFAULT NULL,
  `TCS_Amount` varchar(191) DEFAULT NULL,
  `IRN_Number` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `InternalDocNo`, `VoucherInvoiceNumber`, `VoucherInvoiceDate`, `PONumber`, `PODate`, `PODateInWord`, `TransporterName`, `TransporterNo`, `HMILVendorCode`, `GrandTotal`, `GrandTotalInWord`, `GSTIN`, `Location`, `ShopCode`, `GateNo`, `ContainerType`, `NoofContainers`, `StuffQty`, `HMILPlant`, `TaxAmount`, `TaxAmountInWord`, `Invoicecount`, `ewaybillno`, `CGST_amt`, `SGST_amt`, `IGST_amt`, `sub_total`, `created_at`, `updated_at`, `SGSTper`, `CGSTper`, `IGSTper`, `pomonth`, `subtotal`, `totalqty`, `totaligst`, `totalsgst`, `totalcgst`, `totalinvoicevalue`, `totalinvoicevaluewords`, `unittotal`, `TCS_Percentage`, `TCS_Amount`, `IRN_Number`) VALUES
(1, '11190100001', '1001', '07/08/2019', '4800887567', '05/08/2019', 'Aug\'19', NULL, NULL, 'TF6W', '22129.92', 'Twenty-two Thousand One Hundred Twenty-nine Rupees And Ninety-two Paisa only', '33AAACH2364M1ZM', NULL, '1234', '2', NULL, NULL, NULL, 'Chennai', '4840.92', 'Four Thousand Eight Hundred Forty Rupees And Ninety-two Paisa only', NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-03 16:19:07', NULL, '14', '14', '28', 'Aug\'19', '17289.00', '300', '4840.92', '2420.46', '2420.46', '22139.92', 'Twenty-two Thousand One Hundred Thirty-nine Rupees And Ninety-two Paisa only', '57.63', '0.075', '10', '1111111111111112222222222222222222222222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `InternalDocNo_id` varchar(255) DEFAULT NULL,
  `VoucherInvoiceNumber_id` varchar(255) DEFAULT NULL,
  `PONumber` varchar(191) DEFAULT NULL,
  `PODate` varchar(191) DEFAULT NULL,
  `PODateInWord` varchar(191) DEFAULT NULL,
  `ItemNumber` varchar(255) DEFAULT NULL,
  `HMILPartDescription` varchar(255) DEFAULT NULL,
  `HMILPartNo` varchar(255) DEFAULT NULL,
  `ITWPartNo` varchar(255) DEFAULT NULL,
  `HSNCode` varchar(255) DEFAULT NULL,
  `TarriffNo` varchar(255) DEFAULT NULL,
  `ItemServiceDescription` varchar(255) DEFAULT NULL,
  `NoOfCases` varchar(255) DEFAULT NULL,
  `ItemQuantity` int(255) DEFAULT NULL,
  `BaseUOM` varchar(255) DEFAULT NULL,
  `ItemUnitRate` varchar(255) DEFAULT NULL,
  `ItemUnitAmount` varchar(255) DEFAULT NULL,
  `SGSTper` varchar(255) DEFAULT NULL,
  `SGSTamt` varchar(255) DEFAULT NULL,
  `CGSTper` varchar(255) DEFAULT NULL,
  `CGSTamt` varchar(255) DEFAULT NULL,
  `IGSTper` varchar(255) DEFAULT NULL,
  `IGSTamt` varchar(255) DEFAULT NULL,
  `MaterialCost` varchar(255) DEFAULT NULL,
  `TaxAmount` varchar(255) DEFAULT NULL,
  `GrandTotal` varchar(255) DEFAULT NULL,
  `NetAmount` varchar(255) DEFAULT NULL,
  `ConsPartCost` varchar(255) DEFAULT NULL,
  `AssessableValue` varchar(255) DEFAULT NULL,
  `ToolCost` varchar(255) DEFAULT NULL,
  `ConsMatlCost` varchar(255) DEFAULT NULL,
  `InvoiceID_count` varchar(255) DEFAULT NULL,
  `TaxAmountInWord` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(191) DEFAULT NULL,
  `PONo` varchar(191) DEFAULT NULL,
  `Stuff_Qty` varchar(191) DEFAULT NULL,
  `Cont_Type` varchar(191) DEFAULT NULL,
  `No_of_Cont` varchar(191) DEFAULT NULL,
  `ALC` varchar(191) DEFAULT NULL,
  `Amort_Cost` varchar(191) DEFAULT NULL,
  `TotalAmort_Cost` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `InternalDocNo_id`, `VoucherInvoiceNumber_id`, `PONumber`, `PODate`, `PODateInWord`, `ItemNumber`, `HMILPartDescription`, `HMILPartNo`, `ITWPartNo`, `HSNCode`, `TarriffNo`, `ItemServiceDescription`, `NoOfCases`, `ItemQuantity`, `BaseUOM`, `ItemUnitRate`, `ItemUnitAmount`, `SGSTper`, `SGSTamt`, `CGSTper`, `CGSTamt`, `IGSTper`, `IGSTamt`, `MaterialCost`, `TaxAmount`, `GrandTotal`, `NetAmount`, `ConsPartCost`, `AssessableValue`, `ToolCost`, `ConsMatlCost`, `InvoiceID_count`, `TaxAmountInWord`, `created_at`, `updated_at`, `PONo`, `Stuff_Qty`, `Cont_Type`, `No_of_Cont`, `ALC`, `Amort_Cost`, `TotalAmort_Cost`) VALUES
(1, '11190100001', '1001', NULL, '05/08/2019', 'Aug\'19', '10', 'BRKT-COMPUTER(AI3)', '39109-2A410', '39109-2A410', '870899', NULL, 'BRKT-COMPUTER(AI3)', '6', 300, 'EA', '57.63', '17289.00', '14', '2420.46', '14', '2420.46', '28', '4840.92', '17289.00', '4840.92', '22139.92', '17289.00', '0.00', '17289.00', '1620.00', '0.00', NULL, 'Four Thousand Eight Hundred Forty Rupees And Ninety-two Paisa only', '2020-10-03 16:19:08', NULL, '4800887567', '10', 'BIN', '2', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `ourPartNo` varchar(255) NOT NULL,
  `customerPartNo` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `packingType` varchar(255) NOT NULL,
  `cumulativeQTY` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `suppilerCode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `suppilerCode`, `created_at`, `updated_at`) VALUES
(1, 'Maharashtra', 'ACCQB', '2018-10-31 05:52:26', '2018-11-08 00:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_11_072916_create_1494476956_roles_table', 1),
('2018_04_05_120533_items', 1),
('2018_04_05_142348_location', 1),
('2018_04_06_095508_ftpconfig', 1),
('2018_04_09_110340_invoiceheader', 1),
('2018_04_09_110410_invoicestockitems', 1),
('2019_03_01_140520_Invoicestockitems', 2),
('2019_03_01_140540_Invoiceheader', 2),
('2019_05_14_111618_customer', 2),
('2019_05_14_111618_customers', 3),
('2019_06_22_170605_configures', 4),
('2019_07_22_193430_backup', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2018-10-31 05:52:26', '2018-10-31 05:52:26'),
(2, 'Simple user', '2018-10-31 05:52:26', '2018-10-31 05:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `location`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Maharashtra', '$2y$10$eu.6.jz0FALSoCCoTqeOOeNtp3uQfLzK.NB3Sc3jjaVjXMykq3WvW', 1, 'cmZzPYP2X381IfUGlWypk9LQa9B94jIXgIbxbIs8JHkXCFIjMT7dRlK3cJyi', '2018-10-31 05:52:26', '2026-06-17 18:51:28'),
(2, 'user', 'Maharashtra', '$2y$10$L.plmKSrsQpn.K6VgbPZs.0NWrti1YSbsnwz1Na6lBTBA64fm99Z2', 2, 'mth8H9qP52zC5g5km7bnVPrJC4YlAaIx9p9SbpcEss38ED3UbsDzZSYl1Wu3', '2019-03-02 09:36:07', '2019-03-02 09:42:49'),
(3, 'Store', 'Maharashtra', '$2y$10$wJcH498E/Qd1VGySacpuCuw2frXwhsYi0fnjIQjPxYbZieoK7s6te', 2, NULL, '2019-11-14 04:38:49', '2019-11-14 04:38:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ftpconfigs`
--
ALTER TABLE `ftpconfigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ftpconfigs`
--
ALTER TABLE `ftpconfigs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
